<!-- Alert message if the status has been successfully created / updated / deleted --> 

<section class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">

            <!-- Alert successfully created --> 
            <?php if(isset($_SESSION['alertCreateStatus'])) :?>
                <div class="alert alert-success mx-5" role="alert">
                    <?= $_SESSION['alertCreateStatus']['msg'] ?>
                </div>
                <?php unset($_SESSION['alertCreateStatus']) ?>

            <!-- Alert successfully updated --> 
            <?php elseif(isset($_SESSION['alertUpdateStatus'])) :?>
            <div class="alert alert-success mx-5" role="alert">
                <?= $_SESSION['alertUpdateStatus']['msg'] ?>
            </div>
            <?php unset($_SESSION['alertUpdateStatus']) ?>
            
            <!-- Alert successfully deleted --> 
            <?php elseif(isset($_SESSION['alertDeleteStatus'])) :?>
            <div class="alert alert-success mx-5" role="alert">
                <?= $_SESSION['alertDeleteStatus']['msg'] ?>
            </div>
            <?php unset($_SESSION['alertDeleteStatus']) ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Page title & Back button & Add button --> 

<section class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1>Liste des statuts</h1>
        </div>
        <div class="col-6 d-flex justify-content-end my-3">
            <!-- Back to the create a mission form button --> 
            <a href="<?= URL?>createMission" class="btn btn-light fw-bold"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1.5rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start my-3">
            <!-- Add a status button --> 
            <a href="<?= URL?>createStatus" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un statut" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the status -->

<section class="container my-5">
    <div class="row">
        <!--  Status cards -->
        <article class="d-flex col-12 flex-wrap justify-content-center">
                <?php foreach($status as $oneStatus) :?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-muted"><?= $oneStatus->getCode_status(); ?></h4>
                    </div>

                    <!-- update & delete buttons -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto "> 
                            <!-- Udpate speciality button -->
                            <form method="POST" action="<?= URL ?>updateStatus?q=<?= $oneStatus->getCode_status(); ?>">
                                <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une spécialité" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete speciality button -->
                            <form method="POST" action="<?= URL ?>deleteStatus?q=<?= $oneStatus->getCode_status(); ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer ce statut ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une spécialité" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>






