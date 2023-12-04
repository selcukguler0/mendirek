<header class="Header Header--sticky" style="width:100%">
    <div class="container Header-container">
        <div class="Header-logo">
            <i id="HeaderMenuOpen" class="la la-bars"></i>
            <a href="/admin">
                <img src="/img/logo.png" alt="Mendirek">
            </a>
            <i id="HeaderSearchOpen" class="la la-search"></i>
        </div>
        <div class="Header-right">
            <div class="Header-right-profile">

            </div>
            <div>
                <span><b><?php echo $_SESSION["admin"]; ?> </b> </span> <br>
                <a href="/admin/logout" class="btn btn-danger">
                    <span style="color: white;">Çıkış Yap</span>
                </a>
            </div>
            <div class="cart_box_container"></div>
        </div>
    </div>

    <nav class="Header-menu">
        <div class="Header-menu-overlay"></div>
        <div class="container">
            <ul>
                <li><a href="/admin/addbook"><span>Kitap Ekle</span></a>
                </li>
                <li><a href="/admin/news"><span>Bülten Ekle/Düzenle</span></a>
                </li>
            </ul>

        </div>
    </nav>
</header>