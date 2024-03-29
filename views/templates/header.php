<header class="header">
    <input type="hidden" class="userId" name="id" data-id="<?php echo $_SESSION['id'] ?? '' ?>">
    <div class="menu">
        <div class="bar-top not-active"></div>
        <div class="bar-middle not-active"></div>
        <div class="bar-bottom not-active"></div>

        <section class="drop-menu hidden">
            <a href="/products" class="drop-menu__link">All products</a>
            <?php if (!empty($_SESSION['name'])) : ?>
                <a href="/account" class="drop-menu__link">Your account</a>
                <a href="/logout" class="drop-menu__link">Log out</a>
            <?php else : ?>
                <a href="/login" class="drop-menu__link">Log in</a>
            <?php endif; ?>
        </section>
    </div>
    <a href="/" class="header__logo">
        <img loading="lazy" src="build/img/EvoSportLogo.svg" alt="Companie logo">
    </a>
    <div class="actions">
        <?php if (!empty($_SESSION)) : ?>
            <a href="/account#shopping-basket">
                <img loading="lazy" class="header__logo" src="build/img/shopping-basket.svg" alt="Shopping basket logo button">
            </a>
            <?php if ($_SESSION['admin'] == 1) : ?>
                <a class="button" href="/admin" class="drop-menu__link">Admin panel</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (!empty($_SESSION['name'])) : ?>
            <a href="/account">
                <?php
                include_once __DIR__ . '/profile-image.php';
                ?>
            </a>
        <?php else : ?>
            <a href="/login" class="login-button button">Log in</a>
        <?php endif; ?>
    </div>
</header>