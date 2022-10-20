<!-- Title --> 

<section class="container pb-2">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1 class="text-light">Liste des missions</h1>
        </div>

        <!-- Alert message if the Admin is logged-in --> 
        <?php if(isset($_SESSION['connect'])) :?>
            <?php foreach($admins as $admin) :?>
                <?php if($admin->getEmail_admin() === $_SESSION['email_admin']) :?>
                    <div class="col-12 col-md-8">
                        <div class="alert text-center text-white" role="alert" style="height: 10px; padding:0;">
                            - Ravi de vous retrouver <?= $admin->getFirstname_admin()." ".$admin->getName_admin()." -"; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
        

<!-- Search a mission & Add a mission button --> 

<div class="row mb-5">
    <section class="container bg-list my-3" id="search">
        <div class="row d-flex justify-content-center">
            <div class="col-12 pt-4">
                <div class="row d-flex justify-content-center align-items-center pb-3">
                    <!-- Search a mission -->
                    <div class="col-9 col-md-4 my-2">
                        <input class="form-control input" type="text" placeholder="Rechercher une mission" aria-label="Search" id="searchInput">
                        <div id="suggestions"></div>
                    </div>
                    <!-- Display Add mission button if the Admin is logged-in -->
                    <?php if(isset($_SESSION['connect'])) :?>
                        <div class="col-12 col-md-3 my-2 d-flex justify-content-center">
                            <a href="<?= URL?>createMission" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une mission" style="width: 1.5rem; height:1.5rem;"> Ajouter</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>   
        </div>
    </section> 
</div>

<!-- Missions cards -->

<section class="container my-5">
    <div class="row">
        <article class="col-12 d-flex flex-wrap justify-content-center mb-5" id="missions-list">
            <?php foreach($missions as $mission) :?>
                <div class="card m-2 list-item" style="width: 18rem; ">
                    <div class="card-body">
                    <a href="<?= URL ?>oneMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="card-link"><h3 id="title" class="card-title mb-4 text-center text-danger fw-bold">Mission <?= $mission->getCode_mission(); ?></h3></a>
                    <h4 class="card-subtitle mb-2 text-center text-danger"><?= $mission->getTitle_mission() ; ?></h4>
                    <p class="card-text text-dark"><?= $mission->getDescription_mission() ?></p>
                </div>

                <!-- Display the Update & Delete buttons if the Admin is logged-in -->
                <?php if(isset($_SESSION['connect'])) :?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto my-2"> 
                            <!-- Udpate mission button -->
                            <form method="POST" action="<?= URL ?>updateMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="me-2">
                                <button class="btn btn-warning" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une planque" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete mission button -->
                            <form method="POST" action="<?= URL ?>deleteMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer la mission ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une planque" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                <?php endif ?>
                </div>
            <?php endforeach; ?>
        </article>

        <!-- Get the env PROD variable -->
        <input type="text" value="<?php getenv('PROD') ?>" name="prod" id="<?php getenv('PROD') ?>">

    </div>
</section>


<!-- Pagination -->

<section class="row mt-5 mb-3">
    <div class="col-12 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark previousP" href="#">Précédente</a></li>
                <li class="page-item"><a class="page-link text-dark firstP"  href="#">1</a></li>
                <li class="page-item"><span class="page-link text-dark" id="pageInfo">1 / 3</span></li>
                <li class="page-item"><a class="page-link text-dark lastP"  href="#">3</a></li>
                <li class="page-item"><a class="page-link text-dark nextP"  href="#">Suivante</a></li>
            </ul>
        </nav>
    </div>
</section>



