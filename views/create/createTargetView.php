
<!-- Page title & back button button --> 

<section class="container mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12"></div>
            <h1>Ajouter une cible</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
            <a href="targetsList" class="btn btn-dark border border-light"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des cibles" style=" height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create a target form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
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
                <!-- Add button --> 
                <div>
                    <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"> Ajouter</button>
                </div>
            </form>
        </article>
    </div>
</section>