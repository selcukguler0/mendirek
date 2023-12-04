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
                    <div class="container">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/bulten">
                                        <span itemprop="name">Bülten</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="layout_style" class="container layout_110">
                        <div class="main_content">
                            <div class="list prd_list">
                                <div class="prd_list_container_box">
                                    <div class="prd_list_container">
                                        <h1 class="contentHeader prdListHeader"><?php echo $header ?></h1>
                                        <?php if (empty($news)) : ?>
                                            <div class="alert alert-danger" style="text-align: center;margin-top: 20px;">
                                                <?php echo $empty_message ?>
                                            </div>
                                        <?php endif; ?>
                                        <ul class="grid grid-4">
                                            <?php foreach ($news as $new) : ?>
                                                <li>
                                                    <?php echo view('includes/new', ['new' => $new]); ?>
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

    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('/layouts/footer'); ?>

</body>

</html>