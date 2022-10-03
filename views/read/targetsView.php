<!-- Page title & Back button & Add button --> 

<div class="row">
    <section class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mb-3">
                <h1 class="text-light">Liste des cibles</h1>
            </div>
        </div>
    </section>

    <div class="row">
        <section class="container bg-list">  
            <div class="row my-md-5">
                <div class="col-6 d-flex justify-content-end mt-3">
                    <!-- Back to create mission button --> 
                    <a href="<?= URL?>createMission" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1rem;"> Revenir</a>
                </div>
                <div class="col-6 d-flex justify-content-start mt-3">
                    <!-- Add a target button --> 
                    <a href="<?= URL?>createTarget" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"> Ajouter</a>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Display all the targets -->

<section class="container my-5">
    <div class="row">
        <article class="d-flex col-12 flex-wrap justify-content-center" id="lists">
            <!-- target card -->
            <?php foreach($targets as $target) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-danger">Code: <?= $target->getCode_target(); ?></h4>
                        <p class="card-subtitle mb-2 text-center text-danger fw-bold"><?= $target->getFirstname_target(); ?> <?= $target->getName_target(); ?></p>
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


<!-- Pagination -->

<section class="row mt-5 mb-3">
    <div class="col-12 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark previousP" href="#">Précédente</a></li>
                <li class="page-item"><a class="page-link text-dark firstP"  href="#">1</a></li>
                <li class="page-item"><span class="page-link text-dark" id="pageInfo">1 / 2</span></li>
                <li class="page-item"><a class="page-link text-dark lastP"  href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark nextP"  href="#">Suivante</a></li>
            </ul>
        </nav>
    </div>
</section>

