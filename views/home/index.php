<?php include_once __DIR__ . '/../templates/header.php' ?>


<section class="ads-container"></section>

<main class="popular-products">
    <h1 class="popular-products__title title">Popular products</h1>

    <div class="products-slider-container">
        <button type="button" class="arrow" id="arrow-left">
            <img loading="lazy" src="build/img/chevron-compact-left.svg" alt="Arrow left">
        </button>

        <div class="popular-products-slider"></div>

        <button type="button" class="arrow" id="arrow-right">
            <img loading="lazy" src="build/img/chevron-compact-right.svg" alt="Arrow right">
        </button>
    </div>
</main>

<h1 class="title">About</h1>
<section class="info">
    <div class="info__content delivery">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
            <path d="M3 9l4 0" />
        </svg>
        <h2>Free & fast delivery service</h2>
    </div>

    <div class="info__content quality">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M11.46 20.846a12 12 0 0 1 -7.96 -14.846a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3a12 12 0 0 1 -.09 7.06" />
            <path d="M15 19l2 2l4 -4" />
        </svg>
        <h2>High quality products</h2>
    </div>

    <div class="info__content sustainable">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-leaf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 21c.5 -4.5 2.5 -8 7 -10" />
            <path d="M9 18c6.218 0 10.5 -3.288 11 -12v-2h-4.014c-9 0 -11.986 4 -12 9c0 1 0 3 2 5h3z" />
        </svg>
        <h2>Sustainable</h2>
    </div>

    <div class="info__content material-quality">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" />
            <path d="M9 12l2 2l4 -4" />
        </svg>
        <h2>Quality raw materials</h2>
    </div>
</section>

<section class="about">
    <div class="about__content">
        <p class="about__paragraph">We are dedicated to inspiring and empowering your physical well-being through quality supplements and sporting goods. Your success is our mission.</p>
    </div>
</section>

<section class="contact">
    <h2>Any doubts? <a href="/contact" class="link">Contact us</a></h2>
    <div class="overlay"></div>
</section>

<footer class="footer">
    <a href="/" class="footer__logo">
        <img loading="lazy" src="build/img/EvoSportLogo.svg" alt="Companie logo">
    </a>

    <p>All rights reserved EvoSport Nutrition 2024 &#169;</p>
</footer>


<?php $script = '<script type="module" src="build/js/landingPage.js"></script>'; ?>