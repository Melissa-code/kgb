<!-- Title  --> 

<section class="container">
    <h1>Modifier l'agent n° <?= $agent->getId_agent() ?></h1>
</section>


<!-- Update agent form -->

<div class="row bg-form-agent">
    <section class="container mt-1 my-md-5">
        <div class="row d-flex justify-content-center">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4">
                <form action="updateAgentValidation" method="POST">
                    <!-- oldid_agent --> 
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="oldid_agent" name="oldid_agent" value="<?= $agent->getId_agent() ?>">
                    </div>
                    <!-- name_agent --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="name_agent" class="form-label">Nom : </label>
                            <input type="text" class="form-control" id="name_agent" name="name_agent" value="<?= $agent->getName_agent() ?>">
                        </div>
                        <!-- firstname_agent --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="name_agent" class="form-label">Prénom : </label>
                            <input type="text" class="form-control" id="firstname_agent" name="firstname_agent" value="<?= $agent->getFirstname_agent() ?>">
                        </div>
                    </div>
                    <!-- datebirthday_agent --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="datebirthday_agent" class="form-label">Date de naissance : </label>
                            <input type="date" class="form-control" id="datebirthday_agent" name="datebirthday_agent" value="<?= $agent->getDatebirthday_agent() ?>">
                        </div>
                        <!-- nationality_agent --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nationality_agent" class="form-label">Nationalité : </label>
                            <input type="text" class="form-control" id="nationality_agent" name="nationality_agent" value="<?= $agent->getNationality_agent() ?>">
                        </div>
                    </div>
            
                    <!-- old name_speciality --> 
                    <div class="row d-flex align-items-center my-3 p-2 border border-secondary rounded-3 mx-1">
                        <div class="col-12">
                            <p class="form-label me-3">Spécialités de l'agent : </p>
                            <?php foreach($specialities_agents as $speciality_agent) :?>
                                <?php if($speciality_agent->getId_agent() ===  $agent->getId_agent()) :?>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input bg-dark border" type="checkbox" value="<?= $speciality_agent->getName_speciality() ?>" checked id="name_speciality" multiple name="oldname_speciality[]" >
                                        <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality_agent->getName_speciality() ?>">
                                            <?= $speciality_agent->getName_speciality() ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- name_speciality --> 
                    <div class="row d-flex align-items-center my-3 p-2 border border-secondary rounded-3 mx-1">
                        <div class="col-12">
                            <p class="form-label me-3">Changer ses spécialités : </p>
                            <?php foreach($specialities as $speciality) :?>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input bg-dark border" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]" >
                                    <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                        <?= $speciality->getName_speciality() ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
           
                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="agentsList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des agents" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier un agent" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </section>
</div>