
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light mt-3"><a href="statusList">Retour</a></button>
    <h1>Modifier le type <?= $type->getName_type() ?></h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center">

        <!-- update a type form -->
        <form action="updateTypeValidation" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="name_type" name="name_type" value="<?= $type->getName_type() ?>" placeholder="dénomination du type">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="oldname_type" name="oldname_type" value="<?= $type->getName_type() ?>" >
            </div>

        
            <!-- button --> 
            <button type="submit" class="btn btn-danger d-block mx-auto m-3">Modifier</button>
        </form>

    </article>
</section>