<!-- Title -->

<section class="container pb-3">
    <h1>Ajouter une mission</h1>
</section>


<!-- Add a mission form -->
<div class="row bg-form">
    <section class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-lg-8 p-4 create-form" id="create-mission">
                <!-- form -->        
                <form action="<?= URL ?>createMissionValidation" method="POST" >
                    <div class="row"> 

                        <!-- code_mission -->
                        <div class="col-12 col-md-6 mb-3"> 
                            <label for="code_mission" class="form-label">Nom de code : </label>
                            <input type="text" class="form-control border border-dark" id="code_mission" name="code_mission" placeholder="Nom de code"required>
                        </div>

                        <!-- title_mission --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label for="title_mission" class="form-label">Titre : </label>
                            <input type="text" class="form-control border border-dark" id="title_mission" name="title_mission" placeholder="Titre" required>
                        </div>

                        <!-- description_mission --> 
                        <div class="col-12 mb-3">
                            <label for="description_mission" class="form-label">Description : </label>
                            <textarea class="form-control border border border-dark" id="description_mission" name="description_mission" placeholder="Description"></textarea>
                        </div>
            
                        <!-- country_mission --> 
                        <div class="col-12 mb-3">
                            <label for="country_mission" class="form-label">Pays : </label>
                            <input type="text" class="form-control border border-dark" id="country_mission" name="country_mission" placeholder="Pays" required>
                        </div>

                        <!-- name_speciality --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- specialities list link --> 
                            <label for="name_speciality" class="form-label">Spécialité : <a href="specialitiesList" class="text-secondary">( Voir la liste )</a></label>
                            <select class="form-select border border-dark" aria-label="Default select example" id="name_speciality" name="name_speciality">
                                <option selected> -- Spécialité -- </option>
                                <?php foreach($specialities as $speciality) :?>
                                <option value="<?= $speciality->getName_speciality(); ?>"><?= $speciality->getName_speciality(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- id_duration --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- durations list link --> 
                            <label for="id_duration" class="form-label">Durée : <a href="durationsList" class="text-secondary">( Voir la liste )</a></label>
                            <select class="form-select border border-dark" aria-label="Default select example" name="id_duration">
                                <option selected> -- Durée -- </option>
                                <?php foreach($durations as $duration) :?>
                                <option value="<?= $duration->getId_duration(); ?>"><?= $duration->getId_duration(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- id_agent --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- agents list link --> 
                                <p class="form-label">Agents : <a href="agentsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($agents as $agent) :?>
                                    <div class="form-check d-inline-block" >
                                    <input class="form-check-input border border-dark" type="checkbox" value="<?= $agent->getId_agent(); ?>" id="id_agent" multiple name="id_agent[]">
                                    <label class="form-check-label" for="id_agent" value="<?= $agent->getId_agent(); ?>"> 
                                    <?= $agent->getFirstname_agent()." ".$agent->getName_agent()." (spécialités :" ?>  </label>
                                    </div>   
                                    <!-- speciality_agent --> 
                                    <?php $list = ""; ?>
                                    <?php foreach($specialities_agents as $speciality_agent):?>
                                        <?php if($speciality_agent->getId_agent() === $agent->getId_agent() && $speciality_agent != $specialities_agents[count($specialities_agents)-1]):?> 
                                            <?= $name = $speciality_agent->getName_speciality(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?= ")" ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- code_contact --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- contacts list link --> 
                                <p class="form-label">Contacts : <a href="contactsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($contacts as $contact) :?>
                                    <div class="form-check d-inline-block" >
                                        <input class="form-check-input border border-dark" type="checkbox" value="<?= $contact->getCode_contact(); ?>" id="code_contact" multiple name="code_contact[]">
                                        <label class="form-check-label me-3" for="code_contact" value="<?= $contact->getCode_contact(); ?>">
                                            <?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- code_target --> 
                        <div class="col-12 ">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- Targets list link --> 
                                <p class="form-label ">Cibles : <a href="targetsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($targets as $target) :?>
                                    <div class="form-check d-inline-block" >
                                        <input class="form-check-input border border-dark" type="checkbox" value="<?= $target->getCode_target(); ?>" id="code_target" multiple name="code_target[]">
                                        <label class="form-check-label me-3" for="code_target" value="<?= $contact->getCode_contact(); ?>">
                                            <?= $target->getFirstname_target()." ".$target->getName_target(); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- id_hideout --> 
                        <div class="col-12 mb-3">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                    <!-- Hideouts list link --> 
                                <p class="form-label ">Planques : <a href="hideoutsList" class="text-secondary">( Voir la liste )</a></p>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12">
                                        <?php foreach($hideouts as $hideout) :?>
                                        <div class="form-check d-inline-block">
                                            <input class="form-check-input border border-dark" type="checkbox" multiple name="id_hideout[]" id="id_hideout" value="<?= $hideout->getId_hideout(); ?>">
                                            <label class="form-check-label" for="id_hideout" value="<?= $hideout->getId_hideout(); ?>">N°<?= $hideout->getId_hideout().": ".$hideout->getAddress_hideout().", ".$hideout->getCountry_hideout(); ?></label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- code_status --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- Status list link --> 
                            <label for="id_duration" class="form-label">Statut : <a href="statusList" class="text-secondary">( Voir la liste )</a></label>
                            <select class="form-select border border-dark" aria-label="Default select example" id="code_status" name="code_status">
                                <option selected> -- Statut -- </option>
                                <?php foreach($status as $oneStatus) :?>
                                <option value="<?= $oneStatus->getCode_status(); ?>"><?= $oneStatus->getCode_status(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- name_type --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label for="id_duration" class="form-label">Type : <a href="typesList" class="text-secondary">( Voir la liste )</a></label>
                            <select class="form-select border border-dark" aria-label="Default select example" name="name_type">
                                <option selected> -- Type -- </option>
                                <?php foreach($types as $type) :?>
                                <option value="<?= $type->getName_type(); ?>"><?= $type->getName_type(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Back & Add buttons --> 
                        <div class="col-6 d-flex justify-content-end mt-3">
                            <a href="missions" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des missions" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une mission" style="width: 1.5rem;"> Ajouter</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div> 