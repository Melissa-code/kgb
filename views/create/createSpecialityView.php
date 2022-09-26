<!-- Alert error message if the speciality already exists --> 

<section class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">
            <?php if(isset($_SESSION['alertDuplicateSpeciality'])) :?>
                <div class="alert alert-danger mx-5" role="alert">
                    <?= $_SESSION['alertDuplicateSpeciality']['msg'] ?>
                </div>
                <?php unset($_SESSION['alertDuplicateSpeciality']) ?>
            <?php endif ?>
        </div>
    </div>
</section>


<!-- Page title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Ajouter une spécialité</h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="specialitiesList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des spécialités" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create speciality form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-6 col-lg-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">

            <form action="<?= URL ?>createSpecialityValidation" method="POST" >
                <!-- name_speciality --> 
                <div class="mb-3">
                    <label for="name_speciality" class="form-label">Nom de la spécialité : </label>
                    <input type="text" class="form-control" id="name_speciality" name="name_speciality">
                </div>
                <!-- Add button --> 
                <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"> Ajouter</button>
            </form>

        </article>
    </div>
</section>
