
<!------------- Main --------------->

<section class="mb-4">
    <h1>Détail d'une mission</h1>
</section>


<section class="row ">
    <article class="col-12 mb-5">

        <!-- Card with the detail of a mission --> 
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <h3 class="card-title text-center text-danger fw-bold mb-3">Mission <?= $mission->getCode_mission() ?></h3>
                <p class="card-text text-dark"><?= $mission->getTitle_mission() ?></p>
                <p class="card-text text-dark"><?= $mission->getDescription_mission() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Pays: <?= $mission->getCountry_mission() ?></li>
                <li class="list-group-item">Agent(s): </li>
                <li class="list-group-item">Contact(s): </li>
                <li class="list-group-item">Cible(s):</li>
                <li class="list-group-item">Type: <?= $mission->getName_type() ?></li>
                <li class="list-group-item">Statut: <?= $mission->getCode_status() ?></li>
                <li class="list-group-item">Spécialité:</li>
                <li class="list-group-item">Date de début:</li>
                <li class="list-group-item">Date de fin: </li>
            </ul>
        </div>

    </article>
</section>


<?php 

?>