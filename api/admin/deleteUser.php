<?php

session_start();

include "../../config/config.php";
include "../../app/core/database.php";

$user_id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = '$user_id'";

$conn = Database::getInstance();

if ($conn->query($sql) === TRUE) {
    echo 'success';
} else {
    echo 'error';
}