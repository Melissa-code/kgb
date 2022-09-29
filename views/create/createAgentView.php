<!-- Page title & back button button --> 

<section class="container">
    <h1 class="text-light">Ajouter un agent</h1>
</section>


<!-- Create agent  -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
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
                <div class="row d-flex align-items-center my-3 p-2 border border-secondary rounded-3 mx-1">
                    <div class="col-12">
                        <!-- Link to see the list of the specialities --> 
                        <p class="form-label">Spécialités :<a href="specialitiesList" class="btn btn-link fw-lighter text-secondary text-decoration-none">( Voir la liste )</a></p>
                        <?php foreach($specialities as $speciality) :?>
                        <div class="form-check d-inline-block" >
                            <input class="form-check-input bg-dark border" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]">
                            <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                <?= $speciality->getName_speciality() ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Back & Add buttons --> 
                <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="agentsList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des agents" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un agent" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>