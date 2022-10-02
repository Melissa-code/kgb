<!-- Title  --> 

<section class="container mb-3">
    <h1>Modifier la durée n° <?= $duration->getId_duration() ?></h1>
</section>


<!-- Update duration form -->

<div class="row bg-form-duration">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 p-4 border-form">

                <form action="updateDurationValidation" method="POST">
                    <!-- id_duration modified --> 
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id_duration" name="id_duration" value="<?= $duration->getId_duration() ?>" placeholder="Identifiant de la durée">
                    </div>
                    <!-- oldid_duration --> 
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="oldid_duration" name="oldid_duration" value="<?= $duration->getId_duration() ?>">
                    </div>
                    <!-- start_duration --> 
                    <div class="mb-3">
                        <label for="start_duration" class="form-label">Date de début : </label>
                        <input type="date" class="form-control" id="start_duration" name="start_duration" value="<?= $duration->getStart_duration() ?>" placeholder="Début de la durée">
                    </div>
                    <!-- end_duration --> 
                    <div class="mb-3">
                        <label for="end_duration" class="form-label">Date de fin : </label>
                        <input type="date" class="form-control" id="end_duration" name="end_duration" value="<?= $duration->getEnd_duration() ?>" placeholder="Fin de la durée">
                    </div>

                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="durationsList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des durées" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier une durée" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>
            </article>   
        </div>
    </section>
</div>
    



