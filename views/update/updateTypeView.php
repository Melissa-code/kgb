
<!-- Title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier le type <?= $type->getName_type() ?></h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="typesList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des types" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Update type form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <!-- update a type form -->
            <form action="updateTypeValidation" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" id="name_type" name="name_type" value="<?= $type->getName_type() ?>" placeholder="Nom du type">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="oldname_type" name="oldname_type" value="<?= $type->getName_type() ?>" >
                </div>
                <!-- Update button --> 
                <div class="mb-5">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un type" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
        </article>   
    </div>
</section>

    