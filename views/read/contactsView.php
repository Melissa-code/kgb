<!-- Title & Back button & Add button --> 
<div class="row">
    <section class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 mb-3">
                <h1 class="text-light">Liste des contacts</h1>
            </div>
            </div>
    </section>

    <div class="row ">
        <section class="container bg-list">  
            <div class="row my-md-5">
                <div class="col-6 d-flex justify-content-end mt-3">
                    <!-- Back to create mission button --> 
                    <a href="<?= URL?>createMission" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1rem;"> Revenir</a>
                </div>
                <div class="col-6 d-flex justify-content-start mt-3">
                    <!-- Add a contact button --> 
                    <a href="<?= URL?>createContact" class="btn btn-light font-weight-bold"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"> Ajouter</a>
                </div>
            </div>
        </section>
    </div>
</div>


<!-- Display all the contacts -->

<section class="container my-5">
    <div class="row">
        <article class="d-flex col-12 flex-wrap justify-content-center" id="lists">
        <!--  contacts cards -->
            <?php foreach($contacts as $contact) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-danger">Code : <?= $contact->getCode_contact(); ?></h4>
                        <p class="card-subtitle mb-2 text-center text-danger fw-bold"><?= $contact->getFirstname_contact(); ?> <?= $contact->getName_contact(); ?></p>
                    <?php 
                    // Display the date of birth in the French format
                    $dateBirthdayFormat = new DateTime($contact->getDatebirthday_contact());
                    ?>
                    <p class="card-subtitle mb-2 text-center text-dark"><?= 'Né le : '.$dateBirthdayFormat->format('d/m/Y'); ?></p> 
                    <p class="card-subtitle mb-2 text-center text-dark"><?= 'Nationalité : '. $contact->getNationality_contact(); ?></p> 
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto my-2"> 
                        <!-- Udpate contact button -->
                        <form method="POST" action="<?= URL ?>updateContact?q=<?= $contact->getCode_contact(); ?>">
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un contact" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete contact button -->
                        <form method="POST" action="<?= URL ?>deleteContact?q=<?= $contact->getCode_contact(); ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer ce contact ?');">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un contact" style="width: 1.5rem;"></button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
        </article>
    </div>
</section>


<!-- Pagination -->

<section class="row mt-5 mb-3">
    <div class="col-12 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark previousP" href="#">Précédente</a></li>
                <li class="page-item"><a class="page-link text-dark firstP"  href="#">1</a></li>
                <li class="page-item"><span class="page-link text-dark" id="pageInfo">1 / 2</span></li>
                <li class="page-item"><a class="page-link text-dark lastP"  href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark nextP"  href="#">Suivante</a></li>
            </ul>
        </nav>
    </div>
</section>
