<?php

session_start();

include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    parse_str(file_get_contents('php://input'), $_POST);
    $user_id    = $_POST['user_id'];
    $quest_id   = $_POST['quest_id'];

    $conn = Database::getInstance();

    $sql = "INSERT INTO user_quest (user_id, quest_id) VALUES ($user_id, $quest_id)";
    $result = $conn->query($sql);

    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    $row = $results->fetch_assoc();
    $UserId = $row['id'];

    $requestBody = '<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/">
        <Body>
            <updatePoint xmlns="http://service.example.org/">
                <arg0 xmlns="">' . $UserId . '</arg0>
                <arg1 xmlns="">10</arg1>
            </updatePoint>
        </Body>
    </Envelope>';
        // echo $requestBody;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, '10.97.51.237:8081/updatePoint');
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

    echo $sql;
    echo "ini bawah sql";
    echo $row['id'];

} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}