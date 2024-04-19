<?php

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
};

function auth(){
    if(isset($_SESSION["email"])){
        header("Location: /");
        die();
    }
}

function guest(){
    if(!$_SESSION["email"]){
        header("Location: /login");
        die();
    }
}

?>