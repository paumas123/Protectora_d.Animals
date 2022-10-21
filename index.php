<?php
require_once 'model/services/InitService.php';
require_once 'model/services/Connexio.php';
if (session_status() === PHP_SESSION_NONE) session_start();

InitService::createTables();

header('Location: view/login.php');

?>