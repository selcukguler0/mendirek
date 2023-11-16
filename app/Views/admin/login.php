<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
</head>

<body class="login">
    <h1>Admin Girişi</h1>
    <form action="/admin/login" method="post">
        <?= csrf_field() ?>
        <input placeholder="Kullanıcı Adı" name="username" class="form-control" type="text">
        <input placeholder="Şifre" name="password" class="form-control mt-3" type="password">
        <button class="btn btn-primary mt-3" type="submit">Giriş Yap</button>
    </form>
    <?php if (isset($error)) : ?>
        <div style="margin-top: 20px;" class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php endif; ?>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="/js/combine.js"></script>
</body>

</html>