<?php $apikey_woomoby = "";
if(isset($settings_options[ 'apikey_woomoby']))
    $apikey_woomoby = $settings_options[ 'apikey_woomoby'];
?>
<div class="tab-pane fade" id="layout_license" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">
            <div class="row">
                <label class="col-md-2 col-form-label"><?php _e('API Key', 'woomoby'); ?></label>
                <div class="col-md-10 woomoby-field woomoby-half">
                    <label class="display-block"></label>
                <input type="text" name="apikey_woomoby" id="apikey_woomoby" value="<?php echo $apikey_woomoby; ?>" class="demoInputBox">
                    <small class="form-text text-muted"><?php _e('Place your API Key.', 'woomoby'); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>