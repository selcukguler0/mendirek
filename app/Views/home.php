<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>

    <div class="page page_0 page_home  ">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content">
                    <div class="layout_010">
                        <div>
                            <div class="mod_container">
                                <div class="container">
                                    <div class="Box box_prd box_prd_slide">
                                        <div class="Box-content" style="margin-top: 20px;">
                                            <div class="Carousel-wrapper" style="padding: 0 70px;position: relative;">
                                                <div class="swiper mainSwiper" style="height: fit-content;">
                                                    <div class="swiper-wrapper">
                                                        <?php foreach ($books as $book) : ?>
                                                            <div class="swiper-slide" style="display: flex;justify-content: center;">
                                                                <img style="width: 100%;height: auto;max-width: 200px;aspect-ratio: 100/87;" src='/img/books/<?php echo $book->img; ?>' />
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next swiper-button-next-mainSwiper" style="margin-bottom: 20px;"></div>
                                                <div class="swiper-button-prev swiper-button-prev-mainSwiper"></div>
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="Box-footer">
                                            <div class="Box-footer-more">
                                                <a class="btn btn-orange" href="//one-cikanlar-1">Tümünü göster</a>
                                            </div>

                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="mod_container">
                                <div class="container">
                                    <div class="Box box_prd box_prd_slide">
                                        <div class="Box-header">
                                            <a href="#">Öne Çıkanlar</a>
                                        </div>
                                        <div class="Box-content" style="margin-top: 20px;">
                                            <div class="Carousel-wrapper" style="padding: 0 70px;position: relative;">
                                                <div class="swiper mySwiper" style="height: fit-content;">
                                                    <ul class="swiper-wrapper">
                                                        <?php foreach ($featured as $book) : ?>
                                                            <li class="swiper-slide">
                                                                <div class="Product Product_b Product_885" data-prd-id="885">
                                                                    <div class="Product-image-wrapper">
                                                                        <div class="Product-image image_b">
                                                                            <a title="<?php echo $book->name ?>" class="tooltip-ajax" href="#">
                                                                                <img class="prd_img prd_img_118_0_885 lazy" width="100" height="100" src="/img/books/<?php echo $book->img ?>" alt="<?php echo $book->name ?>" title="<?php echo $book->name ?>" style="">
                                                                            </a>
                                                                            <!-- 
                                                            <div class="actions">
                                                                <a data-prd-id="885" class="btn btn-dark btn-sm button_add_to_cart">
                                                                    <span class="button-text">Sepete Ekle</span>
                                                                </a>
                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="Product-content">
                                                                        <div class="name"><a href="#"><?php echo $book->name ?></a></div>
                                                                        <div class="writer"><a href="#"><?php echo $book->author ?></a></div>

                                                                        <div class="price_box">
                                                                            <!-- <div class="discount">
                                                                    <span>%45</span>
                                                                    <div class="discount_text">İNDİRİM</div>
                                                                </div> -->
                                                                            <div class="price_box_wrapper">
                                                                                <!-- <span class="price price_list convert_cur" data-price="1100.00" data-cur-code="TL">1.100<sup>,00</sup><span class="la la-try la_cur_code"></span></span> -->
                                                                                <span class="price price_sale convert_cur" data-price="605.00" data-cur-code="TL">605<sup>,00</sup><span class="la la-try la_cur_code"></span></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                                <div class="swiper-button-next swiper-button-next-one-cikanlar" style="margin-bottom: 20px;"></div>
                                                <div class="swiper-button-prev swiper-button-prev-one-cikanlar"></div>
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="Box-footer">
                                            <div class="Box-footer-more">
                                                <a class="btn btn-orange" href="//one-cikanlar-1">Tümünü göster</a>
                                            </div>

                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="mod_container ">
                                <div class="container">
                                    <div class="Box box_prd box_prd_slide">
                                        <div class="Box-header">
                                            <a href="#">Popüler</a>
                                        </div>
                                        <div class="Box-content" style="margin-top: 20px;">
                                            <div class="Carousel-wrapper" style="padding: 0 70px;position: relative;">
                                                <div class="swiper mySwiper-Populer" style="height: fit-content;">
                                                    <ul class="swiper-wrapper">
                                                        <?php foreach ($populer as $book) : ?>
                                                            <li class="swiper-slide">
                                                                <div class="Product Product_b Product_885" data-prd-id="885">
                                                                    <div class="Product-image-wrapper">
                                                                        <div class="Product-image image_b">
                                                                            <a title="<?php echo $book->name ?>" class="tooltip-ajax" href="#">
                                                                                <img class="prd_img prd_img_118_0_885 lazy" width="100" height="100" src="/img/books/<?php echo $book->img ?>" alt="<?php echo $book->name ?>" title="<?php echo $book->name ?>" style="">
                                                                            </a>
                                                                            <!-- 
                                                            <div class="actions">
                                                                <a data-prd-id="885" class="btn btn-dark btn-sm button_add_to_cart">
                                                                    <span class="button-text">Sepete Ekle</span>
                                                                </a>
                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="Product-content">
                                                                        <div class="name"><a href="#"><?php echo $book->name ?></a></div>
                                                                        <div class="writer"><a href="#"><?php echo $book->author ?></a></div>

                                                                        <div class="price_box">
                                                                            <!-- <div class="discount">
                                                                    <span>%45</span>
                                                                    <div class="discount_text">İNDİRİM</div>
                                                                </div> -->
                                                                            <div class="price_box_wrapper">
                                                                                <!-- <span class="price price_list convert_cur" data-price="1100.00" data-cur-code="TL">1.100<sup>,00</sup><span class="la la-try la_cur_code"></span></span> -->
                                                                                <span class="price price_sale convert_cur" data-price="605.00" data-cur-code="TL">605<sup>,00</sup><span class="la la-try la_cur_code"></span></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>

                                                <div class="swiper-button-next swiper-button-next-populer" style="margin-bottom: 20px;"></div>
                                                <div class="swiper-button-prev swiper-button-prev-populer"></div>
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="Box-footer">
                                            <div class="Box-footer-more">
                                                <a class="btn btn-orange" href="//one-cikanlar-1">Tümünü göster</a>
                                            </div>

                                        </div> -->
                                    </div>

                                </div>
                            </div>

                            <div class="mod_container ">
                                <div class="container">
                                    <div class="Box box_prd box_prd_slide">
                                        <div class="Box-header">
                                            <a href="#">Çok Satanlar</a>
                                        </div>
                                        <div class="Box-content" style="margin-top: 20px;">
                                            <div class="Carousel-wrapper" style="padding: 0 70px;position: relative;">
                                                <div class="swiper mySwiper-TopSales" style="height: fit-content;">
                                                    <ul class="swiper-wrapper">
                                                        <?php foreach ($most_sales as $book) : ?>
                                                            <li class="swiper-slide">
                                                                <div class="Product Product_b Product_885" data-prd-id="885">
                                                                    <div class="Product-image-wrapper">
                                                                        <div class="Product-image image_b">
                                                                            <a title="<?php echo $book->name ?>" class="tooltip-ajax" href="#">
                                                                                <img class="prd_img prd_img_118_0_885 lazy" width="100" height="100" src="/img/books/<?php echo $book->img ?>" alt="<?php echo $book->name ?>" title="<?php echo $book->name ?>" style="">
                                                                            </a>
                                                                            <!-- 
                                                            <div class="actions">
                                                                <a data-prd-id="885" class="btn btn-dark btn-sm button_add_to_cart">
                                                                    <span class="button-text">Sepete Ekle</span>
                                                                </a>
                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="Product-content">
                                                                        <div class="name"><a href="#"><?php echo $book->name ?></a></div>
                                                                        <div class="writer"><a href="#"><?php echo $book->author ?></a></div>

                                                                        <div class="price_box">
                                                                            <!-- <div class="discount">
                                                                    <span>%45</span>
                                                                    <div class="discount_text">İNDİRİM</div>
                                                                </div> -->
                                                                            <div class="price_box_wrapper">
                                                                                <!-- <span class="price price_list convert_cur" data-price="1100.00" data-cur-code="TL">1.100<sup>,00</sup><span class="la la-try la_cur_code"></span></span> -->
                                                                                <span class="price price_sale convert_cur" data-price="605.00" data-cur-code="TL">605<sup>,00</sup><span class="la la-try la_cur_code"></span></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>

                                                </div>

                                                <div class="swiper-button-next swiper-button-next-TopSales" style="margin-bottom: 20px;"></div>
                                                <div class="swiper-button-prev swiper-button-prev-TopSales"></div>
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="Box-footer">
                                            <div class="Box-footer-more">
                                                <a class="btn btn-orange" href="//one-cikanlar-1">Tümünü göster</a>
                                            </div>

                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper(".mainSwiper", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination-mainSwiper",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next-mainSwiper",
                prevEl: ".swiper-button-prev-mainSwiper",
            },
            slidesPerView: 1,
            centeredSlides: true,
        });
        new Swiper(".mySwiper", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination-one-cikanlar",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next-one-cikanlar",
                prevEl: ".swiper-button-prev-one-cikanlar",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });

        new Swiper(".mySwiper-Populer", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination-populer",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next-populer",
                prevEl: ".swiper-button-prev-populer",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });

        new Swiper(".mySwiper-TopSales", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination-TopSales",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next-TopSales",
                prevEl: ".swiper-button-prev-TopSales",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>

    <script src="/js/combine.js"></script>
</body>

</html>