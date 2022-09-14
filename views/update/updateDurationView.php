
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="durationsList">Retour</a></button>
    <h1>Modifier la durée n° <?= $duration->getId_duration() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a duration form -->
        <form action="updateDurationValidation" method="POST">

            <!-- id duration modified --> 
            <div class="mb-3">
                <input type="text" class="form-control" id="id_duration" name="id_duration" value="<?= $duration->getId_duration() ?>" placeholder="Identifiant de la durée">
            </div>
            <!-- old id duration --> 
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


            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>