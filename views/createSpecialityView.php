<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter une spécialité</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a speciality form -->
        <form action="<?= URL ?>createSpecialityValidation" method="POST" >
            <!-- name_speciality --> 
            <div class="mb-3">
                <label for="name_speciality" class="form-label">Nom de la spécialité : </label>
                <input type="text" class="form-control" id="name_speciality" name="name_speciality">
            </div>
            <!-- id_agent --> 
            <select class="form-select mb-3" aria-label="id_agent_select" name="id_agent">
                <option selected> -- Id de l'agent -- </option>
                <?php foreach($agents as $agent) :?>
                    <option value="<?= $agent->getId_agent();?>"><?= $agent->getId_agent(); ?></option>
                <?php endforeach; ?>
            </select>
            <!-- code_mission --> 
            <select class="form-select mb-3" aria-label="code_mission_select" name="code_mission">
                <option selected> -- Code de la mission -- </option>
                <?php foreach($missions as $mission)  :?>
                    <option value="<?= $mission->getCode_mission(); ?>"><?= $mission->getCode_mission(); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>