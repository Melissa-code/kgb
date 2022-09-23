<!------------- Main --------------->

<section class="my-4">
    <button class="btn btn-light" type="button"><a href="<?= URL?>createMission"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="height: 1.5rem; width: 1.5rem"></a></button>
    <h1>Liste des types</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- Add a type button -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createType"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un statut" style="width: 1.5rem;"></a></button>
    </div>
</section>



<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a type  -->
            <?php foreach($types as $type) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $type->getName_type() ; ?></h4>
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate type button -->
                        <form method="POST" action="<?= URL ?>updateType?q=<?= $type->getName_type() ?>">
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une planque" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete type button -->
                        <form method="POST" action="<?= URL ?>deleteType?q=<?= $type->getName_type() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer ce type ?');">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une planque" style="width: 1.5rem;"></button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



