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
                            <div class="frm orders_form" data-cart-total="298.8">
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
                                    <input type="hidden" id="order_cart" value="1">
                                    <input id="mo_discount" name="mo_discount" type="hidden" value="0.00">
                                    <input id="shipping_cost" name="shipping_cost" type="hidden" value="0">
                                    <input id="cart_total" name="cart_total" type="hidden" value="298.8">
                                    <input id="total_amount" name="total_amount" type="hidden" value="298.8">

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
                                                            <label for="ord_billing_name"><span id="label_ord_billing_name">Adsoyad</span><span class="required_star">*</span> : </label>
                                                            <input  class="form-control" type="text" name="ord_billing_name" id="ord_billing_name" maxlength="32" value="">
                                                        </div>


                                                        <div class="form-group ord_billing_phone">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_phone"><span id="label_ord_billing_phone">Telefon</span><span class="required_star">*</span> : </label>
                                                            <input  class="form-control" type="text" name="ord_billing_phone" id="ord_billing_phone" maxlength="20" onkeypress="return Only_Integer(event);" value="">
                                                        </div>

                                                        <!-- <div class="form-group ord_billing_country_id">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_country_id"><span id="label_ord_billing_country_id">Ülke</span><span class="required_star">*</span> : </label>
                                                            <select  onchange="loadComboBoxCnt('ord_billing_city_id','/index.php?p=Cities&amp;no_common=1&amp;opts='+this.value,this.value);$(this).updateCargoList();" class="form-control" name="ord_billing_country_id" id="ord_billing_country_id">
                                                                <option value="">Lütfen seçiniz</option>
                                                                <option value="1">Afghanistan</option>
                                                                <option value="2">Albania</option>
                                                                <option value="3">Algeria</option>
                                                                <option value="4">American Samoa</option>
                                                                <option value="5">Andorra</option>
                                                                <option value="6">Angola</option>
                                                                <option value="7">Anguilla</option>
                                                                <option value="8">Antarctica</option>
                                                                <option value="9">Antigua &amp; Barbuda</option>
                                                                <option value="10">Argentina</option>
                                                                <option value="11">Armenia</option>
                                                                <option value="12">Aruba</option>
                                                                <option value="13">Australia</option>
                                                                <option value="14">Austria</option>
                                                                <option value="15">Azerbaijan</option>
                                                                <option value="16">Bahamas</option>
                                                                <option value="17">Bahrain</option>
                                                                <option value="18">Bangladesh</option>
                                                                <option value="19">Barbados</option>
                                                                <option value="20">Belarus</option>
                                                                <option value="21">Belgium</option>
                                                                <option value="22">Belize</option>
                                                                <option value="23">Benin</option>
                                                                <option value="24">Bermuda</option>
                                                                <option value="25">Bhutan</option>
                                                                <option value="26">Bolivia</option>
                                                                <option value="27">Bosnia-Herzegovina</option>
                                                                <option value="28">Botswana</option>
                                                                <option value="29">Brazil</option>
                                                                <option value="30">British Virgin Islands</option>
                                                                <option value="31">Brunei</option>
                                                                <option value="32">Bulgaria</option>
                                                                <option value="33">Burkina Faso</option>
                                                                <option value="34">Burundi</option>
                                                                <option value="35">Cambodia</option>
                                                                <option value="36">Cameroon</option>
                                                                <option value="37">Canada</option>
                                                                <option value="38">Cape Verde</option>
                                                                <option value="39">Cayman Islands</option>
                                                                <option value="40">Central Africa</option>
                                                                <option value="41">Chad</option>
                                                                <option value="42">Chile</option>
                                                                <option value="43">China</option>
                                                                <option value="44">Colombia</option>
                                                                <option value="45">Comoros</option>
                                                                <option value="46">Congo</option>
                                                                <option value="47">Congo (Dem. Rep.)</option>
                                                                <option value="48">Cook Islands</option>
                                                                <option value="49">Costa Rica</option>
                                                                <option value="50">Croatia</option>
                                                                <option value="51">Cuba</option>
                                                                <option value="52">Cyprus</option>
                                                                <option value="53">Czech Republic</option>
                                                                <option value="54">Denmark</option>
                                                                <option value="55">Djibouti</option>
                                                                <option value="56">Dominica</option>
                                                                <option value="57">Dominican Republic</option>
                                                                <option value="58">East Timor</option>
                                                                <option value="59">Ecuador</option>
                                                                <option value="60">Egypt</option>
                                                                <option value="61">El Salvador</option>
                                                                <option value="62">Equatorial Guinea</option>
                                                                <option value="63">Eritrea</option>
                                                                <option value="64">Estonia</option>
                                                                <option value="65">Ethiopia</option>
                                                                <option value="66">Ext. Territ. of Australia</option>
                                                                <option value="67">Falkland Islands</option>
                                                                <option value="68">Faroe Islands</option>
                                                                <option value="69">Fiji</option>
                                                                <option value="70">Finland</option>
                                                                <option value="71">France</option>
                                                                <option value="72">French Guiana</option>
                                                                <option value="73">French Polynesia</option>
                                                                <option value="74">Gabon</option>
                                                                <option value="75">Gambia</option>
                                                                <option value="76">Georgia</option>
                                                                <option value="77">Germany</option>
                                                                <option value="78">Ghana</option>
                                                                <option value="79">Gibraltar</option>
                                                                <option value="80">Greece</option>
                                                                <option value="81">Greenland</option>
                                                                <option value="82">Grenada</option>
                                                                <option value="83">Guadeloupe</option>
                                                                <option value="84">Guam</option>
                                                                <option value="85">Guatemala</option>
                                                                <option value="86">Guernsey and Alderney</option>
                                                                <option value="87">Guinea</option>
                                                                <option value="88">Guinea Bissau</option>
                                                                <option value="89">Guyana</option>
                                                                <option value="90">Haiti</option>
                                                                <option value="91">Honduras</option>
                                                                <option value="92">Hungary</option>
                                                                <option value="93">Iceland</option>
                                                                <option value="94">India</option>
                                                                <option value="95">Indonesia</option>
                                                                <option value="96">Iran</option>
                                                                <option value="97">Iraq</option>
                                                                <option value="98">Ireland</option>
                                                                <option value="99">Israel</option>
                                                                <option value="100">Italy</option>
                                                                <option value="101">Ivory Coast</option>
                                                                <option value="102">Jamaica</option>
                                                                <option value="103">Japan</option>
                                                                <option value="104">Jersey</option>
                                                                <option value="105">Jordan</option>
                                                                <option value="106">Kazakhstan</option>
                                                                <option value="107">Kenya</option>
                                                                <option value="108">Kiribati</option>
                                                                <option value="109">Korea (North)</option>
                                                                <option value="110">Korea (South)</option>
                                                                <option value="111">Kuwait</option>
                                                                <option value="112">Kyrgyzstan</option>
                                                                <option value="113">Laos</option>
                                                                <option value="114">Latvia</option>
                                                                <option value="115">Lebanon</option>
                                                                <option value="116">Lesotho</option>
                                                                <option value="117">Liberia</option>
                                                                <option value="118">Libya</option>
                                                                <option value="119">Liechtenstein</option>
                                                                <option value="120">Lithuania</option>
                                                                <option value="121">Luxembourg</option>
                                                                <option value="122">Macedonia</option>
                                                                <option value="123">Madagascar</option>
                                                                <option value="124">Malawi</option>
                                                                <option value="125">Malaysia</option>
                                                                <option value="126">Maldives</option>
                                                                <option value="127">Mali</option>
                                                                <option value="128">Malta</option>
                                                                <option value="129">Man (Isle of)</option>
                                                                <option value="130">Marshall Islands</option>
                                                                <option value="131">Martinique</option>
                                                                <option value="132">Mauritania</option>
                                                                <option value="133">Mauritius</option>
                                                                <option value="134">Mayotte</option>
                                                                <option value="135">Mexico</option>
                                                                <option value="136">Micronesia</option>
                                                                <option value="137">Moldova</option>
                                                                <option value="138">Monaco</option>
                                                                <option value="139">Mongolia</option>
                                                                <option value="140">Morocco</option>
                                                                <option value="141">Mozambique</option>
                                                                <option value="142">Myanmar</option>
                                                                <option value="143">Namibia</option>
                                                                <option value="144">Nauru</option>
                                                                <option value="145">Nepal</option>
                                                                <option value="146">Netherlands</option>
                                                                <option value="147">Netherlands Antilles</option>
                                                                <option value="148">New Caledonia</option>
                                                                <option value="149">New Zealand</option>
                                                                <option value="150">Nicaragua</option>
                                                                <option value="151">Niger</option>
                                                                <option value="152">Nigeria</option>
                                                                <option value="153">Niue</option>
                                                                <option value="154">Norfolk</option>
                                                                <option value="155">Northern Mariana Islands</option>
                                                                <option value="156">Oman</option>
                                                                <option value="157">Pakistan</option>
                                                                <option value="158">Palau</option>
                                                                <option value="159">Palestine</option>
                                                                <option value="160">Panama</option>
                                                                <option value="161">Papua New Guinea</option>
                                                                <option value="162">Paraguay</option>
                                                                <option value="163">Peru</option>
                                                                <option value="164">Philippines</option>
                                                                <option value="165">Poland</option>
                                                                <option value="166">Portugal</option>
                                                                <option value="167">Puerto Rico</option>
                                                                <option value="168">Qatar</option>
                                                                <option value="169">Réunion</option>
                                                                <option value="170">Romania</option>
                                                                <option value="171">Russia</option>
                                                                <option value="172">Rwanda</option>
                                                                <option value="173">Sahara</option>
                                                                <option value="174">Saint Helena</option>
                                                                <option value="175">Saint Kitts and Nevis</option>
                                                                <option value="176">Saint Lucia</option>
                                                                <option value="177">Saint Pierre &amp; Miquelon</option>
                                                                <option value="179">Samoa</option>
                                                                <option value="180">San Marino</option>
                                                                <option value="181">São Tomé and Príncipe</option>
                                                                <option value="182">Saudi Arabia</option>
                                                                <option value="183">Senegal</option>
                                                                <option value="184">Serbia and Montenegro</option>
                                                                <option value="185">Seychelles</option>
                                                                <option value="186">Sierra Leone</option>
                                                                <option value="187">Singapore</option>
                                                                <option value="188">Slovakia</option>
                                                                <option value="189">Slovenia</option>
                                                                <option value="190">Smaller Territories of the UK</option>
                                                                <option value="191">Solomon Islands</option>
                                                                <option value="192">Somalia</option>
                                                                <option value="193">South Africa</option>
                                                                <option value="194">Spain</option>
                                                                <option value="195">Sri Lanka</option>
                                                                <option value="178">St. Vincent &amp; the Grenadines</option>
                                                                <option value="196">Sudan</option>
                                                                <option value="197">Suriname</option>
                                                                <option value="198">Svalbard and Jan Mayen</option>
                                                                <option value="199">Swaziland</option>
                                                                <option value="200">Sweden</option>
                                                                <option value="201">Switzerland</option>
                                                                <option value="202">Syria</option>
                                                                <option value="203">Taiwan</option>
                                                                <option value="204">Tajikistan</option>
                                                                <option value="205">Tanzania</option>
                                                                <option value="206">Terres Australes</option>
                                                                <option value="207">Thailand</option>
                                                                <option value="208">Togo</option>
                                                                <option value="209">Tokelau</option>
                                                                <option value="210">Tonga</option>
                                                                <option value="211">Trinidad and Tobago</option>
                                                                <option value="212">Tunisia</option>
                                                                <option value="213" selected="selected">Türkiye</option>
                                                                <option value="214">Turkmenistan</option>
                                                                <option value="215">Turks and Caicos Islands</option>
                                                                <option value="216">Tuvalu</option>
                                                                <option value="217">Uganda</option>
                                                                <option value="218">Ukraine</option>
                                                                <option value="219">United Arab Emirates</option>
                                                                <option value="220">United Kingdom</option>
                                                                <option value="221">United States of America</option>
                                                                <option value="222">Uruguay</option>
                                                                <option value="223">Uzbekistan</option>
                                                                <option value="224">Vanuatu</option>
                                                                <option value="225">Vatican</option>
                                                                <option value="226">Venezuela</option>
                                                                <option value="227">Vietnam</option>
                                                                <option value="228">Virgin Islands of the USA</option>
                                                                <option value="229">Wallis &amp; Futuna</option>
                                                                <option value="230">Yemen</option>
                                                                <option value="231">Zambia</option>
                                                                <option value="232">Zimbabwe</option>

                                                            </select>
                                                        </div> -->

                                                        <div class="form-group ord_billing_city_id">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_city_id"><span id="label_ord_billing_city_id">Şehir</span><span class="required_star">*</span> : </label>
                                                            <select  onchange="loadTowns(this.value, 'ord_billing_town_id')" class="form-control" name="ord_billing_city_id" id="ord_billing_city_id">
                                                                <option value="">Lütfen seçiniz</option>
                                                                <?php foreach ($cities as $city) : ?>
                                                                    <option value="<?php echo $city['id'] ?>"><?php echo $city['cityName'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group ord_billing_town_id">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_town_id"><span id="label_ord_billing_town_id">İlçe</span><span class="required_star">*</span> : </label>

                                                            <select class="form-control" name="ord_billing_town_id" id="ord_billing_town_id">
                                                                <option value="">Lütfen seçiniz</option>

                                                            </select>
                                                        </div>

                                                        <div class="form-group ord_billing_address">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_address"><span id="label_ord_billing_address">Adres</span><span class="required_star">*</span> : </label>
                                                            <textarea  class="form-control" type="text" name="ord_billing_address" id="ord_billing_address"></textarea>
                                                        </div>

                                                        <div class="form-group ord_billing_postalcode">
                                                            <div class="error"></div>
                                                            <label for="ord_billing_postalcode"><span id="label_ord_billing_postalcode">Posta Kodu</span> : </label>
                                                            <input class="form-control" type="text" name="ord_billing_postalcode" id="ord_billing_postalcode" maxlength="10" value="">
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
                                                            <input class="form-control" type="text" name="ord_billing_tax_number" id="ord_billing_tax_number" maxlength="32" value="">
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

                                                            <!-- <div class="form-group ord_shipping_country_id">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_country_id"><span id="label_ord_shipping_country_id">Ülke</span> : </label>
                                                                <select onchange="loadComboBoxCnt('ord_shipping_city_id','/index.php?p=Cities&amp;no_common=1&amp;opts='+this.value,this.value);$(this).updateCargoList();" class="form-control" name="ord_shipping_country_id" id="ord_shipping_country_id">
                                                                    <option value="">Lütfen seçiniz</option>
                                                                    <option value="1">Afghanistan</option>
                                                                    <option value="2">Albania</option>
                                                                    <option value="3">Algeria</option>
                                                                    <option value="4">American Samoa</option>
                                                                    <option value="5">Andorra</option>
                                                                    <option value="6">Angola</option>
                                                                    <option value="7">Anguilla</option>
                                                                    <option value="8">Antarctica</option>
                                                                    <option value="9">Antigua &amp; Barbuda</option>
                                                                    <option value="10">Argentina</option>
                                                                    <option value="11">Armenia</option>
                                                                    <option value="12">Aruba</option>
                                                                    <option value="13">Australia</option>
                                                                    <option value="14">Austria</option>
                                                                    <option value="15">Azerbaijan</option>
                                                                    <option value="16">Bahamas</option>
                                                                    <option value="17">Bahrain</option>
                                                                    <option value="18">Bangladesh</option>
                                                                    <option value="19">Barbados</option>
                                                                    <option value="20">Belarus</option>
                                                                    <option value="21">Belgium</option>
                                                                    <option value="22">Belize</option>
                                                                    <option value="23">Benin</option>
                                                                    <option value="24">Bermuda</option>
                                                                    <option value="25">Bhutan</option>
                                                                    <option value="26">Bolivia</option>
                                                                    <option value="27">Bosnia-Herzegovina</option>
                                                                    <option value="28">Botswana</option>
                                                                    <option value="29">Brazil</option>
                                                                    <option value="30">British Virgin Islands</option>
                                                                    <option value="31">Brunei</option>
                                                                    <option value="32">Bulgaria</option>
                                                                    <option value="33">Burkina Faso</option>
                                                                    <option value="34">Burundi</option>
                                                                    <option value="35">Cambodia</option>
                                                                    <option value="36">Cameroon</option>
                                                                    <option value="37">Canada</option>
                                                                    <option value="38">Cape Verde</option>
                                                                    <option value="39">Cayman Islands</option>
                                                                    <option value="40">Central Africa</option>
                                                                    <option value="41">Chad</option>
                                                                    <option value="42">Chile</option>
                                                                    <option value="43">China</option>
                                                                    <option value="44">Colombia</option>
                                                                    <option value="45">Comoros</option>
                                                                    <option value="46">Congo</option>
                                                                    <option value="47">Congo (Dem. Rep.)</option>
                                                                    <option value="48">Cook Islands</option>
                                                                    <option value="49">Costa Rica</option>
                                                                    <option value="50">Croatia</option>
                                                                    <option value="51">Cuba</option>
                                                                    <option value="52">Cyprus</option>
                                                                    <option value="53">Czech Republic</option>
                                                                    <option value="54">Denmark</option>
                                                                    <option value="55">Djibouti</option>
                                                                    <option value="56">Dominica</option>
                                                                    <option value="57">Dominican Republic</option>
                                                                    <option value="58">East Timor</option>
                                                                    <option value="59">Ecuador</option>
                                                                    <option value="60">Egypt</option>
                                                                    <option value="61">El Salvador</option>
                                                                    <option value="62">Equatorial Guinea</option>
                                                                    <option value="63">Eritrea</option>
                                                                    <option value="64">Estonia</option>
                                                                    <option value="65">Ethiopia</option>
                                                                    <option value="66">Ext. Territ. of Australia</option>
                                                                    <option value="67">Falkland Islands</option>
                                                                    <option value="68">Faroe Islands</option>
                                                                    <option value="69">Fiji</option>
                                                                    <option value="70">Finland</option>
                                                                    <option value="71">France</option>
                                                                    <option value="72">French Guiana</option>
                                                                    <option value="73">French Polynesia</option>
                                                                    <option value="74">Gabon</option>
                                                                    <option value="75">Gambia</option>
                                                                    <option value="76">Georgia</option>
                                                                    <option value="77">Germany</option>
                                                                    <option value="78">Ghana</option>
                                                                    <option value="79">Gibraltar</option>
                                                                    <option value="80">Greece</option>
                                                                    <option value="81">Greenland</option>
                                                                    <option value="82">Grenada</option>
                                                                    <option value="83">Guadeloupe</option>
                                                                    <option value="84">Guam</option>
                                                                    <option value="85">Guatemala</option>
                                                                    <option value="86">Guernsey and Alderney</option>
                                                                    <option value="87">Guinea</option>
                                                                    <option value="88">Guinea Bissau</option>
                                                                    <option value="89">Guyana</option>
                                                                    <option value="90">Haiti</option>
                                                                    <option value="91">Honduras</option>
                                                                    <option value="92">Hungary</option>
                                                                    <option value="93">Iceland</option>
                                                                    <option value="94">India</option>
                                                                    <option value="95">Indonesia</option>
                                                                    <option value="96">Iran</option>
                                                                    <option value="97">Iraq</option>
                                                                    <option value="98">Ireland</option>
                                                                    <option value="99">Israel</option>
                                                                    <option value="100">Italy</option>
                                                                    <option value="101">Ivory Coast</option>
                                                                    <option value="102">Jamaica</option>
                                                                    <option value="103">Japan</option>
                                                                    <option value="104">Jersey</option>
                                                                    <option value="105">Jordan</option>
                                                                    <option value="106">Kazakhstan</option>
                                                                    <option value="107">Kenya</option>
                                                                    <option value="108">Kiribati</option>
                                                                    <option value="109">Korea (North)</option>
                                                                    <option value="110">Korea (South)</option>
                                                                    <option value="111">Kuwait</option>
                                                                    <option value="112">Kyrgyzstan</option>
                                                                    <option value="113">Laos</option>
                                                                    <option value="114">Latvia</option>
                                                                    <option value="115">Lebanon</option>
                                                                    <option value="116">Lesotho</option>
                                                                    <option value="117">Liberia</option>
                                                                    <option value="118">Libya</option>
                                                                    <option value="119">Liechtenstein</option>
                                                                    <option value="120">Lithuania</option>
                                                                    <option value="121">Luxembourg</option>
                                                                    <option value="122">Macedonia</option>
                                                                    <option value="123">Madagascar</option>
                                                                    <option value="124">Malawi</option>
                                                                    <option value="125">Malaysia</option>
                                                                    <option value="126">Maldives</option>
                                                                    <option value="127">Mali</option>
                                                                    <option value="128">Malta</option>
                                                                    <option value="129">Man (Isle of)</option>
                                                                    <option value="130">Marshall Islands</option>
                                                                    <option value="131">Martinique</option>
                                                                    <option value="132">Mauritania</option>
                                                                    <option value="133">Mauritius</option>
                                                                    <option value="134">Mayotte</option>
                                                                    <option value="135">Mexico</option>
                                                                    <option value="136">Micronesia</option>
                                                                    <option value="137">Moldova</option>
                                                                    <option value="138">Monaco</option>
                                                                    <option value="139">Mongolia</option>
                                                                    <option value="140">Morocco</option>
                                                                    <option value="141">Mozambique</option>
                                                                    <option value="142">Myanmar</option>
                                                                    <option value="143">Namibia</option>
                                                                    <option value="144">Nauru</option>
                                                                    <option value="145">Nepal</option>
                                                                    <option value="146">Netherlands</option>
                                                                    <option value="147">Netherlands Antilles</option>
                                                                    <option value="148">New Caledonia</option>
                                                                    <option value="149">New Zealand</option>
                                                                    <option value="150">Nicaragua</option>
                                                                    <option value="151">Niger</option>
                                                                    <option value="152">Nigeria</option>
                                                                    <option value="153">Niue</option>
                                                                    <option value="154">Norfolk</option>
                                                                    <option value="155">Northern Mariana Islands</option>
                                                                    <option value="156">Oman</option>
                                                                    <option value="157">Pakistan</option>
                                                                    <option value="158">Palau</option>
                                                                    <option value="159">Palestine</option>
                                                                    <option value="160">Panama</option>
                                                                    <option value="161">Papua New Guinea</option>
                                                                    <option value="162">Paraguay</option>
                                                                    <option value="163">Peru</option>
                                                                    <option value="164">Philippines</option>
                                                                    <option value="165">Poland</option>
                                                                    <option value="166">Portugal</option>
                                                                    <option value="167">Puerto Rico</option>
                                                                    <option value="168">Qatar</option>
                                                                    <option value="169">Réunion</option>
                                                                    <option value="170">Romania</option>
                                                                    <option value="171">Russia</option>
                                                                    <option value="172">Rwanda</option>
                                                                    <option value="173">Sahara</option>
                                                                    <option value="174">Saint Helena</option>
                                                                    <option value="175">Saint Kitts and Nevis</option>
                                                                    <option value="176">Saint Lucia</option>
                                                                    <option value="177">Saint Pierre &amp; Miquelon</option>
                                                                    <option value="179">Samoa</option>
                                                                    <option value="180">San Marino</option>
                                                                    <option value="181">São Tomé and Príncipe</option>
                                                                    <option value="182">Saudi Arabia</option>
                                                                    <option value="183">Senegal</option>
                                                                    <option value="184">Serbia and Montenegro</option>
                                                                    <option value="185">Seychelles</option>
                                                                    <option value="186">Sierra Leone</option>
                                                                    <option value="187">Singapore</option>
                                                                    <option value="188">Slovakia</option>
                                                                    <option value="189">Slovenia</option>
                                                                    <option value="190">Smaller Territories of the UK</option>
                                                                    <option value="191">Solomon Islands</option>
                                                                    <option value="192">Somalia</option>
                                                                    <option value="193">South Africa</option>
                                                                    <option value="194">Spain</option>
                                                                    <option value="195">Sri Lanka</option>
                                                                    <option value="178">St. Vincent &amp; the Grenadines</option>
                                                                    <option value="196">Sudan</option>
                                                                    <option value="197">Suriname</option>
                                                                    <option value="198">Svalbard and Jan Mayen</option>
                                                                    <option value="199">Swaziland</option>
                                                                    <option value="200">Sweden</option>
                                                                    <option value="201">Switzerland</option>
                                                                    <option value="202">Syria</option>
                                                                    <option value="203">Taiwan</option>
                                                                    <option value="204">Tajikistan</option>
                                                                    <option value="205">Tanzania</option>
                                                                    <option value="206">Terres Australes</option>
                                                                    <option value="207">Thailand</option>
                                                                    <option value="208">Togo</option>
                                                                    <option value="209">Tokelau</option>
                                                                    <option value="210">Tonga</option>
                                                                    <option value="211">Trinidad and Tobago</option>
                                                                    <option value="212">Tunisia</option>
                                                                    <option value="213" selected="selected">Türkiye</option>
                                                                    <option value="214">Turkmenistan</option>
                                                                    <option value="215">Turks and Caicos Islands</option>
                                                                    <option value="216">Tuvalu</option>
                                                                    <option value="217">Uganda</option>
                                                                    <option value="218">Ukraine</option>
                                                                    <option value="219">United Arab Emirates</option>
                                                                    <option value="220">United Kingdom</option>
                                                                    <option value="221">United States of America</option>
                                                                    <option value="222">Uruguay</option>
                                                                    <option value="223">Uzbekistan</option>
                                                                    <option value="224">Vanuatu</option>
                                                                    <option value="225">Vatican</option>
                                                                    <option value="226">Venezuela</option>
                                                                    <option value="227">Vietnam</option>
                                                                    <option value="228">Virgin Islands of the USA</option>
                                                                    <option value="229">Wallis &amp; Futuna</option>
                                                                    <option value="230">Yemen</option>
                                                                    <option value="231">Zambia</option>
                                                                    <option value="232">Zimbabwe</option>

                                                                </select>
                                                            </div> -->

                                                            <div class="form-group ord_shipping_city_id">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_city_id"><span id="label_ord_shipping_city_id">Şehir</span><span class="required_star">*</span> : </label>
                                                                <select onchange="loadTowns(this.value, 'ord_shipping_town_id')" class="form-control" name="ord_shipping_city_id" id="ord_shipping_city_id">
                                                                    <option value="">Lütfen seçiniz</option>
                                                                    <?php foreach ($cities as $city) : ?>
                                                                        <option value="<?php echo $city['id'] ?>"><?php echo $city['cityName'] ?></option>
                                                                    <?php endforeach; ?>

                                                                </select>
                                                            </div>

                                                            <div class="form-group ord_shipping_town_id">
                                                                <div class="error"></div>
                                                                <label for="ord_shipping_town_id"><span id="label_ord_shipping_town_id">İlçe</span> : </label>

                                                                <select class="form-control" name="ord_shipping_town_id" id="ord_shipping_town_id">
                                                                    <option value="">Lütfen seçiniz</option>

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

                                    <!-- <div class="ord_form_box payment_type">
                                        <div class="ord_form_box_header">
                                            <span>Ödeme Tipi</span>
                                        </div>
                                        <div class="error"></div>
                                        <div class="payment_type_wrapper">
                                            <label for="ord_payment_typepr" class="dy_selected">
                                                <input id="payment_discount_pr" name="payment_discount" type="hidden" value="0.00">
                                                <div class="payment_type_top">
                                                    <input type="radio" id="ord_payment_typepr" name="ord_payment_type" value="pr" onclick="$('#pop_container').payOptions('/index.php?p=PaymentOptions&amp;type='+this.value,this,true)">
                                                    &nbsp;&nbsp;Teslimde Nakit Ödeme
                                                </div>
                                            </label>
                                            <label for="ord_payment_typecct3d" class="">
                                                <input id="payment_discount_cct3d" name="payment_discount" type="hidden" value="0.00">
                                                <div class="payment_type_top">
                                                    <input type="radio" id="ord_payment_typecct3d" name="ord_payment_type" value="cct3d" onclick="$('#pop_container').payOptions('/index.php?p=PaymentOptions&amp;type='+this.value,this,true)">
                                                    &nbsp;&nbsp;Kredi kartıyla 3D güvenli ödeme
                                                </div>
                                            </label>
                                            <label for="ord_payment_typeprc">
                                                <input id="payment_discount_prc" name="payment_discount" type="hidden" value="0.00">
                                                <div class="payment_type_top">
                                                    <input type="radio" id="ord_payment_typeprc" name="ord_payment_type" value="prc" onclick="$('#pop_container').payOptions('/index.php?p=PaymentOptions&amp;type='+this.value,this,true)">
                                                    &nbsp;&nbsp;Teslimde kredi kartı ile ödeme
                                                </div>
                                            </label>
                                        </div>
                                    </div> -->

                                    <!-- <div id="cargo_container">
                                        <div class="no_cargo">Girdiğiniz adrese gönderim yapılmamaktadır</div>
                                    </div> -->
                                    <div id="pop_container">
                                        <div class="d-flex  flex-sm-row flex-column bg-light p-3">

                                            <div class="px-3 flex-fill">
                                                <div class="ord_form_box ord_payment_cc_form">
                                                    <div class="ord_form_box_header">
                                                        <span>Kredi kartı bilgileri</span>
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label>Banka</label>
                                                        <select  class="form-control" name="ord_bank_id" id="ord_bank_id" onchange="$('#div_intsallments').loadPage('/index.php?p=Installments&amp;bank_id='+$(this).val()+'&amp;amount='+$('#total_amount').val());">
                                                            <option value="">Lütfen seçiniz</option>
                                                            <option value="22">
                                                                Axess Kartlar
                                                            </option>
                                                            <option value="58">
                                                                Bonus Kartlar
                                                            </option>
                                                            <option value="70">
                                                                Diğer Kartlar
                                                            </option>
                                                            <option value="60">
                                                                Maximum Kartlar
                                                            </option>
                                                            <option value="59">
                                                                Paraf Kartlar
                                                            </option>
                                                            <option value="36">
                                                                QNB Finansbank Kartları
                                                            </option>
                                                            <option value="65">
                                                                World Kartlar
                                                            </option>
                                                        </select>
                                                    </div> -->


                                                    <div class="form_table">
                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccowner">
                                                                <span id="label_ord_ccowner">Kart Sahibi</span>
                                                            </label>
                                                            <input  autocomplete="off" class="form-control" type="text" name="ord_ccowner" id="ord_ccowner" maxlength="64" value="">
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccno">
                                                                <span id="label_ord_ccno">Kart No</span>
                                                            </label>
                                                            <input  autocomplete="off" class="form-control" type="text" name="ord_ccno" id="ord_ccno" maxlength="16" onkeypress="return Only_Integer(event);" value="">
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_ccexpdate_m">
                                                                <span id="label_ord_ccexpdate">Kart Son.Kul.Tar.</span>
                                                            </label>
                                                            <div class="d-flex">
                                                                <div class="flex-fill">
                                                                    <select  class="form-control" name="ord_ccexpdate[m]" id="ord_ccexpdate_m">
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
                                                                    <select  class="form-control" name="ord_ccexpdate[y]" id="ord_ccexpdate_y">
                                                                        <option value="24">2024</option>
                                                                        <option value="25">2025</option>
                                                                        <option value="26">2026</option>
                                                                        <option value="27">2027</option>
                                                                        <option value="28">2028</option>
                                                                        <option value="29">2029</option>
                                                                        <option value="30">2030</option>
                                                                        <option value="31">2031</option>
                                                                        <option value="32">2032</option>
                                                                        <option value="33">2033</option>
                                                                        <option value="34">2034</option>
                                                                        <option value="35">2035</option>
                                                                        <option value="36">2036</option>
                                                                        <option value="37">2037</option>
                                                                        <option value="38">2038</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="error"></div>
                                                        <div class="form-group">
                                                            <label for="ord_cvc">
                                                                <span id="label_ord_cvc">CVC</span>
                                                            </label>
                                                            <input  autocomplete="off" class="form-control" type="text" name="ord_cvc" id="ord_cvc" maxlength="4" size="3" onkeypress="return Only_Integer(event);" value="">
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
                                                <div class="">
                                                    <input name="installments" type="radio" id="intsallments1" class="" value="" placeholder="Tek Çekim" />
                                                    <label for="intsallments1">Tek Çekim</label>
                                                    <br>
                                                    <input name="installments" type="radio" id="intsallments2" class="" value="" placeholder="Tek Çekim" />
                                                    <label for="intsallments2">3 Taksit</label>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- <div class="ord_form_box">
                                            <div class="ord_form_box_header ord_note_trigger" onclick="$('.ord_note_container').toggle();" style="cursor:pointer">
                                                <span>
                                                    <i class="la la-plus"></i> Not
                                                </span>
                                            </div>
                                            <div class="ord_fieldset ord_note_container">
                                                <div class="error"></div>
                                                <div class="form-group">
                                                    <textarea class="form-control" cols="25" rows="5" name="ord_note" id="ord_note"></textarea>
                                                </div>
                                            </div>
                                        </div> -->

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


 

</body>

</html>