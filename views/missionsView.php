<?php 
session_start(); 

if(isset($_SESSION['connect'])) {
    echo "admin connecté";
}

?>


<div class="row m-3">
    <div class="col-12">

        <h1>Liste des missions</h1>

        <?php if(isset($_SESSION['connect'])) :?>
            <!-- Create a mission button -->
            <form method="POST" action="<?= URL?>createMission" class="d-flex justify-content-center m-3">
                <button class="btn btn-light" type="submit">Ajouter</button>
            </form>
        <?php endif ?>

    </div>
</div>

    <div class="row m-3">
        <div class="col-12 d-flex">

        <?php 
        foreach($missions as $mission) :?>

            <!-- Card of a mission -->
            <div class="card mx-2" style="width: 18rem;">
                <div class="card-body">
                    <a href="<?= URL ?>oneMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="card-link"><h3 id="title" class="card-title mb-4 text-center text-danger fw-bold">Mission <?= $mission->getCode_mission()  ; ?> </h3></a>
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $mission->getTitle_mission() ; ?></h4>
                    <p class="card-text text-muted"><?= $mission->getDescription_mission() ?></p>
                </div>


                <?php if(isset($_SESSION['connect'])) :?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto my-2"> 
                            <!-- Udpate mission button -->
                            <form method="POST" action="<?= URL ?>updateMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="me-2">
                                <button class="btn btn-warning" type="submit">Modifier</button>
                            </form>
                            <!-- Delete mission button -->
                            <form method="POST" action="<?= URL ?>deleteMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
            <?php endforeach; ?>

    </div>
</div>



