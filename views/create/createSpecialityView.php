<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter une spécialité</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a speciality form -->
        <form action="<?= URL ?>createSpecialityValidation" method="POST" >
            <!-- name_speciality --> 
            <div class="mb-3">
                <label for="name_speciality" class="form-label">Nom de la spécialité : </label>
                <input type="text" class="form-control" id="name_speciality" name="name_speciality">
            </div>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>