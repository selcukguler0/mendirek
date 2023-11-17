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
                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="Box mmb_pass_forgot_form">
                                <h1 class="contentHeader passwordForgotHeader">Aktivasyon maili gönder</h1>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/activation-code" method="post" class="validate_form" style="max-width: 300px;">
                                    <?= csrf_field(); ?>
                                    <div class="form_table pass_forgot_form">
                                        <div class="form-group">
                                            <input placeholder="Email Adresi" class="form-control email required" required="required" type="email" name="email" id="email" value="">
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