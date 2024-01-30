<html lang="tr-TR" class="">

<head>
    <?php echo view('layouts/head'); ?>
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
                                    <a itemprop="item" href="/register">
                                        <span itemprop="name">Üye Ol</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="Box Box--form Sign">
                                <?php if (!empty($error)) {
                                    echo '<div class="alert alert-danger">' . $error . '</div>';
                                } ?>
                                
                                <h1 class="contentHeader pageViewHeader">Üyelik işlemleri</h1>

                                <div class="Sign-wrapper">
                                    <div class="Sign-content">
                                        <form action="/register" method="post">
                                            <?= csrf_field(); ?>

                                            <?php if (isset($error)) : ?>
                                                <div class="alert alert-danger">
                                                    <?php echo $error; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="form_table Sign-form">
                                                <div class="form-group">
                                                    <input placeholder="Ad soyad" class="form-control" type="text" required="required" name="fullname" id="fullname" value="">
                                                    <?php if (isset($validation) && $validation->hasError('fullname')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('fullname'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Email Adresi" required="required" type="email" name="email" id="email" value="">
                                                    <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('email'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <div><small>Şifre en az 8 karakter uzunluğunda olmalı ve en az birer adet <b>büyük harf, küçük harf, rakam ve noktalama (% &amp; = - ! . , + # $ vb.) karakteri</b> içermelidir</small></div>
                                                    <input placeholder="Şifre" class="form-control" type="password" required="required" name="password" id="password" value="">
                                                    <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('password'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input placeholder="Şifre(Tekrar)" class="form-control" type="password" required="required" name="confirm_password" id="confirm_password" value="">
                                                    <?php if (isset($validation) && $validation->hasError('confirm_password')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('confirm_password'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input placeholder="Cep telefonu" class="form-control" type="text" name="phone" id="phone" maxlength="30" value="">
                                                    <?php if (isset($validation) && $validation->hasError('phone')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('phone'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter">
                                                    <label class="form-check-label" for="newsletter">Email listesine ekle</label>
                                                </div>
                                                <div class="form-group form-check cfg_terms_and_conds">
                                                    <input required="required" class="form-check-input" type="checkbox" name="terms_and_conds" id="terms_and_conds">
                                                    <label class="form-check-label myPopupModal1ButtonM" data-toggle="modal" data-target="#termsPopupModal0" style="text-align: left; cursor:pointer">
                                                        Üyelik Koşulları sayfalarındaki şartları okudum ve kabul ediyorum
                                                    </label>
                                                    <?php if (isset($validation) && $validation->hasError('terms_and_conds')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('terms_and_conds'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group form-check cfg_terms_and_conds">
                                                    <input required="required" class="form-check-input" type="checkbox" name="kvkk" id="kvkk">
                                                    <label class="form-check-label myPopupModal1ButtonM" data-toggle="modal" data-target="#termsPopupModal1" style="text-align: left; cursor:pointer">
                                                        KVKK Aydınlatma Metni sayfalarındaki şartları okudum ve kabul ediyorum
                                                    </label>
                                                    <?php if (isset($validation) && $validation->hasError('kvkk')) : ?>
                                                        <div class="alert alert-danger">
                                                            <?= $validation->showError('kvkk'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>


                                                <input type="hidden" id="token" name="token">
                                                <input name="save" id="save_member" type="submit" class="btn btn-orange button_save button_member_save" value="Kaydet">
                                                <!--<span class="required_fields_desc error">Doldurulması zorunlu alanlar * ile işaretlenmiştir.</span>-->
                                            </div>
                                        </form>
                                    </div>

                                    <div class="Sign-desc">

                                        <div class="members_form_desc alert alert-warning">
                                            <b>Üye olarak sitemizin imkanlarından daha fazla yararlanabilirsiniz.. </b>
                                            <ul>
                                                <li>Alışverişlerinizden puan kazanabilirsiniz</li>
                                                <li>Adreslerinizi bir kez tanımlayarak, her alışverişte tekrar tanımlama zahmetinden kurtulabilirsiniz.</li>
                                                <li>Siparişlerinizi panelinizden takip edebilirsiniz.</li>
                                                <li>Beğendiğiniz ürünleri favori listenize ekleyebilir, fiyatları değiştiğinde otomatik bilgilendirme hizmetinden yararlanabilirsiniz.</li>
                                            </ul>

                                        </div>

                                        <div class="banner_mmb_form"></div>

                                        <div class="members_form_social_links">


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="termsPopupModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Üyelik Koşulları</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>1. İşbu Üyelik Sözleşmesi&nbsp;<a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a>&nbsp; ve bağlı iştirakleri (Bundan böyle&nbsp;<a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a>&nbsp;olarak anılacaktır) tarafından, www.ephesusyayinlari.com web sitesinin kullanılmasına ilişkin kuralları ve şartları belirlemek amacıyla hazırlamıştır.</p>
                                            <p><br>2. www.ephesusyayinlari.com, Sözleşmeyi onaylayan üyelerine kampanya ve duyuruları düzenli olarak gönderir ve online alışveriş yapmasına olanak verir.</p>
                                            <p><br>3.&nbsp;<a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a>&nbsp; web sitesi kişiseldir, devredilemez ya da satılamaz.</p>
                                            <p><br>4. Üye kendisinin belirleyeceği bir "şifre” ye sahip olur. Kullanıcı dilediği zaman şifresini değiştirebilir. <a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a> üye güvenliği konusunda tüm önlemleri almış bulunmaktadır. Üyeler ise üye güvenliğinden kendileri de sorumludur. <a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a>, müşterilerinden hiçbir şekilde şifre bilgisini istememektedir. www.ephesusyayinlari.com, şifre kullanımından doğacak problemlerden kesinlikle sorumlu değildir.Kayıt sırasında vermiş olduğunuz e-mail adresi üyeye özeldir ve tek üyelik oluşturma imkanına sahiptir; aynı e-mail adresi ile iki farklı üyeliğiniz olamaz. "Şifre” sadece kullanıcı tarafından bilinir.Kullanıcının üyelik gerektiren servislere bağlanabilmesi için kayıt sırasında girdiği e-mail adresi ve şifresini girmesi gerekmektedir.</p>
                                            <p><br>5. Üye, www.ephesusyayinlari.com’a verdiği kişisel ve alışveriş bilgilerinin tarafına kampanya uygulamaları sunulması amacıyla www.ephesusyayinlari.com kendisiyle iletişime geçmesini kabul eder.</p>
                                            <p>6. Üye, www.ephesusyayinlari.com üye olurken vermiş olduğu eksik ve yanlış bilgi nedeniyle uğrayacağı zararlardan yalnızca kendisinin sorumlu olduğunu, yanlış bilgi vermesi durumunda ve işbu sözleşmenin Üye tarafından ihlali halinde, www.ephesusyayinlari.com tek taraflı olarak herhangi bir ihbara ve ihtara ihtiyaç duymaksızın üyeliğini sona erebileceğini kabul eder.</p>
                                            <p><br>7. Üye, tüm hakları www.ephesusyayinlari.com’a ait olan ve www.ephesusyayinlari.com üzerinde yer alan bilgi, belge, yazılım, tasarım, grafik, yazı, görsel, video vb. eserleri veya herhangi bir içeriği kopyalamayacağını, çoğaltıp yayınlamayacağını, pazarlamayacağını kabul ve taahhüt eder.</p>
                                            <p><br>8. www.ephesusyayinlari.com herhangi bir zamanda sistemin çalışmasını geçici bir süre askıya alabilir veya tamamen durdurabilir. www.ephesusyayinlari.com’un sistemin geçici bir süre askıya alınması veya tamamen durdurulmasından dolayı&nbsp;<a href="http://www.ephesusyayinlari.com">www.ephesusyayinlari.com</a>&nbsp; üyelerine veya üçüncü şahıslara karşı hiçbir sorumluluğu olmayacaktır.</p>
                                            <p>- www.ephesusyayinlari.com kullanıcı adı ve şifresini doğru şekilde girmiş olmasına rağmen üyenin sisteme girişini veya yeni bir şifre almasını neden belirtmeksizin engelleyebilir.</p>
                                            <p>- www.ephesusyayinlari.com kendi ürettiği ve/veya dışarıdan satın aldığı bilgi, belge, yazılım, tasarım, grafik vb. eserlerini mülkiyetten doğan telif haklarına sahiptir.</p>
                                            <p>- www.ephesusyayinlari.com satışları stokları ile sınırlıdır. www.ephesusyayinlari.com stoğu bulunmayan ürünlerin teslimatını yapmayabilir, siparişi iptal ederek, sipariş tutarını müşterinin hesabına iade edebilir.</p>
                                            <p>&nbsp;</p>
                                            <p>9. Ürünlerin sanal mağazada teşhir edilmesi, söz konusu ürünlerin mutlaka www.ephesusyayinlari.com veya www.ephesusyayinlari.com mağazalarının stoklarında bulunduğu anlamına gelmez.</p>
                                            <p>&nbsp;</p>
                                            <p>- Üyelerin ürettiği ve yayınlamak üzere kendi iradesiyle sisteme yüklediği bilgi, belge, yazılım, tasarım, grafik vb. eserler izinsiz kullanılamaz.</p>
                                            <p>- www.ephesusyayinlari.com’de satışa sunulan ürünlerin fiyat ve ürün özellik bilgilerini değiştirme yetkisi münhasıran www.ephesusyayinlari.com'a aittir. Fiyat ve ürün özellik bilgilerinde hata olduğu takdirde münhasır seçme yetkisi kendisinde olmak şartıyla www.ephesusyayinlari.com hatayı düzelterek ürün teslimatı yapabilir veya siparişi iptal ederek, sipariş tutarını müşteri hesabına iade edebilir.</p>
                                            <p>- www.ephesusyayinlari.com, üyenin başka web sitelerine geçişini sağlayabilir. Bu takdirde üyenin geçiş yapacağı sitelerin içeriğinden www.ephesusyayinlari.com sorumlu değildir.</p>
                                            <p>- www.ephesusyayinlari.com ileride doğacak teknik zaruretler ve mevzuata uyum amacıyla işbu sözleşmenin uygulanmasında değişiklik yapabileceği gibi, mevcut maddelerini değiştirebilir veya yeni maddeler ilave edebilir. www.ephesusyayinlari.com üyelik gerektirmeyen servisleri zaman içerisinde üyelik gerektiren bir duruma dönüştürebilir, ilave servisler açabilir, bazı servislerini kısmen veya tamamen değiştirebilir veya ücretli hale dönüştürebilir.</p>
                                            <p>- Üye bu sözleşmeden doğabilecek ihtilaflarda sozcukitabevi defter kayıtlarıyla, mikrofilm, mikrofiş ve bilgisayar kayıtlarının HMK 193. vd maddeleri anlamında muteber, bağlayıcı, kesin ve münhasır delil teşkil edeceğini ve bu maddenin delil sözleşmesi niteliğinde olduğunu kabul ve taahhüt eder. sozcukitabevi kayıtlarına yönelik her türlü itiraz ile bunların usulüne uygun tutulduğu hususunda yemin teklif hakkından peşinen feragat ettiğini kabul, beyan ve taahhüt eder.</p>
                                            <p>&nbsp;</p>
                                            <p>10. Bu sözleşmeyle ilgili olarak çıkabilecek ihtilaflarda öncelikle bu sözleşmedeki hükümler, hüküm bulunmayan hallerde ise yürürlükteki Türk mevzuatı uygulanacaktır.</p>
                                            <p><br>11. İşbu sözleşmenin uygulanmasından doğabilecek her türlü uyuşmazlıkların çözümünde T.C. Gebze Merkez Mahkemeleri ile İcra Müdürlükleri yetkili olacaktır.</p>
                                            <p><br>12. Üye, üye kayıt formu doldurduktan ve şifre aldıktan sonra bu sözleşme taraflar arasında süresiz olarak yürürlüğe girer.</p>
                                            <p><br>13. www.ephesusyayinlari.com dilediği zaman bu sözleşmeyi tek taraflı olarak feshedebilir.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="termsPopupModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">KVKK Aydınlatma Metni</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>KİŞİSEL VERİLERİN İŞLENMESİ ve KORUNMASI HAKKINDA AYDINLATMA METNİ(VERİ POLİTİKASI)</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>Bir veri işleyicisi tüzel kişilik olarak Ephesus Basım Yayın Tic. Ltd. Şti. “EPHESUS” kişisel verilerinizin korunmasına büyük önem vermektedir. Tüzel kişiliğimiz veri sorumlusu sıfatıyla, kişisel verilerinizi 6698 sayılı Kişisel Verilerin Korunması Kanunu ve ilgili alt mevzuata uygun olarak elde edip, toplayıp işlemektedir.</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel verilerin işlenmesi ve korunması hakkında aydınlatma sağlayan bu Metin;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel verilerin hangi kaynaktan elde edildiği,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel verileri elde etme ve işleme konusundaki hukuki sebepleri,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel verilerin hangi amaçlarla elde edildiğini ve işlendiğini,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel verilerin aktarılıp aktarılmadığı ve hangi amaçlarla kimlere aktarılabileceği,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel verisi işlenenlerin yasal hakları,</p>
                                            <p>&nbsp;</p>
                                            <p>Konularında detaylandırma sağlamaktadır.</p>
                                            <p>&nbsp;</p>
                                            <p>VERİSİNİ İŞLEDİĞİMİZ KİŞİLER</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS veri sorumlusu sıfatıyla, aşağıdaki kişi grupları ile sınırlı olarak kişisel verileri işlemektedir.</p>
                                            <p>&nbsp;</p>
                                            <p>1-İşçiler.</p>
                                            <p>2-İşçi Adayları(İş başvurusu yapanların deklare ettiği referans kişileri dahil)</p>
                                            <p>3-Stajyerler.</p>
                                            <p>4-İşbaşı Eğitim Kursiyerleri.</p>
                                            <p>5-Yazarlar ve Telif Hakları Sahipleri.</p>
                                            <p>6-Her türlü ticari faaliyetin tarafları&nbsp; veya ticari faaliyet gereği işbirliği yaptığımız veya yapacağımız kişiler veya bu türden şirketlerin yetkili yada çalışanları(Tedarik, reklam, tanıtım, destek, pazarlama, ulaşım, referans kaynakları vb.)</p>
                                            <p>7-Müşteriler(Elektronik ticaret dahil)</p>
                                            <p>8-Avukat ve danışmanlar yada danışmanlık şirketlerinin yetkili yada çalışanları.</p>
                                            <p>9-Ziyaretçiler.</p>
                                            <p>10-Tüm veri sahiplerinin kanuni temsilcileri, ebeveynler, veli veya vasiler.</p>
                                            <p>11-Hukuki süreçlerde taraf konumunda olan kişiler ve bunların yasal temsilcileri.</p>
                                            <p>12-Ticari veya hukuksal bağlantısı olmadığı halde iletişime geçilmiş 3.kişiler.</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>İŞLEDİĞİMİZ KİŞİSEL VERİLER</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS veri sorumlusu sıfatıyla, aşağıdaki belirtilen kişisel sağlık verisi, genel ve özel nitelikli kişisel verileri “hukuka uygunluk”, “gereklilik”, “amaca uygunluk” ve “sınırlılık” ilkelerine göre işlemektedir.</p>
                                            <p>&nbsp;</p>
                                            <p>Kimlik Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>Verisi işlenecek kişilerin adı-soyadı, uyruğu, T.C. kimlik numarası, Türk vatandaşı olunmaması halinde pasaport numarası ve bilgileri veya geçici TC kimlik numarası, doğum yeri ve tarihi, medeni hali, cinsiyet bilgisi gibi kimliğe dair tüm verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Kişiyi Tanımlayan Veriler</p>
                                            <p>&nbsp;</p>
                                            <p>Kişinin el yazısı yada imzası kişiyi tanımlayan verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>İletişim Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>İkamet adresi, iş adresi, yazışma adresi, telefon veya mobil telefonu numarası, elektronik posta adresi gibi iletişime dair tüm verileridir.</p>
                                            <p>&nbsp;</p>
                                            <p>Görsel&nbsp; ve İşitsel Veriler</p>
                                            <p>&nbsp;</p>
                                            <p>Şirket güvenlik kameraları tarafından güvenlik amacı ile kapalı devre kamera sistemi ile alınan görüntüler, şirket telefon santrali sesli yanıt sisteminde kalite standartları gereği alınan görüşme kayıtları &nbsp;bu kapsamdaki verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Özlük Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>İşçilerin işe başlama tarihi, ücret, aylık çalışma gün sayısı gibi özlük işlemlerine dair yasa veya iş sözleşmesi gereği alınan verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Eğitim Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>İşçiler, işçi adayları, stajyerler veya işbaşı eğitimi kursiyerleri yada ilgili diğer kişiler bakımından eğitim durumuna, eğitim belgelerine dair verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>İş ve Meslek Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>İşçiler, işçi adayları, stajyerler veya işbaşı eğitimi kursiyerleri, telif sahipleri &nbsp;yada ilgili diğer kişiler bakımından&nbsp; iş veya mesleğe dair tüm verilerdir. (Mesleki deneyim, diploma, kurs verileri dahil)</p>
                                            <p>&nbsp;</p>
                                            <p>Yorum ve Şikayet Verileri</p>
                                            <p>&nbsp;</p>
                                            <p>Sunulan hizmetleri değerlendirmek amacı ile, web sitesi üzerinden veya başka kanallardan, onay ve rıza vererek Şirketimize iletilen yorum ve şikayet verileridir.</p>
                                            <p>&nbsp;</p>
                                            <p>Konum veya Lokasyon Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>Kişilerin herhangi bir yolla ve kendi rızası ile ilettiği&nbsp; adres&nbsp; veya&nbsp; konum verileridir.</p>
                                            <p>&nbsp;</p>
                                            <p>İşlem Güvenliği Verisi(IP Verisi ve Çerezler)</p>
                                            <p>&nbsp;</p>
                                            <p>IP adresi, tarayıcı bilgileri, İnternet sitesi giriş çıkış ve parola bilgileri,(Mac ID, IP adres bilgisi, internet sitesi giriş çıkış ve&nbsp; parola bilgileri) bu kapsamdadır.</p>
                                            <p>&nbsp;</p>
                                            <p>Hukuk Verisi</p>
                                            <p>&nbsp;</p>
                                            <p>Kişilerin davacı, davalı olmalarına ilişkin tüm veriler ve icra verileridir. İşçiler ve şirketle davası yada icra takibi bulunan herhangi bir kişiyle ilgili verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Finansal Veriler</p>
                                            <p>&nbsp;</p>
                                            <p>Kişilerin banka hesap numarası ve IBAN numarası gibi verileridir. Şirkette çalışan işçiler ve şirketten hizmet alan hastalar yönünden talep edilip işlenen verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>İşçilere İlişkin Sağlık Verileri</p>
                                            <p>&nbsp;</p>
                                            <p>İşçilerden, iş mevzuatı, iş akdi ve iş sağlığı ve güvenliği mevzuatı gereği özlük dosyasında muhafaza edilmek üzere alınan sağlık raporları ve alınan tıbbi belgelerde geçen verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Müşteri İşlem Verileri</p>
                                            <p>&nbsp;</p>
                                            <p>Müşteri kredi kartı, mail order, avans makbuzu, ödeme makbuzu, fatura, senet, çek, dekont, sipariş bilgisi, talep bilgisi vb. bu kapsamdaki verilerdir.</p>
                                            <p>&nbsp;</p>
                                            <p>Biyometrik Veriler</p>
                                            <p>&nbsp;</p>
                                            <p>İşyeri girişinde işçilerin geçişi için kullanılan parmak izi veriler bu kapsamdadır.</p>
                                            <p>&nbsp;</p>
                                            <p>Fiziki Mekan Güvenliği Verileri</p>
                                            <p>&nbsp;</p>
                                            <p>Çalışan ve ziyaretçilerin giriş çıkış kayıt bilgileri, güvenlik kamerası kayıtları bu kapsamdaki verilerdir.&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>III.KİŞİSEL VERİLERİN İŞLENMESİ</p>
                                            <p>&nbsp;</p>
                                            <p>A.KİŞİSEL VERİLERİN ELDE EDİLMESİ</p>
                                            <p>&nbsp;</p>
                                            <p>1.Kişisel Verilerin Hangi Kanallarla ve Nasıl Toplandığı</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel Verileriniz;</p>
                                            <p>&nbsp;</p>
                                            <p>1.1.Ephesus Basım Yayın Tic. Ltd. Şti.’ne ait www.ephesusyayinleri.com web sitesi üzerinden elde edilen kişisel veriler. (Web sitesinde “yorum yap” veya “üyelik” kısmından elde edilen kişisel veriler)</p>
                                            <p>1.2.Telefonlar üzerinden veya SMS yada WhatsApp vb. uygulamalar üzerinden kurulan iletişim ve görüşme sonucunda,</p>
                                            <p>1.3.Şirketimize başvurulması durumunda, yapılacak yüz-yüze görüşmeler sonucunda,</p>
                                            <p>1.4.Ticari faaliyetin gereği olarak iş ilişkisi içinde olunan kişi ve şirket yetkili yada çalışanlarının sözleşme ve diğer ticari faaliyet belgeleri üzerinde, iletişim platformlarında kişisel verilerin yer almakta olması,</p>
                                            <p>1.5.Müşavir, avukat ve danışmanlarımız yada danışmanlık şirketlerinin yetkili yada çalışanlarının sözleşme ve diğer ticari faaliyet belgeleri üzerinde, iletişim platformlarında kişisel verilerin yer almakta olması sonucunda,</p>
                                            <p>1.6. EPHESUS’un sosyal medya üzerinden yaptığı tanıtım ve reklam üzerinden “bize ulaşın” veya “bilgi alın” gibi paneller aracılığı ile yapılan başvurular sonucunda,</p>
                                            <p>1.7.Kablosuz İnternet hizmeti kapsamında misafirlere özel kablosuz ağ(Wi-Fi) yayında, yayına bağlanabilmek için mevzuat gereği talep edilen kişisel veriler ve &nbsp;şifreleme için mobil telefon numarası talep edilmesi sonucunda,</p>
                                            <p>1.8.Web sitesine yapılan girişlerden MAC ID’nin(Cihaz Kimlik Bilgisi) kaydedilmesi şeklinde veri elde edilmesi sonucunda,</p>
                                            <p>1.9.EPHESUS ile ticari veya hukuksal bağlantısı olmadığı halde iletişime geçtiğimiz veya bizlerle iletişime geçilmesi halinde, 3.kişilerin, iletişim platformlarında kişisel verilerin yer almakta olması,</p>
                                            <p>1.10.Benzer şekilde diğer yasal veri alım yollarıyla,&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>Gibi kanallardan elde edilmektedir.</p>
                                            <p>&nbsp;</p>
                                            <p>B.KİŞİSEL VERİLERİN İŞLENME AMAÇLARI VE HUKUKİ SEBEPLER</p>
                                            <p>&nbsp;</p>
                                            <p>1.Kişisel Verilerin Toplanma ve&nbsp; İşlenme Amaçları</p>
                                            <p>&nbsp;</p>
                                            <p>Yukarıda belirtilen kişisel verileriniz aşağıdaki amaçlarla işlenecektir.</p>
                                            <p>&nbsp;</p>
                                            <p>1-Yasal yükümlülüklerin yerine getirilmesi ve faaliyet konusuna dahil her türlü işin yasal çerçevede yürütülebilmesi,</p>
                                            <p>2-Sözleşme hükümlerinin yerine getirilmesi,</p>
                                            <p>3-Yayıncılık faaliyetlerinin yürütülmesi,</p>
                                            <p>4-Ticari faaliyet ve işletmecilik gerekleri,</p>
                                            <p>5-Sektörel gereklilikler.</p>
                                            <p>&nbsp;</p>
                                            <p>2.Kişisel Verilerin Toplanması ve İşlenmesinin Hukuki Sebepleri</p>
                                            <p>&nbsp;</p>
                                            <p>Yukarıda belirtilen kişisel verileriniz;</p>
                                            <p>&nbsp;</p>
                                            <p>-6698 Sayılı Kişisel Verilerin Korunması Kanunu,</p>
                                            <p>-Kişisel Sağlık Verilerinin İşlenmesi ve Mahremiyetinin Korunması Yönetmeliği</p>
                                            <p>-1774 sayılı Kimlik Bildirim Kanunu,</p>
                                            <p>-4857 sayılı İş Kanunu,</p>
                                            <p>-5510 sayılı Sosyal Sigortalar ve Genel Sağlık Sigortası Kanunu,</p>
                                            <p>-6331 sayılı İş Sağlığı ve Güvenliği Kanunu,</p>
                                            <p>-Telif hakları mevzuatı,</p>
                                            <p>-Diğer yasal mevzuat,</p>
                                            <p>&nbsp;</p>
                                            <p>Gibi hukuki sebeplerle ile işlenecektir.</p>
                                            <p>&nbsp;</p>
                                            <p>6698 Sayılı Kişisel Verilerin Korunması, Kanunu’nun 6. maddesi 3. fıkrasında da belirtildiği üzere sağlık ve cinsel hayata ilişkin kişisel veriler ise ancak ve ancak kamu sağlığının korunması, koruyucu hekimlik, tıbbı teşhis, tedavi ve bakım hizmetlerinin yürütülmesi, sağlık hizmetleri ile finansmanının planlanması ve yönetimi amacıyla, sır saklama yükümlülüğü altında bulunan kişiler veya yetkili kurum ve kuruluşlar tarafından ilgilinin açık rızası aranmaksızın işlenebilir.</p>
                                            <p>&nbsp;</p>
                                            <p>C.KİŞİSEL VERİLERİN AKTARILMASI</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel verileriniz,</p>
                                            <p>&nbsp;</p>
                                            <p>-6698 Sayılı Kişisel Verilerin Korunması Kanunu ve ilgili tüm alt mevzuat,</p>
                                            <p>-Kişisel Sağlık Verilerinin İşlenmesi ve Mahremiyetinin Korunması Yönetmeliği</p>
                                            <p>-1774 sayılı Kimlik Bildirim Kanunu,</p>
                                            <p>-4857 sayılı İş Kanunu,</p>
                                            <p>-5510 sayılı Sosyal Sigortalar ve Genel Sağlık Sigortası Kanunu,</p>
                                            <p>-Telif hakları mevzuatı,</p>
                                            <p>&nbsp;</p>
                                            <p>Hükümleri çerçevesinde ve yukarıda açıklanan amaçlarla;</p>
                                            <p>&nbsp;</p>
                                            <p>-Özel sigorta şirketleri (sağlık, emeklilik, hayat sigortası ve benzeri),</p>
                                            <p>-Sosyal Güvenlik Kurumu,</p>
                                            <p>-Aile Çalışma ve Sosyal Politikalar Bakanlığı,</p>
                                            <p>-Emniyet Genel Müdürlüğü ve diğer kolluk kuvvetleri,</p>
                                            <p>-Nüfus Vatandaşlık İşleri Genel Müdürlüğü,</p>
                                            <p>-Yetkili diğer resmi kurum ve kuruluşlar,</p>
                                            <p>-Adli makamlar, icra daireleri, arabulucular,</p>
                                            <p>-Yazılı olarak yetki verilmiş kanuni temsilciler, veli ve vasiler</p>
                                            <p>-Sözleşme kapsamında çalışmakta olduğumuz avukatlar, muhasebeci mali müşavirler, vergi danışmanları ve denetçiler de dahil olmak üzere danışmanlık hizmeti alınan gerçek veya tüzel tüm üçüncü kişiler,</p>
                                            <p>-Düzenleyici ve denetleyici kurumlar ve resmi merciler,</p>
                                            <p>-Zorunlu veya ihtiyari BES(Bireysel Emeklilik Sistemi) kapsamında çalışılan bireysel emeklilik şirketleri,</p>
                                            <p>-Hizmetlerinden faydalandığımız veya iş birliği içerisinde olduğumuz tedarikçilerimiz, destek hizmet sağlayıcılarımız, arşiv hizmeti sağlayıcılarımız ve iş ortaklarımız (daha detaylı bilgi için hastanemize yazılı başvurarak bilgi edinebilirsiniz.)</p>
                                            <p>-Dış kaynak hizmet sağlayıcılar(konu ve amaçla sınırlı olarak)</p>
                                            <p>-Kargo veya kurye şirketleri,</p>
                                            <p>-Hava, kara veya deniz yolcu taşıma şirketleri,</p>
                                            <p>&nbsp;</p>
                                            <p>İle Paylaşılabilecektir.</p>
                                            <p>&nbsp;</p>
                                            <p>IV.KİŞİSEL VERİLERİN KORUNMASINA YÖNELİK ÖNLEMLERİMİZ ve TAAHHÜTLERİMİZ</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, veri sorumlusu sıfatıyla, yukarıda belirtilen kişisel verilerinizi kendi bünyesinde fiziki ve elektronik ortamlarda büyük bir hassasiyetle ve mevzuat hükümlerine tam riayet ederek, her türlü idari ve teknik tedbirleri alarak korumaktadır.</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, kişisel verilerinizin korunması konusunda her türlü idari ve teknik tedbiri almıştır.</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, tüm kişisel verileri korumayı taahhüt eder. Kişisel verilerin hukuka aykırı olarak işlenmesini ve erişilmesini engellemek ve kişisel verilerin muhafazasını sağlamak amacıyla uygun güvenlik düzeyini temin etmeye yönelik teknik ve idari tedbirleri çeşitli yöntemler ve güvenlik teknolojileri kullanarak gerçekleştirilmektedir.</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, elde ettiği kişisel verileri 6698 Sayılı Kişisel Verilerin Korunması Kanunu hükümlerine aykırı olarak başkasına açıklamayacak ve işleme amacı dışında kullanmayacaktır.</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, kişisel verileri, dış kaynak hizmet sunucuları ve tedarikçiler, danışmanlar veya avukatlar ile paylaşması(aktarması) durumunun zorunlu ve gerekli olduğu haller için tüm uyarı veya rıza beyanları, taahhütnameleri hazırlayarak imzalanmasını sağlamış ve gerekli çok yönlü denetim faaliyetlerini hayata geçirmiştir.</p>
                                            <p>&nbsp;</p>
                                            <p>V.ÇEREZLER ÜZERİNDEN TOPLANAN KİŞİSEL VERİLERİN İŞLENMESİ</p>
                                            <p>&nbsp;</p>
                                            <p>EPHESUS, web sitesinde çerez konumlandırması yapmamaktadır. Web sitemiz ve mobil uygulamamızın kullanımı sırasında, IP adresi, tarayıcı bilgileri. (Mac ID, IP adres bilgisi, internet sitesi giriş çıkış ve&nbsp; parola bilgileri) alınmamaktadır.</p>
                                            <p>&nbsp;</p>
                                            <p>VI.KİŞİSEL VERİLERİN KORUNMASI KONUSUNDA HAKLARINIZ</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel Verilerin Korunması Kanunu’nun 11. maddesi gereği Veri Sorumlusu olarak EPHESUS’a aşağıda belirtilen yollarla başvurarak, kimliğinizi ispat etmeniz kaydıyla, kişisel verilerinizin işlenmesi ve korunması konusunda haklarınızı kullanabilirsiniz.</p>
                                            <p>&nbsp;</p>
                                            <p>A.KİŞİSEL VERİLERİNİZLE İLGİLİ HAKLARINIZ</p>
                                            <p>&nbsp;</p>
                                            <p>1.Kişisel verilerinizin işlenip işlenmediğini öğrenme,<br>2.Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme,<br>3.Kişisel verilerinizin işlenme amacını ve bunların amacına uygun kullanılıp</p>
                                            <p>kullanılmadığını öğrenme,<br>4.Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı üçüncü kişileri bilme,<br>5.Kişisel verilerin eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini talep etme</p>
                                            <p>6.Kişisel verilerin silinmesini veya yok edilmesini isteme,</p>
                                            <p>7.Kişisel verilerinizin üçüncü kişilere aktarılmış olması durumunda,</p>
                                            <p>kişisel verilerinizin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini ve kişisel verilerin silinmesini veya yok edilmesini ilgili üçüncü kişiye bildirilmesini, iletilmesini isteme,</p>
                                            <p>8.İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme,</p>
                                            <p>9.Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğrama hallerinde zararın giderilmesini talep etme,</p>
                                            <p>&nbsp;</p>
                                            <p>Kaklarına sahip bulunmaktasınız.</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel verilerinizin Kişisel Verilerin Korunması Kanunu’nun 7.maddesinde öngörülen şartlar çerçevesinde verilerinizin imha edilmesini (silinmesini, yok edilmesini veya anonim hale getirilmesi) EPHESUS’dan talep edebilirsiniz. Ancak imha talebinizi değerlendirerek hangi yöntemin uygun olduğu somut olayın koşullarına göre şirketimizce değerlendirilecektir. Bu bağlamda seçtiğimiz imha yöntemini neden seçtiğimiz konusunda EPHESUS’dan her zaman bilgi talep edebilirsiniz.</p>
                                            <p>&nbsp;</p>
                                            <p>18 yaşından küçük kişiler hakkında toplanan kişisel veriler, adı, soyadı, yaşı ve yakınlık derecesiyle sınırlı olup bu veriler bize sadece ilgili yetişkin(veli veya vasi) tarafından verilebilecektir.&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>BAŞVURU HAKKI KAPSAMI DIŞINDA KALAN DURUMLAR</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel Verilerin Korunması Kanunu’nun 28. maddesi uyarınca, aşağıdaki haller Kişisel Verilerin Korunması Kanunu kapsamı dışında tutulduğundan kişisel veri sahiplerinin başvuru haklarını ileri sürmeleri mümkün olmayacaktır:</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp; -Kişisel verilerinin resmi istatistik ile anonim haale getirilmek suretiyle araştırma, planlama ve istatistik gibi amaçlarla işlenmesi.</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp; -Kişisel verilerinin millii savunmayı, millii güvenliği, kamu güvenliğini, kamu düzenini, ekonomik güvenliği, özel hayatın gizliliğini veya kişilik haklarını ihlal etmemek ya da suç teşkil etmemek kaydıyla, sanat, tarih, edebiyat veya bilimsel amaçlarla ya da ifade özgürlüğü kapsamında işlenmesi.</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp; -Kişisel verilerinin millii savunmayı, millî güvenliği, kamu güvenliğini, kamu düzenini veya ekonomik güvenliği sağlamaya yönelik olarak kanunla görev ve yetki verilmiş kamu kurum ve kuruluşları tarafından yürütülen önleyici, koruyucu ve istihbari faaliyetler kapsamında işlenmesi.</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp; -Kişisel verilerinin soruşturma, kovuşturma, yargılama veya infaz işlemlerine ilişkin olarak yargı makamları veya infaz mercileri tarafından işlenmesi.</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel Verilerin Korunması Kanunu’nun 28. maddesinin 2. fıkrası uyarınca, zararın giderilmesini talep etme hakkı hariç olmak üzere, aşağıdaki durumlarda da hakların ileri sürülebilmesi mümkün değildir:</p>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel veri işlemenin suç işlenmesinin önlenmesi veya suç soruşturması için gerekli olması,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -İlgili kişinin kendisi tarafından alenileştirilmiş kişisel verilerin işlenmesi,</p>
                                            <p>&nbsp;&nbsp;&nbsp; -Kişisel veri işlemenin kanunun verdiği yetkiye dayanılarak görevli ve yetkili kamu kurum ve kuruluşları ile kamu kurumu niteliğindeki meslek kuruluşlarınca, denetleme veya düzenleme görevlerinin yürütülmesi ile disiplin soruşturması veya kovuşturma için gerekli olması,</p>
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp; -Kişisel veri işlemenin bütçe, vergi ve mali konulara ilişkin olarak Devletin ekonomik ve mali çıkarlarının korunması için gerekli olması.</p>
                                            <p>&nbsp;</p>
                                            <p>B.HAKLARINIZI KULLANMAK İÇİN ŞİRKETİMİZLE İRTİBATA GEÇME YOLLARINIZ</p>
                                            <p>&nbsp;</p>
                                            <p>Kişisel Verilerin Korunması Kanunu kapsamındaki haklarınızı;</p>
                                            <p>&nbsp;</p>
                                            <p>1-Ephesus Basım Yayın Tic. Ltd. Şti.’nin &nbsp;Gültepe Mahalllesi Şahinler Sokak No:2/1 Ephesus Plaza Küçükçekmece İstanbul adresine gelerek temin edilecek Kişisel Verilerin Korunması Hakkında Başvuru Formu’nu&nbsp; doldurup imza karşılığı bizzat&nbsp; teslim ederek,</p>
                                            <p>2-EPHESUS &nbsp;www.ephesusyayinlari.com&nbsp; web adresinde yayımlanan Kişisel Verilerin İşlenmesi ve Korunması Aydınlatma Metni içeriğinde yer alan Kişisel Verilerin Korunması Hakkında Başvuru Formunu doldurup noter kanalıyla göndererek,</p>
                                            <p>3- EPHESUS’un&nbsp; bilgi@kurumsal.ephesusyayınlari.com adresine elektronik posta yollayarak,</p>
                                            <p>&nbsp;</p>
                                            <p>Kullanabilirsiniz.</p>
                                            <p>&nbsp;</p>
                                            <p>Talebinizin mahiyetine ve başvuru yönteminize göre EPHESUS tarafından başvurunun size ait olup olmadığının belirlenmesi ve böylece haklarınızı koruyabilmek amacıyla ek doğrulamalar (kayıtlı telefonunuza mesaj gönderilmesi, aranmanız gibi) istenebilir. Örneğin EPHESUS’da kayıtlı olan e-posta adresiniz aracılığıyla başvuru yapmanız halinde EPHESUS başka bir iletişim yöntemini kullanarak size ulaşabilir ve başvurunun size ait olup olmadığının teyidi istenebilir.</p>
                                            <p>&nbsp;</p>
                                            <p>Başvurunuzda yer alan talepleriniz, talebin niteliğine göre en geç otuz iş günü içinde kural olarak ücretsiz olarak sonuçlandırılacaktır. Ancak, işlemin ayrıca bir maliyeti gerektirmesi halinde, Kişisel Verileri Koruma Kurumu tarafından 10.03.2018 tarihli ve 30356 sayılı Resmi Gazete’de yayımlanan Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ’de belirtildiği üzere, toplam 50(Elli) TL’yi aşmayan bir ücret talep edilebilecektir. Başvurunuzun EPHESUS hatasından kaynaklandığının anlaşılması halinde, var ise ödenmiş ücret tarafınıza iade edilecektir.</p>
                                            <p>&nbsp;</p>
                                            <p>Başvurunuz durumunda doğru kişi olduğunuzun teyit edilmesi amacıyla&nbsp; EPHESUS yönetimi sizden bazı doğrulayıcı bilgiler talep etme hakkına sahiptir. Başvurunuzu iptal etmediğiniz sürece, EPHESUS yönetiminin bu taleplerini kabul etmiş sayılırsınız.</p>
                                            <p>&nbsp;</p>
                                            <p>RIZA ve ONAY</p>
                                            <p>&nbsp;</p>
                                            <p>İşbu Aydınlatma Metnini okuduğunuzda, bu kapsamda EPHESUS’a bir veri işleme süreci gerçekleştirdiği hususunda tam ve eksiksiz olarak bilgi sahibi olduğunuzu ve kişisel verilerinizin işlenmesi süreçleri ile ilgili bilgilendirildiğinizi ve kişisel verilerinizin işlenmesine rıza verdiğiniz yönünde kabul, beyan ve taahhüt etmiş sayılırsınız.</p>
                                            <p>&nbsp;</p>
                                            <p>İLETİŞİM BİLGİLERİ&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <p>Ephesus Basım Yayın Tic. Ltd. Şti.</p>
                                            <p>Gültepe Mahalllesi Şahinler Sokak No:2/1 Ephesus Plaza Küçükçekmece İstanbul</p>
                                            <p>Tel:4440454 &nbsp;İnfo:&nbsp; bilgi@kurumsal.ephesusyayınlari.com</p>
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