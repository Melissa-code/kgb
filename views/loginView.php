<!-- Title --> 

<section class="container">
    <h1 class="text-light">Connexion</h1>
</section>

   
<!-- Login admin  --> 

<section class="container">
    <div class="row">
        <article class="col-12 col-md-9 col-lg-6 bg-dark bg-gradient bg-opacity-25" id="login-body" >
            <!-- login form -->
            <form method="post" action="<?= URL ?>loginValidation">

                <div class="form-group">
                    <!-- email_admin -->
                    <label class="form-label">Email : </label>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email_admin" name="email_admin" placeholder="name@example.com"  required>
                        <label for="email_admin">Email address</label>
                    </div>
                    <!-- password_admin -->
                    <label class="form-label">Mot de passe : </label>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="**************" required>
                        <label for="password">Password</label>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="mt-4">
                    <button type="submit" id="login-btn" class="btn btn-dark w-100">Se connecter</button>
                </div>

            </form>
        </article>
    </div>
</section>