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
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>