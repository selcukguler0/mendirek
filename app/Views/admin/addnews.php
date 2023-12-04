<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
    <link rel="stylesheet" href="/jquery-widgets/jqwidgets/styles/jqx.base.css" type="text/css" />

    <script src="/datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxdropdownbutton.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxcolorpicker.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxeditor.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="/jquery-widgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="/jquery-widgets/scripts/demos.js"></script>
</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <?php if (isset($_GET["success"])) : ?>
        <div class="alert alert-success mt-3" role="alert">
            Bülten başarıyla eklendi.
        </div>
    <?php endif; ?>

    <div class="wrapper addbook mt-3">
        <form action="/admin/addnews" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary float-right">Kayıt Et</button>
            <div class="form-group mb-3 w-50">
                <label for="title">Bülten Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Bülten Başlığı">
            </div>
            <textarea name="content" id="content"> </textarea>
            <div class="form-group mt-3">
                <label for="fileInput">Bülten Fotoğrafı</label>
                <input class="form-control w-25" type="file" name="fileInput" id="fileInput" />
                <img id="imagePreview" src="" alt="" class="d-none mt-3" style="max-width: 300px;">
            </div>
        </form>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').jqxEditor({
                height: "400px",
                width: getWidth('editor')
            });
        });
    </script>

    <script>
        const fileInput = document.getElementById("fileInput");
        const imagePreview = document.getElementById("imagePreview");

        fileInput.addEventListener("change", (event) => {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = (event) => {
                    imagePreview.src = event.target.result;
                };
                imagePreview.classList.remove("d-none");
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>