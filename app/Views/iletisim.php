<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>
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
                                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="/iletisim">
                                        <span itemprop="name">İletişim</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <div class="Contact">


                                <h1 class="contentHeader crmHeader">İletişim</h1>

                                <div class="Contact-wrapper ">
                                    <div class="Contact-item">
                                        <div class="contact_info">
                                            <div class="box_p">
                                                <div class="cfg_firm_name">Name</div>
                                                <div class="cfg_firm_address"><b>Adres</b>: Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, tempora.</div>
                                                <div class="cfg_firm_phone1"><b>Tel</b>: <a href="tel:4440454">444 0 xx</a></div>
                                                <div class="cfg_firm_phone2"><b>Whatsapp</b>: <a href="tel:5322083345">+xxx</a></div>
                                                <div class="cfg_firm_email"><b>Email</b>: eticaret@xx.com</div>
                                            </div>

                                        </div>



                                        <div class="google_map mt-4">
                                            <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBGdYvpF6U1p_FpORWh2TrrLxR4i7SYbyA&amp;q=40.9919,28.7924&amp;zoom=17" allowfullscreen="">
                                            </iframe>

                                        </div>
                                    </div>
                                    <div class="Contact-item">
                                        <div class="frm">

                                            <form action="/iletisim" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="csrf_token" class="csrf_token" value="754b40c8a8c9a38499d4e36fa7ef163c">
                                                <div class="form_table contact_form_table">
                                                    <div class="error"></div>
                                                    <div class="form-group">
                                                        <label for="crm_name">Ad Soyad</label>
                                                        <input class="form-control" type="text" required="required" placeholder="Ad Soyad" name="crm_name" id="crm_name" value="">
                                                    </div>

                                                    <div class="error"></div>
                                                    <div class="form-group">
                                                        <label for="crm_email">Email</label>
                                                        <input class="form-control" type="email" required="required" placeholder="Email" name="crm_email" id="crm_email" value="">
                                                    </div>

                                                    <div class="error"></div>
                                                    <div class="form-group">
                                                        <label for="crm_phone">Telefon</label>
                                                        <input class="form-control phone-format" type="text" placeholder="Telefon" name="crm_phone" id="crm_phone" value="">
                                                    </div>

                                                    <div class="error"></div>
                                                    <div class="form-group crm_subject">
                                                        <label for="crm_subject">Konu</label>
                                                        <input class="form-control" type="text" required="required" placeholder="Konu" name="crm_subject" id="crm_subject" value="">
                                                    </div>

                                                    <div class="error"></div>
                                                    <div class="form-group crm_message">
                                                        <label for="crm_message">Mesaj</label>
                                                        <textarea class="form-control" required="required" placeholder="Mesaj" rows="6" name="crm_message" id="crm_message"></textarea>
                                                    </div>
                                                    <div class="form-group form-check cfg_terms_and_conds">
                                                        <input required="required" class="form-check-input" type="checkbox" name="cfg_terms_and_conds[9]" id="cfg_terms_and_conds9" value="1">
                                                        <label class="form-check-label myPopupModal1ButtonM" style="text-align: left; cursor:pointer">
                                                            KVKK Aydınlatma Metni sayfalarındaki şartları okudum ve kabul ediyorum
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="token" name="token">
                                                <input class="btn btn-dark mt-2 button_send button_crm_send" type="submit" name="save" id="crm_save" value="Gönder">
                                            </form>
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
    <?php echo view('layouts/footer-mail'); ?>
    <?php echo view('layouts/footer'); ?>
</body>

</html>