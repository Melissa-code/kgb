<!-- Title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Ajouter une durée</h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="durationsList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des durées" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create duration form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-6 col-lg-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
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
                <!-- Add button --> 
                <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"> Ajouter</button>
            </form>
        </article>
    </div>
</section>