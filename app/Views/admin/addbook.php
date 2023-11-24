<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <div class="wrapper addbook mt-3">
        <form action="/admin/addbook" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-12">
                    <button style="float: right;" type="submit" class="btn btn-primary mb-3">Kaydet</button>
                    <a style="float: right;" href="/admin" class="btn btn-danger mb-3 mr-3">Geri Dön</a>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Kitap Adı</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Kitap Adı">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="author">Yazar</label>
                    <input name="author" class="form-control" list="europe-countries" placeholder="Yazar">
                    <datalist id="europe-countries">
                        <?php foreach ($authors as $author) : ?>
                            <option value="<?php echo $author["name"]; ?>">
                            <?php endforeach; ?>
                    </datalist>
                </div>
                <div class="form-group col-6">
                    <label for="price">Fiyat</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Fiyat">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="language">Basım Dili</label>
                    <input type="text" class="form-control" id="language" name="language" placeholder="Basım Dili">
                </div>
                <div class="form-group col-6">
                    <label for="cover">Cilt Bilgisi</label>
                    <input type="text" class="form-control" id="cover" name="cover" placeholder="Cilt Bilgisi">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="type">Roman Türü</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Roman Türü">
                </div>
                <div class="form-group col-6">
                    <label for="code">Ürün Kodu</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Ürün Kodu">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="stock">Stok</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Roman Türü">
                </div>
                <div class="form-group col-6">
                    <label for="page">Sayfa Sayısı</label>
                    <input type="number" class="form-control" id="page" name="page" placeholder="Sayfa Sayısı">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="fileInput">Görsel Yükle</label>
                    <input type="file" class="form-control-file" id="fileInput" name="fileInput" placeholder="Yeni Görsel">
                    <img class="d-none mt-3" style="width: 100%;max-width: 400px;" id="imagePreview" src="#" alt="Preview Image">
                </div>
            </div>
        </form>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="/datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="/js/adminedit.js"></script>

</body>

</html>