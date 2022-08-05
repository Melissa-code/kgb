
<h1>Liste des missions</h1>

<?php 
foreach($missions as $mission) :?>

    <div class="row m-5">
        <div class="col-8 d-flex mx-auto">
            <!-- Card of a mission -->
            <div class="card mx-2" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center text-muted text fw-bold">Mission <?= $mission->getCode_mission()  ; ?></h3>
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $mission->getTitle_mission() ; ?></h4>
                    <p class="card-text text-muted"><?= $mission->getDescription_mission() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mx-auto"> 
                        <a href="<?= URL ?>oneMission?q=<?php echo $mission->getCode_mission()?> " class="card-link">Plus de détail >></a>
                    </li>
                </ul>
            </div>


     




        </div>
    </div>
        


<?php endforeach; ?>