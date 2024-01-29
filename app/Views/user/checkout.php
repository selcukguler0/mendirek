<?php
function randomConversationId()
{
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($permitted_chars), 0, 10);
}
$conversationId = randomConversationId();
?>

<html lang="tr-TR" class="">

<head>
    <?php echo view('/layouts/head'); ?>

    <script>
        function loadTowns(cityId, targetId) {
            console.log(cityId, targetId);
            $.ajax({
                url: "/api/loadtowns/" + cityId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var options = '<option value="">Lütfen seçiniz</option>';
                    $.each(data, function(key, value) {
                        options += '<option value="' + value.id + '">' + value.townName + '</option>';
                    });
                    $('#' + targetId).html(options);
                }
            });
        }
    </script>
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
                                    <a itemprop="item" href="/index.php?p=Orders">
                                        <span itemprop="name">Siparişler</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div id="layout_style" class="container layout_010">
                        <div class="main_content">
                            <?php if (!empty($_GET["error"])) : ?>
                                <div class="alert alert-danger">
                                    <?php echo htmlspecialchars($_GET["error"]); ?>
                                </div>
                            <?php endif; ?>
                            <div class="frm orders_form" data-cart-total="">
                                <div class="order_steps">
                                    <span class="ord_step ord_step_1 ord_step_cart" title="Sepetim">
                                        <span class="ord_step_number">1</span>
                                        <span class="ord_step_label">Sepetim</span>
                                    </span>

                                    <span class="ord_step ord_step_2 ord_step_info ord_step_selected" title="Sipariş Bilgileri">
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
                                <div id="orders_form_data_post" data-post="0"></div>

                                <form action="/iyzico/start3DS" method="post" class="edit_form">
                                    <input type="hidden" name="order_cart" id="order_cart" value="<?php echo $conversationId; ?>">
                                    <input type="hidden" name="conversationId" id="conversationId" value="<?php echo $conversationId; ?>">

                                    <div class="orders_form_wrapper">
                                        <div class="orders_form_item">
                                            <div id="adr_select_div">
                                                <div></div>
                                            </div>

                                            <div class="ord_form_box">
                                                <div class="ord_form_box_header">
                                                    <span>Fatura Adresi</span>
                                                </div>

                                                <div id="container_bl_adr">
                                                    <div class="form_table ord_billing_adr_form">
                                                        <div class="form-group ord_billing_name">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_name"><span id="label_ord_billing_name">Ad Soyad</span><span class="required_star">*</span> : </label>
                                                            <input required class="form-control" type="text" name="ord_billing_name" id="ord_billing_name" maxlength="32" value="">
                                                        </div>

                                                        <div class="form-group ord_billing_phone">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_phone"><span id="label_ord_billing_phone">Telefon</span><span class="required_star">*</span> : </label>
                                                            <input required class="form-control" type="text" name="ord_billing_phone" id="ord_billing_phone" maxlength="20" onkeypress="return Only_Integer(event);" value="">
                                                        </div>

                                                        <div class="form-group ord_billing_city">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_city"><span id="label_ord_billing_city">Şehir</span><span class="required_star">*</span> : </label>
                                                            <select required onchange="loadTowns(this.value, 'ord_billing_town')" class="form-control" name="ord_billing_city" id="ord_billing_city">
                                                                <option value="">Listeden Seçiniz</option>
                                                                <?php foreach ($cities as $city) : ?>
                                                                    <option value="<?php echo $city['id'] ?>"><?php echo $city['cityName'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group ord_billing_town">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_town"><span id="label_ord_billing_town">İlçe</span><span class="required_star">*</span> : </label>
                                                            <select required class="form-control" name="ord_billing_town" id="ord_billing_town">
                                                            </select>
                                                        </div>

                                                        <div class="form-group ord_billing_address">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_address"><span id="label_ord_billing_address">Adres</span><span class="required_star">*</span> : </label>
                                                            <textarea required class="form-control" type="text" name="ord_billing_address" id="ord_billing_address"></textarea>
                                                        </div>

                                                        <div class="form-group ord_billing_postalcode">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_postalcode"><span id="label_ord_billing_postalcode">Posta Kodu</span> : </label>
                                                            <input required class="form-control" type="text" name="ord_billing_postalcode" id="ord_billing_postalcode" maxlength="10" value="">
                                                        </div>

                                                        <div class="form-group form-check ord_adr_corp">
                                                            <input type="hidden" name="ord_adr_corp_exists" id="ord_adr_corp_exists" value="1">
                                                            <input class="form-check-input ord_adr_corp" onchange="$(this).ordAdrChange();" type="checkbox" name="ord_adr_corp" id="ord_adr_corp" value="1">
                                                            <label class="form-check-label" for="ord_adr_corp">Kurumsal Adres</label>
                                                        </div>

                                                        <div class="form-group ord_billing_firm_name ord_firm ord_firm_hide">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_firm_name"><span id="label_ord_billing_firm_name">Firma Adı</span> : </label>
                                                            <input class="form-control" type="text" name="ord_billing_firm_name" id="ord_billing_firm_name" maxlength="200" value="">
                                                        </div>

                                                        <div class="form-group ord_billing_tax_office ord_firm ord_firm_hide">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_tax_office"><span id="label_ord_billing_tax_office">Vergi Dairesi</span> : </label>
                                                            <input class="form-control" type="text" name="ord_billing_tax_office" id="ord_billing_tax_office" maxlength="32" value="">
                                                        </div>

                                                        <div class="form-group ord_billing_tax_number ">
                                                            <div class="error"></div>

                                                            <label for="ord_billing_tax_number"><span id="label_adr_tax_number">Vergi No/TCKimlik No</span>
                                                                :
                                                            </label>
                                                            <input required class="form-control" type="text" name="ord_billing_tax_number" id="ord_billing_tax_number" maxlength="32" value="">
                                                        </div>

                                                        <div class="form-group form-check">
                                                            <input class="form-check-input" type="checkbox" id="different_address" name="different_address" value="1" onclick="this.checked?$('#ord_shipping_container').show('slow'):$('#ord_shipping_container').hide('slow');">
                                                            <label class="form-check-label" for="different_address">&nbsp;Teslimat Adresiniz farklıysa işaretleyiniz.</label>
                                                        </div>
                                                    </div>
                                                    <span class="error ord_firm_note">Şirket Adına Kesilmesini İstediğiniz Faturalarınız için Lütfen Firma Adı ve Vergi Dairesi Bölümlerini Doldurunuz...</span><br>
                                                    <span class="error required_fields_desc">Doldurulması zorunlu alanlar * ile işaretlenmiştir.</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="orders_form_item">
                                            <div id="ord_shipping_container" style="display:none;">
                                                <div class="ord_form_box">
                                                    <div class="ord_form_box_header" title="Adres seçimi | Mevcut adreslerinizden birini seçin veya yeni bir adres girin.">
                                                        <span>Teslimat Adresi</span>
                                                    </div>
                                                    <div id="container_sh_adr">
                                                        <div class="form_table ord_shipping_adr_form">
                                                            <div class="form-group ord_shipping_name">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_name"><span id="label_ord_shipping_name">Adsoyad</span> : </label>
                                                                <input class="form-control" type="text" name="ord_shipping_name" id="ord_shipping_name" maxlength="32" value="">
                                                            </div>

                                                            <div class="form-group ord_shipping_phone">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_phone"><span id="label_ord_shipping_phone">Telefon</span> : </label>
                                                                <input class="form-control" type="text" name="ord_shipping_phone" id="ord_shipping_phone" maxlength="20" onkeypress="return Only_Integer(event);" value="">
                                                            </div>
                                                            <div class="form-group ord_shipping_city">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_city"><span id="label_ord_shipping_city">Şehir</span><span class="required_star">*</span> : </label>
                                                                <select onchange="loadTowns(this.value, 'ord_shipping_town')" class="form-control" name="ord_shipping_city" id="ord_shipping_city">
                                                                    <option value="">Şehir Seçiniz</option>
                                                                    <?php foreach ($cities as $city) : ?>
                                                                        <option value="<?php echo $city['id'] ?>"><?php echo $city['cityName'] ?></option>
                                                                    <?php endforeach; ?>

                                                                </select>
                                                            </div>

                                                            <div class="form-group ord_shipping_town">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_town"><span id="label_ord_shipping_town">İlçe</span> : </label>

                                                                <select class="form-control" name="ord_shipping_town" id="ord_shipping_town">
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group ord_shipping_address">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_address"><span id="label_ord_shipping_address">Adres</span> : </label>
                                                                <textarea class="form-control" type="text" name="ord_shipping_address" id="ord_shipping_address"></textarea>
                                                            </div>

                                                            <div class="form-group ord_shipping_postalcode">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_postalcode"><span id="label_ord_shipping_postalcode">Posta Kodu</span> : </label>
                                                                <input class="form-control" type="number" name="ord_shipping_postalcode" id="ord_shipping_postalcode" maxlength="10" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ord_form_box ord_shipping_note">
                                                <div class="ord_form_box_header">
                                                    <span>Kargoya notunuz</span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="ord_shipping_note" cols="25" rows="3" id="ord_shipping_note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pop_container">
                                        <div class="d-flex  flex-sm-row flex-column bg-light p-3">

                                            <div class="px-3 flex-fill">
                                                <div class="ord_form_box ord_payment_cc_form">
                                                    <div class="ord_form_box_header">
                                                        <span>Kredi kartı bilgileri</span>
                                                    </div>

                                                    <div class="form_table">
                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccowner">
                                                                <span id="label_ord_ccowner">Kart Sahibi</span>
                                                            </label>
                                                            <input required autocomplete="off" class="form-control" type="text" name="ord_ccowner" id="ord_ccowner" maxlength="64" value="">
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccno">
                                                                <span id="label_ord_ccno">Kart No</span>
                                                            </label>
                                                            <input required autocomplete="off" class="form-control" type="number" name="ord_ccno" id="ord_ccno" value="">
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccexpdate_m">
                                                                <span id="label_ord_ccexpdate">Kart Son.Kul.Tar.</span>
                                                            </label>
                                                            <div class="d-flex">
                                                                <div class="flex-fill">
                                                                    <select required class="form-control" name="ord_ccexpdate[m]" id="ord_ccexpdate_m">
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                </div>
                                                                <div class="flex-fill">
                                                                    <select required class="form-control" name="ord_ccexpdate[y]" id="ord_ccexpdate_y">
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2026">2026</option>
                                                                        <option value="2027">2027</option>
                                                                        <option value="2028">2028</option>
                                                                        <option value="2029">2029</option>
                                                                        <option value="2030">2030</option>
                                                                        <option value="2031">2031</option>
                                                                        <option value="2032">2032</option>
                                                                        <option value="2033">2033</option>
                                                                        <option value="2034">2034</option>
                                                                        <option value="2035">2035</option>
                                                                        <option value="2036">2036</option>
                                                                        <option value="2037">2037</option>
                                                                        <option value="2038">2038</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_cvc">
                                                                <span id="label_ord_cvc">CVC</span>
                                                            </label>
                                                            <input autocomplete="off" class="form-control" type="number" name="ord_cvc" id="ord_cvc" maxlength="4" size="3" value="">
                                                            <small id="ord_cvc_help" class="form-text text-muted">
                                                                Kartınızın arkasındaki 3 haneli güvenlik numarasını giriniz
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ord_form_box ord_installment_box flex-fill" data-installment="">
                                                <div class="ord_form_box_header">
                                                    <span>Taksit seçenekleri</span>
                                                </div>
                                                <div class="error"></div>
                                                <div id="installments-container" class=""></div>
                                            </div>
                                        </div>

                                        <div class="buttons">
                                            <input class="btn btn-orange mr-2 button_next button_order_next" type="submit" name="save" id="save" value="&nbsp;&nbsp;İleri&nbsp;&nbsp;">
                                            <input class="btn btn-light button_cancel button_order_cancel" type="button" onclick="window.location='/card'" name="cancel" id="cancel" value="Vazgeç">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php echo view('layouts/footer'); ?>

    <script>
        const conversationId = "<?php echo $conversationId; ?>"
        let totalPrice = 0;

        let card = getCard();
        let orders = [];
        JSON.parse(card).forEach(item => {
            orders.push({
                id: item.id,
                quantity: item.quantity
            });
            totalPrice += item.price * item.quantity;
        });
        const order_cart = document.querySelector('#order_cart');
        order_cart.value = JSON.stringify(orders);

        const cardNumber = document.querySelector('#ord_ccno');
        const installments_container = document.querySelector('#installments-container');

        cardNumber.addEventListener("input", function() {
            installments_container.innerHTML = "";
            if (cardNumber.value.length < 6) {
                return false;
            }

            const data = {
                binNumber: cardNumber.value.slice(0, 6),
                conversationId: conversationId,
                price: totalPrice
            };

            $.ajax({
                url: "/iyzico/bincontrol",
                type: "POST",
                headers: {
                    contentType: "application/json",
                },
                data: JSON.stringify(data),
                success: function(response) {
                    const data = JSON.parse(response);

                    if (data.status === "success") {
                        const installments = data.installmentDetails[0].installmentPrices;
                        installments_container.innerHTML = "";
                        if (installments.length > 0) {
                            installments.forEach((item) => {
                                installments_container.innerHTML += `
                                <input name="installments" type="radio" id="intsallments${item.installmentNumber}" class="" value="${item.installmentNumber}" placeholder="Tek Çekim" required />
                                <label for="intsallments${item.installmentNumber}">${item.installmentNumber} Taksit</label>
                                <br>
                            `;
                            })
                        } else {
                            installments_container.innerHTML = `
                                <div class="alert alert-danger">
                                    Bu kart ile taksitli ödeme yapılamamaktadır.
                                </div>
                            `;
                        }

                    }
                },
                complete: function() {
                    if (installments_container.innerHTML == "") {
                        setTimeout(() => {
                            installments_container.innerHTML = `
                                <div class="alert alert-danger">
                                    Bu kart ile taksitli ödeme yapılamamaktadır.
                                </div>
                            `;
                        }, 1000);
                    }
                }
            });
        });

        //teslimat adresi başka ise
        const different_address = document.querySelector('#different_address');

        const inputs = document.querySelectorAll('#ord_shipping_container input');
        const selects = document.querySelectorAll('#ord_shipping_container select');

        different_address.addEventListener("onchange", () => {
            if (different_address.checked) {
                $('#ord_shipping_container').show('slow');

                //tüm inputları required yap
                inputs.forEach((input) => {
                    input.required = true;
                });
                selects.forEach((select) => {
                    select.required = true;
                });
            } else {
                $('#ord_shipping_container').hide('slow');

                //tüm inputları required yapma
                inputs.forEach((input) => {
                    input.required = false;
                });
                selects.forEach((select) => {
                    select.required = false;
                });
            }
        })

        //ajax post request to /iyzico/start3DS with all formData
        const form = document.querySelector('.edit_form');
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const data = {};
            for (var [key, value] of formData.entries()) {
                data[key] = value;
            }
            data["conversationId"] = conversationId;
            data["installments"] = document.querySelector('input[name="installments"]:checked').value;

            $.ajax({
                url: "/iyzico/start3DS",
                type: "POST",
                data: data,
                success: function(response) {
                    const data = JSON.parse(response);
                    console.log(data);
                    if (data.ok) {
                        window.location.href = data.redirectUrl;
                    } else {
                        alert(data.errorMessage.replace("identityNumber", "Vergi No/TCKimlik No"));
                    }
                },
                error: function() {
                    alert("Ödeme işlemi başarısız!");
                }
            });
        }); 
    </script>

</body>

</html>