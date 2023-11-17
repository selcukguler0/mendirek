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
                        <div class="alert alert-success">
                            Üyelik işleminiz tamamlanmıştır. <br>
                            Siteye giriş için üyeliğinizi aktiflemeniz gerekmektedir.<br>
                            Üyeliğinizi aktiflemeniz için gerekli bilgiler email adresinize gönderilmiştir. <br>
                            Lütfen emailinizi kontrol ediniz.
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>
</body>

</html>