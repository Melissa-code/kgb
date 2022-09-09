
<?php session_start(); ?>

<!------------- Main --------------->

<!-- section title -->
<section class="mb-5">
    <h1>Ajouter une mission</h1>
</section>

<!-- section form -->
<section>
    <div class="container">
        <div class="row">

        <!-- Alert messages if one input is no correct --> 
        <?php if(isset($_SESSION['alert1'])) :?>
            <div class="alert alert-danger mx-5" role="alert">
            <?= $_SESSION['alert1']['msg'] ?>
            </div>
            <?php unset($_SESSION['alert1']) ?>
        <?php elseif(isset($_SESSION['alert2'])) :?>
            <div class="alert alert-<?php $_SESSION['alert2']['type'] ?> text-danger  mx-5" role="alert">
            <?= $_SESSION['alert2']['msg'] ?>
            </div>
            <?php unset($_SESSION['alert2'])?>
        <?php elseif(isset($_SESSION['alert3'])) :?>
            <div class="alert alert-danger ?> mx-5" role="alert">
            <?= $_SESSION['alert3']['msg'] ?>
            </div>
            <?php unset($_SESSION['alert3']) ?>
        <?php endif ?>

            <div class="col-12 col-md-8 d-block mx-auto">

                <!-- Create a mission form -->
                <form action="<?= URL ?>createMissionValidation" method="POST" >
                    <div class="row"> 

                        <!-- code_mission -->
                        <div class="col-12 col-md-6 my-3"> 
                            <input type="text" class="form-control" id="code_mission" name="code_mission" placeholder="Nom de code"required>
                        </div>

                        <!-- title_mission --> 
                        <div class="col-12 col-md-6 my-3">
                            <input type="text" class="form-control" id="title_mission" name="title_mission" placeholder="Titre" required>
                        </div>

                        <!-- description_mission --> 
                        <div class="col-12 my-3">
                            <textarea class="form-control" id="description_mission" name="description_mission" placeholder="Description"></textarea>
                        </div>
                
                        <!-- country_mission --> 
                        <div class="col-12 my-3">
                            <input type="text" class="form-control " id="country_mission" name="country_mission" placeholder="Pays" required>
                        </div>

                        <!-- name_speciality --> 
                        <div class="col-12 col-md-6 my-3">
                            <select class="form-select" aria-label="Default select example" id="name_speciality" name="name_speciality">
                                <option selected> -- Spécialité -- </option>
                                <?php foreach($specialities as $speciality) :?>
                                <option value="<?= $speciality->getName_speciality(); ?>"><?= $speciality->getName_speciality(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="link-custom">
                                <!-- Link to see the list of the hideouts --> 
                                <div class=" ">
                                    <a href="specialitiesList" class="text-white font-weight-light font-italic">Voir la liste des spécialités -></a>
                                </div>
                            </div>
                        </div>

                        <!-- id_duration --> 
                        <div class="col-12 col-md-6 my-3">
                            <select class="form-select" aria-label="Default select example" name="id_duration">
                                <option selected> -- Durée -- </option>
                                <?php foreach($durations as $duration) :?>
                                <option value="<?= $duration->getId_duration(); ?>"><?= $duration->getId_duration(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Link to see the list of the durations --> 
                            <a href="durationsList" class="text-white">Voir la liste des durées -></a>
                        </div>

                        <!-- id_agent --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label ">Agent(s) : </label>
                            <?php foreach($agents as $agent) :?>
                                <?php foreach($specialities_agents as $speciality_agent):?>
                                    <?php if($speciality_agent->getId_agent() === $agent->getId_agent()):?>
                                        <div class="form-check d-block" >
                                            <input class="form-check-input" type="checkbox" value="<?= $agent->getId_agent(); ?>" id="id_agent" multiple name="id_agent[]">
                                            <label class="form-check-label me-3" for="id_agent" value="<?= $agent->getId_agent(); ?>">
                                                <?= $agent->getFirstname_agent()." ".$agent->getName_agent()." (spécialité : " ?>
                                                <?= $speciality_agent->getName_speciality().")" ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            <!-- Link to see the list of the agents --> 
                            <a href="agentsList" class="text-white">Voir la liste des agents-></a>
                        </div>
                
                        <!-- code_contact --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Contact(s) : </label>
                            <?php foreach($contacts as $contact) :?>
                                <div class="form-check d-block" >
                                    <input class="form-check-input" type="checkbox" value="<?= $contact->getCode_contact(); ?>" id="code_contact" multiple name="code_contact[]">
                                    <label class="form-check-label me-3" for="code_contact" value="<?= $contact->getCode_contact(); ?>">
                                        <?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <!-- Link to see the list of the contacts --> 
                            <a href="contactsList" class="text-white">Voir les contacts >></a>
                        </div>

                        <!-- code_target --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label ">Cible(s) : </label>
                            <?php foreach($targets as $target) :?>
                                <div class="form-check d-block" >
                                    <input class="form-check-input" type="checkbox" value="<?= $target->getCode_target(); ?>" id="code_target" multiple name="code_target[]">
                                    <label class="form-check-label me-3" for="code_target" value="<?= $contact->getCode_contact(); ?>">
                                        <?= $target->getFirstname_target()." ".$target->getName_target(); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <!-- Link to see the list of the targets --> 
                            <a href="targetsList" class="text-white">Voir les cibles >></a>
                        </div>

                        <!-- id_hideout --> 
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label ">Planque(s) : </label>
                            <div class="row d-flex align-items-center mb-3">
                                <div class="col-12">
                                    <?php foreach($hideouts as $hideout) :?>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="checkbox" multiple name="id_hideout[]" id="id_hideout" value="<?= $hideout->getId_hideout(); ?>">
                                        <label class="form-check-label me-3" for="id_hideout" value="<?= $hideout->getId_hideout(); ?>">N°<?= $hideout->getId_hideout().": ".$hideout->getAddress_hideout().", ".$hideout->getCountry_hideout(); ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Link to see the list of the hideouts --> 
                                <div>
                                    <a href="hideoutsList" class="text-white">Voir la liste des planques -></a>
                                </div>
                            </div>
                        </div>

                        <!-- code_status --> 
                        <div class="col-12 col-md-6 mb-3">
                            <select class="form-select " aria-label="Default select example" id="code_status" name="code_status">
                                <option selected> -- Statut -- </option>
                                <?php foreach($status as $oneStatus) :?>
                                <option value="<?= $oneStatus->getCode_status(); ?>"><?= $oneStatus->getCode_status(); ?></option>
                                <?php endforeach; ?>
                            </select>

                            <!-- Link to see the list of the status --> 
                            <a href="statusList" class="text-white">Voir la liste des Statuts -></a>
                        </div>

                         <!-- name_type --> 
                        <div class="col-12 col-md-6 mb-3 ">
                            <select class="form-select" aria-label="Default select example" name="name_type">
                                <option selected> -- Type -- </option>
                                <?php foreach($types as $type) :?>
                                <option value="<?= $type->getName_type(); ?>"><?= $type->getName_type(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Link to see the list of the types --> 
                            <a href="typesList" class="text-white">Voir la liste des types -></a>
                        </div>
       
                        <!-- button -->
                      
                            <button type="submit" class="btn btn-danger d-block mx-auto my-5">Ajouter</button>

                    </div>

                </form>
            </div>

        </div>
    </div>
</section> 