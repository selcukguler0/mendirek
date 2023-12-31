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
                                                    <?php echo view('includes/book', ['book' => $book]); ?>
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