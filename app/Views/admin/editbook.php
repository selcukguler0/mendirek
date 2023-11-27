<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
    <link rel="stylesheet" href="/jquery-widgets/jqwidgets/styles/jqx.base.css" type="text/css" />

</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <div class="wrapper editbook mt-3">
        <?php if (isset($success)) : ?>
            <div style="margin-top: 20px;" class="alert alert-success" role="alert">
                <?php echo $success . "Kitap başarıyla düzenlendi." ?>
            </div>
        <?php endif; ?>

        <form class="editbook" action="/admin/editbook" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?php echo $book["id"]; ?>">
            <div class="row">
                <div class="col-8" style="font-size: 20px;">
                    <b>Düzenlenen Kitap:</b> <?php echo $book["name"]; ?>
                </div>
                <div class="col-4 row justify-content-end">
                    <a style="max-width:200px" href="/admin" class="btn btn-danger mb-3">Geri Dön</a>
                    <button style="max-width:200px" type="submit" class="btn btn-primary mb-3">Kaydet</button> <br>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Kitap Adı</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Kitap Adı" value="<?php echo $book["name"]; ?>">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="author">Yazar</label>
                    <input name="author" id="author" class="d-none" value="<?php echo $book["author"]; ?>">
                    <div id='jqxcombobox'>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="price">Fiyat</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Fiyat" value="<?php echo $book["price"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="language">Basım Dili</label>
                    <input type="text" class="form-control" id="language" name="language" placeholder="Basım Dili" value="<?php echo $book["language"]; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="cover">Cilt Bilgisi</label>
                    <input type="text" class="form-control" id="cover" name="cover" placeholder="Cilt Bilgisi" value="<?php echo $book["cover"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="type">Roman Türü</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Roman Türü" value="<?php echo $book["type"]; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="code">Ürün Kodu</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Ürün Kodu" value="<?php echo $book["code"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="stock">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok" value="<?php echo $book["stock"]; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="page">Sayfa Sayısı</label>
                    <input type="number" class="form-control" id="page" name="page" placeholder="Sayfa Sayısı" value="<?php echo $book["page"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" class="form-select" aria-label="Kategori">
                        <option value="" <?php if($book["category"] == "") echo "selected"; ?>>Kategorisiz</option>
                        <option value="kampanya" <?php if($book["category"] == "kampanya") echo "selected"; ?>>Kampanya</option>
                        <option value="cok_satan" <?php if($book["category"] == "cok_satan") echo "selected"; ?>>Çok Satan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Mevcut Görsel</label>
                    <img style="width: 100%;max-width: 400px;" src="/img/books/<?php echo $book["img"]; ?>" />
                </div>
                <div class="form-group col-6">
                    <label for="fileInput">Yeni Görsel Yükle</label>
                    <input type="file" class="form-control" id="fileInput" name="fileInput" placeholder="Yeni Görsel">
                    <img class="d-none mt-3" style="width: 100%;max-width: 400px;" id="imagePreview" src="#" alt="Preview Image">
                </div>
            </div>
        </form>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="/datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>

    <!-- jqxComboBox -->
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var source = <?php echo json_encode($authors); ?>;
            source = source.map(function(item) {
                return item.name;
            });
            //find the author index by name from the list
            var author = source.indexOf("<?php echo $book["author"]; ?>");

            console.log(author);
            // Create a jqxComboBox
            $("#jqxcombobox").jqxComboBox({
                source: source,
                selectedIndex: author,
                width: "100%",
                height: '40px'
            });
            // bind to 'select' event.
            $('#jqxcombobox').bind('select', function(event) {
                var args = event.args;
                var item = $('#jqxcombobox').jqxComboBox('getItem', args.index);
                $('#author').val(item.label);
            });
            // bind to 'change' event. if the user types an author name which is not in the list, the 'change' event is raised.
            $('#jqxcombobox').bind('change', function(event) {
                var item = $('#jqxcombobox').jqxComboBox('getSelectedItem');
                if (item) {
                    $('#author').val(item.label);
                }
            });

        });
    </script>

    <script src="/js/adminedit.js"></script>
</body>

</html>