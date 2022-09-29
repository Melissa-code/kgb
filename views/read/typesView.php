<!-- Page title & Back button & Add button --> 

<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1 class="text-light">Liste des types</h1>
        </div>
        <div class="col-6 d-flex justify-content-end mt-3">
            <!-- Back to the create a type form button --> 
            <a href="<?= URL?>createMission" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start mt-3">
            <!-- Add a type button --> 
            <a href="<?= URL?>createType" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un type" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the types -->

<section class="container my-5">
    <div class="row">
        <!--  Types cards -->
        <article class="d-flex col-12 flex-wrap justify-content-center">
                <?php foreach($types as $type) :?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                        <h4 class="card-subtitle mb-2 text-center text-danger"><?= $type->getName_type() ?></h4>
                    </div>
                    <!-- update & delete buttons -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto "> 
                            <!-- Udpate speciality button -->
                            <form method="POST" action="<?= URL ?>updateType?q=<?= $type->getName_type() ?>">
                                <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un type" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete speciality button -->
                            <form method="POST" action="<?= URL ?>deleteType?q=<?= $type->getName_type() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer ce type ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un type" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>


