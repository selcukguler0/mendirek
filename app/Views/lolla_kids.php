<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>

    <div class="page page_0 page_home  ">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content" style="display: flex;align-items: center;flex-direction: column;">
                    <img style="width: 100%;max-width: 500px;" src="/img/lolla-kids-logo.png" alt="">
                    <h1>Çok Yakında!</h1>
                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('layouts/footer'); ?>
</body>

</html>