<html lang="tr-TR" class="">

<head>
    <?php echo view('layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>
    <div class="page page_0   ">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content">

                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="mod_container" style="margin: 20px 0;">
                                <div class="container">
                                    <div class="Box box_prd box_prd_3 box_prd_detail">
                                        <div style="font-size: 25px;" class="Box-header"><a><?php echo $new->title ?></a></div>
                                        <img style="max-width: 30%;margin: 30px 0;" src="/img/news/<?php echo $new->img ?>" alt="<?php echo $new->title ?>">
                                        <div class="Box-content">
                                            <div class="wysiwyg prd_description noContext">
                                                <?php echo $new->content ?>
                                            </div>
                                        </div>
                                        <div class="Box-footer"></div>
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


    <script>
        new Swiper(".otherBooksSwiper", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
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