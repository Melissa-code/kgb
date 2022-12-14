<!-- Page title & back button button --> 

<section class="container mb-3">
    <h1>Ajouter un contact</h1>
</section>


<!-- Create contact form -->
<div class="row bg-form-contact">
    <section class="container my-1 my-md-5">
        <div class="row d-flex justify-content-center mt-2 mt-md-5">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4">
            
                <!-- create a contact form -->
                <form action="<?= URL ?>createContactValidation" method="POST">
                    <!-- code_contact --> 
                    <div class="mb-3 col-12">
                        <label for="code_contact" class="form-label">Nom de code : </label>
                        <input type="text" class="form-control" id="code_contact" name="code_contact">
                    </div>
                    <!-- name_contact --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="name_contact" class="form-label">Nom : </label>
                            <input type="text" class="form-control" id="name_contact" name="name_contact">
                        </div>
                        <!-- firstname_contact --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="firstname_contact" class="form-label">Prénom : </label>
                            <input type="text" class="form-control" id="firstname_contact" name="firstname_contact">
                        </div>
                    </div>
                    <!-- datebirthday_contact --> 
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="datebirthday_contact" class="form-label">Date de naissance : </label>
                            <input type="date" class="form-control" id="datebirthday_contact" name="datebirthday_contact">
                        </div>
                        <!-- nationality_contact --> 
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nationality_contact" class="form-label">Nationalité : </label>
                            <input type="text" class="form-control" id="nationality_contact" name="nationality_contact">
                        </div>
                    </div>

                    <!-- Back & Add buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="contactsList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des contacts" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"> Ajouter</button>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </section>
</div>