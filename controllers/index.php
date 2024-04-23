<?php

$config = require("config.php");

require "Core/Database.php";

$query = "SELECT books.id AS book_id, name, author, date, availability
FROM books
LEFT JOIN borrowed_books ON books.id = borrowed_books.book_id
ORDER BY book_id;";

$params = [];

$db = new Database($config);
$books = $db
        ->execute($query, $params)
        ->fetchAll();
        
    $title = "KATALOGS";
    include "views/index.view.php";
?>