<div class="title">
    <h1>Connexion</h1>
</div>
   
<section>
    <article class="row">
        <div class="col-6" id="login-body" >
        
            <!-- login form -->
            <form method="post" action="<?= URL ?>loginValidation">
                <!-- Email -->
                <div class="form-group">
                    <input type="email" id="email_admin" name="email_admin" class="form-control p-4" placeholder="Votre adresse email" required>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <input type="password" id="password_admin" name="password_admin" class="form-control p-4" placeholder="Votre mot de passe" required>
                </div>
                <!-- Remember me -->
                <div class="form-group form-check">
                    <label for="checkbox" id="rememberMe" class="form-check-label"><input type="checkbox" id="checkbox" class="form-check-input" name="auto" checked>Se souvenir de moi</label>
                </div>
        
                <!-- Button -->
                <button type="submit" id="login-btn" class="btn btn-dark p-3">Se connecter</button>
            </form>

        </div>
    </article>

</section>