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
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yazarlar">
                                        <span itemprop="name">Yazarlar</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yazarlar/<?php echo $letter ?>">
                                        <span itemprop="name"><?php echo $letter ?></span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="pub_list">
                                <h1 class="contentHeader pubListHeader">Yazarlar</h1>

                                <div class="letter_bar">
                                    <form action="/yazarlar/ara">
                                        <span class="letter_items">
                                            <a class="letter_link" href="/yazarlar/A">A</a>
                                            <a class="letter_link" href="/yazarlar/B">B</a>
                                            <a class="letter_link" href="/yazarlar/C">C</a>
                                            <a class="letter_link" href="/yazarlar/Ç">Ç</a>
                                            <a class="letter_link" href="/yazarlar/D">D</a>
                                            <a class="letter_link" href="/yazarlar/E">E</a>
                                            <a class="letter_link" href="/yazarlar/F">F</a>
                                            <a class="letter_link" href="/yazarlar/G">G</a>
                                            <a class="letter_link" href="/yazarlar/H">H</a>
                                            <a class="letter_link" href="/yazarlar/I">I</a>
                                            <a class="letter_link" href="/yazarlar/İ">İ</a>
                                            <a class="letter_link" href="/yazarlar/J">J</a>
                                            <a class="letter_link" href="/yazarlar/K">K</a>
                                            <a class="letter_link" href="/yazarlar/L">L</a>
                                            <a class="letter_link" href="/yazarlar/M">M</a>
                                            <a class="letter_link" href="/yazarlar/N">N</a>
                                            <a class="letter_link" href="/yazarlar/O">O</a>
                                            <a class="letter_link" href="/yazarlar/Ö">Ö</a>
                                            <a class="letter_link" href="/yazarlar/P">P</a>
                                            <a class="letter_link" href="/yazarlar/Q">Q</a>
                                            <a class="letter_link" href="/yazarlar/R">R</a>
                                            <a class="letter_link" href="/yazarlar/S">S</a>
                                            <a class="letter_link" href="/yazarlar/Ş">Ş</a>
                                            <a class="letter_link" href="/yazarlar/T">T</a>
                                            <a class="letter_link" href="/yazarlar/U">U</a>
                                            <a class="letter_link" href="/yazarlar/Ü">Ü</a>
                                            <a class="letter_link" href="/yazarlar/V">V</a>
                                            <a class="letter_link" href="/yazarlar/W">W</a>
                                            <a class="letter_link" href="/yazarlar/X">X</a>
                                            <a class="letter_link" href="/yazarlar/Y">Y</a>
                                            <a class="letter_link" href="/yazarlar/Z">Z</a>
                                        </span>
                                        <span class="form_items">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="" name="name" id="name">
                                            </div>
                                            <input class="btn btn-dark button_publisher_search" type="submit" value="Ara">
                                        </span>
                                    </form>
                                </div>


                                <?php if (empty($authors)) : ?>
                                    <div class="alert alert-orange">Sonuç bulunamadı</div>
                                <?php endif ?>
                                <?php if (!empty($authors)) : ?>
                                    <div class="pub_list_wrapper">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="/yazarlar/<?php echo $letter ?>">
                                                    <h3 class="card-title"> <?php echo $letter ?> </h3>
                                                </a>
                                            </div>
                                            <ul class="list-group list-group-flush pub-items">
                                                <?php foreach ($authors as $author) : ?>
                                                    <li class="list-group-item d-flex align-items-center py-1 pub-item">
                                                        <a title="<?php echo $author->name ?>" href="#">
                                                            <?php echo $author->name ?>
                                                        </a>
                                                        <div class="ml-auto d-flex">
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
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