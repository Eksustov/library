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


<?php if ($book["availability"] > 0) { ?>         
    <?php if (!isset($_SESSION["email"])) {?>
        <form>
            <button>
                <a href="/login">Login to Borrow</a>
            </button>
        </form>
    <?php } elseif (isset($_SESSION["email"])) {?>
        <form method="POST" action="/borrow">
            <button name="book_id" value="<?= $book["book_id"] ?>">
                Borrow
            </button>
        </form>
    <?php } } else { ?>
            <form>
                <button>Unavailable</button>
            </form>
        <?php } ?>
    <?php if (isset($_SESSION["user_admin"]) && $_SESSION["user_admin"] == 1) {?>
    
        <form>
            <button>
            <a href="/edit?id=<?= $book["book_id"]?>">Edit</a>
            </button>
        </form>

        <form method="POST" action="/delete">
            <button name="book_id" value="<?= $book["book_id"] ?>">Delete</button>
        </form>
    <?php } ?>

    </li>
    <?php } ?>
</ul>
<?php require "components/footer.php"; ?>