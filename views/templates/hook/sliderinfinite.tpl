<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>

<div class="container my-1">
    <div class="row">
        <div class="splide" role="group" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    {foreach from=$images item=image}
                        <li class="splide__slide">
                        <a href={$image} class="image-link">
                            <img src={$image} alt="Image du slider module mirroir">
                        </a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Splide !== 'undefined') {
            const splide = new Splide('.splide', {
                type: 'loop',
                drag: 'free',
                focus: 'center',
                permove: 1,
                autoWidth: true,
                arrows: false,
                pagination: false,
                lazyLoad: 'nearby',
                gap: 2,
                autoScroll: {
                    speed: 0.5,
                },
            });
        splide.mount(window.splide.Extensions);
        } else {
            console.error("Splide n'est pas défini");
        }
    });
</script>