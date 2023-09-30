<?php
include "../../config/config.php";
include "../../app/core/database.php";

$username = $_POST['username'];

$conn = Database::getInstance();

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "not_unique";
} else {
    echo "unique";
}

?>