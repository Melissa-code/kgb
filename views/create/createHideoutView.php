<!-- Page title & back button button --> 

<section class="container mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12"></div>
            <h1>Ajouter une planque</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
            <a href="agentsList" class="btn btn-dark border border-light"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des planques" style=" height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create a hideout -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            
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
                <div class="mb-3">
                    <label for="country_hideout" class="form-label">Pays : </label>
                    <input type="text" class="form-control" id="country_hideout" name="country_hideout">
                </div>
                <!-- type_hideout --> 
                <div class="mb-3">
                    <label for="type_hideout" class="form-label">Type : </label>
                    <input type="text" class="form-control" id="type_hideout" name="type_hideout">
                </div>
                <!-- Add button --> 
                <div>
                    <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une planque" style="width: 1.5rem;"> Ajouter</button>
                </div>
            </form>
        </article>
    </div>
</section>