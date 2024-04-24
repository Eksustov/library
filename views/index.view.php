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

        <?php foreach($borrowed_books as $borrowed_book) { ?>

        <?php if ($book["availability"] > 0) {
            
            if ($_SESSION["user_id"] !== $borrowed_book["user_id"]) {?>
                <form>
                    <button>
                        <a href="/borrow?id=<?= $book["book_id"]?>">Borrow</a>
                    </button>
                </form>
            <?php } elseif ($borrowed_book["user_id"] == $_SESSION["user_id"] && $borrowed_book["book_id"] == $book["book_id"]) {?>
                <form>
                    <button >
                        <a href="/return?id=<?= $book["book_id"]?>"> Return </a>
                    </button>
                </form>
            <?} } else { ?>
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
    <?php } }; }?>
</ul>
<?php require "components/footer.php"; ?>