
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="hideoutsList">Retour</a></button>
    <h1>Modifier la planque <?= $hideout->getId_hideout() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a status form -->
        <form action="updateHideoutValidation" method="POST">
            <!-- id_hideout --> 
            <div class="mb-3">
                <input type="text" class="form-control" id="id_hideout" name="id_hideout" value="<?= $hideout->getId_hideout() ?>" placeholder="code status">
            </div>
            <!-- oldid_hideout --> 
            <div class="mb-3">
                <input type="hidden" class="form-control" id="oldid_hideout" name="oldid_hideout" value="<?= $hideout->getId_hideout() ?>" >
            </div>

            <!-- address_hideout --> 
            <div class="mb-3">
                <label for="address_hideout" class="form-label">Adresse : </label>
                <input type="text" class="form-control" id="address_hideout" name="address_hideout" value="<?= $hideout->getAddress_hideout() ?>">
            </div>
            <!-- country_hideout --> 
            <div class="mb-3">
                <label for="country_hideout" class="form-label">Pays : </label>
                <input type="text" class="form-control" id="country_hideout" name="country_hideout" value="<?= $hideout->getCountry_hideout() ?>">
            </div>
            <!-- type_hideout --> 
            <div class="mb-3">
                <label for="type_hideout" class="form-label">Type : </label>
                <input type="text" class="form-control" id="type_hideout" name="type_hideout" value="<?= $hideout->getType_hideout() ?>">
            </div>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>