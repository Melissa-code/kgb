
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="targetsList">Retour</a></button>
    <h1>Modifier la cible <?= $target->getCode_target() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a target form -->
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

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>