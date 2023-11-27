<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
    <link rel="stylesheet" href="/jquery-widgets/jqwidgets/styles/jqx.base.css" type="text/css" />

</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <div class="wrapper addbook mt-3">
        <form action="/admin/addbook" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-8"></div>
                <div class="col-4 row justify-content-end align-items-end">
                    <div class="col-12 mb-3 align-items-end">
                        <a style="max-width:200px" href="/admin" class="btn btn-danger col-12">Geri Dön</a>
                    </div>
                    <div class="col-12 mb-3">
                        <button style="max-width:200px" type="submit" class="btn btn-primary col-12">Kaydet</button>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label for="name">Kitap Adı</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Kitap Adı">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="author">Yazar</label>
                    <input name="author" id="author" class="d-none">
                    <div id='jqxcombobox'>
                    </div>
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
                    <label for="category">Kategori</label>
                    <select id="category" name="category" class="form-select" aria-label="Kategori">
                        <option value="" selected>Kategorisiz</option>
                        <option value="kampanya">Kampanya</option>
                        <option value="cok_satan">Çok Satan</option>
                    </select>
                </div>
            </div>
            <!-- GÖRSEL -->
            <div class="row">
                <div class="form-group col-6">
                    <label for="fileInput">Görsel Yükle</label>
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
            $('#author').val(source[0])
            // Create a jqxComboBox
            $("#jqxcombobox").jqxComboBox({
                source: source,
                selectedIndex: 0,
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