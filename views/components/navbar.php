<header>
        <nav>
            <a href="/">Katalogs</a>

            <?php if (isset($_SESSION["user_admin"])) {
                if ($_SESSION["user_admin"] == 1) { ?>
                    <a href="/create">Add a Book</a>
            <?php } }?>

            <?php if (!isset($_SESSION["email"])) { ?>
                <button><a href="/login">Login</a></button>
            <?php } else { ?>
                <form action="/logout" method="POST">
                    <button>Logout</button>
                </form>
            <?php }; ?>

        </nav>
</header>
<main>