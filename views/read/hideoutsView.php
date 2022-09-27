<!-- Page title & Back button & Add button --> 

<section class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1>Liste des planques</h1>
        </div>
        <div class="col-6 d-flex justify-content-end my-3">
            <!-- Back to create mission button --> 
            <a href="<?= URL?>createMission" class="btn btn-dark border border-light fw-bold"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1.5rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start my-3">
            <!-- Add a hideout button --> 
            <a href="<?= URL?>createHideout" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une planque" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the hideouts -->

<section class="container my-5">
    <div class="row">
        <!-- hideouts list -->
        <article class="d-flex col-12 flex-wrap justify-content-center">
            <!-- hideout card -->

            <?php foreach($hideouts as $hideout) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-muted">N° <?= $hideout->getId_hideout() ; ?></h4>
                        <p class="card-subtitle mb-2 text-center text-muted"><?= $hideout->getAddress_hideout() ; ?></p>
                        <p class="card-subtitle mb-2 text-center text-muted"><?= $hideout->getCountry_hideout() ; ?></p>
                    </div>

                    <!-- Update & delete buttons -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto "> 
                            <!-- Udpate hideout button -->
                            <form method="POST" action="<?= URL ?>updateHideout?q=<?= $hideout->getId_hideout() ?>">
                                <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une planque" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete hideout button -->
                            <form method="POST" action="<?= URL ?>deleteHideout?q=<?= $hideout->getId_hideout() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cette planque ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une planque" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>



