
<!-- Title --> 

<section class="container mb-3">
    <h1 class="text-light">Ajouter une cible</h1>
</section>


<!-- Create a target form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <!-- create a target form -->
            <form action="<?= URL ?>createTargetValidation" method="POST">
                <!-- code_target --> 
                <div class="mb-3">
                    <label for="code_target" class="form-label">Nom de code : </label>
                    <input type="text" class="form-control" id="code_target" name="code_target">
                </div>
                <!-- name_target --> 
                <div class="mb-3">
                    <label for="name_target" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="name_target" name="name_target">
                </div>
                <!-- firstname_target --> 
                <div class="mb-3">
                    <label for="firstname_target" class="form-label">Prénom : </label>
                    <input type="text" class="form-control" id="firstname_target" name="firstname_target">
                </div>
                <!-- datebirthday_target --> 
                <div class="mb-3">
                    <label for="datebirthday_target" class="form-label">Date de naissance : </label>
                    <input type="date" class="form-control" id="datebirthday_target" name="datebirthday_target">
                </div>
                <!-- nationality_target --> 
                <div class="mb-3">
                    <label for="nationality_target" class="form-label">Nationalité : </label>
                    <input type="text" class="form-control" id="nationality_target" name="nationality_target">
                </div>
              
                <!-- Back & Add buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="targetsList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des agents" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>