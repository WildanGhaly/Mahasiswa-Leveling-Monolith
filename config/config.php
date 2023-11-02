<?php

require_once 'dotenv.php';
(new DotEnv(__DIR__ .'/../.env'))->load(); 

define('BASEURL', getenv('BASEURL'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('MYSQL_USER'));
define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));
define('DB_NAME', getenv('MYSQL_DATABASE'));