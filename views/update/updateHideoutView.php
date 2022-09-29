<!-- Title --> 

<section class="container">
  <h1 class="text-light">Modifier la planque <?= $hideout->getId_hideout() ?></h1>
</section>


<!-- Update hideout form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
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

                <!-- Update & back buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="hideoutsList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des planques" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier une planque" style="width: 1rem;"> Modifier</button>
                    </div>
                </div>

            </form>
        </article>
    </div>
</section>