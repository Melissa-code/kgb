
<!------------- Main --------------->

<section class="mb-4">
    <h1>Modifier la mission <?= $mission->getCode_mission() ?></h1>
</section>


<!-- section form -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 d-block mx-auto">
                
                <!-- Update form  --> 
                <form action="<?= URL?>updateMissionValidation" method="POST" >
                    <div class="row"> 

                    <!-- code_mission --> 
                    <div class="col-12 col-md-6 my-3"> 
                        <label for="code_mission" class="form-label">Nom de code : </label>
                        <input type="text" class="form-control" id="code_mission" name="code_mission" value="<?= $mission->getCode_mission() ?>" >
                    </div>

                    <!-- title_mission --> 
                    <div class="col-12 col-md-6 my-3"> 
                        <label for="title_mission" class="form-label">Titre : </label>
                        <input type="text" class="form-control" id="title_mission" name="title_mission" value="<?= $mission->getTitle_mission() ?>">
                    </div>

                    <!-- description_mission --> 
                    <div class="col-12 my-3"> 
                        <label for="description_mission">Description : </label>
                        <textarea class="form-control" id="description_mission" name="description_mission"> <?= $mission->getDescription_mission() ?> </textarea>
                    </div>

                    <!-- country_mission --> 
                    <div class="col-12 my-3"> 
                        <label for="country_mission" class="form-label">Pays : </label>
                        <input type="text" class="form-control" id="country_mission" name="country_mission" value="<?= $mission->getCountry_mission() ?>">
                    </div>

                    <!-- name_speciality --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Spécialité : </label>
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
                        <!-- specialities list link --> 
                        <a href="<?= URL ?>specialitiesList" class="text-white">Voir les types >></a>
                    </div>

                    <!-- id_duration --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Durée : </label>
                        <!-- oldid_duration --> 
                        <input type="hidden" class="form-control" id="oldid_duration" name="oldid_duration" value="<?= $mission->getId_duration() ?>">
                        <select class="form-select " aria-label="Default select example" id="id_duration" name="id_duration">
                            <?php foreach($durations as $duration) : ?>
                                <?php if($duration->getId_duration() === $mission->getId_duration()) :?>
                                    <option value="<?= $duration->getId_duration() ?>" selected><?= $duration->getId_duration()." : ".$duration->getStart_duration()." - ".$duration->getEnd_duration() ?></option>
                                <?php else : ?>
                                    <option value="<?= $duration->getId_duration() ?>"><?= $duration->getId_duration()." : ".$duration->getStart_duration()." - ".$duration->getEnd_duration() ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <!-- durations list link --> 
                        <a href="<?= URL ?>durationsList" class="text-white">Voir les durées >></a>
                    </div>

                    <!-- id_agent --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Agent(s) : </label>
                        <?php foreach($agents_missions as $agent_mission) :?>
                            <?php foreach($specialities_agents as $speciality_agent) :?>
                                <?php foreach($agents as $agent) :?>
                                    <?php if($speciality_agent->getId_agent() === $agent->getId_agent() && $agent->getId_agent() === $agent_mission->getId_agent() && $agent_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                        <div class="form-check d-block" >
                                            <input class="form-check-input" type="checkbox" value="<?= $agent->getId_agent() ?>" checked id="id_agent" multiple name="oldid_agent[]" >
                                            <label class="form-check-label me-3" for="id_agent" value="<?= $agent->getId_agent()  ?>">
                                                <?= $agent->getFirstname_agent()." ".$agent->getName_agent(). " (spécialité: ". $speciality_agent->getName_speciality(). ")"; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- agents list link --> 
                        <a href="<?= URL ?>agentsList" class="text-white">Voir les agents</a>
                    </div>

                    <!-- code_contact --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Contact(s) : </label>
                        <?php foreach($contacts_missions as $contact_mission) :?>
                            <?php foreach($contacts as $contact) :?>
                                <?php if($contact->getCode_contact() === $contact_mission->getCode_contact() && $contact_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                    <div class="form-check d-block" >
                                        <input class="form-check-input" type="checkbox" value="<?= $contact->getCode_contact() ?>" checked id="code_contact" multiple name="oldcode_contact[]" >
                                        <label class="form-check-label me-3" for="code_contact" value="<?= $contact->getCode_contact() ?>">
                                            <?= $contact->getFirstname_contact()." ".$contact->getName_contact() ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- Link to see the list of the contacts --> 
                        <a href="<?= URL ?>contactsList" class="text-white">Voir la liste des contacts-></a>
                    </div>
            
                    <!-- code_cible --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Cible(s) : </label>
                        <?php foreach($targets_missions as $target_mission) :?>
                            <?php foreach($targets as $target) :?>
                                <?php if($target->getCode_target() === $target_mission->getCode_target() && $target_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                    <div class="form-check d-block" >
                                        <input class="form-check-input" type="checkbox" value="<?= $target->getCode_target() ?>" checked id="code_target" multiple name="oldcode_target[]" >
                                        <label class="form-check-label me-3" for="code_target" value="<?= $target->getCode_target() ?>">
                                            <?= $target->getFirstname_target()." ".$target->getName_target() ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- Link to see the list of the contacts --> 
                        <a href="<?= URL ?>targetsList" class="text-white">Voir la liste des cibles-></a>
                    </div>

                    <!-- id_hideout --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Planque(s) : </label>
                        <?php foreach($hideouts as $hideout) : ?>
                            <?php foreach($hideouts_missions as $hideout_mission) : ?>
                                <?php if($hideout->getId_hideout() === $hideout_mission->getId_hideout() && $hideout_mission->getCode_mission() === $mission->getCode_mission()) :?>
                                    <div class="form-check d-block" >
                                        <input class="form-check-input" type="checkbox" value="<?= $hideout->getId_hideout() ?>" checked id="code_target" multiple name="oldcode_target[]" >
                                        <label class="form-check-label me-3" for="code_target" value="<?= $hideout->getId_hideout() ?>">
                                            <?= $hideout->getAddress_hideout()." ".$hideout->getCountry_hideout() ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- Link to see the list of the contacts --> 
                        <a href="<?= URL ?>hideoutsList" class="text-white">Voir la liste des cibles-></a>
                    </div>

                    <!-- code_status --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Statut : </label>
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
                        <!-- status list link --> 
                        <a href="<?= URL ?>statusList" class="text-white">Voir les statuts >></a>
                    </div>

                    <!-- name_type --> 
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label me-3">Type : </label>
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
                        <!-- status list link --> 
                        <a href="<?= URL ?>typesList" class="text-white">Voir les types >></a>
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
                
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

