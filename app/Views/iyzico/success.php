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
                                    <div class="alert alert-success">
                                        Ödeme başarıyla gerçekleşti. <br>
                                        <a href="/orders">Siparişinizi, siparişler sayfasından takip edebilirsiniz.</a>
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
        //kartı temizle
        document.cookie = "card=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        bucket();
    </script>

</body>

</html>