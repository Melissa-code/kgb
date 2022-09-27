<!-- Page title & Back button & Add button --> 

<section class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1>Liste des spécialités</h1>
        </div>
        <div class="col-6 d-flex justify-content-end my-3">
            <!-- Back to the specialities list button --> 
            <a href="<?= URL?>createMission" class="btn btn-light fw-bold"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1.5rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start my-3">
            <!-- Add a speciality button --> 
            <a href="<?= URL?>createSpeciality" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the specialities -->

<section class="container my-5">
    <div class="row">
        <!--  Specialities cards -->
        <article class="d-flex col-12 flex-wrap justify-content-center">
                <?php foreach($specialities as $speciality) :?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-muted"><?= $speciality->getName_speciality(); ?></h4>
                    </div>
                    <!-- update & delete buttons -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto "> 
                            <!-- Udpate speciality button -->
                            <form method="POST" action="<?= URL ?>updateSpeciality?q=<?= $speciality->getName_speciality(); ?>">
                                <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une spécialité" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete speciality button -->
                            <form method="POST" action="<?= URL ?>deleteSpeciality?q=<?= $speciality->getName_speciality(); ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cette spécialité ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une spécialité" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>



