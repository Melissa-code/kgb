<!--------------- Navigation ----------------->

<nav id="menu" class="navbar navbar-expand-lg navbar-light px-5">
    <div class="container-fluid">
        
        <!-- Logo -->
        <div class="logo mx-4">
            <a class="navbar-brand" href="home" alt="logo du site">
                <img src="<?= URL ?>public/assets/images/logo-spy.png" width="83"/>
            </a>
        </div>

        <!-- Burger menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Target of burger menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <!-- Home link -->
                <li style="background: #F7F5F3; width:6rem;"><a aria-current="page" href="home" class="nav-link px-2 text-dark">Accueil</a></li>
                <!-- Missions link -->
                <li style="background: #F7F5F3; width:6rem;"><a href="missions" class="nav-link px-2 text-dark">Missions</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Login link -->
                <?php if(!isset($_SESSION['connect'])) :?>
                    <li style="background: #F7F5F3; width:6rem;"><a href="login"><img src="<?= URL ?>public/assets/images/loginuser.svg" width="80" class="nav-link px-2" /></a></li>
                    <?php endif ?>
                <!-- Logout link -->
                <?php if(isset($_SESSION['connect'])) :?>
                    <li style="background: #F7F5F3; width:6rem;"><a href="logout"><img src="<?= URL ?>public/assets/images/logoutuser.svg"  width="80" class="nav-link px-2" /></a></li>
                <?php endif ?>
            </ul>
        </div>

    </div>
</nav>