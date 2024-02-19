<header class="header">
    <div class="menu">
        <div class="bar-top not-active"></div>
        <div class="bar-middle not-active"></div>
        <div class="bar-bottom not-active"></div>

        <section class="drop-menu hidden">
            <a href="/products" class="drop-menu__link">All products</a>
            <a href="/account" class="drop-menu__link">Your account</a>
            <a href="/log-out" class="drop-menu__link">Log out</a>
        </section>
    </div>
    <a href="/" class="header__logo">
        <img loading="lazy" src="build/img/EvoSportLogo.svg" alt="Companie logo">
    </a>
    <div class="actions">
        <a href="/shopping-basket">
            <img loading="lazy" class="header__logo" src="build/img/shopping-basket.svg" alt="Shopping basket logo button">
        </a>
        <?php if (!empty($_SESSION['name'])) : ?>
            <a href="/account">
                <img loading="lazy" class="header__logo" src="build/img/user-logo.svg" alt="Shopping basket logo button">
            </a>
        <?php else : ?>
            <a href="/login" class="login-button button">Log in</a>
        <?php endif; ?>
    </div>
</header>