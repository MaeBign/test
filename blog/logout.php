<?php 
session_start();
require_once(__DIR__ . '/functions.php');
session_unset();
session_destroy();
redirectTo('index.php');
?>