<?php
include_once __DIR__."/../session.php";

$conn = Database::getInstance();
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$UserId = $row['id'];

// echo $UserId;
$requestBody = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
        <Body>
            <getCode xmlns="http://service.example.org/">
                <arg0 xmlns="">' . $UserId . '</arg0>
            </getCode>
        </Body>
    </Envelope>';
        // echo $requestBody;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, '10.97.51.237:8081/getCode');
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
            echo 'Error: ' . $error;
        } else {
            $responseXml = simplexml_load_string($response);
            $returnValue = $responseXml->xpath('//return');
            $value = (string) $returnValue[0];
            echo $value;
        }

