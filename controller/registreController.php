<?php
require_once '../model/User.php';
require_once '../model/services/UserService.php';
if (session_status() === PHP_SESSION_NONE) session_start();
include_once '../controller/fun/checkUser.php';
include_once '../conf.php';

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";

$correu = $_POST['correu'];
$target_dir = "../view/uploads/$correu";
$target_file = $target_dir . basename($_FILES['foto']['name']);
$check = getimagesize($_FILES['foto']['tmp_name']);

$pepper = hash_hmac("sha256", $_POST['password'], getPepper());
$p_hashed = password_hash($pepper, PASSWORD_BCRYPT);

if (checkEmail($_POST['correu'])) $_SESSION['errors']['correuInUse'] = "Correu ja registrat";
if (checkRepeatPassword()) $_SESSION['errors']['repeatPassword'] = "Les contrassenyes no coincideixen";

if (!isset($_SESSION['errors'])) {
    if ($check) {
        $usr = new User($_POST['nom'], $_POST['cognoms'], $_POST['correu'], $_POST['data_naixement'], $p_hashed);
        UserService::addUserShop($usr);
        $resultat = move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $_SESSION['info'] = "User successfully created";
        header('Location: ../view/login.php');
        exit();
    }
} else {
    $_SESSION['dadesUsuari'] = [$_POST['nom'], $_POST['cognoms'], $_POST['correu'], $_POST['data_naixement']];
}
header('Location: ../view/registre.php');

?>