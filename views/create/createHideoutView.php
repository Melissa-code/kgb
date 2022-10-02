<!-- Page title & back button button --> 

<section class="container mb-3">
    <h1>Ajouter une planque</h1>
</section>


<!-- Create a hideout -->

<div class="row bg-form-hideout">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4">
                
                <!-- create a hideout form -->
                <form action="<?= URL ?>createHideoutValidation" method="POST" >
                    <!-- id_hideout --> 
                    <div class="mb-3">
                        <label for="id_hideout" class="form-label">Identifiant : </label>
                        <input type="text" class="form-control" id="id_hideout" name="id_hideout">
                    </div>
                    <!-- address_hideout --> 
                    <div class="mb-3">
                        <label for="address_hideout" class="form-label">Adresse : </label>
                        <input type="text" class="form-control" id="address_hideout" name="address_hideout">
                    </div>
                    <!-- country_hideout --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="country_hideout" class="form-label">Pays : </label>
                            <input type="text" class="form-control" id="country_hideout" name="country_hideout">
                        </div>
                        <!-- type_hideout --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="type_hideout" class="form-label">Type : </label>
                            <input type="text" class="form-control" id="type_hideout" name="type_hideout">
                        </div>
                    </div>

                    <!-- Back & Add buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="hideoutsList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="revenir à la liste des planques" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une planque" style="width: 1.5rem;"> Ajouter</button>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </section>
</div>