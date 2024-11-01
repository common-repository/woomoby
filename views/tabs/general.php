<div class="tab-pane fade show active" id="general" role="tabpanel">

    <div class="card">
        <div class="card-block p-md-5">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Enable Woomoby', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_woomoby" value="1" <?php checked(1, $settings_options[ 'enable_woomoby'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php _e('If disabled woomoby will be off for visitors using mobile devices.', 'woomoby'); ?></small>
                </div>
            </div>
<!--
            <hr class="mb-4 mt-4">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Enable Tablet', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_tablet" value="1" <?php // checked(1, $settings_options[ 'enable_tablet'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php // _e('If enabled woomoby will be disabled to visitors using tablets.', 'woomoby'); ?></small>
                </div>
            </div>-->

            <hr class="mb-4 mt-4">

            <!-- <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Enable Store Only', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_store_only" value="1" <?php checked(1, $settings_options[ 'enable_store_only'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php _e('If enabled woomoby will only be loaded for WooCommerce pages.', 'woomoby'); ?></small>
                </div>
            </div>

            <hr class="mb-4 mt-4"> -->

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Enable RTL', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_rtl" value="1" <?php checked(1, $settings_options[ 'enable_rtl'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php _e('Add right to left support.', 'woomoby'); ?></small>
                </div>
            </div>

            <hr class="mb-4 mt-4">
<!--
            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Force Save Settings', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="save_settings" value="1" <?php // checked(1, $settings_options[ 'save_settings'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php // _e('If enabled your setting options will always be saved whenever the plugin is uninstalled.', 'woomoby'); ?></small>
                </div>
            </div>-->

            <!--<hr class="mb-4 mt-4">-->

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Bottom Toolbar', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_toolbar" value="1" <?php checked(1, $settings_options['enable_toolbar'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php _e('If disabled the toolbar at the bottom will not be shown.', 'woomoby'); ?></small>
                </div>
            </div>

            <hr class="mb-4 mt-4">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Left Side Panel', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="enable_left_panel" value="1" <?php checked(1, $settings_options['enable_left_panel'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php _e('If disabled the left side panel will not be shown.', 'woomoby'); ?></small>
                </div>
            </div>

<!--            <hr class="mb-4 mt-4">

            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Cleanup Header', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                    <input type="checkbox" class="switchery" name="opt_clean_head" value="1" <?php // checked(1, $settings_options['clean_head'], true); ?> />
                </label>
                    <small class="form-text text-muted"><?php // _e('Remove all the junk from WordPress header.', 'woomoby'); ?></small>
                </div>
            </div>-->

        </div>
    </div>

</div>