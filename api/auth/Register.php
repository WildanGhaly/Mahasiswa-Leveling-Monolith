<?php

session_start(); // Mulai sesi

include "../../config/config.php";
include "../../app/core/database.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$key = "mahasiswa_leveling";

ini_set('display_errors', 1);   
// $en_password = openssl_encrypt($password, "AES-256-CBC", $key, 0, substr(md5($key), 0, 16));
$en_password = password_hash($password, PASSWORD_BCRYPT);

$conn = Database::getInstance();

$conn->begin_transaction();

$query = "SELECT IFNULL(MAX(id), 0) + 1 AS next_user_id FROM users";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$nextUserId = $row['next_user_id'];

$sql = "INSERT INTO users (username, email, password, id) VALUES (?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $email, $en_password, $nextUserId);

if ($stmt->execute() === TRUE) {
    try {
        
        $arg0 = $nextUserId; 
        $arg1 = password_hash($password, PASSWORD_BCRYPT);
        $requestBody = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
        <Body>
            <restCode xmlns="http://service.example.org/">
                <arg0 xmlns="">' . $arg0 . '</arg0>
                <arg1 xmlns="">' . $arg1 . '</arg1>
            </restCode>
        </Body>
    </Envelope>';
        // echo $requestBody;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, '10.97.51.237:8081/code');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: text/xml; charset="utf-8"',
            'X-API-KEY: PHPClient',
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        if ($response === false) {
            $error = curl_error($curl);
            echo 'cURL Error: ' . $error;
            $conn->rollback();
        } else {
            $responseXml = simplexml_load_string($response);
            $returnValue = $responseXml->xpath('//return');
            $value = (string) $returnValue[0];

            if ($value === '1') {
                $conn->commit();
                echo "success";

            } else {
                echo "error. failed create token";
                $conn->rollback();
            }
        }
        curl_close($curl);
    

    } catch (Exception $e) {
        $conn->rollback();
        echo "error " . $e->getMessage();
    }
} else {
    echo 'error';
}
?>
