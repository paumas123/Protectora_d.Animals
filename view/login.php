<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <form action="../controller/loginController.php" method="post"
              class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3 m-4 p-4 border rounded bg-light">
            <img class="w-50 mx-auto d-block rounded-circle" src="img/loginImg.png"/>
            <div class="">
                <label for="inputCorreu" class="form-label"></label>
                <input type="email" name="correu" class="form-control" placeholder="Email"
                       value="<?php if (isset($_SESSION['correuLogin'])) echo $_SESSION['correuLogin'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label"></label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-2">
                <button style="width: 100%" type="submit" name="envia" class="btn btn-primary">Entra</button>
            </div>

            <div class="text-primary">
                <a style="text-decoration: none" href="registre.php">No tens un compte?</a>
            </div>
            <small style="color: red">
                <?php
                if (isset($_SESSION['errors']['loginError'])) echo $_SESSION['errors']['loginError'];
                unset($_SESSION['errors']);
                unset($_SESSION['correuLogin']);
                ?>
            </small>
            <small style="color: dodgerblue">
                <?php
                if (isset($_SESSION['info'])) echo $_SESSION['info'];
                unset($_SESSION['info']);
                ?>
            </small>
        </form>
    </div>
</div>
</body>
</html>