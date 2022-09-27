<!-- Page title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Ajouter un type</h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="typesList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des types" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create type form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-6 col-lg-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <form action="<?= URL ?>createTypeValidation" method="POST" >
                <!-- name_type --> 
                <div class="mb-3">
                    <label for="name_type" class="form-label">Type: </label>
                    <input type="text" class="form-control" id="name_type" name="name_type">
                </div>
                <!-- Add button --> 
                <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un type" style="width: 1.5rem;"> Ajouter</button>
            </form>
        </article>
    </div>
</section>

