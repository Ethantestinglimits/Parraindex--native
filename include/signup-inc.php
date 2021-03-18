<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["firstname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if (emptyInputSignup($fname, $name, $email, $username, $uid, $pwd,$pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordnotmatch");
        exit();
    }

    if (usernameExists($conn, $username, $email, $uid) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $name, $email, $username, $uid, $pwd );

}
else {
    header("location: ../signup.php");
    exit();
}