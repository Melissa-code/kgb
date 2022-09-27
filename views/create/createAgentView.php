<!-- Page title & back button button --> 

<section class="container mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12"></div>
            <h1>Ajouter un agent</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
            <a href="agentsList" class="btn btn-dark border border-light"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des agents" style=" height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create agent  -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <!-- create an agent form -->
            <form action="<?= URL ?>createAgentValidation" method="POST">
                <!-- name_agent --> 
                <div class="mb-3">
                    <label for="name_agent" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="name_agent" name="name_agent">
                </div>
                <!-- firstname_agent --> 
                <div class="mb-3">
                    <label for="name_agent" class="form-label">Prénom : </label>
                    <input type="text" class="form-control" id="firstname_agent" name="firstname_agent">
                </div>
                <!-- datebirthday_agent --> 
                <div class="mb-3">
                    <label for="datebirthday_agent" class="form-label">Date de naissance : </label>
                    <input type="date" class="form-control" id="datebirthday_agent" name="datebirthday_agent">
                </div>
                <!-- nationality_agent --> 
                <div class="mb-3">
                    <label for="nationality_agent" class="form-label">Nationalité : </label>
                    <input type="text" class="form-control" id="nationality_agent" name="nationality_agent">
                </div>
                <!-- name_speciality --> 
                <div class="row d-flex align-items-center my-3">
                    <div class="col-12">
                        <label class="form-label me-3">Spécialités : </label>
                            <?php foreach($specialities as $speciality) :?>
                            <div class="form-check d-block" >
                                <input class="form-check-input" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]">
                                <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                    <?= $speciality->getName_speciality() ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                    </div>
                    <!-- Link to see all the specialities  --> 
                    <div class="col-12 d-flex justify-content-start ">
                        <a href="specialitiesList" class="text-white fst-italic text-decoration-none  ">Voir spécialités</a>
                    </div>
                </div>
                <!-- Add button --> 
                <div>
                    <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un agent" style="width: 1.5rem;"> Ajouter</button>
                </div>
            </form>
        </article>
    </div>
</section>