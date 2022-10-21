<?php
require_once '../model/User.php';
require_once '../model/services/UserService.php';
if (session_status() === PHP_SESSION_NONE) session_start();
include_once '../controller/fun/checkUser.php';
include_once '../conf.php';

$user = UserService::getUserByCorreu($_POST['correu']);
$pepper = getPepper();
$p_peppered = hash_hmac("sha256", $_POST['password'], $pepper);

if(checkCredentials($_POST['correu'], $user->getPassword()) && password_verify($p_peppered, $user->getPassword())) {
    header('Location: ../view/protectoraAnimals.php');
    exit();
} else {
    $_SESSION['correuLogin'] = $_POST['correu'];
    $_SESSION['errors']['loginError'] = "Credencials incorèctes";
}
header('Location: ../view/login.php');


?>