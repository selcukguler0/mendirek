<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>
    <div class="page page_0 page_home">
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
                                    <a itemprop="item" href="/orders">
                                        <span itemprop="name">Siparişlerim</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="view Account">
                                <div class="Account-wrapper">
                                    <div class="Account-menu">
                                        <div class="member_nav list-group ">
                                            <a class="list-group-item list-group-item-action user_menu_mmb " href="/hesabim">Üyelik Bilgilerim</a>

                                            <!-- <a class="list-group-item list-group-item-action user_menu_pref " href="">Tercihlerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_adr " href="">Adreslerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_fav" href="">Favorilerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_comments " href="">Yorumlarım</a> -->


                                            <a class="list-group-item list-group-item-action user_menu_orders active" href="/orders">Siparişlerim</a>

                                            <a class="list-group-item list-group-item-action user_menu_cart " href="/card">Sepetim</a>

                                            <!-- <a class="list-group-item list-group-item-action user_menu_points " href="">Puanlarım</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_coupons " href="">Hediye Çeklerim</a> -->


                                            <a class="list-group-item list-group-item-action user_menu_logout" href="/logout">Çıkış</a>
                                        </div>

                                        <div class="member_nav_mobile">
                                            <select class="form-control" style="max-width:90%">
                                                <option selected="" value="/hesabim">
                                                    Üyelik Bilgilerim
                                                </option>
                                                <!-- <option value="?p=MemberPreferences">
                                                    Tercihlerim
                                                </option>

                                                <option value="?p=Address">
                                                    Adreslerim
                                                </option>

                                                <option value="?p=Favorites">
                                                    Favorilerim
                                                </option>

                                                <option value="?p=Comments">
                                                    Yorumlarım
                                                </option> -->

                                                <option selected value="/orders">
                                                    Siparişlerim
                                                </option>

                                                <option value="/card">
                                                    Sepetim
                                                </option>

                                                <!-- <option value="?p=MemberPoints">
                                                    Puanlarım
                                                </option>

                                                <option value="?p=Coupons">
                                                    Hediye Çeklerim
                                                </option> -->



                                                <option value="/logout">
                                                    Çıkış
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="Account-content">
                                        <h1 class="contentHeader mmbViewHeader">
                                            Siparişlerim
                                        </h1>
                                        <?php //sipariş yoksa 
                                        ?>
                                        <?php if (count($orders) <= 0) : ?>
                                            <div class="alert alert-warning" role="alert">
                                                Henüz siparişiniz bulunmamaktadır.
                                            </div>
                                            <?php //sipariş varsa 
                                            ?>
                                        <?php else : ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sipariş No</th>
                                                                    <th>Sipariş Tarihi</th>
                                                                    <th>Toplam Tutar</th>
                                                                    <th>Durum</th>
                                                                    <th>Sipariş İçeriği</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($orders as $order) : ?>

                                                                    <tr>
                                                                        <td><?php echo $order["id"]; ?></td>
                                                                        <td><?php echo $order["created_at"]; ?></td>
                                                                        <td><?php echo $order["orderTotal"]; ?>₺</td>
                                                                        <td><?php echo $order["status"]; ?></td>
                                                                        <td><a href="/order-details/<?php echo $order["id"]; ?>">Detay</a></td>
                                                                    </tr>
                                                                <?php endforeach; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>


                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>

    <script>
        const mobile_navigation =document.querySelector(".member_nav_mobile select");

        mobile_navigation.addEventListener("change", function() {
            window.location.href = this.value;
        });
    </script>

</body>

</html>