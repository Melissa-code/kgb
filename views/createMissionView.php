
<?php session_start(); ?>

<!------------- Main --------------->

<section class="mb-4">
    <h1>Ajouter une mission</h1>
</section>


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


<!-- <section class="row m-5">
    <article class="col-12 d-flex justify-content-center" > -->

        <!-- create a mission form -->
        <form action="<?= URL ?>createMissionValidation" method="POST">
        
            <!-- code_mission --> 
            <div class="mb-3">
                <label for="code_mission" class="form-label">Nom de code : </label>
                <input type="text" class="form-control" id="code_mission" name="code_mission" required>
            </div>

            <!-- title_mission --> 
            <div class="mb-3">
                <label for="title_mission" class="form-label">Titre : </label>
                <input type="text" class="form-control" id="title_mission" name="title_mission" required>
            </div>

            <!-- description_mission --> 
            <div class="mb-3">
                <label for="description_mission">Description : </label>
                <textarea class="form-control" id="description_mission" name="description_mission"></textarea>
            </div>

            <!-- country_mission --> 
            <div class="mb-3">
                <label for="country_mission" class="form-label">Pays : </label>
                <input type="text" class="form-control " id="country_mission" name="country_mission" required>
            </div>

            <!-- name_speciality --> 
            <div class="mb-3 ">
                <select class="form-select" aria-label="Default select example" id="name_speciality" name="name_speciality">
                    <option selected> -- Spécialité -- </option>
                    <?php foreach($specialities as $speciality) :?>
                    <option value="<?= $speciality->getName_speciality(); ?>"><?= $speciality->getName_speciality(); ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Link to see the list of the hideouts --> 
                <a href="specialitiesList" class="text-white">Voir la liste des spécialités -></a>
            </div>

            <!-- id_agent --> 
            <label class="form-label ">Agent(s) : </label>
            <!-- <div class="row d-flex align-items-center mb-3">
                <div class="col-12"> -->
                        <?php foreach($agents as $agent) :?>
                            <?php foreach($specialities_agents as $speciality_agent):?>
                                <?php if($speciality_agent->getId_agent() === $agent->getId_agent()):?>
                                <div class="form-check d-inline-block" >
                                    <input class="form-check-input" type="checkbox" value="<?= $agent->getId_agent(); ?>" id="id_agent" multiple name="id_agent[]">
                                    <label class="form-check-label me-3" for="id_agent" value="<?= $agent->getId_agent(); ?>">
                                        <?= $agent->getFirstname_agent()." ".$agent->getName_agent()." (spécialité : " ?>
                                        <?= $speciality_agent->getName_speciality().")" ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <!-- </div> -->

                <!-- Link to see the list of the agents --> 
                <a href="agentsList" class="text-white">Voir la liste des agents-></a>

                <!-- Links add update & delete a agent --> 
                <div class="col-12 d-flex justify-content-start">
           
                </div>
            <!-- </div> -->

            <!-- code_contact --> 
            <label class="form-label">Contact(s) : </label>
            <!-- <div class="row d-flex align-items-center mb-3">
                <div class="col-12"> -->
                    <?php foreach($contacts as $contact) :?>
                    <div class="form-check d-inline-block" >
                        <input class="form-check-input" type="checkbox" value="<?= $contact->getCode_contact(); ?>" id="code_contact" multiple name="code_contact[]">
                        <label class="form-check-label me-3" for="code_contact" value="<?= $contact->getCode_contact(); ?>">
                            <?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                <!-- </div> -->
                <!-- Links add update & delete a contact --> 
                <div class="col-12 d-flex justify-content-start">
                    <button type="button" class="btn btn-light  my-1 rounded-2"><a href="createContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-2 my-1 rounded-2"><a href="updateContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-2 my-1 rounded-2"><a href="deleteContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un contact" style="width: 1.5rem;"></a></button>
                </div>
            <!-- </div> -->
              
            <!-- code_target --> 
            <label class="form-label ">Cible(s) : </label>
            <!-- <div class="row d-flex align-items-center mb-3">
                <div class="col-12">   -->
                    <?php foreach($targets as $target) :?>
                        <div class="form-check d-inline-block" >
                            <input class="form-check-input" type="checkbox" value="<?= $target->getCode_target(); ?>" id="code_target" multiple name="code_target[]">
                            <label class="form-check-label me-3" for="code_target" value="<?= $contact->getCode_contact(); ?>">
                                <?= $target->getFirstname_target()." ".$target->getName_target(); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <!-- </div> -->
                <!-- Links add update & delete a target --> 
                <div class="col-12 d-flex justify-content-start">
                    <button type="button" class="btn btn-light my-1 rounded-2"><a href="createTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-2 my-1 rounded-2"><a href="updateTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une cible" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-2 my-1 rounded-2"><a href="deleteTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une cible" style="width: 1.5rem;"></a></button>
                </div>
            <!-- </div> -->

            <!-- id_duration --> 
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="id_duration">
                    <option selected> -- Durée -- </option>
                    <?php foreach($durations as $duration) :?>
                    <option value="<?= $duration->getId_duration(); ?>"><?= $duration->getId_duration(); ?></option>
                    <?php endforeach; ?>
                </select>
          
                <!-- Link to see the list of the durations --> 
                <a href="durationsList" class="text-white">Voir la liste des durées -></a>
            </div>


            <!-- code_status --> 
            <div class="mb-3">
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
            <div class="mb-3 ">
                <select class="form-select" aria-label="Default select example" name="name_type">
                    <option selected> -- Type -- </option>
                    <?php foreach($types as $type) :?>
                    <option value="<?= $type->getName_type(); ?>"><?= $type->getName_type(); ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Link to see the list of the types --> 
                <a href="typesList" class="text-white">Voir la liste des types -></a>

            </div>

            <!-- id_hideout --> 
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

                <div class="col-12">
                <!-- Link to see the list of the hideouts --> 
                <a href="hideoutsList" class="text-white">Voir la liste des planques -></a>
                </div>
            </div>
 

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    <!-- </article>
</section> -->