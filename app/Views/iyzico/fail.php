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
                                    <div class="alert alert-danger">
                                        Sipariş verilirken bir sorun ile karşılaşıldı. <br>
                                        Daha sonra tekrar deneyiniz.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('layouts/footer'); ?>


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

</body>

</html>