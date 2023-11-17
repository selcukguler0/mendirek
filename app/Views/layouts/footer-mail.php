<div class="Footer-email" style="display: block !important;">
    <div id="email_list_container">
        <div class="Box Box--email">
            <div class="container">
                <div class="Box-header">
                    <a href="javascript:void(0);">Email Listesi</a>
                </div>
                <div class="Box-content">
                    <div class="email_list_desc">E-Mail listemize katılın.</div>
                    <div class="alert alert-danger"></div>
                    <form action="" method="post" class="edit_form" data-container="#mod_container_" onsubmit="$(this).loadPageSubmit();return false;">
                        <input type="hidden" name="csrf_token" class="csrf_token" value="21d0f9fa9586d660848d53bc4d370e27">
                        <div class="inp_container form-inline">
                            <div class="form-group">
                                <input placeholder="Email" class="form-control form-control-sm" type="email" name="eml_email" id="eml_email" maxlength="255" size="40" value="">
                                <input class="btn btn-orange btn-sm ml-2" type="submit" name="save" id="save" value="Kaydet">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>