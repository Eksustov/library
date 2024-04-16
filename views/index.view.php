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
    <form method="POST" action="/show?id=<?= $book["id"]?>">
    <button name="id" value="<?= $book["id"] ?>">Show</button>
    </form>
    <form method="POST" action="/delete">
        <button name="id" value="<?= $book["id"] ?>">Delete</button>
    </form>
    </li>
    <?php }?>
</ul>
<?php require "components/footer.php" ?>