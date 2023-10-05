<?php
session_start();

try {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    if (isset($_SESSION['sort'])){
        unset($_SESSION['sort']);
    }

    if (isset($_SESSION['filter'])){
        unset($_SESSION['filter']);
    }
    http_response_code(200);
    
} catch (ExceptionType $e){
    http_response_code(404);
}


 
