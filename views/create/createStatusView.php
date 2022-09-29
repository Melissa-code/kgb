<!-- Page title & back button button --> 

<section class="container mb-5">
    <h1 class="text-light">Ajouter un statut</h1>
</section>


<!-- Create status form -->

<section class="container my-5">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-7 col-lg-5 bg-dark bg-gradient bg-opacity-25 rounded-3 p-4">
            <form action="<?= URL ?>createStatusValidation" method="POST" >
                <!-- code_status --> 
                <div class="mb-3">
                    <label for="code_status" class="form-label">Statut : </label>
                    <input type="text" class="form-control" id="code_status" name="code_status">
                </div>
                
               <!-- Back & Add buttons --> 
               <div class="row d-flex mt-4">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="statusList" class="btn btn-dark"><img src="<?= URL ?>/public/assets/images/back-light.svg" alt="retour à la liste des statuts" style="width: 1.5rem; height: 1rem;"> Revenir</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-light"><img src="<?= URL ?>/public/assets/images/icon-add.svg" alt="ajouter un statut" style="width: 1.5rem;"> Ajouter</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>


