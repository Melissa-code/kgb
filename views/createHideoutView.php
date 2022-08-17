
<?php session_start(); ?>

<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter une cachette</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

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
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>