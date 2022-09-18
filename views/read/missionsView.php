<?php 
//session_start(); 

if(isset($_SESSION['connect'])) {
    echo "admin connecté";
} else {
    echo "pas de connexion";
}
?>

 <?php if(isset($_SESSION['alertUpdate'])) :?>
    <div class="alert alert-success mx-5" role="alert">
    <?= $_SESSION['alertUpdate']['msg'] ?>
    </div>
    <?php unset($_SESSION['alertUpdate']) ?>
<?php endif ?>


<!------------- Main --------------->

<section class="mb-4">
    <h1>Liste des missions</h1>
</section>


<section>
    <!-- Display the create button if the admin is logged in -->
    <?php if(isset($_SESSION['connect'])) :?>
        <!-- Create a mission button -->
        <form method="POST" action="<?= URL?>createMission" class="d-flex justify-content-center m-3">
            <button class="btn btn-light" type="submit">Ajouter</button>
        </form>
    <?php endif ?>
</section>

<!-- Search the name of a mission -->
<section>
    <div>
        <input class="form-control me-2 input" type="text" placeholder="Nom de code de la mission" aria-label="Search" id="searchInput">
        <div id="suggestions"></div>
    </div>
</section>


<section class="row m-3 justify-content-around" id="missions-list">
    <article class="d-flex col-12 flex-wrap list-wrapper" >

        <!-- Card of a mission -->
            <?php foreach($missions as $mission) :?>
                <div class="card m-2 list-item" style="width: 18rem;" >
                    <div class="card-body">
                    <a href="<?= URL ?>oneMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="card-link"><h3 id="title" class="card-title mb-4 text-center text-danger fw-bold">Mission <?= $mission->getCode_mission(); ?></h3></a>
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $mission->getTitle_mission() ; ?></h4>
                    <p class="card-text text-muted"><?= $mission->getDescription_mission() ?></p>
                </div>

                <!-- Display the update & delete buttons if the admin is logged in -->
                <?php if(isset($_SESSION['connect'])) :?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mx-auto my-2"> 
                            <!-- Udpate mission button -->
                            <form method="POST" action="<?= URL ?>updateMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" class="me-2">
                                <button class="btn btn-warning" type="submit">Modifier</button>
                            </form>
                            <!-- Delete mission button -->
                            <form method="POST" action="<?= URL ?>deleteMission?q=<?= urlencode(base64_encode($mission->getCode_mission())) ?>" onSubmit="return confirm('Etes-vous sûr de vouloir supprimer la mission ?');">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </li>
                    </ul>
                <?php endif ?>
                </div>
            <?php endforeach; ?>
    </article>
</section>


<section class="row mt-4">
    <div class="col-12 d-flex justify-content-center">
        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" onclick="previous()" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" onclick="firstPage()" href="#">1</a></li>
                <li class="page-item"><a class="page-link" onclick="lastPage()" href="#">2</a></li>
                <li class="page-item"><a class="page-link" onclick="nextPage()" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</section>



