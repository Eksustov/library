<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<h1> Edit book </h1>
<form method="POST">
    <label>Name:
        <input name="name" value='<?=$book["name"] ?? $_POST["name"]?>'/>
    </label>
    <label>Author:
        <input name="author" value='<?=$book["author"] ?? $_POST["author"]?>'/>
    </label>
    <label>Date:
        <input type="date" name="date" value='<?=$book["date"] ?? $_POST["date"]?>'/>
    </label>
    <label>Availability:
        <input type="number" name="availability" value='<?=$book["availability"] ?? $_POST["availability"]?>'/>
    </label>
    <button>Save</button>
    <?php 
        if (isset($errors["name"])) {?>
            <p><?= $errors["name"] ?></p>
        <?php } ?>
        <?php if (isset($errors["author"])) {?>
            <p><?= $errors["author"] ?></p>
        <?php } ?>
        <?php if (isset($errors["date"])) {?>
            <p><?= $errors["date"] ?></p>
        <?php } ?>
        <?php if (isset($errors["availability"])) {?>
            <p><?= $errors["availability"] ?></p>
        <?php } ?>
</form>

<?php require "views/components/footer.php" ?>