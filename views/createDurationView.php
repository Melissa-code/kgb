
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter une durée</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a duration form -->
        <form action="<?= URL ?>createDurationValidation" method="POST" >
            <!-- id_duration --> 
            <div class="mb-3">
                <label for="id_duration" class="form-label">Identifiant durée : </label>
                <input type="number" class="form-control" id="id_duration" name="id_duration">
            </div>
            <!-- start_duration --> 
            <div class="mb-3">
                <label for="start_duration" class="form-label">Date de début : </label>
                <input type="date" class="form-control" id="start_duration" name="start_duration">
            </div>
            <!-- end_duration --> 
            <div class="mb-3">
                <label for="end_duration" class="form-label">Date de fin : </label>
                <input type="date" class="form-control" id="end_duration" name="end_duration">
            </div>


            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>