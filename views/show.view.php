<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<h1>SHOW</h1>
<h2><?= htmlspecialchars($book["name"]) 
." / ".
htmlspecialchars($book["author"])
." / ".
htmlspecialchars($book["date"])
." / ".
htmlspecialchars($book["availability"])?></h2>
<a href="/edit?id=<?= $_GET["id"]?>">Edit...</a>
<?php require "views/components/footer.php" ?>