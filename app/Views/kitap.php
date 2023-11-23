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

                        <!-- <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yerli">
                                        <span itemprop="name">Yerli</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/yerli/roman-oykuroman-oyku">
                                        <span itemprop="name">Roman/Öykü</span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ul>
                        </nav> -->
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="view prd_view" data-prd-id="884" data-prd-name="Leman Veli Tüm Kitaplar Ciltli (İMZALI)" data-prd-barcode="EPH00036" data-prd-price="1200.00" data-prd-final-price="660.00">
                                <div class="prd_view_item">
                                    <div class="prd_view_img_box">
                                        <div class="new_icon">
                                            <!-- <span>Yeni</span> -->
                                        </div>

                                        <a href="/img/books/<?php echo $book->img; ?>" class="fancybox" id="main_img_link"><img id="main_img" class="tooltipx prd_img prd_view_img" width="300" height="300" src="/img/books/<?php echo $book->img; ?>" data-zoom-image="/img/books/<?php echo $book->img; ?>" alt="/img/books/<?php echo $book->img; ?>" title="/img/books/<?php echo $book->name; ?>"></a>
                                    </div>


                                    <!-- <div class="share-buttons">
                                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=/leman-veli-tum-kitaplar-ciltli-imzali&amp;t=.com" rel="nofollow" onclick="window.open(this.href);return false;">
                                            <span class="la la-facebook"></span>
                                        </a>
                                        <a class="twitter" href="https://twitter.com/intent/tweet?text=.com&amp;url=/leman-veli-tum-kitaplar-ciltli-imzali" rel="nofollow" onclick="window.open(this.href);return false;">
                                            <span class="la la-twitter"></span>
                                        </a>
                                        <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=/leman-veli-tum-kitaplar-ciltli-imzali&amp;title=.com&amp;summary=&amp;source=" rel="nofollow" onclick="window.open(this.href);return false;">
                                            <span class="la la-linkedin"></span>
                                        </a>
                                        <a class="pinterest" href="http://pinterest.com/pin/create/button/?url=/leman-veli-tum-kitaplar-ciltli-imzali&amp;media=/u//img/c/3/4/34-jpeg-1699879157.jpg&amp;description=.com" rel="nofollow" onclick="window.open(this.href);return false;">
                                            <span class="la la-pinterest"></span>
                                        </a>
                                        <a class="whatsapp" href="https://api.whatsapp.com/send?text=/leman-veli-tum-kitaplar-ciltli-imzali">
                                            <span class="la la-whatsapp"></span>
                                        </a>
                                    </div> -->
                                </div>

                                <div class="prd_view_item">
                                    <h1 class="contentHeader prdHeader">
                                        <?php echo $book->name; ?>
                                        <!-- <a id="ButtonFav" class="button_fav" title="Favorilerim ne işe yarar?|Favorilerinize eklediğiniz kitapların fiyatı değiştiğinde email ile bilgilendirilirsiniz. Favorilerimi kullanabilmek için üye girişi yapmanız gerekir." rel="nofollow" href="#" onclick="$(this).addClass('active');$('.fav_result_container').load('/index.php?p=Favorites&amp;add=884&amp;fav_type=prd&amp;popup=1&amp;no_common=1','Favorilerime Ekle');return false;">
                                            <i class="la la-bookmark"></i>
                                        </a> -->
                                    </h1>

                                    <div class="fav_result_container"></div>

                                    <!-- <div class="vote_section">
                                        <div class="vote_imgs">
                                            <a class="vote_items dy_selected" rel="nofollow" onclick="$('.vote_result').html('Bu işlem için üye girişi yapmanız gerekiyor - <a href=/index.php?p=Login&amp;return_url=%2Bd1ltp77gSkQBz5EKihQKJn2tRmoPSXyc3Pu7kpXi6s5JvO10Wiix%2Fhf1eP0QiSmwJ2xh2v7FXbCJPGzZ6xXg8HJRHOLZTu35rPtjMEQUFF4R6w2CSCyuyeEiZkJ1A%2Fjyb%2FzQyFN526dpthOeV7fyVkxO2bEYxjRi9dmeUn3oIs%3D>Üye Girişi</a>')">
                                                <span class="la la-star"></span>
                                            </a>
                                            <a class="vote_items dy_selected" rel="nofollow" onclick="$('.vote_result').html('Bu işlem için üye girişi yapmanız gerekiyor - <a href=/index.php?p=Login&amp;return_url=CHF%2FMADRJZAj2zCLhREERluKIhRUutTwdihaxPAflVJpa%2F3TE7jsCHqcUBzVX61ZDvA76mG3lbwVCRM6gEaUx6qUpfPezbGBxeYjaAK3%2F9yfwYjlv1P9BOJ9U1ZzvN6aT%2Bcu0NkGlfp2g9V%2FjmMM0TGUyKiRvyfvhrRfp0fAnrE%3D>Üye Girişi</a>')">
                                                <span class="la la-star"></span>
                                            </a>
                                            <a class="vote_items dy_selected" rel="nofollow" onclick="$('.vote_result').html('Bu işlem için üye girişi yapmanız gerekiyor - <a href=/index.php?p=Login&amp;return_url=25GGMPqNs6LonL3U2FyFb7rFcJ966Ac0WkyrNBpWYrnzZtQA%2F5X7iGrHttNNzNeXqYScOItOD62i2xxh5f7ehS9cdv1LAY%2FG%2BJp4xTmeYdF2WfaAE%2Ffz0cSEH5vPCTzWv%2BLf1U45sUq7c%2BIFFFr%2FQIt80oX97VfrGEVqYF0B4AI%3D>Üye Girişi</a>')">
                                                <span class="la la-star"></span>
                                            </a>
                                            <a class="vote_items dy_selected" rel="nofollow" onclick="$('.vote_result').html('Bu işlem için üye girişi yapmanız gerekiyor - <a href=/index.php?p=Login&amp;return_url=OcMdUiD74PCwWiIfvHSc3rzQgHpo63kHM%2FnJ2HMbFN47DczLdmyHREU%2Fc9XWiaDYb8Y8xCK9OLsCq5aAmBuTnad8f09RmHf5h6Ptn2lkzIYw35U6LccQ%2FsJ1v7DUxQPdX%2F0rx0y%2BNpD6r9BoXUjgPhg8%2FK5V9GIpvleiHZqL5%2B4%3D>Üye Girişi</a>')">
                                                <span class="la la-star"></span>
                                            </a>
                                            <a class="vote_items dy_selected" rel="nofollow" onclick="$('.vote_result').html('Bu işlem için üye girişi yapmanız gerekiyor - <a href=/index.php?p=Login&amp;return_url=6kDq2lBF8xNtRbFx1TGyaZZMWs21AOSTLfGIvPB9CzvKpYyVlonMEG6hlDitcJMwy54OG5UCP3AWycUfSpgGOFU9NKmmjroWmI8GKObKHi14%2Fi3IbdoqSOZRxqrRQqUy7IMGOdOt2XVxk5rbjiY%2F%2F3PMJ67Dp6kvhHKYwqr%2BECA%3D>Üye Girişi</a>')">
                                                <span class="la la-star"></span>
                                            </a>
                                    <span class="vote_stats">5.00/5</span>
                                </div>
                                <div class="vote_result vote_result_884" onclick="$(this).toggle()"></div>
                            </div> -->
                                    <div class="prd_brand_box">
                                        <div class="writers">
                                            <a class="writer" href="/yazar/<?php echo $book->author_id; ?>"><span><?php echo $book->author; ?></span></a>
                                        </div>
                                    </div>

                                    <div class="prd_fields">

                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_barcode">
                                            <div class="prd_fields_label">Stok Kodu:</div>
                                            <div class="prd_fields_text">EPH00036</div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_size">
                                            <div class="prd_fields_label">Boyut:</div>
                                            <div class="prd_fields_text">135 x 210</div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_page_count">
                                            <div class="prd_fields_label">Sayfa Sayısı:</div>
                                            <div class="prd_fields_text">+1000</div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_press_loc">
                                            <div class="prd_fields_label">Basım Yeri:</div>
                                            <div class="prd_fields_text">Türkiye</div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_press_count">
                                            <div class="prd_fields_label">Baskı:</div>
                                            <div class="prd_fields_text">1</div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_press_date">
                                            <div class="prd_fields_label">Basım Tarihi:</div>
                                            <div class="prd_fields_text">2023</div>
                                        </div>


                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_illustrator">
                                            <div class="prd_fields_label">Entegra Ürün Kodu:</div>
                                            <div class="prd_fields_text">EPH00036</div>
                                        </div>

                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_cover_type">
                                            <div class="prd_fields_label">Kapak Türü:</div>
                                            <div class="prd_fields_text">Ciltli</div>
                                        </div>

                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_paper_type">
                                            <div class="prd_fields_label">Kağıt Türü:</div>
                                            <div class="prd_fields_text">2. Hamur</div>
                                        </div>

                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_language">
                                            <div class="prd_fields_label">Dili:</div>
                                            <div class="prd_fields_text"><?php echo $book->language; ?></div>
                                        </div>
                                        <div class="prd_fields_item prd_book_fields_item prd_book_fields_item_prd_origname">
                                            <div class="prd_fields_label">Kategori:</div>
                                            <div class="prd_fields_text">
                                                <a href="/kitaplar/<?php echo strtolower($book->category); ?>"> <?php echo $book->category; ?> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricebox">
                                        <!-- <div class="discount" title="İndirimli Kitap|Bu kitabı satın aldığınızda %45 karlı çıkacaksınız.">
                                            <span class="discount_number">%45</span>
                                            <span class="discount_text">indirimli</span>
                                        </div> -->

                                        <div class="pricebox_content">
                                            <!-- <div class="prd_view_price_row list_price_row">
                                                <span class="prd_view_price_value price_cancelled">
                                                    <span id="prd_price_display">1.200<sup>,00</sup><span class="la la-try la_cur_code"></span></span>
                                                </span>
                                            </div> -->
                                            <div class="prd_view_price_row sale_price_row">
                                                <span class="prd_view_price_value final_price">
                                                    <span id="prd_final_price_display"><?php echo $book->price; ?><sup>,00</sup><span class="la la-try la_cur_code"></span></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="cargo_paying">
                                        <span>KARGO BEDAVA</span>
                                    </div> -->
                                    <!-- <div class="prd_supply_time supply_time">Temin süresi 2 gündür.</div> -->
                                    <div class="actions">
                                        <div class="add_cart">
                                            <!-- <div class="form-group">
                                                <input class="form-control prd-quantity" size="1" min="1" type="number" name="quantity" value="1">
                                            </div> -->
                                            <button book-id="<?php echo $book->id ?>" book-name="<?php echo $book->name ?>" book-price="<?php echo $book->price ?>" book-img="<?php echo $book->img ?>" onclick="addToCart(this)" class="btn btn-orange">
                                                <span class="button-text">Sepete Ekle</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="prd_view_actions">
                                        <!-- <a class="btn btn-light btn-sm button_share" title="Paylaşın!|Bu kitabı arkadaşlarınıza da tavsiye edin." rel="nofollow" href="#" onclick="$('.result_box_wrapper').addClass('active');$('.result_box').loadPage('/index.php?p=Sharings&amp;shr_item_id=884&amp;popup=1&amp;no_common=1','Tavsiye et');return false;"><span class="">Tavsiye et</span></a>
                                        <a class="btn btn-light btn-sm button_feedback" title="Hata bildirimi|Kitap ile ilgili bilgilerde eksik veya yanlışlık varsa lütfen buradan bildiriniz" rel="nofollow" href="#" onclick="$('.result_box_wrapper').addClass('active');$('.result_box').loadPage('/index.php?p=ProductFeedbacks&amp;edit=-1&amp;prf_prd_id=884&amp;popup=1&amp;no_common=1','Hata bildir');return false;"><span class="">Hata bildir</span></a> -->

                                        <div class="result_box_wrapper">
                                            <div class="result_box_overlay" onclick="$('.result_box_wrapper').removeClass('active');"></div>
                                            <div class="result_box"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                            <div itemscope="" itemtype="https://schema.org/Product" class="rich-snippets">
                                <div itemprop="sku">EPH00036</div>
                                <div itemprop="productID">884</div>
                                <img itemprop="image" width="300" height="300" src="/u//img/b/3/4/34-jpeg-1699879157.jpg" alt="Leman Veli Tüm Kitaplar Ciltli (İMZALI)">
                                <div itemprop="url">/leman-veli-tum-kitaplar-ciltli-imzali</div>
                                <div itemprop="name">Leman Veli Tüm Kitaplar Ciltli (İMZALI) </div>
                                <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope="">
                                    <meta itemprop="name" content="Ephesus Yayınları">
                                </div>

                                <div itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
                                    <span itemprop="price">660.00</span>
                                    <span itemprop="priceCurrency" content="TRY"></span>
                                    <span itemprop="availability" content="https://schema.org/InStock"></span>
                                    <meta itemprop="priceValidUntil" content="2023-11-23">
                                </div>
                                <div itemprop="itemCondition" content="https://schema.org/NewCondition"></div>
                                <div itemprop="description">
                                    <p>Leman Veli Tüm kitaplar Ciltli (İMZALI)</p>
                                    <p>. YEŞİLİ SEVMEK CİLTLİ (İMZALI)</p>
                                    <p>. FELAH CİLTLİ (İMZALI)</p>
                                    <p>. HALEF 1 DÜŞ CİLTLİ (İMZALI)</p>
                                    <p>. HALEF 2 DÜŞÜŞ CİLTLİ (İMZALI)</p>
                                    <p>. ROTA 1 CİLTLİ (İMZALI)</p>
                                    <p>. ROTA 2 CİLTLİ (İMZALI)</p>
                                </div>
                            </div> -->
                            <div class="mod_container" style="margin: 20px 0;">
                                <div class="container">
                                    <div class="Box box_prd box_prd_3 box_prd_detail">
                                        <div class="Box-header"><a href="javascript:void(0);">Açıklama</a></div>

                                        <div class="Box-content">
                                            <div class="wysiwyg prd_description noContext">
                                                <p>Kitap açıklama alanı.</p>
                                            </div>

                                        </div>
                                        <div class="Box-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mod_container " id="mod_container_98">
                                <div class="container">
                                    <div class="Box box_prd box_prd_slide">
                                        <div class="Box-header">
                                            <a href="/yazar/<?php echo $author_id ?>">Yazarın Diğer Kitapları</a>
                                        </div>
                                        <div class="Box-content">
                                            <?php if (!empty($books)) : ?>
                                                <div class="Carousel-wrapper" style="position: relative;">
                                                    <div class="swiper otherBooksSwiper">
                                                        <ul class="swiper-wrapper" style="height: fit-content;">
                                                            <?php foreach ($books as $book) : ?>
                                                                <li class="swiper-slide">
                                                                    <?php echo view('includes/book', ['book' => $book]); ?>
                                                                </li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                    </div>
                                                    <div class="swiper-button-next" style="margin-bottom: 20px;"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($books)) : ?>
                                            <div class="Box-footer">
                                                <div class="Box-footer-more">
                                                    <a class="btn btn-orange" href="/yazar/<?php echo $author_id ?>">Tümünü göster</a>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="Box-footer">
                                                <div class="alert alert-danger">Yazarın başka kitabı bulunmuyor.</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('layouts/footer'); ?>

    
    <script>
        new Swiper(".otherBooksSwiper", {
            grabCursor: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>
</body>

</html>