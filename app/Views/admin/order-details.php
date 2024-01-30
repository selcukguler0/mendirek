<html lang="tr-TR" class="">

<head>
    <?php echo view('/admin/layouts/head'); ?>
    <link rel="stylesheet" href="/jquery-widgets/jqwidgets/styles/jqx.base.css" type="text/css" />

</head>

<body class="admin">
    <?php echo view("admin/layouts/header") ?>

    <div class="wrapper mt-3">
        <?php if (isset($_GET["success"])) : ?>
            <div style="margin-top: 20px;" class="alert alert-success" role="alert">
                <?php echo $_GET["success"] ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div style="border-right: 1px solid #000;" class="col-md-6 col-12">
                    <h2>Fatura Adresi</h2>
                    <div>
                        <b>Ad Soyad:</b>
                        <span><?php echo $order["ord_billing_name"] ?></span>
                    </div>
                    <div>
                        <b>Telefon:</b>
                        <span><?php echo $order["ord_billing_phone"] ?></span>
                    </div>
                    <div>
                        <b>Şehir:</b>
                        <span><?php echo $order["ord_billing_city"] ?></span>
                    </div>
                    <div>
                        <b>İlçe:</b>
                        <span><?php echo $order["ord_billing_town"] ?></span>
                    </div>
                    <div>
                        <b>Adres:</b>
                        <span><?php echo $order["ord_billing_address"] ?></span>
                    </div>
                    <div>
                        <b>Vergi No/TCKimlik No :</b>
                        <span><?php echo $order["ord_billing_tax_number"] ?></span>
                    </div>
                    <?php if ($order["ord_adr_corp_exists"] = "1") : ?>
                        <div>
                            <b>Firma Adı:</b>
                            <span><?php echo $order["ord_billing_firm_name"] ?></span>
                        </div>
                        <div>
                            <b>Vergi Dairesi:</b>
                            <span><?php echo $order["ord_billing_tax_office"] ?></span>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="col-md-6 col-12">
                    <h2>Teslimat Adresi</h2>
                    <?php if ($order["ord_shipping_name"] == "") : ?>
                        <div class="alert alert-info" role="alert">
                            Teslimat adresi fatura adresi ile aynıdır.
                        </div>
                    <?php else : ?>
                        <div>
                            <b>Ad Soyad:</b>
                            <span><?php echo $order["ord_shipping_name"] ?></span>
                        </div>
                        <div>
                            <b>Telefon:</b>
                            <span><?php echo $order["ord_shipping_phone"] ?></span>
                        </div>
                        <div>
                            <b>Şehir:</b>
                            <span><?php echo $order["ord_shipping_city"] ?></span>
                        </div>
                        <div>
                            <b>İlçe:</b>
                            <span><?php echo $order["ord_shipping_town"] ?></span>
                        </div>
                        <div>
                            <b>Adres:</b>
                            <span><?php echo $order["ord_shipping_address"] ?></span>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-4">
                <b>Teslimat Notu</b>
                <?php if ($order["ord_shipping_note"] == "") : ?>
                    <b style="color: #e62d2d;">
                        Teslimat notu bulunmamaktadır.
                    </b>
                <?php else : ?>
                    <div class="col-md-12 col-12">
                        <span><?php echo $order["ord_shipping_note"] ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row mt-4">
                <h2>Sipariş Detayları</h2>
                <div>
                    <b>Toplam Tutar:</b>
                    <span><?php echo $order["orderTotal"] ?>₺</span>
                </div>
                <form method="post" action="/admin/order-details" class="mt-3">
                    <b>Sipariş Durumu:</b>
                    <input type="hidden" name="id" id="id" value="<?php echo $order["id"] ?>">
                    <?php echo csrf_field() ?>
                    <select name="status" id="status">
                        <option <?php echo $order["status"] == "Siparişiniz alındı" ? "selected" : "" ?> value="Siparişiniz alındı.">Siparişiniz alındı</option>
                        <option <?php echo $order["status"] == "Kargoya Verildi" ? "selected" : "" ?> value="Kargoya Verildi">Kargoya Verildi</option>
                        <option <?php echo $order["status"] == "Teslim Edildi" ? "selected" : "" ?> value="Teslim Edildi">Teslim Edildi</option>
                    </select>
                    <button class="btn btn-primary">Kayıt Et</button>
                </form>
            </div>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="/datatables/jQuery-3.7.0/jquery-3.7.0.min.js"></script>

</body>

</html>