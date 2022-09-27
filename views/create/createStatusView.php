<!-- Page title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Ajouter un statut</h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="statusList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des statuts" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create status form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-6 col-lg-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">

            <form action="<?= URL ?>createStatusValidation" method="POST" >
                <!-- code_status --> 
                <div class="mb-3">
                    <label for="code_status" class="form-label">Statut : </label>
                    <input type="text" class="form-control" id="code_status" name="code_status">
                </div>
                <!-- Add button --> 
                <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un statut" style="width: 1.5rem;"> Ajouter</button>
            </form>

        </article>
    </div>
</section>


