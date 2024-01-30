var table = new DataTable("#example", {
  columns: [
    { data: "id", title: "ID" },
    { data: "orderTotal", title: "Toplam Tutar" },
    { data: "status", title: "Durum" },
    { data: "userEmail", title: "Kullanıcı E-mail" },
    { data: "installments", title: "Taksit Miktarı" },
    { data: "created_at", title: "Satın Alım Tarihi" },
    { data: null, title: "Düzenle" },
  ],
  data: dataSet,
  order: [[5, "desc"]], //order by created_at
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
      targets: 1,
    },
    {
      data: null,
      defaultContent:
        "<button class='btn btn-primary editBtn'>Düzenle</button>",
      targets: -1,
    },
  ],
  dom: "<'row align-items-center mb-3'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'<'float-right filter'f>>>t<'row'<'col-sm-6'p><'col-sm-6'<'float-right'l>>>",
  buttons: [
    {
      extend: "excelHtml5",
      text: "Exel'e Aktar",
      className: "excelButton",
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
  window.location.href = "/admin/order-details/" + data.id;
});