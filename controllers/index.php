<?php

$config = require("config.php");
require "Core/Database.php";

$query = "SELECT books.id AS book_id, name, author, date, availability
FROM books ORDER BY book_id;";

$params = [];

$db = new Database($config);
$books = $db
        ->execute($query, $params)
        ->fetchAll();

$query = "SELECT * FROM borrowed_books
        JOIN books ON borrowed_books.book_id = books.id;";
        
        $params = [];
        
        $db = new Database($config);
        $borrowed_books = $db
                ->execute($query, $params)
                ->fetchAll();
      
    $title = "KATALOGS";
    include "views/index.view.php";
?>