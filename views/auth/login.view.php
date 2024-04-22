<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<h2>Login library</h2>
<form method="POST">
    <label>
        Email: 
        <input name="email" type="email"/>
    </label>
    <label>
        Password:
        <input name="password" type="password"/>
        <span class="explanation">(Jābūt vismaz 8 rakstzīmēm, 1 lielam, 1 mazam burtam, 1 skaitlis, 1 simbols)</span>
    </label>
    <button>Login</button>
</form>
<?php
    if (isset($errors["login"])) {?>
        <p class="error"><?= $errors["login"] ?></p>
    <?php };?>

<?php if(isset($_SESSION["flash"])) { ?>
    <p><?= $_SESSION["flash"]?></p>
<?php } ?>

<a href="/register">Register</a>

<?php require "views/components/footer.php" ?>
<?php require "views/components/footer.php" ?>