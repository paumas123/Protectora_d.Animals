<nav class="navbar navbar-expand-lg navbar-light bg-light inline    ">
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Animals en adopció</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Portar en adopció</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Informació personal</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../../controller/tancarSessioController.php">Tancar sessió</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#"><?= $_SESSION['usuariLogejat']->getCorreu(); ?></span></a>
            </li>
        </ul>
    </div>
</nav>