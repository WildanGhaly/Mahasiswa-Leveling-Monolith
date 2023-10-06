<?php
session_start();
include_once __DIR__."/../session.php";

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

  $uniqeSqlTest = "SELECT * FROM collection WHERE name = '".$_FILES['audioFile']['name']."' AND user_id = (SELECT id FROM users WHERE username = '$username')";
  $conn = Database::getInstance();
  $result = $conn->query($uniqeSqlTest);
  if ($result->num_rows > 0) {
    echo json_encode(['success' => false]);
    return;
  }

  $uploadFile = $uploadDir . basename($_FILES['audioFile']['name']);

  if (move_uploaded_file($_FILES['audioFile']['tmp_name'], $uploadFile)) {
    $sql = "INSERT INTO collection (name, description, link, user_id) VALUES ('".$_FILES['audioFile']['name']."', 'description', '$username/".$_FILES['audioFile']['name']."', (SELECT id FROM users WHERE username = '$username'))";
    $result = $conn->query($sql);
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }
}
?>