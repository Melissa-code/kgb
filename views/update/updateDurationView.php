<!-- Title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier la durée n° <?= $duration->getId_duration() ?></h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="durationsList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des durées" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Update duration form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">

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
                <!-- Update button  --> 
                <div class="mb-3">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une durée" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
        </article>   
    </div>
</section>

    



