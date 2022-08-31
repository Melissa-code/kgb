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
    <h1>Liste des statuts</h1>
</section>


<section class="row m-3">

    <!-- Display the create button if the admin is logged in -->
    <?php if(isset($_SESSION['connect'])) :?>
        <!-- Create a status button -->
        <form method="POST" action="<?= URL?>createStatus" class="d-flex justify-content-center m-3">
            <button class="btn btn-light" type="submit">Ajouter</button>
        </form>
    <?php endif ?>
</section>


<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a status  -->
            <?php foreach($status as $oneStatus) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $oneStatus->getCode_status() ; ?></h4>
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto my-2"> 
                        <!-- Udpate status button -->
                        <form method="POST" action="<?= URL ?>updateStatus?q=<?= $oneStatus->getCode_status() ?>">
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                        <!-- Delete status button -->
                        <form method="POST" action="<?= URL ?>deleteStatus?q=<?= $oneStatus->getCode_status() ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



