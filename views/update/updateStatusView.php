<!-- Alert error message if the status already exists --> 

<section class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">
            <?php if(isset($_SESSION['alertDuplicateStatus'])) :?>
                <div class="alert alert-danger mx-5" role="alert">
                    <?= $_SESSION['alertDuplicateStatus']['msg'] ?>
                </div>
                <?php unset($_SESSION['alertDuplicateStatus']) ?>
            <?php endif ?>
        </div>
    </div>
</section>


<!-- Page title & back button button --> 

<section class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1>Modifier le statut <?= $status->getCode_status(); ?></h1>
        <div class="col-12 d-flex justify-content-center my-4">
            <a href="statusList" class="btn btn-light mt-3"><img src="<?= URL ?>/public/assets/images/back-left.svg" alt="retour à la liste des statuts" style="width: 1.5rem; height: 1.5rem;"> Revenir</a>
        </div>
    </div>
</section>



<!-- Update status form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-7 col-md-4 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">

            <form action="updateStatusValidation" method="POST">
                <div class="mb-3">
                    <!-- new code_status -->
                    <input type="text" class="form-control" id="code_status" name="code_status" value="<?= $status->getCode_status() ?>" placeholder="code status">
                    <!-- oldcode_status -->
                    <input type="hidden" class="form-control" id="oldcode_status" name="oldcode_status" value="<?= $status->getCode_status() ?>" >
                </div>
                <!-- Update button --> 
                <div class="mb-5">
                    <button type="submit" class="btn btn-warning d-block mx-auto m-3"><img src="<?= URL ?>/public/assets/images/icon-modify.svg" alt="modifier un statut" style="width: 1.5rem;"> Modifier</button>
                </div>
            </form>
            
        </article>   
    </div>
</section>

    

