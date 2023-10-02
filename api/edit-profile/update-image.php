<?php
$uploadDir = '../../public/img/profile/'; // Direktori tempat gambar akan disimpan

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_FILES['image']) {
    $fileName = $_FILES['image']['name'];
    $tempFile = $_FILES['image']['tmp_name'];
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $response = array('success' => true, 'fileName' => $fileName);
    } else {
        $response = array('success' => false);
    }

    echo json_encode($response);
} else {
    $response = array('success' => false);
    echo json_encode($response);
}
?>
