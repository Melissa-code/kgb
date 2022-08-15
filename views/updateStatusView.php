
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="createMission">Retour</a></button>
    <h1>Modifier le statut </h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- update a status form -->
        <form action="<?= URL ?>updateStatusValidation" method="POST" >
            <!-- code_status --> 
            <select class="form-select mb-3" aria-label="Default select example" name="code_status" value="">
                <option selected> -- Statut -- </option>
                <option value="en préparation">en préparation</option>
                <option value="en cours">en cours</option>
                <option value="terminé">terminé</option>
                <option value="échec">échec</option>
            </select>
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>

        </form>
    </article>
</section>