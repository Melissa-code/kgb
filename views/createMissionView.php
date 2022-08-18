
<?php session_start(); ?>

<!------------- Main --------------->

<section class="mb-4">
    <h1>Ajouter une mission</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a mission form -->
        <form action="<?= URL?>createMissionValidation" method="POST" >
        
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

            <!-- id_agent --> 
            <select class="form-select" multiple  name="id_agent[]" >
                <option selected>-- Agent(s) --</option>
                <?php foreach($agents as $agent) :?>
                <option value="<?= $agent->getId_agent(); ?>"><?= $agent->getFirstname_agent()." ".$agent->getName_agent(); ?></option>
                <?php endforeach; ?>
            </select>

                <!-- Links add update & delete a agent --> 
                <button type="button" class="btn btn-light ms-1 my-1 rounded-2"><a href="createAgent" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un agent" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-warning ms-1 my-1 rounded-2"><a href="updateAgent" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un agent" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-danger ms-1 my-1 rounded-2"><a href="deleteAgent" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un agent" style="width: 1.5rem;"></a></button>
     

            <!-- 
                <div class="form-check d-inline-block">
                    <input class="form-check-input" type="checkbox" value="<?= $agent->getId_agent(); ?>" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                </div>
                -->


            <!-- code_contact --> 
            <div class="row d-flex align-items-center my-3">
                <div class="col-12">
                    <label class="form-label me-3">Contact(s) : </label>
                    
                    <?php foreach($contacts as $contact) :?>
                    <div class="form-check d-inline-block" >
                        <input class="form-check-input" type="checkbox" value="<?= $contact->getCode_contact(); ?>" id="code_contact" multiple name="code_contact[]">
                        <label class="form-check-label me-3" for="code_contact" value="<?= $contact->getCode_contact(); ?>">
                            <?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Links add update & delete a contact --> 
                <div class="col-12 d-flex justify-content-start">
                    <button type="button" class="btn btn-light  my-1 rounded-2"><a href="createContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-2 my-1 rounded-2"><a href="updateContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-2 my-1 rounded-2"><a href="deleteContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un contact" style="width: 1.5rem;"></a></button>
                </div>
            </div>



  


                <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <label class="form-label me-3">Contact(s) : </label>
                        <?php foreach($contacts as $contact) :?>
                            <label class="btn btn-outline-secondary" for="code_contact" value="<?= $contact->getCode_contact(); ?>"><?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?></label>
                            <input type="checkbox" class="btn-check" id="code_contact" name="contact[]" value="<?= $contact->getCode_contact(); ?>" >
                        <?php endforeach; ?>
                    <!-- Links add update & delete a contact --> 
                    <button type="button" class="btn btn-light ms-1 my-1 rounded-2"><a href="createContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-1 my-1 rounded-2"><a href="updateContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un contact" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-1 my-1 rounded-2"><a href="deleteContact" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un contact" style="width: 1.5rem;"></a></button>
                </div>
              
            <!-- code_target --> 
                <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                    <label class="form-label me-3">Cible(s) : </label>
                        <?php foreach($targets as $target) :?>
                            <label class="btn btn-outline-secondary" for="code_cible" value="<?= $target->getCode_target(); ?>"><?= $target->getFirstname_target()." ".$target->getName_target(); ?></label>
                            <input type="checkbox" class="btn-check" id="code_cible" name="cible[]" value="<?= $contact->getCode_contact(); ?>" autocomplete="off">
                        <?php endforeach; ?>
                    <!-- Links add update & delete a target --> 
                    <button type="button" class="btn btn-light ms-2 rounded-2"><a href="createTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cible" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-1 rounded-2"><a href="updateTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une cible" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-1 rounded-2"><a href="deleteTarget" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une cible" style="width: 1.5rem;"></a></button>
                </div>

            <!-- id_duration --> 
            <div class="mb-3 d-flex">
                <select class="form-select" aria-label="Default select example" name="id_duration">
                    <option selected> -- Durée -- </option>
                    <?php foreach($durations as $duration) :?>
                    <option value="<?= $duration->getId_duration(); ?>"><?= $duration->getId_duration(); ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Links add update & delete a duration --> 
                <button type="button" class="btn btn-light ms-2"><a href="createDuration" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une durée" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-warning ms-2"><a href="updateDuration" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une durée" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-danger ms-2"><a href="deleteDuration" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une durée" style="width: 1.5rem;"></a></button>
            </div>

            <!-- code_status --> 
            <div class="mb-3 d-flex">
                <select class="form-select " aria-label="Default select example" id="code_status" name="code_status">
                    <option selected> -- Statut -- </option>
                    <?php foreach($status as $oneStatus) :?>
                    <option value="<?= $oneStatus->getCode_status(); ?>"><?= $oneStatus->getCode_status(); ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Links add update & delete a status --> 
                <button type="button" class="btn btn-light ms-2"><a href="createStatus" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un status" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-warning ms-2"><a href="updateStatus" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un status" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-danger ms-2"><a href="deleteStatus" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un status" style="width: 1.5rem;"></a></button>
            </div>

            <!-- name_type --> 
            <div class="mb-3 d-flex">
                <select class="form-select " aria-label="Default select example" name="name_type">
                    <option selected> -- Type -- </option>
                    <?php foreach($types as $type) :?>
                    <option value="<?= $type->getName_type(); ?>"><?= $type->getName_type(); ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Links add update & delete a type --> 
                <button type="button" class="btn btn-light ms-2"><a href="createType" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un type" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-warning ms-2"><a href="updateType" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un type" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-danger ms-2"><a href="deleteType" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un type" style="width: 1.5rem;"></a></button>
            </div>

            <!-- id_hideout --> 
            <div class="row d-flex align-items-center mb-3">
                <div class="col-sm-9">
                    <label class="form-label me-3">Planque(s) : </label>
                    <?php foreach($hideouts as $hideout) :?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="id_hideout[]" id="id_hideout" value="<?= $hideout->getId_hideout(); ?>">
                        <label class="form-check-label" for="id_hideout" value="<?= $hideout->getId_hideout(); ?>">N°<?= $hideout->getId_hideout() ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-3 d-flex justify-content-end">
                    <!-- Links add update & delete a hideout --> 
                    <button type="button" class="btn btn-light ms-2"><a href="createHideout" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une cachette" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-2"><a href="updateHideout" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une cachette" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-2"><a href="deleteHideout" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une cachette" style="width: 1.5rem;"></a></button>
                </div>
            </div>

            <!-- name_speciality --> 
            <div class="mb-3 d-flex">
                <select class="form-select" aria-label="Default select example">
                    <option selected> -- Spécialité -- </option>
                    <?php foreach($specialities as $speciality) :?>
                    <option value="<?= $speciality->getName_speciality(); ?>"><?= $speciality->getName_speciality(); ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Links add update & delete a speciality --> 
                <button type="button" class="btn btn-light ms-2"><a href="createSpeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-warning ms-2"><a href="updateSpeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une spécialité" style="width: 1.5rem;"></a></button>
                <button type="button" class="btn btn-danger ms-2"><a href="deleteSpeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une spécialité" style="width: 1.5rem;"></a></button>
            </div>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>