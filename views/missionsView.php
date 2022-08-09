
<h1>Liste des missions</h1>

<?php 
foreach($missions as $mission) :?>

    <div class="row m-3">
        <div class="col-10 ">
            
            <!-- Card of a mission -->
            <div class="card mx-2" style="width: 18rem;">
                <div class="card-body">
                    <a href="<?= URL ?>oneMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="card-link"><h3 id="title" class="card-title mb-4 text-center text-danger fw-bold">Mission <?= $mission->getCode_mission()  ; ?> </h3></a>
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $mission->getTitle_mission() ; ?></h4>
                    <p class="card-text text-muted"><?= $mission->getDescription_mission() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto my-2"> 
                        <!-- Udpate mission button -->
                        <form method="POST" action="<?= URL ?>updateMission?q=<?= $mission->getCode_mission() ?>" class="me-2">
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                        <!-- Delete mission button -->
                        <form method="POST" action="<?= URL ?>deleteMission?q=<?= $mission->getCode_mission() ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </li>
                 
                </ul>
                
            </div>

        </div>
    </div>
        


<?php endforeach; ?>