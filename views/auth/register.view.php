<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<div class="auth">
<h2>Register in library</h2>
<form method="POST" class="auth-style">
    <label>
        Email: 
        <input name="email" type="email"/>
    </label>
    <label>
        Password:
        <input name="password" type="password"/>
        <span class="explanation">(Jābūt vismaz 8 rakstzīmēm, 1 lielam, 1 mazam burtam, 1 skaitlis, 1 simbols)</span>
    </label>
    <button class="main">Register</button>
</form>
</div>
<?php
    if (isset($errors["email"])) {?>
        <p class="error"><?= $errors["email"] ?></p>
    <?php };
    if (isset($errors["password"])) {?>
        <p class="error"><?= $errors["password"] ?></p>
    <?php } ?>

    <form action="/login"><button>Login</button></form>
<?php require "views/components/footer.php" ?>