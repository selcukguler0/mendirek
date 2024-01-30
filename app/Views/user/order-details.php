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
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/orders">
                                        <span itemprop="name">Siparişlerim</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Sipariş Detay</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="row">
                                <?php
                                // Assuming $books is your array of books
                                foreach ($basketItems as $basketItem) {
                                ?>
                                    <a href="/kitap/<?php echo $basketItem['id']; ?>" class="card" style="width: 18rem;margin:10px">
                                        <img src="/img/books/<?php echo $basketItem['img']; ?>" class="card-img-top" alt="Book Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $basketItem['name']; ?></h5>
                                            <p class="card-text text-black-50">Author: <?php echo $basketItem['author']; ?></p>
                                            <p class="card-text text-black-50">Price: <?php echo $basketItem['price']; ?></p>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>


                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>


</body>

</html>