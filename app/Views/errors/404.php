<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('/layouts/header'); ?>
    <div class="page page_prdlist">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content" style="min-height: 500px;">
                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="d-flex flex-column justify-content-center align-items-center h-full">
                                <h1>404</h1>
                                <h3>Aradığınız sayfa bulunamadı</h3>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <?php echo view('/layouts/footer-mail'); ?>
    <?php echo view('/layouts/footer'); ?>
</body>

</html>