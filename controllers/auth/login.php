<?php

auth();

require "Core/Validator.php";
require "Core/Database.php";
$config = require("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new Database($config);
    $errors = [];

    if (!Validator::email($_POST["email"])){
        $errors["email"] = "Invalid email or password";
    }

    if (!Validator::password($_POST["password"])){
        $errors["password"] = "Invalid email or password";
    }

    $query = "SELECT * FROM users WHERE email = :email";
    $params = [
        ":email" => $_POST["email"]
    ];
    $user = $db->execute($query, $params)->fetch();
    if (!$user || !password_verify($_POST["password"], $user["password"])){
        $errors["login"] = "Invalid email or password";
    }
    
    if(empty($errors)){
        $_SESSION["user"] = true;
        $_SESSION["email"] = $_POST["email"];
        header("Location: /");
        die();
    }
};

$title = "LOGIN";
require "views/auth/login.view.php";

unset($_SESSION["flash"]);