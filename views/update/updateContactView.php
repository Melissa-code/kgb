
<!-- Page title & back button button --> 

<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier le contact <?= $contact->getCode_contact() ?></h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-4">
            <a href="contactsList" class="btn btn-dark border border-light"><img class="text-white" src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des contacts" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Update agent form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">

            <!-- update a contact form -->
            <form action="updateContactValidation" method="POST">
                <!-- code_contact --> 
                <div class="mb-3">
                    <label for="code_contact" class="form-label">Nom de code : </label>
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

                <!-- Update button --> 
                <div class="">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un contact" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
        </article>
    </div>
</section>