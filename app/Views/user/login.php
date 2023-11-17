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
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/loogin">
                                        <span itemprop="name">Üye Girişi</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="Box Box--form Login">
                                <div class="Box-content">
                                    <form name="form1" method="post" action="/login">
                                        <?= csrf_field(); ?>
                                        <div class="Login-form form_table">
                                            <h1 class="contentHeader loginHeader">Üye Girişi</h1>
                                            <div class="form-group">
                                                <input placeholder="Email Adresi" class="form-control" required="required" name="email" id="email" type="email" value="">
                                            </div>
                                            <div class="form-group" style="position: relative;">
                                                <i style="cursor:pointer; position: absolute; right: 10px; top: 10px" onclick="$('#password').prop('type',$('#password').prop('type')=='password'?'text':'password')" class="la la-eye"></i>
                                                <input placeholder="Şifre" class="form-control" required="required" name="password" id="password" type="password" value="">
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <input type="submit" class="btn btn-orange login_page_login_button" value="Giriş">
                                            <div class="form-links">
                                                <div class="form-links-top">
                                                    <a href="/forgot-pass">Şifremi unuttum</a>
                                                    <a class="login_page_register" href="/register" rel="nofollow">Üye ol</a>
                                                </div>
                                                <a class="form-links-activation" href="/activation-code">Aktivasyon maili gönder</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="Box-footer"></div>
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