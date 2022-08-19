<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter un agent</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a agent form -->
        <form action="<?= URL ?>createAgentValidation" method="POST" >
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
            <div class="row d-flex align-items-center my-3">
                <div class="col-12">
                    <label class="form-label me-3">Spécialité(s) : </label>
                        <?php foreach($specialities as $speciality) :?>
                        <div class="form-check d-inline-block" >
                            <input class="form-check-input" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]">
                            <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                <?= $speciality->getName_speciality() ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                </div>
                <!-- Links add update & delete a contact --> 
                <div class="col-12 d-flex justify-content-start">
                    <button type="button" class="btn btn-light"><a href="createSpeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter une spécialité" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-warning ms-2"><a href="updatespeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier une spécialité" style="width: 1.5rem;"></a></button>
                    <button type="button" class="btn btn-danger ms-2"><a href="deleteSpeciality" class="text-dark"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer une spécialité" style="width: 1.5rem;"></a></button>
                </div>
            </div>
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>