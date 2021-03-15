<?php
    include_once 'header.php'
?>
    <section class="register">
        <div class="segment">
            <h1>Se Connecter</h1>
            <div class="flex column">
                <form action="login-inc.php" method="post">
                    <label for="user1">
                        <input type="text" name="name" placeholder="Pseudo/Email...">
                    </label>
                    <label for="pass1">
                        <input type="password" name="pwd" placeholder="Mot de passe...">
                    </label>
                    <button type="submit" name="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php'
?>