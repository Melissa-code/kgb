<!-- Page title & back button button --> 

<section class="container mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-12"></div>
            <h1>Ajouter un contact</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
            <a href="contactsList" class="btn btn-dark border border-light"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des contacts" style=" height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>


<!-- Create contact form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-9 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
        
            <!-- create a contact form -->
            <form action="<?= URL ?>createContactValidation" method="POST">
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
                <!-- Add button --> 
                <div>
                    <button type="submit" class="btn btn-light d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"> Ajouter</button>
                </div>
        </form>
    </article>
</section>