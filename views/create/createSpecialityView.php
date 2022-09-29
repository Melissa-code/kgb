<!-- Title  --> 

<section class="container mb-5">
    <h1 class="text-light">Ajouter une spécialité</h1>
</section>


<!-- Create speciality form -->

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <form action="<?= URL ?>createSpecialityValidation" method="POST" >
                <!-- name_speciality --> 
                <div class="mb-3">
                    <label for="name_speciality" class="form-label">Nom de la spécialité : </label>
                    <input type="text" class="form-control" id="name_speciality" name="name_speciality">
                </div>
                <!-- Back & Add buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="specialitiesList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des spécialités" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>
