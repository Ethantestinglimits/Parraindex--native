<?php
    include_once 'header.php'
?>
    <section class="register">
        <div class="segment">
            <h1>S'inscrire</h1>
            <div class="flex column">
                <form action="signup-inc.php" method="post">
                    <label>
                        <input type="text" name="firstname" placeholder="Nom de famille...">
                    </label>
                    <label>
                        <input type="text" name="name" placeholder="Prénom...">
                    </label>
                    <label>
                        <input type="text" name="email" placeholder="Email...">
                    </label>
                    <label>
                        <input type="text" name="username" placeholder="Pseudo...">
                    </label>
                    <label>
                        <input type="text" name="uid" placeholder="Numéro étudiant...">
                    </label>
                    <label>
                        <input type="password" name="pwd" placeholder="Mot de passe...">
                    </label>
                    <label>
                        <input id="" type="text" name="pwdrepeat" placeholder="Mot de passe à nouveau...">
                    </label>
                    <label>
                        <button type="submit" name="submit">S'inscrire</button>
                    </label>
                </form>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php'
?>