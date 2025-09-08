<?php

/**
 * Template Name: Home
 */

$body_class = "font-en page-index has-headerbuy header-black";

get_header();
?>

<div class="header-buy fixed top-0 right-0 left-0 bg-red text-white z-1000 text-center flex justify-center items-center text-20">
    <div class="wrap">
        <div class="max-w-1520 mx-auto">
            Contact us for <a href="/contact-us/" class="underline font-700">FREE SAMPLES</a> and enjoy an extra 3% bonus on your first order (valid until 12/31)!
        </div>
    </div>

    <span class="header-buy-close js-close-headerbuy absolute right-20">
        <svg>
            <use xlink:href="#icon-close"></use>
        </svg>
    </span>
</div>

<main>

    <!-- Banner -->
    <div class="index-banner">

        <!-- PC 3840*1920 M 1500*1800 -->
        <!-- banner可自定义文字颜色（黑色、白色） -->
        <div class="splide js-splide-ib" role="group" aria-label="Banner" data-splide='{"type": "loop", "arrows": false, "pagination": false, "autoplay": true,"interval": 4000}'>
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="ib-item">
                            <div class="ib-item__img img-box">
                                <picture>
                                    <source media="(min-width: 751px)" srcset="upload/index/banner_01.jpg">
                                    <img class="absolute top-0 left-0 w-full h-full object-cover" src="upload/index/banner_01m.jpg" alt="">
                                </picture>
                            </div>
                            <div class="ib-item__wrap absolute inset-0 flex items-center">
                                <div class="w-full">
                                    <div class="wrap">
                                        <div class="max-w-1520 mx-auto">
                                            <div class="">
                                                <h3 class="text-68 font-700 leading-12">Hardware<br>Marketing<br>Strategy<br><span class="text-red">We're All In.</span></h3>
                                                <div class="text-24 leading-125 font-700 mt-20">Vape Business Solution Provider</div>
                                                <a href="" class="text-16 inline-block learn-more bg-red text-white mt-40">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="ib-item">
                            <div class="ib-item__img img-box">
                                <picture>
                                    <source media="(min-width: 751px)" srcset="upload/index/banner_02.jpg">
                                    <img class="absolute top-0 left-0 w-full h-full object-cover" src="upload/index/banner_01m.jpg" alt="">
                                </picture>
                            </div>
                            <div class="ib-item__wrap absolute inset-0 flex items-center">
                                <div class="w-full">
                                    <div class="wrap">
                                        <div class="max-w-1520 mx-auto">
                                            <div>
                                                <h3 class="text-68 font-700 leading-12"><span class="text-red">Proteus Series</span></h3>
                                                <div class="text-24 leading-125 font-700 mt-20">ARTRIX Technology, Incredible Experience</div>
                                                <a href="" class="text-16 inline-block learn-more bg-red text-white mt-40">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="ib-item">
                            <div class="ib-item__img img-box">
                                <picture>
                                    <source media="(min-width: 751px)" srcset="upload/index/banner_03.jpg">
                                    <img class="absolute top-0 left-0 w-full h-full object-cover" src="upload/index/banner_01m.jpg" alt="">
                                </picture>
                            </div>
                            <div class="ib-item__wrap absolute inset-0 flex items-center">
                                <div class="w-full">
                                    <div class="wrap">
                                        <div class="max-w-1520 mx-auto">
                                            <div>
                                                <h3 class="text-68 font-700 leading-12"><span class="text-white">Proteus Series</span></h3>
                                                <div class="text-24 leading-125 font-700 mt-20"><span class="text-white">ARTRIX Technology, Incredible Experience</span></div>
                                                <a href="" class="text-16 inline-block learn-more border text-white mt-40">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="ib-item">
                            <div class="ib-item__img img-box">
                                <picture>
                                    <source media="(min-width: 751px)" srcset="upload/index/banner_01.jpg">
                                    <img class="absolute top-0 left-0 w-full h-full object-cover" src="upload/index/banner_01m.jpg" alt="">
                                </picture>
                            </div>
                            <div class="ib-item__wrap absolute inset-0 flex items-center">
                                <div class="w-full">
                                    <div class="wrap">
                                        <div class="max-w-1520 mx-auto">
                                            <div class="">
                                                <h3 class="text-68 font-700 leading-12">Hardware<br>Marketing<br>Strategy<br><span class="text-red">We're All In.</span></h3>
                                                <div class="text-24 leading-125 font-700 mt-20">Vape Business Solution Provider</div>
                                                <a href="" class="text-16 inline-block learn-more bg-red text-white mt-40">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="absolute right-0 bottom-60 left-0">
            <div class="wrap">
                <div class="max-w-1520 mx-auto">
                    <div class="ib-tab txt-16 flex flex-wrap gap-30 leading-15">
                        <span class="current">About ARTRIX</span>
                        <span>Our Products</span>
                        <span>Exclusive Product Service</span>
                        <span>ODM Solutions</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Proucts -->
    <div class="py-140">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">

                <!-- 1490*1300 -->
                <div class="index-products flex flex-wrap items-start gap-30">

                    <div class="ipro-item relative">
                        <div class="ipro-item__img img-box">
                            <img class="lazy" src="assets/images/placeholder.png" data-src="upload/index/ipro_01.jpg" alt="">
                        </div>
                        <div class="ipro-item__tag absolute top-30 right-30 text-14 leading-2 text-gray">Disposable</div>
                        <div class="ipro-item__intro absolute bottom-30 left-30">
                            <h3 class="text-24 leading-125 font-700">Product Name</h3>
                            <div class="text-16 leading-15 mt-10">
                                Product positioning description
                            </div>
                        </div>
                    </div>
                    <div class="ipro-item relative">
                        <div class="ipro-item__img img-box">
                            <img src="upload/index/ipro_02.jpg" alt="">
                        </div>
                        <div class="ipro-item__tag absolute top-30 right-30 text-14 leading-2 text-gray">Pod</div>
                        <div class="ipro-item__intro absolute bottom-30 left-30">
                            <h3 class="text-24 leading-125 font-700">Product Name</h3>
                            <div class="text-16 leading-15 mt-10">
                                Product positioning description
                            </div>
                        </div>
                    </div>
                    <div class="ipro-item relative">
                        <div class="ipro-item__img img-box">
                            <img src="upload/index/ipro_03.jpg" alt="">
                        </div>
                        <div class="ipro-item__tag absolute top-30 right-30 text-14 leading-2 text-gray">510 Battery</div>
                        <div class="ipro-item__intro absolute bottom-30 left-30">
                            <h3 class="text-24 leading-125 font-700">Product Name</h3>
                            <div class="text-16 leading-15 mt-10">
                                Product positioning description
                            </div>
                        </div>
                    </div>
                    <div class="ipro-item relative">
                        <div class="ipro-item__img img-box">
                            <img src="upload/index/ipro_04.jpg" alt="">
                        </div>
                        <div class="ipro-item__tag absolute top-30 right-30 text-14 leading-2 text-gray">510 Cart</div>
                        <div class="ipro-item__intro absolute bottom-30 left-30">
                            <h3 class="text-24 leading-125 font-700">Product Name</h3>
                            <div class="text-16 leading-15 mt-10">
                                Product positioning description
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>

    <!-- Where -->
    <div class="pt-140 bg-lightgray">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <div class="text-center">
                    <div class="inline-flex flex-wrap justify-center items-center gap-20">
                        <h2 class="text-48 font-700 leading-12">Hardware, Marketing, Strategy <span class="text-red">We're All In.</span></h2>
                        <span class="btn-video js-layer-video text-48 bg-red" data-url="upload/media/video.mp4"></span>
                    </div>
                </div>

                <!-- ?*540 透明底 PNG -->
                <div class="splide js-splide-iwhere mt-40" role="group" aria-label="Image" data-splide='{"type": "loop", "arrows": false, "pagination": false}'>
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="iwhere-item">
                                    <div class="relative">
                                        <h3 class="iwhere-item__title font-700 text-red">Hardware</h3>
                                        <div class="iwhere-item__img mx-auto img-box">
                                            <img src="upload/index/where_01.png" alt="">
                                        </div>
                                    </div>

                                    <div class="max-w-900 mx-auto text-24 leading-125 font-700 text-center mt-30">
                                        Integrating Artrix 3-in-1 services into your existing business growth program is not just about adding a few more product or technology solutions.
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="iwhere-item">
                                    <div class="relative">
                                        <h3 class="iwhere-item__title font-700 text-red">Marketing</h3>
                                        <div class="iwhere-item__img mx-auto img-box">
                                            <img src="upload/index/where_01.png" alt="">
                                        </div>
                                    </div>
                                    <div class="max-w-900 mx-auto text-24 leading-125 font-700 text-center mt-30">
                                        Integrating Artrix 3-in-1 services into your existing business growth program is not just about adding a few more product or technology solutions.
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="iwhere-item">

                                    <div class="relative">
                                        <h3 class="iwhere-item__title font-700 text-red">Strategy</h3>
                                        <div class="iwhere-item__img mx-auto img-box">
                                            <img src="upload/index/where_01.png" alt="">
                                        </div>
                                    </div>

                                    <div class="max-w-900 mx-auto text-24 leading-125 font-700 text-center mt-30">
                                        Integrating Artrix 3-in-1 services into your existing business growth program is not just about adding a few more product or technology solutions.
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="iwhere-tab-box max-w-900 mx-auto mt-80 relative">
                    <div class="iwhere-tab flex justify-between py-15 bg-white px-100">
                        <div class="iwheret-item flex items-end gap-10">
                            <img src="upload/index/iwhere_01s.png" alt="" class="iwheret-item__img">
                            <div class="iwheret-item__intro opacity-40">
                                <p class="text-14">01</p>
                                <h3 class="iwheret-item__title text-16 font-700 pb-10">Hardware</h3>
                            </div>
                        </div>
                        <div class="iwheret-item flex items-end gap-10 current">
                            <img src="upload/index/iwhere_02s.png" alt="" class="iwheret-item__img">
                            <div class="iwheret-item__intro opacity-40">
                                <p class="text-14">02</p>
                                <h3 class="iwheret-item__title text-16 font-700 pb-10">Marketing</h3>
                            </div>
                        </div>
                        <div class="iwheret-item flex items-end gap-10">
                            <img src="upload/index/iwhere_03s.png" alt="" class="iwheret-item__img">
                            <div class="iwheret-item__intro opacity-40">
                                <p class="text-14">03</p>
                                <h3 class="iwheret-item__title text-16 font-700 pb-10">Strategy</h3>
                            </div>
                        </div>
                    </div>
                    <div class="iwhere-tab-line absolute bottom-0 right-0 left-0 h-1 bg-border"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Technology -->
    <div class="py-140">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">

                <!-- 1500*1400 -->
                <!-- 有一个或多个视频 -->
                <div class="splide-itech-box pr-60 relative" data-lenis-prevent>
                    <div class="splide js-splide-itech" role="group" aria-label="" data-splide='{"arrows": false, "pagination": false}'>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="itech-item flex flex-wrap justify-between items-center">
                                        <div class="itech-left">
                                            <p class="text-24 leading-125 font-700">Our core technology1</p>
                                            <h3 class="text-68 font-700 leading-12 text-red mt-20">Product Quality Standard System</h3>
                                            <div class="text-20 leading-14 mt-30">
                                                Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                            </div>
                                        </div>
                                        <div class="itech-poster img-box">
                                            <img src="upload/index/technology.jpg" alt="">
                                            <span class="absolute ico-video js-layer-video text-48 text-red" data-url="upload/media/video.mp4">
                                                <svg>
                                                    <use xlink:href="#icon-video"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="itech-item flex flex-wrap justify-between items-center">
                                        <div class="itech-left">
                                            <p class="text-24 leading-125 font-700">Our core technology2</p>
                                            <h3 class="text-68 font-700 leading-12 text-red mt-20">Product Quality Standard System</h3>
                                            <div class="text-20 leading-14 mt-30">
                                                Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                            </div>
                                        </div>
                                        <div class="itech-poster img-box">
                                            <img src="upload/index/technology.jpg" alt="">
                                            <span class="absolute ico-video js-layer-video text-48 text-red" data-url="upload/media/video.mp4">
                                                <svg>
                                                    <use xlink:href="#icon-video"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="itech-item flex flex-wrap justify-between items-center">
                                        <div class="itech-left">
                                            <p class="text-24 leading-125 font-700">Our core technology3</p>
                                            <h3 class="text-68 font-700 leading-12 text-red mt-20">Product Quality Standard System</h3>
                                            <div class="text-20 leading-14 mt-30">
                                                Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                            </div>
                                        </div>
                                        <div class="itech-poster img-box">
                                            <img src="upload/index/technology.jpg" alt="">
                                            <span class="absolute ico-video js-layer-video text-48 text-red" data-url="upload/media/video.mp4">
                                                <svg>
                                                    <use xlink:href="#icon-video"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="itechbox-line absolute right-0 text-16 text-gray">
                        <span class="itechbox-now js-itechbox-now absolute">01</span>
                        <span class="itechbox-sum js-itechbox-sum absolute">03</span>
                        <div class="itechbox-line-bg bg-lightgray relative">
                            <span class="itechbox-line-progress js-itechbox-progress bg-red absolute"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- System -->
    <div>
        <div class="wrap">
            <div class="max-w-1520 mx-auto">

                <h2 class="text-68 text-red font-700 leading-12 text-center">Featured Solutions & Resources</h2>

                <div class="index-system relative bg-lightgray px-60 py-40 mt-60">

                    <!-- PC 1960*1200 M 980*600-->

                    <div class="splide js-splide-isys" role="group" aria-label="Image" data-splide='{"type": "loop", "arrows": false, "pagination": false}'>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="isys-item relative">

                                        <div class="isys-item__img img-box mr-0 ml-auto">
                                            <picture>
                                                <source media="(max-width: 750px)" srcset="upload/index/system_m.jpg">
                                                <img class="absolute top-0 left-0 w-full h-full object-cover" src="upload/index/system.jpg" alt="">
                                            </picture>
                                        </div>

                                        <div class="isys-item__intro absolute z-10 top-0 right-0 bottom-0 left-0 flex items-center">
                                            <div class="w-full">
                                                <div class="max-w-480">
                                                    <h3 class="text-36 leading-125 font-700">Artrix Product Quality Standard System</h3>
                                                    <div class="text-20 leading-15 mt-20">
                                                        Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="isys-item relative">

                                        <div class="isys-item__img img-box mr-0 ml-auto">
                                            <img src="upload/index/system.jpg" alt="">
                                        </div>
                                        <div class="isys-item__intro absolute z-10 top-0 right-0 bottom-0 left-0 flex items-center">
                                            <div class="w-full">
                                                <div class="max-w-480">
                                                    <h3 class="text-36 leading-125 font-700">Artrix Product Quality Standard System</h3>
                                                    <div class="text-20 leading-15 mt-20">
                                                        Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="isys-item relative">

                                        <div class="isys-item__img img-box mr-0 ml-auto">
                                            <img src="upload/index/system.jpg" alt="">
                                        </div>
                                        <div class="isys-item__intro absolute z-10 top-0 right-0 bottom-0 left-0 flex items-center">
                                            <div class="w-full">
                                                <div class="max-w-480">
                                                    <h3 class="text-36 leading-125 font-700">Artrix Product Quality Standard System</h3>
                                                    <div class="text-20 leading-15 mt-20">
                                                        Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li class="splide__slide">

                                    <div class="isys-item relative">

                                        <div class="isys-item__img img-box mr-0 ml-auto">
                                            <img src="upload/index/system.jpg" alt="">
                                        </div>
                                        <div class="isys-item__intro absolute z-10 top-0 right-0 bottom-0 left-0 flex items-center">
                                            <div class="w-full">
                                                <div class="max-w-480">
                                                    <h3 class="text-36 leading-125 font-700">Artrix Product Quality Standard System</h3>
                                                    <div class="text-20 leading-15 mt-20">
                                                        Elevate your product's identity and quality with Artrix Product Quality Standard System that maximizes manufacturing precision and structural stability.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="isys-tab flex flex-wrap gap-x-30 text-16 leading-15 text-gray mt-40">
                        <span class="current">Product System</span>
                        <span>Marketing Supports</span>
                        <span>Strategy Consulting</span>
                        <span>Industry Reports</span>
                    </div>

                    <div class="splide__arrows partnership__arrows">
                        <button class="isys-prev power-arrow power-prev" type="button" aria-label="Go to last slide" aria-controls="splide04-track"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false">
                                <path d="M16,14.2l8,5.8l-8,5.8V14.2z"></path>
                            </svg></button>
                        <button class="isys-next power-arrow power-next" type="button" aria-label="Next slide" aria-controls="splide04-track"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false">
                                <path d="M16,14.2l8,5.8l-8,5.8V14.2z"></path>
                            </svg></button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Case Study -->
    <div class="page-part py-120 bg-lightgray mt-120">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <h2 class="sec-title text-100 font-en font-700 leading-1 text-red uppercase text-center" data-aos="fadeup-small">Case Study</h2>
                <div class="cstudy-box flex justify-between gap-x-40 mt-60" data-aos="fadeup-small" data-aos-delay="300">

                    <!-- 740*390 -->
                    <div class="cstudy-left">
                        <a href="javascript:;" class="cstudy-item">
                            <div class="cstudyl-img img-box overflow-hidden">
                                <img src="upload/odm/case_01.webp" alt="">
                            </div>
                            <div class="cstudyl-intro relative bg-white">
                                <div class="cstudyl-wrap absolute inset-0 px-50 py-40 flex flex-col justify-between">
                                    <div class="cstudyl-info">
                                        <p class="cstudy-item__date text-16 leading-1 text-red">2 December 2021</p>
                                        <h3 class="cstudy-item__title text-24 font-700 leading-125 mt-20 line-clamp-2 text-red">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                        <div class="cstudy-item__desc text-16 leading-15 text-gray mt-20 line-clamp-2">Hear stories from students, graduates and teachers of M-PESA Foundation Academy, a state-of-the-art, residential high school based in Kenya.</div>
                                    </div>
                                    <div>
                                        <div class="link-more inline-flex justify-center items-center text-16 text-red gap-x-10">
                                            <span>Read More</span><svg>
                                                <use xlink:href="#icon-right"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- 370*350 -->
                    <div class="cstudy-right flex flex-wrap gap-y-40">
                        <a href="javascript:;" class="cstudy-item flex justify-between w-full">
                            <div class="cstudy-item__img w-1/2 img-box overflow-hidden">
                                <img src="upload/odm/case_02.webp" alt="">
                            </div>
                            <div class="cstudy-item__intro flex relative flex-col justify-between w-1/2 bg-white py-40 pl-50 pr-40">
                                <div class="cstudy-item__info">
                                    <p class="cstudy-item__date text-16 leading-1 text-red">2 December 2021</p>
                                    <h3 class="cstudy-item__title text-24 font-700 leading-125 mt-20 line-clamp-4 text-red">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                </div>
                                <div>
                                    <div class="link-more inline-flex justify-center items-center text-16 text-red gap-x-10">
                                        <span>Read More</span><svg>
                                            <use xlink:href="#icon-right"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:;" class="cstudy-item flex justify-between w-full">
                            <div class="cstudy-item__img w-1/2 img-box overflow-hidden">
                                <img src="upload/odm/case_03.webp" alt="">
                            </div>
                            <div class="cstudy-item__intro relative flex flex-col justify-between w-1/2 bg-white py-40 pl-50 pr-40">
                                <div class="cstudy-item__info">
                                    <p class="cstudy-item__date text-16 leading-1 text-red">2 December 2021</p>
                                    <h3 class="cstudy-item__title text-24 font-700 leading-125 mt-20 line-clamp-4 text-red">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                </div>

                                <div>
                                    <div class="link-more inline-flex justify-center items-center text-16 text-red gap-x-10">
                                        <span>Read More</span><svg>
                                            <use xlink:href="#icon-right"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="py-120">
        <div class="wrap">
            <div class="max-w-1520 mx-auto">
                <h2 class="text-68 text-red text-center font-700 leading-12">Artrix Voice</h2>
                <!-- 480*480 -->
                <ul class="list list-blog flex flex-wrap mt-40">
                    <li>
                        <a href="blog-details.shtml" class="blog-item">
                            <div class="blog-item__img img-box">
                                <img src="upload/page/blog_01.jpg" alt="">
                                <span class="blog-item__cate absolute top-20 left-20 text-14 text-white leading-2">News & Releases</span>
                            </div>
                            <div class="blog-item__intro mt-40">
                                <div class="text-16 text-red">
                                    <span>By Susie</span> ｜ <span>2 December 2021</span>
                                </div>
                                <h3 class="blog-item__title text-24 font-700 leading-125 text-black mt-20 line-clamp-3">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                <div class="blog-item__desc text-16 leading-15 text-gray mt-20 line-clamp-3">
                                    Hear stories from students, graduates and teachers of M-PESA Foundation Academy, a state-of-the-art, residential high school based in Kenya.
                                </div>
                                <div class="blog-item__tag flex flex-wrap text-12 leading-2 font-500 mt-30 text-red">
                                    <span>keyword 1</span><span>keyword 2</span><span>keyword 3</span><span>keyword 4</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="blog-details.shtml" class="blog-item">
                            <div class="blog-item__img img-box">
                                <img src="upload/page/blog_01.jpg" alt="">
                                <span class="blog-item__cate absolute top-20 left-20 text-14 text-white leading-2">News & Releases</span>
                            </div>
                            <div class="blog-item__intro mt-40">
                                <div class="text-16 text-red">
                                    <span>By Susie</span> ｜ <span>2 December 2021</span>
                                </div>
                                <h3 class="blog-item__title text-24 font-700 leading-125 text-black mt-20 line-clamp-3">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                <div class="blog-item__desc text-16 leading-15 text-gray mt-20 line-clamp-3">
                                    Hear stories from students, graduates and teachers of M-PESA Foundation Academy, a state-of-the-art, residential high school based in Kenya.
                                </div>
                                <div class="blog-item__tag flex flex-wrap text-12 leading-2 font-500 mt-30 text-red">
                                    <span>keyword 1</span><span>keyword 2</span><span>keyword 3</span><span>keyword 4</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="blog-details.shtml" class="blog-item">
                            <div class="blog-item__img img-box">
                                <img src="upload/page/blog_01.jpg" alt="">
                                <span class="blog-item__cate absolute top-20 left-20 text-14 text-white leading-2">News & Releases</span>
                            </div>
                            <div class="blog-item__intro mt-40">
                                <div class="text-16 text-red">
                                    <span>By Susie</span> ｜ <span>2 December 2021</span>
                                </div>
                                <h3 class="blog-item__title text-24 font-700 leading-125 text-black mt-20 line-clamp-3">M-PESA Foundation Academy: transforming learners into leaders through digital education</h3>
                                <div class="blog-item__desc text-16 leading-15 text-gray mt-20 line-clamp-3">
                                    Hear stories from students, graduates and teachers of M-PESA Foundation Academy, a state-of-the-art, residential high school based in Kenya.
                                </div>
                                <div class="blog-item__tag flex flex-wrap text-12 leading-2 font-500 mt-30 text-red">
                                    <span>keyword 1</span><span>keyword 2</span><span>keyword 3</span><span>keyword 4</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</main>

<?php get_footer() ?>