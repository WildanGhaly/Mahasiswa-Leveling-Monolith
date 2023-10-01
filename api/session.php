<?php
// session_start();
include_once __DIR__."/../config/config.php";
include_once __DIR__.'/../app/core/database.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
}