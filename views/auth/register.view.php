<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<h2>Register in library</h2>
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
    <button>Register</button>
</form>
<?php
    if (isset($errors["email"])) {?>
        <p><?= $errors["email"] ?></p>
    <?php };
    if (isset($errors["password"])) {?>
        <p><?= $errors["password"] ?></p>
    <?php } ?>

    <a href="/login">Login</a>
<?php require "views/components/footer.php" ?>