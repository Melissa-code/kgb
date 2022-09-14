
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="agentsList">Retour</a></button>
    <h1>Modifier l'agent n° <?= $agent->getId_agent() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

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
                    <label class="form-label me-3">Spécialité(s) de l'agent : </label>
                    <?php foreach($specialities_agents as $speciality_agent) :?>
                        <?php if($speciality_agent->getId_agent() ===  $agent->getId_agent()) :?>
                            <div class="form-check d-inline-block" >
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
                    <label class="form-label me-3">Changer sa spécialité(s) : </label>
                    <?php foreach($specialities as $speciality) :?>
                        <div class="form-check d-inline-block" >
                            <input class="form-check-input" type="checkbox" value="<?= $speciality->getName_speciality() ?>" id="name_speciality" multiple name="name_speciality[]" >
                            <label class="form-check-label me-3" for="name_speciality" value="<?= $speciality->getName_speciality() ?>">
                                <?= $speciality->getName_speciality() ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>