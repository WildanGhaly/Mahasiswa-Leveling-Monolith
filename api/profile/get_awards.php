<?php
// session_start();
include_once __DIR__."/../session.php";

$conn = Database::getInstance();
$username = $_SESSION['username'];

$sql = "SELECT total_achievement FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo $row['total_achievement'];
