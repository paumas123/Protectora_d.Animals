<?php
require_once '../model/User.php';
if (session_status() === PHP_SESSION_NONE) session_start();

unset($_SESSION['usuariLogejat']);

header('Location: ../view/login.php');

?>