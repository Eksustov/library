<?php
$config = require("config.php");
require "Database.php";
require "Validator.php";

$query = "SELECT * FROM books where id = :id";
$params = [ ":id" => $_GET["id"]];
$db = new Database($config);
$book = $db
        ->execute($query, $params)
        ->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors=[];

    if (!Validator::string($_POST["name"], min: 1, max:80)) {
        $errors["name"] = "Name cannot be empty and exceed 80 characters";
    }

    if (!Validator::string($_POST["author"], min: 1, max:30)) {
        $errors["author"] = "Author cannot be empty and exceed 30 characters";
    }
    
    if ($_POST["date"] == NULL) {
        $errors["date"] = "Date cannot be empty";
    }

    if ($_POST["availability"] != "TRUE" && $_POST["availability"] == "FALSE" ) {
        if($_POST["availability"] = "TRUE" && $_POST["availability"] != "FALSE"){
        $errors["availability"] = "it works";
        }
    }

    if (empty($errors)) {
    $query = "UPDATE books
    SET name = :name, author = :author, date = :date, availability = :availability
    WHERE id = :id;";
    $params = [
        ":name" => $_POST["name"], 
        ":author" => $_POST["author"],
        ":date" => $_POST["date"],
        ":availability" => $_POST["availability"],
        ":id" => $_GET["id"]
    ];
    $db = new Database($config);
    $db->execute($query, $params);
    
    header("Location: /");
    die();
}
}
    
$title = "Nezinu kas šis ir";
require "views/edit.view.php";