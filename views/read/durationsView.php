<!------------- Main --------------->

<section class="my-4">
    <button class="btn btn-light" type="button"><a href="<?= URL?>createMission"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="height: 1.5rem; width: 1.5rem"></a></button>
    <h1>Liste des durées</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a duration -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createDuration"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"></a></button>
    </div>
</section>


<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Duration Card -->
            <?php foreach($durations as $duration) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted">N° <?= $duration->getId_duration() ?></h4>

                    <p class="card-subtitle mb-2 text-center text-muted">Début: 
                        <?php  
                            // Display the date in the French format
                            $dateFormatStart = new DateTime($duration->getStart_duration());
                            echo $dateFormatStart->format('d/m/Y');
                        ?>
                    </p>
                    <p class="card-subtitle mb-2 text-center text-muted">Fin: 
                        <?php  
                            $dateFormatEnd = new DateTime($duration->getEnd_duration());
                            echo $dateFormatEnd->format('d/m/Y');
                        ?>
                    </p>
                </div>

                <!-- Update & Delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate duration button -->
                        <form method="POST" action="<?= URL ?>updateDuration?q=<?= $duration->getId_duration() ?>">
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une spécialité" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete duration button -->
                        <form method="POST" action="<?= URL ?>deleteDuration?q=<?= $duration->getId_duration() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cette durée ?');">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une spécialité" style="width: 1.5rem;"></button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



