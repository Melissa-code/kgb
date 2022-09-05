<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <button type="button" class="btn btn-light m-4"><a href="typesList">Retour</a></button>
    <h1>Ajouter un type</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a type form -->
        <form action="<?= URL ?>createTypeValidation" method="POST" >
            <!-- name_type --> 
            <div class="mb-3">
                <label for="name_type" class="form-label">Type: </label>
                <input type="text" class="form-control" id="name_type" name="name_type">
            </div>
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>