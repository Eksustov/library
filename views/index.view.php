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

        <?php if ($book["availability"] > 0) {?>
            <form method="POST" action="/borrow?id=<?= $book["book_id"]?>">
                <button name="book_id" value="<?= $book["book_id"] ?>">Borrow</button>
            </form>
        <?php } elseif ($book["availability"] <= 0) { ?>
            <form>
                <button>Unavailable</button>
            </form>
        <?php } elseif ($book["user_id"] == $_SESSION["user_id"] && $book["book_id"] == $book["id"]){?>
            <form method="POST" action="/return?id=<?= $book["book_id"]?>">
                <button name="book_id" value="<?= $book["book_id"] ?>">Return</button>
            </form>
        <?php } ?> 

    <?php if (isset($_SESSION["user_admin"]) && $_SESSION["user_admin"] == 1) {?>
    
        <form method="POST" action="/edit?id=<?= $book["book_id"]?>">
            <button name="book_id" value="<?= $book["book_id"] ?>">Edit</button>
        </form>

        <form method="POST" action="/delete">
            <button name="book_id" value="<?= $book["book_id"] ?>">Delete</button>
        </form>
    <?php } ?>

    </li>
    <?php } ?>
</ul>
<?php require "components/footer.php" ?>