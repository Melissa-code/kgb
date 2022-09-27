<!-- Page title & back button button --> 

<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier l'agent n° <?= $agent->getId_agent() ?></h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-4">
            <a href="agentsList" class="btn btn-dark border border-light"><img class="text-white" src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des agents" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Update agent form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            
        <!-- update a duration form -->
            <form action="updateAgentValidation" method="POST">
                <!-- oldid_agent --> 
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="oldid_agent" name="oldid_agent" value="<?= $agent->getId_agent() ?>">
                </div>
                <!-- name_agent --> 
                <div class="mb-3">
                    <label for="name_agent" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="name_agent" name="name_agent" value="<?= $agent->getName_agent() ?>">
                </div>
                <!-- firstname_agent --> 
                <div class="mb-3">
                    <label for="name_agent" class="form-label">Prénom : </label>
                    <input type="text" class="form-control" id="firstname_agent" name="firstname_agent" value="<?= $agent->getFirstname_agent() ?>">
                </div>
                <!-- datebirthday_agent --> 
                <div class="mb-3">
                    <label for="datebirthday_agent" class="form-label">Date de naissance : </label>
                    <input type="date" class="form-control" id="datebirthday_agent" name="datebirthday_agent" value="<?= $agent->getDatebirthday_agent() ?>">
                </div>
                <!-- nationality_agent --> 
                <div class="mb-3">
                    <label for="nationality_agent" class="form-label">Nationalité : </label>
                    <input type="text" class="form-control" id="nationality_agent" name="nationality_agent" value="<?= $agent->getNationality_agent() ?>">
                </div>
            
                <!-- old name_speciality --> 
                <div class="row d-flex align-items-center my-3">
                    <div class="col-12">
                        <label class="form-label me-3">Spécialités de l'agent : </label>
                        <?php foreach($specialities_agents as $speciality_agent) :?>
                            <?php if($speciality_agent->getId_agent() ===  $agent->getId_agent()) :?>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" value="<?= $speciality_agent->getName_speciality() ?>" checked id="name_speciality" multiple name="oldname_speciality[]" >
                                    <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality_agent->getName_speciality() ?>">
                                        <?= $speciality_agent->getName_speciality() ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- name_speciality --> 
                <div class="row d-flex align-items-center my-3">
                    <div class="col-12">
                        <label class="form-label me-3">Changer ses spécialités : </label>
                        <?php foreach($specialities as $speciality) :?>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]" >
                                <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                    <?= $speciality->getName_speciality() ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Update button --> 
                <div class="">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un agent" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
        </article>
    </div>
</section>