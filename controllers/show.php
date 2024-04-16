<?php
require "Database.php";
$config = require("config.php");
$db = new Database($config);

$query = "SELECT * FROM books where id = :id";
$params = [ ":id" => $_GET["id"]];
$book = $db
        ->execute($query, $params)
        ->fetch();

$title = "SHOW";
include "views/show.view.php";
?>