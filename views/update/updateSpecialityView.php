
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="specialitiesList">Retour</a></button>
    <h1>Modifier la spécialité <?= $speciality->getName_speciality() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a status form -->
        <form action="updateSpecialityValidation" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="name_speciality" name="name_speciality" value="<?= $speciality->getName_speciality() ?>" placeholder="nom de la spécialité">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="oldname_speciality" name="oldname_speciality" value="<?= $speciality->getName_speciality() ?>" >
            </div>

        
            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>