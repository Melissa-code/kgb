<!-- Title --> 

<section class="container mb-3">
    <h1>Modifier la spécialité <?= $speciality->getName_speciality() ?></h1>
</section>


<!-- Update speciality form -->
<div class="row bg-form-speciality">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 col-md-4 p-4 mt-5 border-form">

                <form action="updateSpecialityValidation" method="POST">
                    <div class="mb-3">
                        <!-- new name_speciality -->
                        <input type="text" class="form-control" id="name_speciality" name="name_speciality" value="<?= $speciality->getName_speciality() ?>" placeholder="nom de la spécialité">
                        <!-- oldname_speciality -->
                        <input type="hidden" class="form-control" id="oldname_speciality" name="oldname_speciality" value="<?= $speciality->getName_speciality() ?>" >
                    </div>
                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="specialitiesList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des spécialités" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier une spécialité" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>

            </article>   
        </div>
    </section>
</div>
