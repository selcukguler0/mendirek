<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('/layouts/header'); ?>
    <div class="page page_prdlist">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content">

                    <div id="layout_style" class="container layout_110">
                        <div class="main_content">
                            <div class="list prd_list">
                                <div class="prd_list_container_box">
                                    <div class="prd_list_container">
                                        <h1 class="contentHeader prdListHeader"><?php echo $search_query ?> - arama sonuçları</h1>
                                        <?php if (!$books) : ?>
                                            <div style="text-align: center;margin-top: 20px;height: 300px;">
                                                Arama sonucunda hiçbir kayıt bulunamadı.
                                            </div>
                                        <?php endif; ?>
                                        <ul class="grid grid-4">
                                            <?php foreach ($books as $book) : ?>
                                                <li>
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
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="mod_container __writer_news" id="mod_container_119">
                                <div class="container">

                                </div>
                            </div>

                        </div>
                    </div>


                </main>



            </div>
        </div>
    </div>
    <?php echo view('/layouts/footer'); ?>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <script src="/js/combine.js"></script>

</body>

</html>