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
                                    <a itemprop="item" href="?p=Members">
                                        <span itemprop="name">Hesabım</span>
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
                                            <a class="list-group-item list-group-item-action user_menu_mmb  active" href="?p=Members">Üyelik Bilgilerim</a>

                                            <!-- <a class="list-group-item list-group-item-action user_menu_pref " href="">Tercihlerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_adr " href="">Adreslerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_fav" href="">Favorilerim</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_comments " href="">Yorumlarım</a> -->


                                            <a class="list-group-item list-group-item-action user_menu_orders " href="orders">Siparişlerim</a>

                                            <a class="list-group-item list-group-item-action user_menu_cart " href="/card">Sepetim</a>

                                            <!-- <a class="list-group-item list-group-item-action user_menu_points " href="">Puanlarım</a> -->

                                            <!-- <a class="list-group-item list-group-item-action user_menu_coupons " href="">Hediye Çeklerim</a> -->


                                            <a class="list-group-item list-group-item-action user_menu_logout" href="/logout">Çıkış</a>
                                        </div>

                                        <div class="member_nav_mobile">
                                            <select onchange="selectMemberMenu(this)" class="form-control">
                                                <option selected="" value="?p=Members">
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

                                                <option value="?p=Orders">
                                                    Siparişlerim
                                                </option>

                                                <option value="?p=Cart">
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
                                            Üyelik Bilgilerim
                                        </h1>

                                        <div class="view_table members_view_table">
                                            <div class="view_table_item">
                                                <label>Üye No : </label>
                                                <span> <?php echo $user['id'] ?> </span>
                                            </div>

                                            <div class="view_table_item">
                                                <label>Ad soyad : </label>
                                                <span><?php echo $user['fullname'] ?></span>
                                            </div>

                                            <div class="view_table_item">
                                                <label>Email Adresi : </label>
                                                <span><?php echo $user['email'] ?> <a href="?p=MemberPassword&amp;t=email_change" class="btn btn-light btn-sm ml-2">Değiştir</a></span>
                                            </div>

                                            <div class="view_table_item">
                                                <label>Şifre : </label>
                                                <span>****** <a href="?p=MemberPassword" class="btn btn-light btn-sm ml-2">Değiştir</a> </span>
                                            </div>

                                            <div class="view_table_item">
                                                <button data-toggle="collapse" data-target="#collapse1" class="btn btn-danger">Üyeliğimi Sil</button>
                                                <div class="collapse py-3 my-3" id="collapse1">
                                                    Üyeliğinizi sildiğinizde üyeliğinizle ilişkili tüm veriler geri döndürülemez şekilde veritabanımızdan silinecektir.
                                                    <form class="py-3" action="?p=Members" method="POST">
                                                        <button class="btn btn-secondary" value="1" type="submit" name="delete_my_account">Devam</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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