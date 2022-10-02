<!-- Title --> 

<section class="container mb-3">
    <h1>Modifier le statut <?= $status->getCode_status(); ?></h1>
</section>


<!-- Update status form -->

<div class="row bg-form-status">
    <section class="container my-5">
        <div class="row d-flex justify-content-center mt-5">
            <article class="col-10 col-md-7 col-lg-5 border-form p-4 mt-5">
                <form action="updateStatusValidation" method="POST">
                    <div class="mb-3">
                        <!-- new code_status -->
                        <input type="text" class="form-control" id="code_status" name="code_status" value="<?= $status->getCode_status() ?>" placeholder="code status">
                        <!-- oldcode_status -->
                        <input type="hidden" class="form-control" id="oldcode_status" name="oldcode_status" value="<?= $status->getCode_status() ?>" >
                    </div>

                    <!-- Update & back buttons --> 
                    <div class="row d-flex mt-4">
                        <div class="col-6 d-flex justify-content-end">
                            <a href="statusList" class="btn btn-dark text-light"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des statuts" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning"><img src="<?= URL ?>/public/assets/images/edit-light.svg" alt="modifier un statut" style="width: 1rem;"> Modifier</button>
                        </div>
                    </div>
                </form>
            </article>   
        </div>
    </section>
</div>

    

