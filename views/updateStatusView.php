
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="statusList">Retour</a></button>
    <h1>Modifier le statut <?= $status->getCode_status() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a status form -->
        <form action="updateStatusValidation" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="code_status" name="code_status" value="<?= $status->getCode_status() ?>" placeholder="code status">
            </div>

            <input type="hidden" name="identifiant"value="<?= $status->getCode_status() ?>">
            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>