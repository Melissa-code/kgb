<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="createMission">Retour</a></button>
    <h1>Ajouter un contact</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a contact form -->
        <form action="<?= URL ?>createContactValidation" method="POST" >

            <!-- code_contact --> 
            <div class="mb-3">
                <label for="code_contact" class="form-label">Nom de code : </label>
                <input type="text" class="form-control" id="code_contact" name="code_contact">
            </div>
            <!-- name_contact --> 
            <div class="mb-3">
                <label for="name_contact" class="form-label">Nom : </label>
                <input type="text" class="form-control" id="name_contact" name="name_contact">
            </div>
            <!-- firstname_contact --> 
            <div class="mb-3">
                <label for="firstname_contact" class="form-label">Prénom : </label>
                <input type="text" class="form-control" id="firstname_contact" name="firstname_contact">
            </div>
            <!-- datebirthday_contact --> 
            <div class="mb-3">
                <label for="datebirthday_contact" class="form-label">Date de naissance : </label>
                <input type="date" class="form-control" id="datebirthday_contact" name="datebirthday_contact">
            </div>
            <!-- nationality_contact --> 
            <div class="mb-3">
                <label for="nationality_contact" class="form-label">Nationalité : </label>
                <input type="text" class="form-control" id="nationality_contact" name="nationality_contact">
            </div>
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>