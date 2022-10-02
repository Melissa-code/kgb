<!-- Title --> 

<section class="container mb-5">
    <h1>Modifier le type <?= $type->getName_type() ?></h1>  
</section>


<!-- Update type form -->

<div class="row bg-form-type">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4 mt-5">
                <!-- update a type form -->
                <form action="updateTypeValidation" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name_type" name="name_type" value="<?= $type->getName_type() ?>" placeholder="Nom du type">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="oldname_type" name="oldname_type" value="<?= $type->getName_type() ?>" >
                    </div>

                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="typesList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des types" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier un type" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>
            </article>   
        </div>
    </section>
</div>
        