<!-- Alert message if the Admin is logged-in --> 
<?php if(isset($_SESSION['connect'])) :?>
    <?php foreach($admins as $admin) :?>
        <?php if($admin->getEmail_admin() === $_SESSION['email_admin']) :?>
            <section class="container mt-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="alert text-center text-white" role="alert">
                            - Ravi de vous revoir <?= $admin->getFirstname_admin()." ".$admin->getName_admin()." -"; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Alert message if the mission has been successfully udpated --> 
<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">
            <?php if(isset($_SESSION['alertUpdate'])) :?>
                <div class="alert alert-success mx-5" role="alert">
                    <?= $_SESSION['alertUpdate']['msg'] ?>
                </div>
                <?php unset($_SESSION['alertUpdate']) ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Title & Searchbar & Add button --> 
<section >
    <div class="row d-flex justify-content-center">
        <div class="col-10 mb-2">
            <h1 class="text-light">Liste des missions</h1>
        </div>

        <div class="col-12 mb-4">
            <div class="row d-flex justify-content-center">

                <!-- Search a mission -->
                <div class="col-10 col-md-7 col-lg-5 mt-3">
                    <div>
                        <input class="form-control input" type="text" placeholder="Rechercher une mission" aria-label="Search" id="searchInput">
                        <div id="suggestions"></div>
                    </div>
                </div>

                <!-- Display Add mission button if the Admin is logged-in -->
                <?php if(isset($_SESSION['connect'])) :?>
                    <div class="col-12 col-md-3 mt-3 d-flex justify-content-center">
                        <a href="<?= URL?>createMission" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une mission" style="width: 1.5rem; height:1.5rem;"> Ajouter</a>
                    </div>
                <?php endif ?>
            </div>
        </div>    
    </div>
</section>


<!-- Display all the missions --> 

<section class="container">
    <div class="row">
        <!-- Missions cards -->
        <article class="col-12 d-flex flex-wrap justify-content-center" id="missions-list">
            <?php foreach($missions as $mission) :?>
                <div class="card m-2 list-item" style="width: 18rem;">
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
    </div>
</section>


<!-- Pagination -->

<section class="row mt-5 mb-3">
    <div class="col-12 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark previousP" href="#">Précédente</a></li>
                <li class="page-item"><a class="page-link text-dark firstP"  href="#">1</a></li>
                <li class="page-item"><span class="page-link text-dark" id="pageInfo">Page 1 / 3</span></li>
                <li class="page-item"><a class="page-link text-dark lastP"  href="#">3</a></li>
                <li class="page-item"><a class="page-link text-dark nextP"  href="#">Suivante</a></li>
            </ul>
        </nav>
    </div>
</section>



