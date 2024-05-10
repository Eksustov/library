<?php

require "Core/Database.php";
$config = require("config.php");

$db = new Database($config);

$query = "SELECT * FROM books where id = :id";
$params = [ ":id" => $_POST["book_id"]];
$db = new Database($config);
$book = $db
        ->execute($query, $params)
        ->fetch();

if($_SERVER["REQUEST_METHOD"] == "POST" && $book["availability"] != 0) {
    $query = "UPDATE books SET availability = availability-1 WHERE id = :book_id;
            INSERT INTO borrowed_books (user_id, book_id)
            VALUES (:user_id, :book_id);";
    $params = [ ":user_id" => $_SESSION["user_id"],
                ":book_id" => $_POST["book_id"]];
    $db->execute($query, $params);
}
header("Location: /");
die();
?>