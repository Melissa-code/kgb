
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="contactsList">Retour</a></button>
    <h1>Modifier le contact <?= $contact->getCode_contact() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a contact form -->
        <form action="updateContactValidation" method="POST">
            <!-- code_contact --> 
            <div class="mb-3">
                <label for="code_contact" class="form-label">Code : </label>
                <input type="text" class="form-control" id="code_contact" name="code_contact" value="<?= $contact->getCode_contact(); ?>" placeholder="code contact">
            </div>
            <!-- code_contact --> 
            <div class="mb-3">
                <input type="hidden" class="form-control" id="oldcode_contact" name="oldcode_contact" value="<?= $contact->getCode_contact(); ?>" >
            </div>

            <!-- name_contact --> 
            <div class="mb-3">
                <label for="name_contact" class="form-label">Nom : </label>
                <input type="text" class="form-control" id="name_contact" name="name_contact" value="<?= $contact->getName_contact(); ?>">
            </div>
            <!-- firstname_contact --> 
            <div class="mb-3">
                <label for="country_hideout" class="form-label">Prénom : </label>
                <input type="text" class="form-control" id="firstname_contact" name="firstname_contact" value="<?= $contact->getFirstname_contact(); ?>">
            </div>
            <!-- datebirthday_contact --> 
            <div class="mb-3">
                <label for="datebirthday_contact" class="form-label">Date de naissance : </label>
                <input type="date" class="form-control" id="datebirthday_contact" name="datebirthday_contact" value="<?= $contact->getDatebirthday_contact(); ?>">
            </div>
            <!-- nationality_contact --> 
            <div class="mb-3">
                <label for="nationality_contact" class="form-label">Nationalité : </label>
                <input type="text" class="form-control" id="nationality_contact" name="nationality_contact" value="<?= $contact->getNationality_contact(); ?>">
            </div>

            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>