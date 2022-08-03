<!--------------- Navigation ----------------->

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
            <ul class="nav col-12 col-lg-auto mx-md-auto mb-2 justify-content-center mb-md-0">
                <li><a aria-current="page" href="home" class="nav-link px-2 text-dark">Accueil</a></li>
                <li><a href="missions" class="nav-link px-2 text-dark">Missions</a></li>
            </ul>

            <div class="text-end me-5">
                <!-- <a class="btn btn-dark" href="login" role="button">Connexion</a> -->
                <a href="login"><img src="<?= URL ?>public/assets/images/login.svg" width="30" /></a>
            </div>
        </div>

    </div>
</nav>