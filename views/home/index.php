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
        <img src="build/img/EvoSportLogo.svg" alt="Companie logo">
    </a>
    <img class="header__shopping-basket" src="build/img/shopping-basket.svg" alt="Shopping basket logo button">
</header>

<section class="ads-container"></section>

<section class="popular-products">
    <h1 class="popular-products__title">Popular products</h1>

    <div class="products-container">
        <button type="button" class="arrow" id="arrow-left">
            <img src="build/img/chevron-compact-left.svg" alt="Arrow left">
        </button>

        <div class="products"></div>

        <button type="button" class="arrow" id="arrow-right">
            <img src="build/img/chevron-compact-right.svg" alt="Arrow right">
        </button>
    </div>
</section>

<?php $script = '<script src="build/js/app.js"></script>'; ?>