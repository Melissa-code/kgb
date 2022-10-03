<!-- Title -->

<section class="mb-4">
    <h1>Modifier la mission <?= $mission->getCode_mission() ?></h1>
</section>


<!-- Update a mission form -->

<div class="row bg-form">
    <section class="container mb-5">
        <div class="row d-flex justify-content-center">
            <article class="col-10 col-lg-8 border-form p-4" id="update-mission">
                <!-- form  --> 
                <form action="<?= URL?>updateMissionValidation" method="POST">
                    <div class="row"> 

                        <!-- oldcode_mission --> 
                        <div class="col-12"> 
                            <input type="hidden" class="form-control" id="oldcode_mission" name="oldcode_mission" value="<?= $mission->getCode_mission() ?>" >
                        </div>
                        
                        <!-- code_mission --> 
                        <div class="col-12 col-md-6 mb-3"> 
                            <label for="code_mission" class="form-label">Nom de code : </label>
                            <input type="text" class="form-control border" id="code_mission" name="code_mission" value="<?= $mission->getCode_mission() ?>" >
                        </div>

                        <!-- title_mission --> 
                        <div class="col-12 col-md-6 mb-3"> 
                            <label for="title_mission" class="form-label">Titre : </label>
                            <input type="text" class="form-control" id="title_mission" name="title_mission" value="<?= $mission->getTitle_mission() ?>">
                        </div>

                        <!-- description_mission --> 
                        <div class="col-12 mb-3"> 
                            <label for="description_mission">Description : </label>
                            <textarea class="form-control" id="description_mission" name="description_mission"> <?= $mission->getDescription_mission() ?> </textarea>
                        </div>

                        <!-- country_mission --> 
                        <div class="col-12 mb-3"> 
                            <label for="country_mission" class="form-label">Pays : </label>
                            <input type="text" class="form-control" id="country_mission" name="country_mission" value="<?= $mission->getCountry_mission() ?>">
                        </div>

                        <!-- name_speciality --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- specialities list link --> 
                            <label class="form-label">Spécialité : <a href="<?= URL ?>specialitiesList" class="text-secondary">( Voir la liste )</a></label>
                            <!-- oldname_speciality --> 
                            <input type="hidden" class="form-control" id="oldname_speciality" name="oldname_speciality" value="<?= $mission->getName_speciality() ?>">
                            <select class="form-select " aria-label="Default select example" id="name_speciality" name="name_speciality">
                                <?php foreach($specialities as $speciality) : ?>
                                    <?php if($speciality->getName_speciality() === $speciality->getName_speciality()) :?>
                                        <option value="<?= $speciality->getName_speciality() ?>" selected><?= $speciality->getName_speciality() ?></option>
                                    <?php else : ?>
                                        <option value="<?= $speciality->getName_speciality() ?>"><?= $speciality->getName_speciality() ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                       
                        <!-- id_duration --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- durations list link --> 
                            <label class="form-label">Durée : <a href="<?= URL ?>durationsList" class="text-secondary">( Voir la liste )</a></label>
                            <!-- oldid_duration --> 
                            <input type="hidden" class="form-control" id="oldid_duration" name="oldid_duration" value="<?= $mission->getId_duration() ?>">
                            <select class="form-select" aria-label="Default select example" id="id_duration" name="id_duration">
                                <?php foreach($durations as $duration) : ?>
                                    <?php if($duration->getId_duration() === $mission->getId_duration()) :?>
                                        <option value="<?= $duration->getId_duration() ?>" selected><?= $duration->getId_duration()." : ".$duration->getStart_duration()." - ".$duration->getEnd_duration() ?></option>
                                    <?php else : ?>
                                        <option value="<?= $duration->getId_duration() ?>"><?= $duration->getId_duration()." : ".$duration->getStart_duration()." - ".$duration->getEnd_duration() ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- id_agent --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                            <!-- agents list link --> 
                                <p class="form-label">Agents : <a href="agentsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($agents_missions as $agent_mission) :?>
                                    <?php foreach($agents as $agent) :?>
                                        <?php if($agent->getId_agent() === $agent_mission->getId_agent() && $agent_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                            <div class="form-check d-inline-block" >
                                                <input class="form-check-input bg-dark border" type="checkbox" value="<?= $agent->getId_agent() ?>" checked id="id_agent" multiple name="oldid_agent[]" >
                                                <label class="form-check-label" for="id_agent" value="<?= $agent->getId_agent()  ?>">
                                                    <?= $agent->getFirstname_agent()." ".$agent->getName_agent()." (spécialités: " ?>
                                                </label>
                                                <?php foreach($specialities_agents as $speciality_agent) :?>
                                                    <?php if($speciality_agent->getId_agent() === $agent->getId_agent()) :?>
                                                        <?= $speciality_agent->getName_speciality() ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?= ")" ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                    
                                <!-- Update id_agent --> 
                                <p class="form-label mt-3"><span class="text-decoration-underline fw-bold">Changer d'agents</span> : </p>
                                <?php foreach($agents as $agent) :?>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input bg-dark border" type="checkbox" value="<?= $agent->getId_agent(); ?>" id="id_agent" multiple name="id_agent[]">
                                        <label class="form-check-label" for="id_agent" value="<?= $agent->getId_agent(); ?>"> 
                                            <?= $agent->getFirstname_agent()." ".$agent->getName_agent()." (spécialités: " ?>  
                                        </label>
                                        <?php foreach($specialities_agents as $speciality_agent):?>
                                            <?php if($speciality_agent->getId_agent() === $agent->getId_agent() && $speciality_agent != $specialities_agents[count($specialities_agents)-1]):?> 
                                                <?= $name = $speciality_agent->getName_speciality(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?= ")" ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- code_contact --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- contacts list link --> 
                                <p class="form-label">Contacts : <a href="contactsList" class="text-secondary">(Voir la liste )</a></p>
                                <?php foreach($contacts_missions as $contact_mission) :?>
                                    <?php foreach($contacts as $contact) :?>
                                        <?php if($contact->getCode_contact() === $contact_mission->getCode_contact() && $contact_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                            <div class="form-check d-inline-block" >
                                                <input class="form-check-input bg-dark border" type="checkbox" value="<?= $contact->getCode_contact() ?>" checked id="code_contact" multiple name="oldcode_contact[]" >
                                                <label class="form-check-label" for="code_contact" value="<?= $contact->getCode_contact() ?>">
                                                    <?= $contact->getFirstname_contact()." ".$contact->getName_contact() ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <!-- update code_contact -->
                                <p class="form-label mt-3"><span class="text-decoration-underline fw-bold">Changer de contacts</span> : </p>
                                <?php foreach($contacts as $contact) :?>
                                    <div class="form-check d-inline-block" >
                                        <input class="form-check-input bg-dark border" type="checkbox" value="<?= $contact->getCode_contact(); ?>" id="code_contact" multiple name="code_contact[]">
                                        <label class="form-check-label" for="code_contact" value="<?= $contact->getCode_contact(); ?>">
                                            <?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
            
                        <!-- code_target --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- targets list link --> 
                                <p class="form-label me-3">Cibles : <a href="<?= URL ?>targetsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($targets_missions as $target_mission) :?>
                                    <?php foreach($targets as $target) :?>
                                        <?php if($target->getCode_target() === $target_mission->getCode_target() && $target_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                            <div class="form-check d-inline-block" >
                                                <input class="form-check-input bg-dark border" type="checkbox" value="<?= $target->getCode_target() ?>" checked id="code_target" multiple name="oldcode_target[]" >
                                                <label class="form-check-label" for="code_target" value="<?= $target->getCode_target() ?>">
                                                    <?= $target->getFirstname_target()." ".$target->getName_target() ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <!-- Change code_target --> 
                                <p class="form-label mt-3"><span class="text-decoration-underline fw-bold">Changer de cibles</span> : </p>
                                <?php foreach($targets as $target) :?>
                                    <div class="form-check d-inline-block" >
                                        <input class="form-check-input bg-dark border" type="checkbox" value="<?= $target->getCode_target(); ?>" id="code_target" multiple name="code_target[]">
                                        <label class="form-check-label" for="code_target" value="<?= $contact->getCode_contact(); ?>">
                                            <?= $target->getFirstname_target()." ".$target->getName_target(); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- id_hideout --> 
                        <div class="col-12">
                            <div class="border border-secondary rounded-3 mb-3 p-4">
                                <!-- hideouts list link -->
                                <p class="form-label">Planques :   <a href="<?= URL ?>hideoutsList" class="text-secondary">( Voir la liste )</a></p>
                                <?php foreach($hideouts as $hideout) : ?>
                                    <?php foreach($hideouts_missions as $hideout_mission) : ?>
                                        <?php if($hideout->getId_hideout() === $hideout_mission->getId_hideout() && $hideout_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                            <div class="form-check d-inline-block" >
                                                <input class="form-check-input bg-dark border" type="checkbox" value="<?= $hideout->getId_hideout() ?>" checked id="id_hideout" multiple name="oldid_hideout[]" >
                                                <label class="form-check-label me-3" for="id_hideout" value="<?= $hideout->getId_hideout() ?>">
                                                    <?= $hideout->getAddress_hideout()." ".$hideout->getCountry_hideout() ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <!-- Change id_hideout --> 
                                <p class="form-label mt-3"><span class="text-decoration-underline fw-bold">Changer de planques</span> : </p>
                                <div class="row d-flex align-items-center mb-3">
                                    <div class="col-12">
                                        <?php foreach($hideouts as $hideout) :?>
                                        <div class="form-check d-inline-block">
                                            <input class="form-check-input bg-dark border" type="checkbox" multiple name="id_hideout[]" id="id_hideout" value="<?= $hideout->getId_hideout(); ?>">
                                            <label class="form-check-label me-3" for="id_hideout" value="<?= $hideout->getId_hideout(); ?>">N°<?= $hideout->getId_hideout().": ".$hideout->getAddress_hideout().", ".$hideout->getCountry_hideout(); ?></label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- code_status --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- status list link -->
                            <label class="form-label">Statut : <a href="<?= URL ?>statusList" class="text-secondary">( Voir la liste )</a></label>
                            <!-- oldcode_status --> 
                            <input type="hidden" class="form-control" id="oldcode_duration" name="oldcode_status" value="<?= $mission->getCode_status() ?>">
                            <select class="form-select " aria-label="Default select example" id="code_status" name="code_status">
                                <?php foreach($status as $oneStatus) : ?>
                                    <?php if($oneStatus->getCode_status() === $mission->getCode_status()) :?>
                                        <option value="<?= $oneStatus->getCode_status(); ?>" selected><?= $oneStatus->getCode_status(); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $oneStatus->getCode_status(); ?>"><?= $oneStatus->getCode_status(); ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- name_type --> 
                        <div class="col-12 col-md-6 mb-3">
                            <!-- type list link -->
                            <label class="form-label">Type : <a href="<?= URL ?>typesList" class="text-secondary">( Voir la liste )</a></label>
                            <!-- oldcode_status --> 
                            <input type="hidden" class="form-control" id="oldname_type" name="oldname_type" value="<?= $mission->getName_type() ?>">
                            <select class="form-select " aria-label="Default select example" id="name_type" name="name_type">
                                <?php foreach($types as $type) : ?>
                                    <?php if($type->getName_type() === $mission->getName_type()) :?>
                                        <option value="<?= $type->getName_type() ?>" selected><?= $type->getName_type()?></option>
                                    <?php else : ?>
                                        <option value="<?= $type->getName_type() ?>"><?= $type->getName_type() ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Back & Update buttons --> 
                        <div class="col-6 d-flex justify-content-end mt-3">
                            <a href="missions" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des missions" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier une mission" style="width: 1.5rem;height: 1rem;"> Modifier</button>
                        </div>

                    </div>
                </form>
            </article>
        </div>
    </section>
</div>

