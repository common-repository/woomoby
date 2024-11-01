<?php 
    $theme_selections = array(
//        __('iOS Theme', 'woomoby')         => 'ios',
//        __('android Theme', 'woomoby')         => 'android',
        __('Woomoby Theme', 'woomoby')    => 'mobileapp-template.php',
    );
?>
<div class="tab-pane fade" id="theming" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Select Theme', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <select name="theming-ios-devices" class="form-control custom-select">
                        <?php foreach ( $theme_selections as $key => $value ) { ?>
                        <option value="<?= $value; ?>" <?php selected( $settings_options['theming']['ios_devices'], $value ); ?>><?= $key; ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-text text-muted"><?php _e('Select the theme you want to be shown to iOS/android devices.', 'woomoby'); ?></small>
                </div>
            </div>
<?php /*
            <hr class="mb-4 mt-4">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Android Devices', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <select name="theming-android-devices" class="form-control custom-select">
                        <?php foreach ( $theme_selections as $key => $value ) { ?>
                        <option value="<?= $value; ?>" <?php selected( $settings_options['theming']['android_devices'], $value ); ?>><?= $key; ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-text text-muted"><?php _e('Select the theme you want to be shown to Android devices.', 'woomoby'); ?></small>
                </div>
            </div>

            <hr class="mb-4 mt-4">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Other Devices', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <select name="theming-other-devices" class="form-control custom-select">
                        <?php foreach ( $theme_selections as $key => $value ) { ?>
                        <option value="<?= $value; ?>" <?php selected( $settings_options['theming']['other_devices'], $value ); ?>><?= $key; ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-text text-muted"><?php _e('Select the theme you want to be shown to other devices.', 'woomoby'); ?></small>
                </div>
            </div>
 */ ?>
        </div>
    </div>
</div>