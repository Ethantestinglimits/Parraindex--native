<?php

function emptyInputSignup($fname, $name, $email, $username, $uid, $pwd,$pwdRepeat) {
    $results;
    if (empty($name) || empty($email) || empty($username) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

function invalidUsername($username) {
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

function invalidEmail($email) {
    $results;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

function pwdMatch($pwd, $pwdRepeat) {
    $results;
    if ($pwd !== $pwdRepeat) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

function usernameExists($conn, $username, $email, $uid) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ? OR numéroEtu = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysli_stmt_bind_param($statement, "sss", $username, $email, $uid);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);

}function usernameExists($conn, $username, $email, $uid) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ? OR numéroEtu = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysli_stmt_bind_param($statement, "sss", $username, $email, $uid);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);

}

function createUser($conn, $fname, $name, $email, $username, $uid, $pwd ) {
    $sql = "INSERT INTO users (numéroEtu, email, username, password, nom, prenom) VALUES (?, ?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysli_stmt_bind_param($statement, "ssssss", $fname, $name, $email, $username, $uid, $hashedPwd);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../signup.php?error=none");
    exit();
}
https://www.yogeshchauhan.com/php-login-system-using-pdo-part-1-create-user-registration-page/

