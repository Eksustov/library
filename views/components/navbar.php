<header>
        <nav>
            <a href="/">Katalogs</a>

            <?php if (isset($_SESSION["email"])) { ?>
                <a href="/create">Add a Book</a>
            <?php } ?>

            <?php if (!isset($_SESSION["email"])) { ?>
                <button><a href="/login">Login</a></button>
            <?php } else { ?>
                <form action="/logout" method="POST">
                    <button>Logout</button>
            <?php }; ?>

        </nav>
</header>
<main>