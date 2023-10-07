<?php

include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
    exit();
}

$name           = $_POST['name'];
$description    = $_POST['description'];
$threshold      = $_POST['threshold'];
$difficulty     = $_POST['difficulty'];
$group_id       = $_POST['type'];

$conn = Database::getInstance();

$check = "SELECT * FROM achievement WHERE name = '$name'";
$resultcheck = $conn->query($check);
if ($resultcheck->num_rows > 0) {
    http_response_code(409);
    echo "Achievement name should be UNIQUE";
    exit();
}

$sql = "INSERT INTO achievement (name, description, threshold, difficulty, group_id) VALUES ('$name', '$description', '$threshold', '$difficulty', '$group_id')";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo "Error: ".$conn->error;
    exit();
}

echo "success";
?>