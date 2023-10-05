<?php
session_start();


include "../../config/config.php";
include "../../app/models/user.php";

ini_set('display_errors', 1);

$users = new UserModel();
$params = array();

if (isset($_GET['user']) || isset($_SESSION['user'])) {
    if (isset($_GET['user'])){
        $user = $_GET['user'];
        $params['user'] = $user;
        $_SESSION['user'] = $user;
    } else {
        $user = $_SESSION['user'];
        $params['user'] = $user;
    }
    
}
if ((isset($_GET['filter']) && $_GET['filter'] !== 'default') || isset($_SESSION['filter'])) {
    if (isset($_GET['filter']) && $_GET['filter'] !== 'default'){
        $filter = $_GET['filter'];
        $params['filter'] = $filter;
        $_SESSION['filter'] = $filter;
    } else {
        $filter = $_SESSION['filter'];
        $params['filter'] = $filter;
    }
    
}
if ((isset($_GET['sort']) && $_GET['sort'] !== 'default') || isset($_SESSION['sort'])) {
    if (isset($_GET['sort']) && $_GET['sort'] !== 'default'){
        $sort = $_GET['sort'];
        $params['sort'] = $sort;
        $_SESSION['sort'] = $sort;
    } else {
        $sort= $_SESSION['sort'];
        $params['sort'] = $sort;
    }
    
}
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $params['page'] = $page;
}



$user = $users->findUser($params);

if ($user != null) {
    http_response_code(200);
    echo json_encode($user);
} else {
    http_response_code(200);
    echo json_encode(array('status' => 'error', 'message' => 'empty'));
}


