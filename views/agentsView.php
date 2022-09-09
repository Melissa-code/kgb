<?php 
session_start(); 

if(isset($_SESSION['connect'])) {
    echo "admin connecté";
} else {
    echo "pas de connexion";
}
?>

<!------------- Main --------------->

<section class="mb-4">
    <button class="btn btn-light" type="button"><a href="<?= URL?>createMission">Retour</a></button>
    <h1>Liste des agents</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a agent -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createAgent"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un agent" style="width: 1.5rem;"></a></button>
    </div>
</section>



<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a agent  -->
            <?php foreach($agents as $agent) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $agent->getId_agent(); ?></h4>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= $agent->getFirstname_agent(); ?></p>
                    <p class="card-subtitle mb-2 text-center text-muted"><?= $agent->getName_agent(); ?></p>

                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate agent button -->
                        <form method="POST" action="<?= URL ?>updateAgent?q=<?= $agent->getId_agent(); ?>">
                            <button class="btn btn-warning me-2" type="submit"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un agent" style="width: 1.5rem;"></button>
                        </form>
                        <!-- Delete agent button -->
                        <form method="POST" action="<?= URL ?>deleteAgent?q=<?= $agent->getId_agent(); ?>">
                            <button class="btn btn-danger" type="submit"><img src="<?= URL ?>/public/assets/images/icon-remove.svg" alt="supprimer un agent" style="width: 1.5rem;"></button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



