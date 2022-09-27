<!-- Page title & Back button & Add button --> 

<section class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1>Liste des cibles</h1>
        </div>
        <div class="col-6 d-flex justify-content-end my-3">
            <!-- Back to create mission button --> 
            <a href="<?= URL?>createMission" class="btn btn-dark border border-light fw-bold"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1.5rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start my-3">
            <!-- Add a target button --> 
            <a href="<?= URL?>createTarget" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the targets -->

<section class="container my-5">
    <div class="row">
        <article class="d-flex col-12 flex-wrap justify-content-center">
            <!-- target card -->
            <?php foreach($targets as $target) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-danger">Code: <?= $target->getCode_target(); ?></h4>
                        <p class="card-subtitle mb-2 text-center text-danger"><?= $target->getFirstname_target(); ?> <?= $target->getName_target(); ?></p>
                    <?php 
                    // Display the date of birth in the French format
                    $dateBirthdayFormat = new DateTime($target->getDatebirthday_target());
                    ?>
                    <p class="card-subtitle mb-2 text-center text-dark"><?= 'Né le : '.$dateBirthdayFormat->format('d/m/Y'); ?></p> 
                    <p class="card-subtitle mb-2 text-center text-dark"><?= 'Nationalité : '. $target->getNationality_target(); ?></p> 
                </div>

                <!-- Update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate target button -->
                        <form method="POST" action="<?= URL ?>updateTarget?q=<?= $target->getCode_target(); ?>">
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une cible" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete target button -->
                        <form method="POST" action="<?= URL ?>deleteTarget?q=<?= $target->getCode_target() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cette cible ?');">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une cible" style="width: 1.5rem;"></button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>

        </article>
    </div>
</section>



