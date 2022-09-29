<!-- Page title & back button button --> 

<section class="container mb-5">
    <h1 class="text-light">Ajouter un type</h1>  
</section>


<!-- Create a type form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-6 col-lg-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <form action="<?= URL ?>createTypeValidation" method="POST" >
                <!-- name_type --> 
                <div class="mb-3">
                    <label for="name_type" class="form-label">Type: </label>
                    <input type="text" class="form-control" id="name_type" name="name_type">
                </div>

                <!-- Back & Add buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="typesList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des types" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un type" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>

