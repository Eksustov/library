<?php
admin();

require "Core/Database.php";
$config = require("config.php");

$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "DELETE FROM books where id = :id";
    $params = [ ":id" => $_POST["book_id"]];
    $db->execute($query, $params);
}

header("Location: /");
die();
?>