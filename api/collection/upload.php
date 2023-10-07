<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    return;
}

$username = $_SESSION['username'];

if (isset($_FILES['audioFile'])) {


  $uploadDir = '../../public/audio/'.$username.'/';
  if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

  $uploadFile = $uploadDir . basename($_FILES['audioFile']['name']);

  if (move_uploaded_file($_FILES['audioFile']['tmp_name'], $uploadFile)) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }
}
?>