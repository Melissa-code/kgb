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
    <h1>Liste des types</h1>
</section>


<section class="row">
    <div class="col-12 d-flex justify-content-center">
        <!-- button add a type -->
        <button class="btn btn-light font-weight-bold" type="button"><a href="<?= URL?>createType">Ajouter</a></button>
    </div>
</section>



<section class="row m-3 justify-content-around">
    <article class="d-flex col-12 flex-wrap">

        <!-- Card of a type  -->
            <?php foreach($types as $type) :?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body ">
                    <h4 class="card-subtitle mb-2 text-center text-muted"><?= $type->getName_type() ; ?></h4>
                </div>

                <!-- update & delete buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex mx-auto "> 
                        <!-- Udpate type button -->
                        <form method="POST" action="<?= URL ?>updateType?q=<?= $type->getName_type() ?>">
                            <button class="btn btn-warning me-2" type="submit">Modifier</button>
                        </form>
                        <!-- Delete type button -->
                        <form method="POST" action="<?= URL ?>deleteType?q=<?= $type->getName_type() ?>">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </li>
                </ul>
               
            </div>
        <?php endforeach; ?>

    </article>
</section>



