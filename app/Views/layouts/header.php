<header class="Header Header--sticky sticky">
    <div class="container Header-container">
        <div class="Header-logo">
            <i id="HeaderMenuOpen" class="la la-bars"></i>
            <a href="/">
                <img src="/img/logo.png" alt="Mendirek">
            </a>
            <i id="HeaderSearchOpen" class="la la-search"></i>
        </div>

        <div class="Search" data-error-text="Arama için en az 3 karakter girmelisiniz.">
            <div class="Search-overlay"></div>
            <div class="Search-container">
                <i id="HeaderSearchClose" class="la la-close"></i>
                <form action="/search">
                    <div class="Search-content">
                        <div class="form-group form-group-search">
                            <input data-container="form-group-search" type="search" name="q" id="qsearch" class="form-control" value="" placeholder="kitap adı / yazar" autocomplete="off">
                            <button type="submit" class="btn">
                                <i class="la la-search" style="margin-top: 4px;margin-right: 15px;"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="Header-right">
            <div class="Header-right-profile">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="btn btn-light orange-btn" href="/hesabim" rel="nofollow">
                        <i style="color: white;" class="la la-user"></i>
                        <span style="color: white;">Hesabım</span>
                    </a>
                <?php else : ?>
                    <a class="btn orange-btn" href="/login" rel="nofollow">
                        <i style="color: white;" class="la la-user"></i>
                        <span style="color: white;">Üye Girişi</span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="Cart ">
                <div class="Cart-icon">
                    <a href="/card" class="btn orange-btn">
                        <i class="la la-shopping-cart"></i>
                        <span style="color: white;">Sepetim</span>
                        <span id="bucket" class="dy_cart_prd_count"></span>
                    </a>
                </div>
            </div>
            <div class="cart_box_container"></div>
        </div>
    </div>

    <nav class="Header-menu">
        <div class="Header-menu-overlay"></div>
        <div class="container">
            <i id="HeaderMenuClose" class="la la-times"></i>
            <div class="Header-right">
                <div class="Header-right-profile">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a class="btn btn-light" href="/hesabim" rel="nofollow">
                            <i class="la la-user"></i>
                            <span>Hesabım</span>
                        </a>
                    <?php else : ?>
                        <a class="btn btn-light" href="/login" rel="nofollow">
                            <i class="la la-user"></i>
                            <span>Üye Girişi</span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="cart_box_container"></div>
            </div>
            <ul>
                <li><a href="/"><span>Anasayfa</span></a>
                </li>
                <li><a href="/kitaplar/kampanya"><span>Kampanyalı Ürünler</span></a>
                </li>
                <li><a href="/kitaplar/cok_satan"><span>Çok Satan Ürünler</span></a>
                </li>
                <li><a href="/yazarlar"><span>Yazarlar</span></a>
                </li>
                <li><a href="/lolla-kids"><span>Lolla Kids</span></a>
                </li>
                <li><a href="/hakkimizda"><span>Hakkımızda</span></a>
                </li>
                <li><a href="/iletisim"><span>İletişim</span></a>
                </li>
                <!-- <li class="d-block d-md-none"><a href="/kategoriler.html"><span>Kategoriler</span></a>
                                <ul>
                                    <li><a href="/yabanci"><span>Yabancı</span></a>

                                    </li>
                                    <li><a href="/yerli"><span>Yerli</span></a>

                                    </li>
                                    <li><a href="/Mendirek-akademi-1"><span>Mendirek Akademi</span></a>

                                    </li>
                                    <li><a href="/canta"><span>Çanta</span></a>

                                    </li>
                                    <li><a href="/kutulu-setler"><span>Kutulu Setler</span></a>

                                    </li>
                                    <li><a href="/set-kutulari"><span>Set Kutuları</span></a>

                                    </li>

                                </ul>
                            </li> -->

            </ul>

        </div>
    </nav>
</header>

