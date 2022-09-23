<!------------- Main --------------->

<section class="my-4">
    <button class="btn btn-light" type="button"><a href="<?= URL?>createMission"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="height: 1.5rem; width: 1.5rem"></a></button>
    <h1>Liste des cibles</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a target -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createTarget"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"></a></button>
    </div>
</section>


<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a target -->
            <?php foreach($targets as $target) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted">Code: <?= $target->getCode_target(); ?></h4>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= $target->getFirstname_target(); ?> <?= $target->getName_target(); ?></p>
                    <?php 
                    // Display the date of birth in the French format
                    $dateBirthdayFormat = new DateTime($target->getDatebirthday_target());
                    ?>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= 'Né le : '.$dateBirthdayFormat->format('d/m/Y'); ?></p> 
                    <p class="card-subtitle mb-2 text-center text-muted"><?= 'Nationalité : '. $target->getNationality_target(); ?></p> 
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
</section>



