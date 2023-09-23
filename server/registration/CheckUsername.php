<?php
include "../db_config.php";

$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "not_unique";
} else {
    echo "unique";
}

?>