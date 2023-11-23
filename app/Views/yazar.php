<html lang="tr-TR" class="">

<head>
    <?php echo view('layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>
    <div class="page page_0   ">
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
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yazarlar">
                                        <span itemprop="name">Yazarlar</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yazar/<?php echo $author->id ?>">
                                        <span itemprop="name"><?php echo $author->name ?></span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="layout_010">
                        <div>
                            <div class="mod_container __writer_box" id="mod_container_118">
                                <div class="container">
                                    <div class="Box wrt_box">
                                        <div class="Box-header"><a href="/busra-toraman14136798-1592458447-jpg10"><?php echo $author->name ?></a></div>
                                        <div class="Box-content">
                                            <!-- <a href=""><img src="" width="110" height="110" alt="Büşra Toraman" class="wrt_photo"></a> -->

                                            <div class="wrt_description">
                                                <div class="wrt_spot wrt_spot_height" id="wrt_spot_118">
                                                    <p>Yazar Hakkında.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="layout_style" class="container layout_110">
                        <div class="side_column left_column">
                            <div class="mod_container " id="mod_container_120"></div>
                            <div class="mod_container " id="mod_container_92"></div>
                        </div>
                        <div class="main_content">
                            <div class="list prd_list">
                                <div class="prd_list_container_box">
                                    <div class="prd_list_container">
                                        <h1 class="contentHeader prdListHeader"><?php echo $author->name ?> - Yazarın kitapları</h1>

                                        <!-- <div class="prd_list_settings">
                                            <form action="/index.php?" method="get" id="prd_filter">
                                                <input type="hidden" name="p" value="Products"><input type="hidden" name="wrt_id" value="10"><input type="hidden" name="sort_type" value="rel-desc"><input type="hidden" name="page" value="1">
                                                <div class="sort_options">
                                                    <div class="form-group rec_per_page">
                                                        <select title="Ürün Göster" onchange="$('#prd_filter').submit();" class="form-control" name="rec_per_page">
                                                            <option value="10">10</option>
                                                            <option value="20" selected="selected">20</option>
                                                            <option value="30">30</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select title="Sırala" onchange="$('#prd_filter').submit();" class="form-control" name="sort_type">
                                                            <option value="prd_id-desc">Siteye eklenme tarihine göre yeniden eskiye</option>
                                                            <option value="prd_id-asc">Siteye eklenme tarihine göre eskiden yeniye</option>
                                                            <option value="prd_press_date-desc">Üretim Tarihine göre yeniden eskiye</option>
                                                            <option value="prd_press_date-asc">Üretim Tarihine göre eskiden yeniye</option>
                                                            <option value="prd_barcode-desc">Barkod numarasına göre azalan</option>
                                                            <option value="prd_barcode-asc">Barkod numarasına göre artan</option>
                                                            <option value="prd_name-asc">İsme göre artan (A-&gt;Z)</option>
                                                            <option value="prd_name-desc">İsme göre azalan (Z-&gt;A)</option>
                                                            <option value="prd_final_price-desc">Fiyata göre azalan</option>
                                                            <option value="prd_final_price-asc">Fiyata göre artan</option>
                                                            <option value="prs_daily-desc">Günlük çok satanlara göre</option>
                                                            <option value="prs_weekly-desc">Haftalık çok satanlara göre</option>
                                                            <option value="prs_monthly-desc">Aylık çok satanlara göre</option>
                                                            <option value="prs_yearly-desc">Yıllık çok satanlara göre</option>
                                                            <option value="prs_alltimes-desc">Tüm zamanlar çok satanlara göre</option>
                                                            <option value="prd_discount_rate-desc">İndirim oranına göre azalan</option>
                                                            <option value="rel-desc" selected="selected">İlişkilendirmeye göre sırala</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </form>

                                            <a id="ChangeFilters" class="btn btn-sm btn-orange">
                                                <i class="la la-filter"></i>
                                            </a>
                                        </div> -->

                                        <ul class="grid grid-5">
                                            <?php foreach ($books as $book) : ?>
                                                <li>
                                                    <?php echo view('includes/book', ['book' => $book]); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <!-- <nav class="mt-4" aria-label="navigation">
                                            <ul class="pagination">
                                            </ul>
                                        </nav> -->
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