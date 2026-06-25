<script src="../splide/node_modules/@splidejs/splide/dist/css/splide.min.css"></script>
<link rel="stylesheet" href="splide/node_modules/@splidejs/splide/dist/css/splide.min.css">
<script src="splide/node_modules/@splidejs/splide/dist/js/splide.min.js"></script>

<div class="splide" role="group" style="height: 350px;">
    <div class="splide__track">
        <ul class="splide__list" style="transform: 0;">
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/logo.png"></div>
            </li>
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/banners/moral_em_casa.jpg"></div>
            </li>
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/banners/banner1.jpg"></div>
            </li>
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/banners/banner2.jpg"></div>
            </li>
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/banners/banner3.jpg"></div>
            </li>
            <li class="splide__slide">
                <div class="img"><img loading="lazy" src="images/banners/banner4.jpg"></div>
            </li>
        </ul>
    </div>
</div>


<script>
    var splide = new Splide('.splide', {
        type: 'loop',
        autoplay: true,
    });
    splide.mount();
</script>

<style>
    .splide {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
        height: 350px;
    }

    .splide__slide {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .splide__slide img {
        max-width: 100%;
        height: 100%;
        border-radius: 5px;
    }

    @media (max-width: 992px) {
        .splide {
            height: 280px !important;
        }
    }

    @media (max-width: 768px) {
        .splide {
            height: 220px !important;
        }
    }

    @media (max-width: 480px) {
        .splide {
            height: 180px !important;
        }
    }
</style>