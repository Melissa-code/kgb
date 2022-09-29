<!-- Title  --> 

<section class="container mb-4">
    <h1 class="text-light">Ajouter une durée</h1>
</section>


<!-- Create duration form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
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
                
                <!-- Back & Add buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="durationsList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des durées" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                    <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            
            </form>
        </article>
    </div>
</section>