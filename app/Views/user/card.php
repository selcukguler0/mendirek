<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>
    <div class="page page_0 page_home  ">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/index.php?p=Cart">
                                        <span itemprop="name">Sepetim</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <span class="cart_variables">
                                <input type="hidden" class="cart_prd_count" value="0">
                                <input type="hidden" class="cart_prd_total" value="0,00">
                                <input type="hidden" id="big_cart_list" value="1">
                            </span>

                            <div class="cart_list" id="container_cart_list_big">
                                <div class="order_steps">
                                    <span class="ord_step ord_step_1 ord_step_cart ord_step_selected" title="Sepetim">
                                        <span class="ord_step_number">1</span>
                                        <span class="ord_step_label">Sepetim</span>
                                    </span>

                                    <span class="ord_step ord_step_2 ord_step_info" title="Sipariş Bilgileri">
                                        <span class="ord_step_number">2</span>
                                        <span class="ord_step_label">Sipariş Bilgileri</span>
                                    </span>

                                    <span class="ord_step ord_step_3 ord_step_confirm" title="Ödeme Onay">
                                        <span class="ord_step_number">3</span>
                                        <span class="ord_step_label">Ödeme Onay</span>
                                    </span>

                                    <span class="ord_step ord_step_4 ord_step_completed" title="Tamamlandı">
                                        <span class="ord_step_number">4</span>
                                        <span class="ord_step_label">Tamamlandı</span>
                                    </span>
                                </div>



                                <form action="/cart" method="post" name="list_frm" class="list_form mt-3">
                                    <?php if (isset($card)) : ?>
                                        <table class="table cart_list_table table-bordered">
                                            <thead class="rsp-hide-538">
                                                <tr>
                                                    <th class="rsp-hide-538">
                                                        <div class="form-group form-check">
                                                            <input class="form-check-input" type="checkbox" name="checkall" id="checkall" onclick="$('.toggle').prop('checked',this.checked)">
                                                        </div>
                                                    </th>
                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                    <th>
                                                        Ürün Adı
                                                    </th>
                                                    <th class="rsp-hide-538">
                                                        Fiyat
                                                    </th>
                                                    <th>
                                                        Adet
                                                    </th>
                                                    <th>
                                                        Tutar
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($card as $book) : ?>
                                                    <tr class="cart-items" data-prd-id="48" data-prd-name="<?php echo $book['name']; ?>" data-barcode="" data-quantity="1" data-final-price="" data-total-price="">
                                                        <td class="rsp-hide-538">
                                                            <div class="form-group form-check">
                                                                <input class="form-check-input toggle" type="checkbox" name="delete[]" id="delete0" value="545874">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="/kitap/<?php echo $book['id']; ?>">
                                                                <img class="prd_image" src="/img/books/<?php echo $book['image']; ?>" alt="<?php echo $book['name']; ?>">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="crt_prd_name">
                                                                <a class="prd_name" href="/kitap/<?php echo $book['id']; ?>">
                                                                    <?php echo $book['name']; ?>
                                                                </a>
                                                                <!-- <span class="dsc_appiled">%70 indirimli</span> -->
                                                            </div>

                                                            <div class="quantity_total rsp-538">
                                                                <span class="rsp-show-538">
                                                                    Adet : <input class="form-control d-inline-block ml-2 quantity" min="1" size="2" type="number" value="<?php echo $book['quantity']; ?>" name="quantity_rsp[545874]">
                                                                    <!-- <input name="bulk_update_rsp" type="submit" class="btn btn-sm button_cart_update" value="Güncelle"> -->
                                                                    <br>
                                                                    Tutar :<?php echo $book['price']; ?></sup><span class="la la-try la_cur_code"></span></span>
                                                            </div>

                                                            <div class="buttons">
                                                                <!-- <a class="btn btn-light btn-sm add_to_fav_link" href="/index.php?p=Favorites&amp;add=48&amp;fav_type=prd&amp;cart=1">Favorilerime Ekle</a> -->
                                                                <a class="btn btn-light btn-sm del_link" href="#">Sil</a>
                                                            </div>
                                                        </td>

                                                        <td class="rsp-hide-538">
                                                            <?php echo $book['price']; ?></sup><span class="la la-try la_cur_code"></span>
                                                        </td>

                                                        <td width="100" class="rsp-hide-538">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <input class="form-control quantity" min="1" size="2" type="number" value="1" name="quantity[545874]">
                                                                <!-- <input name="bulk_update" type="submit" class="btn btn-sm btn-light mt-2 button_cart_update" value="Güncelle"> -->
                                                            </div>
                                                        </td>
                                                        <td class="rsp-hide-538">
                                                            000
                                                            <span class="la la-try la_cur_code"></span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <input type="submit" name="del" id="del" class="btn btn-danger btn-sm button_delete button_cart_delete" value="Sil">
                                                <div class="ml-auto">
                                                    <span>Ürün Toplamları:&nbsp;</span>
                                                    <b>1000</sup><span class="la la-try la_cur_code"></span></b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <div class="cart-buttons">
                                                <div class="form-group">
                                                    <a class="btn btn-sm btn-dark button_continue_shopping" href="/">
                                                        <span class="">Alışverişe Devam Et</span>
                                                    </a>
                                                    <input name="checkout" type="submit" class="btn btn-sm btn-orange button_checkout" value="Sipariş ver">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger mt-4">Sepetinizde ürün bulunmuyor</div>
                                    <?php endif; ?>
                                </form>


                                <br>

                            </div>
                        </div>
                    </div>


                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>


</body>

</html>