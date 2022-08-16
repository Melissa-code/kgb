
<?php session_start(); ?>

<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter une cible</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a target form -->
        <form action="<?= URL ?>createTargetValidation" method="POST" >

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
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>