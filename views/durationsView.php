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
    <h1>Liste des durées</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a duration -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createDuration">Ajouter</a></button>
    </div>
</section>


<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a duration  -->
            <?php foreach($durations as $duration) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $duration->getId_duration() ?></h4>

                    <p class="card-subtitle mb-2 text-center text-muted">Début: 
                        <?php  
                            $dateFormatStart = new DateTime($duration->getStart_duration());
                            echo $dateFormatStart->format('d/m/Y');
                        ?>
                    </p>
                    <p class="card-subtitle mb-2 text-center text-muted">Fin: 
                        <?php  
                            $dateFormatEnd = new DateTime($duration->getEnd_duration());
                            echo $dateFormatEnd->format('d/m/Y');
                        ?>
                    </p>
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate status button -->
                        <form method="POST" action="<?= URL ?>updateDuration?q=<?= $duration->getId_duration() ?>">
                            <button class="btn btn-warning me-2" type="submit">Modifier</button>
                        </form>
                        <!-- Delete status button -->
                        <form method="POST" action="<?= URL ?>deleteDuration?q=<?= $duration->getId_duration() ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



