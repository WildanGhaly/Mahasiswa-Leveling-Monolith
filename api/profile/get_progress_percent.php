<?php
include_once __DIR__."/get_progress.php";

$progress = $current / $target * 100;

echo $progress.'%';

