<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<div class="auth">
<h2>Login library</h2>
<form class="auth-style" method="POST">
    <label>
        Email: 
        <input name="email" type="email"/>
    </label>
    <label>
        Password:
        <input name="password" type="password"/>
    </label>
    <button class="main">Login</button><form action="/register"><button>Register</button></form>
</form>
<?php
    if (isset($errors["login"])) {?>
        <p class="error"><?= $errors["login"] ?></p>
    <?php };?>
    </div>
<?php if(isset($_SESSION["flash"])) { ?>
    <p><?= $_SESSION["flash"]?></p>
<?php } ?>


<?php require "views/components/footer.php" ?>
<?php require "views/components/footer.php" ?>