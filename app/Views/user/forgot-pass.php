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

                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="Box mmb_pass_forgot_form">
                                <h1 class="contentHeader passwordForgotHeader">Şifremi unuttum</h1>
                                <form action="/forgot-pass" method="post" class="validate_form">
                                    <?= csrf_field(); ?>
                                    <div class="form_table pass_forgot_form">
                                        <div class="error"></div>
                                        <div class="form-group">
                                            <input placeholder="Email Adresi" class="form-control email required" required="required" type="email" name="mmb_email" id="mmb_email" value="">
                                        </div>

                                        <div class="form_row form_row_captcha_image mb-1">
                                            <label>
                                                <a class="btn btn-orange" href="javascript:void(0);" onclick="$('#captcha_image').attr('src','/tools/captcha.php?v='+Math.random())">
                                                    <i class="la la-sync"></i>
                                                </a>
                                            </label>
                                            <img width="300" height="60" id="captcha_image" src="/tools/captcha.php?v=1700201905" alt="">
                                        </div>
                                        <div class="error"></div>
                                        <div class="form_row form_row_captcha">
                                            <input placeholder="Resimde gördüğünüz karakterleri giriniz" required="required" class="form-control" type="text" name="captcha_string" id="captcha_string" value="">
                                        </div>

                                        <input name="forgot_send" type="submit" class="btn btn-orange btn-sm button_pass_forgot_send mt-3" value="Gönder">
                                    </div>
                                </form>
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