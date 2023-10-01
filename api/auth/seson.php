<?php
session_start();

// Mengecek apakah sesi 'username' sudah ada atau tidak
if (isset($_SESSION['username'])) {
    echo 'Pengguna sudah masuk dengan nama: ' . $_SESSION['username'];
} else {
    echo 'Pengguna belum masuk.';
}
?>
