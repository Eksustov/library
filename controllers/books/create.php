<?php
$config = require("config.php");
require "Core/Database.php";
require "Core/Validator.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors=[];

    if (!Validator::string($_POST["name"], min: 1, max:80)) {
        $errors["name"] = "Name cannot be empty and exceed 80 characters";
    }

    if (!Validator::string($_POST["author"], min: 1, max:50)) {
        $errors["author"] = "Author cannot be empty and exceed 50 characters";
    }
    
    if ($_POST["date"] == NULL) {
        $errors["date"] = "Date cannot be empty";
    }

    if (!Validator::number($_POST["availability"])){
        $errors["availability"] = "Availability cannot be empty";
    }


    if (empty($errors)) {
    $query = "INSERT INTO books (name, author, date, availability)
    VALUES (:name, :author, :date, :availability);";
    $params = [
        ":name" => $_POST["name"], 
        ":author" => $_POST["author"],
        ":date" => $_POST["date"],
        ":availability" => $_POST["availability"]
    ];
    $db = new Database($config);
    $db->execute($query, $params);
    
    header("Location: /");
    die();
}
}
    
$title = "Nezinu kas šis ir";
require "views/books/create.view.php";