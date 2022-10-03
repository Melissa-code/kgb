<!-- Page title & Back button & Add button --> 

<div class="row">
    <section class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mb-3">
                <h1 class="text-light">Liste des durées</h1>
            </div>
            </div>
    </section>

    <div class="row">
        <section class="container bg-list">  
            <div class="row my-md-5">
                <div class="col-6 d-flex justify-content-end mt-3">
                    <!-- Back to the create mission form button --> 
                    <a href="<?= URL?>createMission" class="btn btn-dark fw-bold"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1rem;"> Revenir</a>
                </div>
                <div class="col-6 d-flex justify-content-start mt-3">
                    <!-- Add a duration button --> 
                    <a href="<?= URL?>createDuration" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une durée" style="width: 1.5rem;"> Ajouter</a>
                </div>
            </div>
        </section>
    </div>
</div>


<!-- Display all the durations -->

<section class="container">
    <div class="row">
        <!--  Durations cards -->
        <article class="d-flex col-12 flex-wrap justify-content-center my-5" id="lists">

            <?php foreach($durations as $duration) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-dark">N° <?= $duration->getId_duration() ?></h4>
                    <p class="card-subtitle mb-2 text-center text-dark">Début: 
                        <?php  
                            // Display the date in the French format
                            $dateFormatStart = new DateTime($duration->getStart_duration());
                            echo $dateFormatStart->format('d/m/Y');
                        ?>
                    </p>
                    <p class="card-subtitle mb-2 text-center text-dark">Fin: 
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
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une durée" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete duration button -->
                        <form method="POST" action="<?= URL ?>deleteDuration?q=<?= $duration->getId_duration() ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cette durée ?');">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une durée" style="width: 1.5rem;"></button>
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

