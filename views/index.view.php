<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>
<h2>Katalogs</h2>
<ul>
    <?php foreach($books as $book) {?>
    <li><?= htmlspecialchars($book["name"])
        ." / ".
        htmlspecialchars($book["author"])
        ." / ".
        htmlspecialchars($book["date"])
        ." / ".
        htmlspecialchars($book["availability"])?>

    <?php if (isset($_SESSION["user_id"])) {?>
        <form method="POST" action="/return?id=<?= $book["id"]?>">
            <button name="id" value="<?= $book["id"] ?>">Return</button>
        </form>
    <?php } else { ?>
        <form method="POST" action="/borrow?id=<?= $book["id"]?>">
            <button name="id" value="<?= $book["id"] ?>">Borrow</button>
        </form>
    <?php } ?>

    <?php if (isset($_SESSION["user_admin"]) && $_SESSION["user_admin"] == 1) {?>
    
        <form method="POST" action="/edit?id=<?= $book["id"]?>">
            <button name="id" value="<?= $book["id"] ?>">Edit</button>
        </form>

        <form method="POST" action="/delete">
            <button name="id" value="<?= $book["id"] ?>">Delete</button>
        </form>
    <?php } ?>

    </li>
    <?php }?>
</ul>
<?php require "components/footer.php" ?>