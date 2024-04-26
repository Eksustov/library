<header>
        <nav>
            <form>
                <button action="/">Katalogs</button>
            </form>

            <?php if (isset($_SESSION["user_admin"])) {
                if ($_SESSION["user_admin"] == 1) { ?>
                    <form action="/create">
                        <button>Add a Book</button>
                    </form>
            <?php } }?>

            <?php if (!isset($_SESSION["email"])) { ?>
                <form action="/login">
                    <button>Login</button>
                </form>
            <?php } else { ?>
                <form action="/logout" method="POST">
                    <button>Logout</button>
                </form>
            <?php }; ?>

        </nav>
</header>
<main>