<?php
return $routes = [
    "/" =>"controllers/index.php",

    "/create" =>"controllers/books/create.php",
    "/delete" => "controllers/books/delete.php",
    "/edit" => "controllers/books/edit.php",

    "/login" =>"controllers/auth/login.php",
    "/logout" =>"controllers/auth/logout.php",
    "/register" =>"controllers/auth/register.php"
];