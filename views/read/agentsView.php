<!-- Page title & Back button & Add button --> 

<section class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h1 class="text-light">Liste des agents</h1>
        </div>
        <div class="col-6 d-flex justify-content-end mt-3">
            <!-- Back to create mission button --> 
            <a href="<?= URL?>createMission" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la création de mission" style="width: 1.5rem; height:1rem;"> Revenir</a>
        </div>
        <div class="col-6 d-flex justify-content-start mt-3">
            <!-- Add a agent button --> 
            <a href="<?= URL?>createAgent" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un agent" style="width: 1.5rem;"> Ajouter</a>
        </div>
    </div>
</section>


<!-- Display all the agents -->

<section class="container my-5">
    <div class="row">
        <!--  agents list -->
        <article class="d-flex col-12 flex-wrap justify-content-center">
            <!-- Agent card -->
            <?php foreach($agents as $agent) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-subtitle mb-2 text-center text-danger">N° <?= $agent->getId_agent(); ?></h4>
                        <p class="card-subtitle mb-2 text-center text-danger fw-bold"><?= $agent->getFirstname_agent()." ".$agent->getName_agent(); ?></p>
                        <?php 
                        // Display the date of birth in the French format
                        $dateBirthdayFormat = new DateTime($agent->getDatebirthday_agent());
                        ?>
                        <p class="card-subtitle mb-2 text-center text-dark"><?= 'Né le : '.$dateBirthdayFormat->format('d/m/Y'); ?></p> 
                        <p class="card-subtitle mb-2 text-center text-dark"><?= 'Nationalité : '. $agent->getNationality_agent(); ?></p> 
                    </div>

                    <!-- Update & delete buttons -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto "> 
                            <!-- Udpate agent button -->
                            <form method="POST" action="<?= URL ?>updateAgent?q=<?= $agent->getId_agent(); ?>">
                                <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un agent" style="width: 1.5rem;"></button>
                            </form>
                            <!-- Delete agent button -->
                            <form method="POST" action="<?= URL ?>deleteAgent?q=<?= $agent->getId_agent(); ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer cet agent ?');">
                                <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un agent" style="width: 1.5rem;"></button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>





