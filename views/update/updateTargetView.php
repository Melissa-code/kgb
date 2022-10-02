<!-- Page title & back button button --> 

<section class="container">
    <h1>Modifier la cible <?= $target->getCode_target() ?></h1>
</section>


<!-- Update a target form -->

<div class="row bg-form-target">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4">
            
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
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="name_target" class="form-label">Nom : </label>
                            <input type="text" class="form-control" id="name_target" name="name_target" value="<?= $target->getName_target(); ?>">
                        </div>
                        <!-- firstname_target --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="firstname_target" class="form-label">Prénom : </label>
                            <input type="text" class="form-control" id="firstname_target" name="firstname_target" value="<?= $target->getFirstname_target(); ?>">
                        </div>
                    </div>
                    <!-- datebirthday_target --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="datebirthday_target" class="form-label">Date de naissance : </label>
                            <input type="date" class="form-control" id="datebirthday_target" name="datebirthday_target" value="<?= $target->getDatebirthday_target(); ?>">
                        </div>
                        <!-- nationality_target --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nationality_target" class="form-label">Nationalité : </label>
                            <input type="text" class="form-control" id="nationality_target" name="nationality_target" value="<?= $target->getNationality_target(); ?>">
                        </div>
                    </div>

                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="targetsList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des cibles" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier une cible" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </section>
</div>