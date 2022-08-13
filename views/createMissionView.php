
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
                <input type="text" class="form-control" id="code_mission" name="code_mission">
            </div>

            <!-- title_mission --> 
            <div class="mb-3">
                <label for="title_mission" class="form-label">Titre : </label>
                <input type="text" class="form-control" id="title_mission" name="title_mission">
            </div>

            <!-- description_mission --> 
            <div class="mb-3">
                <label for="description_mission">Description : </label>
                <textarea class="form-control" id="description_mission" name="description_mission"></textarea>
            </div>

            <!-- country_mission --> 
            <div class="mb-3">
                <label for="country_mission" class="form-label">Pays : </label>
                <input type="text" class="form-control " id="country_mission" name="country_mission">
            </div>

            <!-- id_agent --> 
            <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                <label class="form-label me-3">Agent(s) : </label>
                    <?php foreach($agents as $agent) :?>
                    <label class="btn btn-outline-secondary" for="id_agent" value="<?= $agent->getId_agent(); ?>"><?= $agent->getFirstname_agent()." ".$agent->getName_agent(); ?></label>
                    <input type="checkbox" class="btn-check" id="id_agent" name="agent[]" value="<?= $agent->getId_agent(); ?>" autocomplete="off">
                    <?php endforeach; ?>
            </div>

            <!-- code_contact --> 
            <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                <label class="form-label me-3">Contact(s) : </label>
                <?php foreach($contacts as $contact) :?>
                <label class="btn btn-outline-secondary" for="code_contact" value="<?= $contact->getCode_contact(); ?>"><?= $contact->getFirstname_contact()." ".$contact->getName_contact(); ?></label>
                <input type="checkbox" class="btn-check" id="code_contact" name="contact[]" value="<?= $contact->getCode_contact(); ?>" >
                <?php endforeach; ?>
            </div>

            <!-- code_cible --> 
            <div class="btn-group d-block mb-3" role="group" aria-label="Basic checkbox toggle button group">
                <label class="form-label me-3">Cible(s) : </label>
                <?php foreach($targets as $target) :?>
                <label class="btn btn-outline-secondary" for="code_cible" value="<?= $target->getCode_target(); ?>"><?= $target->getFirstname_target()." ".$target->getName_target(); ?></label>
                <input type="checkbox" class="btn-check" id="code_cible" name="cible[]" value="<?= $contact->getCode_contact(); ?>" autocomplete="off">
                <?php endforeach; ?>
            </div>

            <!-- id_duration --> 
            <select class="form-select mb-3" aria-label="Default select example" name="id_duration">
                <option selected> -- Durée -- </option>
                <?php foreach($durations as $duration) :?>
                <option value="<?= $duration->getId_duration(); ?>"><?= $duration->getId_duration(); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- code_status --> 
            <select class="form-select mb-3" aria-label="Default select example" id="code_status" name="code_status">
                <option selected> -- Statut -- </option>
                <?php foreach($status as $oneStatus) :?>
                <option value="<?= $oneStatus->getCode_status(); ?>"><?= $oneStatus->getCode_status(); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- name_type --> 
            <select class="form-select mb-3" aria-label="Default select example" name="name_type">
                <option selected> -- Type de mission -- </option>
                <?php foreach($types as $type) :?>
                <option value="<?= $type->getName_type(); ?>"><?= $type->getName_type(); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- id_hideout --> 
            <label class="form-label me-3">Planque(s) : </label>
            <?php foreach($hideouts as $hideout) :?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_hideout[]" id="id_hideout" value="<?= $hideout->getId_hideout(); ?>">
                <label class="form-check-label" for="id_hideout" value="<?= $hideout->getId_hideout(); ?>">N°<?= $hideout->getId_hideout() ?></label>
            </div>
            <?php endforeach; ?>

            <!-- name_speciality --> 
            <select class="form-select mb-3" aria-label="Default select example">
                <option selected> -- Spécialité -- </option>
                <?php foreach($specialities as $speciality) :?>
                <option value="<?= $speciality->getName_speciality(); ?>"><?= $speciality->getName_speciality(); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>