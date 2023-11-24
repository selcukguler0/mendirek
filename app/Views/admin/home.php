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
        <table id="example" class="table table-striped table-bordered nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>author</th>
                    <th>price</th>
                    <th>language</th>
                    <th>cover</th>
                    <th>type</th>
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
                    Bu kitabı silmek istediğinizden emin misiniz?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <form action="/admin/deletebook" method="post">
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
        const dataSet = <?php echo json_encode($books); ?>;
        var csrfName = 'X-CSRF-TOKEN',
            csrfHash = document.querySelector('meta[name="X-CSRF-TOKEN"]')
            .content;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>