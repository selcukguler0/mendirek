<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <?php if (isset($success)) : ?>
        <div style="margin-top: 20px;" class="alert alert-success" role="alert">
            <?php echo $success . " başarıyla kayıt edildi." ?>
        </div>
    <?php endif; ?>
    <?php if (isset($deleted)) : ?>
        <div style="margin-top: 20px;" class="alert alert-danger" role="alert">
            <?php echo $deleted . " başarıyla silindi!" ?>
        </div>
    <?php endif; ?>

    <div class="wrapper" style="margin-top: 20px;">

        <a href="/admin/addnews" class="btn btn-primary" style="margin:0 10px">Bülten Ekle</a>

        <table id="example" class="table table-striped table-bordered nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>content</th>
                    <th>createdAt</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="deleteModalLabel"></h3>
                </div>
                <div class="modal-body">
                    Bu bülteni silmek istediğinizden emin misiniz?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <form action="/admin/deletenews" method="post">
                        <?= csrf_field() ?>
                        <input class="d-none" value="" name="id" id="delete_id" type="text">
                        <input class="d-none" value="" name="name" id="delete_name" type="text">
                        <button type="submit" class="btn btn-danger" onclick="">Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="/datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="/datatables/datatables.min.js"></script>

    <script>
        var csrfName = 'X-CSRF-TOKEN',
            csrfHash = document.querySelector('meta[name="X-CSRF-TOKEN"]')
            .content;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        const dataSet = <?php echo json_encode($news); ?>;
        var table = new DataTable("#example", {
            columns: [{
                    data: "id",
                    title: "ID"
                },
                {
                    data: "title",
                    title: "Başlık"
                },
                {
                    data: "content",
                    title: "İçerik"
                },
                {
                    data: "createdAt",
                    title: "Oluşturulma Tarihi"
                },
                {
                    data: null,
                    title: "Düzenle"
                },
                {
                    data: null,
                    title: "Sil"
                },
            ],
            data: dataSet,
            columnDefs: [{
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return data.substr(0, 40) + "...";
                    },
                },
                {
                    data: null,
                    defaultContent: "<button class='btn btn-primary editBtn'>Düzenle</button>",
                    targets: -2,
                },
                {
                    data: null,
                    defaultContent: "<button class='btn btn-danger deleteBtn'>Sil</button>",
                    targets: -1,
                },
            ],
            dom: "<'row align-items-center mb-3'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'<'float-right filter'f>>>t<'row'<'col-sm-6'p><'col-sm-6'<'float-right'l>>>",
            buttons: [{
                extend: "excelHtml5",
                text: "Exel'e Aktar",
                className: "excelButton",
            }, ],
            scrollX: true,
            language: {
                url: "/datatables/Turkish.json",
            },
        });

        // edit button
        table.on("click", ".editBtn", function(e) {
            let data = table.row(e.target.closest("tr")).data();
            window.location.href = "/admin/editnews/" + data.id;
            console.log(data);
        });
        // delete button
        table.on("click", ".deleteBtn", function(e) {
            let data = table.row(e.target.closest("tr")).data();
            console.log(data);
            const deleteModal = new bootstrap.Modal("#deleteModal", {
                keyboard: false,
            });
            $("#deleteModalLabel").text(data.title);
            $("#delete_id").val(data.id);
            $("#delete_name").val(data.title);
            deleteModal.show();
        });
    </script>
</body>

</html>