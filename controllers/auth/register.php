<?php

auth();

require "Core/Validator.php";
require "Core/Database.php";
$config = require("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new Database($config);
    $errors = [];

    if (!Validator::email($_POST["email"])){
        $errors["email"] = "Invalid email format";
    }

    if (!Validator::password($_POST["password"])){
        $errors["password"] = "Password is not complete";
    }

    $query = "SELECT * FROM users WHERE email = :email;";
    $params = [
        ":email" => $_POST["email"]
    ];
    $result = $db->execute($query, $params)->fetch();

    if($result) {
        $errors["email"] = "Epasts jau eksistē";
    }

    if(empty($errors)){
        $query = "INSERT INTO users (email, password)
        VALUES (:email, :password);";
            $params = [
                ":email" => $_POST["email"],
                ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
            ];
        $result = $db->execute($query, $params);

        $_SESSION["flash"] = "Tu esi veiksmigi registrejies";
        header("Location: /login");
        die();
    }

    $_POST["email"];
    $_POST["password"];
};

$title = "REGISTER";
require "views/auth/register.view.php";