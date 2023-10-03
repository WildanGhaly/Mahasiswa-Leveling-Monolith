<?php
session_start();
include_once __DIR__."/../session.php";

$uploadDir = '../../public/img/profile/'; // Direktori tempat gambar akan disimpan

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_FILES['image']) {
    $fileName = $_FILES['image']['name'];
    $tempFile = $_FILES['image']['tmp_name'];

    $username = $_SESSION['username'];
    $targetFile = $uploadDir . $username . '.jpg';

    if (move_uploaded_file($tempFile, $targetFile)) {
        $conn = Database::getInstance();
        $sql = "UPDATE users SET image_path = '../$targetFile' WHERE username = '$username'";
        $result = $conn->query($sql);

        if (!$result) {
            $response = array('success' => false);
            echo json_encode($response);
            return;
        }

        $response = array('success' => true, 'filePath' => '../'.$targetFile);
    } else {
        $response = array('success' => false);
    }

    echo json_encode($response);
} else {
    $response = array('success' => false);
    echo json_encode($response);
}

?>
