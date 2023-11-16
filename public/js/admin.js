console.log(dataSet);
console.log(typeof dataSet);

var table = new DataTable("#example", {
  columns: [
    { data: "id", title: "ID" },
    { data: "name", title: "Kitap İsmi" },
    { data: "author", title: "Yazar" },
    { data: "price", title: "Fiyat" },
    { data: "language", title: "Basım Dili" },
    { data: "cover", title: "Cilt Bilgisi" },
    { data: "type", title: "Roman Türü" },
    { data: null, title: "Düzenle" },
    { data: null, title: "Sil" },
  ],
  data: dataSet,
  columnDefs: [
    {
      //current data + ₺
      render: function (data) {
        if (data) {
          return data + " ₺";
        } else {
          return "";
        }
      },
      targets: 3,
    },
    {
      data: null,
      defaultContent:
        "<button class='btn btn-primary editBtn'>Düzenle</button>",
      targets: -2,
    },
    {
      data: null,
      defaultContent: "<button class='btn btn-danger deleteBtn'>Sil</button>",
      targets: -1,
    },
  ],
  dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'<'float-right filter'f>>>t<'row'<'col-sm-6'p><'col-sm-6'<'float-right'l>>>",
  buttons: [
    {
      extend: "excelHtml5",
      text: "Exel'e Aktar",
      className: "excelButton",
    },
    {
      text: "Yeni Kitap Ekle",
      className: "addNewBookButton",
      action: function () {
        window.location.href = "/admin/addbook";
      },
    },
  ],
  scrollX: true,
  language: {
    url: "/datatables/Turkish.json",
  },
});

// edit button
table.on("click", ".editBtn", function (e) {
  let data = table.row(e.target.closest("tr")).data();
  window.location.href = "/admin/editbook/" + data.id;
  console.log(data);
});
// delete button
table.on("click", ".deleteBtn", function (e) {
  let data = table.row(e.target.closest("tr")).data();
  console.log(data);
  const deleteModal = new bootstrap.Modal("#deleteModal", {
    keyboard: false,
  });
  $("#deleteModalLabel").text(data.name);
  $("#delete_id").val(data.id);
  $("#delete_name").val(data.name);
  deleteModal.show();
});
