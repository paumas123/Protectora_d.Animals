<?php

function checkEmail($email)
{
    $usr = UserService::selectUserByCorreu($email);
    if (!$usr) {
        return false;
    }
    if ($usr['correu'] === $email) {
        return true;
    }
    return false;
}

function checkRepeatPassword()
{
    if ($_POST['password'] !== $_POST['repeatPassword']) {
        return true;
    }
    return false;
}

function checkCredentials($email, $password)
{
    $persona = UserService::selectUserByCorreu($email);
    if (!$persona) {
        return false;
    }
    if ($persona['password'] === $password) {
//        $_SESSION['usuariLogejat'] = new User($persona['nom'], $persona['cognoms'], $persona['correu'], $persona['data_naixement'], $persona['password']);
        $_SESSION['usuariLogejat'] = UserService::getUserByCorreu($email);
        return true;
    }
    return false;
}

?>