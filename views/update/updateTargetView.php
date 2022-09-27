<!-- Page title & back button button --> 

<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier la cible <?= $target->getCode_target() ?></h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-4">
            <a href="targetsList" class="btn btn-dark border border-light"><img class="text-white" src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des cibles" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Update a target form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
        
            <form action="updateTargetValidation" method="POST">
                <!-- code_target --> 
                <div class="mb-3">
                    <label for="code_target" class="form-label">Code : </label>
                    <input type="text" class="form-control" id="code_target" name="code_target" value="<?= $target->getCode_target(); ?>" placeholder="code cible">
                </div>
                <!-- code_target --> 
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="oldcode_target" name="oldcode_target" value="<?= $target->getCode_target(); ?>" >
                </div>
                <!-- name_target --> 
                <div class="mb-3">
                    <label for="name_target" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="name_target" name="name_target" value="<?= $target->getName_target(); ?>">
                </div>
                <!-- firstname_target --> 
                <div class="mb-3">
                    <label for="firstname_target" class="form-label">Prénom : </label>
                    <input type="text" class="form-control" id="firstname_target" name="firstname_target" value="<?= $target->getFirstname_target(); ?>">
                </div>
                <!-- datebirthday_target --> 
                <div class="mb-3">
                    <label for="datebirthday_target" class="form-label">Date de naissance : </label>
                    <input type="date" class="form-control" id="datebirthday_target" name="datebirthday_target" value="<?= $target->getDatebirthday_target(); ?>">
                </div>
                <!-- nationality_target --> 
                <div class="mb-3">
                    <label for="nationality_target" class="form-label">Nationalité : </label>
                    <input type="text" class="form-control" id="nationality_target" name="nationality_target" value="<?= $target->getNationality_target(); ?>">
                </div>

                <!-- Update button --> 
                <div class="">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une cible" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
        </article>
    </div>
</section>