
<?php session_start(); ?>


<!------------- Main --------------->

<section class="mb-4">
    <h1>Ajouter un statut</h1>
</section>


<section class="row">
    <article class="col-12 d-flex justify-content-center" >

        <!-- create a status form -->
        <form action="<?= URL ?>createStatusValidation" method="POST" >
            <!-- code_mission --> 
            <div class="mb-3">
                <label for="code_status" class="form-label">Statut : </label>
                <input type="text" class="form-control" id="code_status" name="code_status">
            </div>
        <!-- button --> 
        <button type="submit" class="btn btn-danger d-block mx-auto m-3">Ajouter</button>

        </form>
    </article>
</section>