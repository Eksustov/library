<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<h1> Add a book </h1>
<form method="POST">
    <label>Name:
        <input name="name" value='<?= htmlspecialchars(($_POST["name"] ?? "" )) ?>'/>
    </label>
    <label>Author:
        <input name="author" value='<?= htmlspecialchars(($_POST["author"] ?? "" )) ?>'/>
    </label>
    <label>Date:
        <input type="date" name="date" value='<?= htmlspecialchars(($_POST["date"] ?? "" )) ?>'/>
    </label>
    <label>availability:
        <input type="number" name="availability" value='<?= htmlspecialchars(($_POST["availability"] ?? "" )) ?>'/>
    </label>
    <button>Save</button>
    <?php if (isset($errors["name"])) {?>
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