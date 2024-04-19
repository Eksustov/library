<?php

$config = require("config.php");

require "Core/Database.php";

$query = "SELECT * FROM books";
$params = [];

$db = new Database($config);
$books = $db
        ->execute($query, $params)
        ->fetchAll();

    $title = "KATALOGS";
    include "views/index.view.php";
?>