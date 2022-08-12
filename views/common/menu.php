
<!--------------- Navigation bar ----------------->

<nav id="menu" class="navbar navbar-expand-lg navbar-light px-5">

    <div class="container-fluid">
        <!-- Logo -->
        <div class="logo mx-4">
            <a class="navbar-brand" href="home" alt="logo du site">
                <img src="<?= URL ?>public/assets/images/logo_kgb.png" width="80" />
            </a>
        </div>

        <!-- Button for burger menu-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Target of the button -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                <!-- Home link -->
                <li><a aria-current="page" href="home" class="nav-link px-2 text-dark">Accueil</a></li>
                <!-- Missions link -->
                <li><a href="missions" class="nav-link px-2 text-dark">Missions</a></li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <!-- Login link -->
                <?php if(!isset($_SESSION['connect'])) :?>
                    <li><a href="login"><img src="<?= URL ?>public/assets/images/connection.svg" width="60" class="nav-link px-2" /></a></li>
                    <?php endif ?>
                    <!-- Logout link -->
                <?php if(isset($_SESSION['connect'])) :?>
                    <li><a href="logout"><img src="<?= URL ?>public/assets/images/disconnection.svg"  width="60" class="nav-link px-2" /></a></li>
                <?php endif ?>
            </ul>
        </div>

    </div>
</nav>