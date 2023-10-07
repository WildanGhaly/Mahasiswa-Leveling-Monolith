<?php
session_start();


include "../../config/config.php";
include "../../app/models/user.php";

ini_set('display_errors', 1);

$users = new UserModel();
$params = array();

if (isset($_SESSION['user'])){
    $params['user'] = $_SESSION['user'];
}
if (isset($_SESSION['filter'])){
    $params['filter'] = $_SESSION['filter'];
}
if (isset($_SESSION['sort'])){
    $params['sort'] = $_SESSION['sort'];
}

if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === '1'){
    $params['isAdmin'] = '1';
}

$params['offset'] = $_GET['offset'];

$user = $users->findUser($params);

if ($user != null) {
    http_response_code(200);
    echo json_encode($user);
} else {
    http_response_code(200);
    echo json_encode(array('status' => 'error', 'message' => 'empty'));
}
