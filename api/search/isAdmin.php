<?php
session_start();


include "../../config/config.php";

http_response_code(200);
echo $_SESSION['isAdmin'];
