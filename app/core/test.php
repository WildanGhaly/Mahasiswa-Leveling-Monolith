<?php

include '../../config/config.php';
include 'database.php';

// Mengambil koneksi dari Singleton
$connection = Database::getInstance();

// Lakukan operasi pada tabel pertama dengan koneksi yang sama
$table_name = "users";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connection, $query);

echo "<strong>$table_name: </strong>";
while($i = mysqli_fetch_assoc($response))
{
    echo "<p>".$i['id']."</p>";
    echo "<p>".$i['username']."</p>";
    echo "<p>".$i['email']."</p>";
    echo "<p>".$i['password']."</p>";
    echo "<p>".$i['isAdmin']."</p>";
    echo "<hr>";
}