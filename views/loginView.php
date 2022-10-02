<!-- Title --> 

<section class="container pb-2">
    <h1>Connexion</h1>
</section>

   
<!-- Login admin  --> 

<section class="container" id="login-bg">
    <div class="row d-flex justify-content-center">
        <article class="col-10 col-md-6 col-lg-4 p-5 bg-dark bg-gradient bg-opacity-25" id="login-form">
            <!-- login form -->
            <form method="post" action="<?= URL ?>loginValidation">

                <div class="form-group">
                    <!-- email_admin -->
                    <label class="form-label">Email : </label>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email_admin" name="email_admin" placeholder="name@example.com" required>
                    </div>
                    <!-- password_admin -->
                    <label class="form-label">Mot de passe : </label>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="**************" required>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="mt-4">
                    <button type="submit" id="login-btn" class="btn btn-dark d-block mx-auto d-flex align-items-center"><img src="<?= URL ?>/public/assets/images/loginuser-light.svg" alt="se connecter" style="width: 1.5rem; height:1.5rem;">Se connecter</button>
                </div>

            </form>
        </article>
    </div>
</section>