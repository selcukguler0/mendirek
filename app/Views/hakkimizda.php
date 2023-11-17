<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
</head>

<body>
    <?php echo view('layouts/header'); ?>

    <div class="page page_0 page_home  ">
        <div class="container-page container-fluid container_logged_out">
            <div class="Content-wrapper">
                <main class="Content hakkimizda" style="min-height: 500px;">
                    <div class="wrapper">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li class="breadcrumb-item" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/">
                                        <span itemprop="name">Anasayfa</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/hakkimizda">
                                        <span itemprop="name">Hakkımızda</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                        <h1>Hakkımızda</h1>
                        <p>
                            Ülkemizde okuma alışkanlığının gelişimine katkı sağlamak adına birçok alanda özgün ve kaliteli basımları okurlarla buluşturmak için yeni bir yola çıkıyoruz.
                        </p>
                        <p>"Kaliteli kitap okumak herkesin hakkı" ilkesiyle yola çıkarak, Türkiye 'de yeni nesil yazarları ,klasik kült baskıları, çocuk kitaplari ve daha birçok dalda yayınlanmış eserleri Mendirek Yayınları çatısı altında buruşturup,uygun fiyat politikasıyla her bir okuyucuya ulaşmak gayreti içerisindeyiz.
                        </p>
                        <p>Değişen dünyaya ayak uydurmak adına,fikir ve özgürlüklere saygı çerçevesinde, aklından ve kalbinden geçen sözleri kalemiyle kağıda aktarmaya hazır her yazar adayına kapımızı açıp,hayallerine ulaşması yolunda yol arkadaşı olmak istiyoruz.
                            Okuyucularımız, yazarlarımız ve arka planda çalışan arkadaşlarımızla yayıncılık sektörünü daha iyiye taşıma motivasyonumuz daim olacaktır.
                            Heyecanımıza ortak olmanız en büyük arzumuz...</p>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('layouts/footer'); ?>
</body>

</html>