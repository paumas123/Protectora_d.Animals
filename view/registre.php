<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <form action="../controller/registreController.php" method="post"
              class="col-10 col-sm-9 col-md-7 col-lg-6 col-xl-4 m-4 p-4 border rounded bg-light"
              enctype="multipart/form-data">
            <h2>Registre</h2>
            <div class="input-group mb-1">
                <div class="col-6 pe-2">
                    <label for="inputNom" class="form-label"></label>
                    <input type="text" name="nom" class="form-control" placeholder="Nom"
                           value="<?php if (isset($_SESSION['dadesUsuari'][0])) echo $_SESSION['dadesUsuari'][0] ?>"
                           required>
                </div>
                <div class="col-6 ps-2">
                    <label for="inputCognoms" class="form-label"></label>
                    <input type="text" name="cognoms" class="form-control" placeholder="Cognoms"
                           value="<?php if (isset($_SESSION['dadesUsuari'][1])) echo $_SESSION['dadesUsuari'][1] ?>"
                           required>
                </div>
            </div>

            <div class="input-group mb-1">
                <div class="col-6 pe-2">
                    <label for="inputCorreu" class="form-label"></label>
                    <input type="email" name="correu" class="form-control" placeholder="Email"
                           value="<?php if (isset($_SESSION['dadesUsuari'][2])) echo $_SESSION['dadesUsuari'][2] ?>"
                           required>
                </div>
                <div class="col-6 ps-2">
                    <label for="inputData" class="form-label"></label>
                    <input type="date" name="data_naixement" class="form-control"
                           value="<?php if (isset($_SESSION['dadesUsuari'][3])) echo $_SESSION['dadesUsuari'][3] ?>"
                           required>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="col-6 pe-2">
                    <label for="inputPassword" class="form-label"></label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="col-6 ps-2">
                    <label for="inputPassword" class="form-label"></label>
                    <input type="password" name="repeatPassword" class="form-control" placeholder="Repeat Password" required>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" required>
                <label class="form-check-label" for="exampleCheck1">Accepto els Termes i Condicions</label>
            </div>

            <div class="mb-3">
                <label for="formFileSm" class="form-label">Sel·leciona una imatge de perfil</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
            </div>

            <div class="mb-2">
                <button style="width: 100%" type="submit" name="envia" class="btn btn-primary">Registrar-se</button>
            </div>

            <div class="text-primary">
                <a style="text-decoration: none" href="login.php">Ja tens un compte?</a>
            </div>
            <small style="color: red">
                <?php
                if (isset($_SESSION['errors']['correuInUse'])) echo $_SESSION['errors']['correuInUse'] . "<br>";
                if (isset($_SESSION['errors']['repeatPassword'])) echo $_SESSION['errors']['repeatPassword'];

                unset($_SESSION['errors']);
                unset($_SESSION['dadesUsuari']);
                ?>
            </small>
        </form>
    </div>
</div>
</body>
</html>