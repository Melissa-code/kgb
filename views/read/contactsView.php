<!------------- Main --------------->

<section class="my-4">
    <button class="btn btn-light" type="button"><a href="<?= URL?>createMission"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la création de mission" style="height: 1.5rem; width: 1.5rem"></a></button>
    <h1>Liste des contacts</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a contact -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createContact"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un contact" style="width: 1.5rem;"></a></button>
    </div>
</section>


<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a speciality -->
            <?php foreach($contacts as $contact) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted">Code: <?= $contact->getCode_contact(); ?></h4>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= $contact->getFirstname_contact(); ?> <?= $contact->getName_contact(); ?></p>
                    <?php 
                    // Display the date of birth in the French format
                    $dateBirthdayFormat = new DateTime($contact->getDatebirthday_contact());
                    ?>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= 'Né le : '.$dateBirthdayFormat->format('d/m/Y'); ?></p> 
                    <p class="card-subtitle mb-2 text-center text-muted"><?= 'Nationalité : '. $contact->getNationality_contact(); ?></p> 
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
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
</section>



