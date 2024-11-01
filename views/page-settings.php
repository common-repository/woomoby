<div class="page-wrapper">
    <div class="row no-gutters">

        <div class="col-md-3">
            <div class="sidebar-wrap sticky-top">

                <div class="sidebar-content">
                    <nav class="nav flex-column">
                        <span class="nav-item nav-title"><?php _e( 'App Configuration', 'woomoby' ); ?></span>
                        <a class="nav-link" data-toggle="tab" href="#branding" role="tab"><i class="icon cp-bucket"></i> <?php _e( 'General', 'woomoby' ); ?></a>
                        <a class="nav-link" data-toggle="tab" href="#sliders" role="tab"><i class="icon cp-images2"></i> <?php _e( 'Sliders', 'woomoby' ); ?></a>
                        <a class="nav-link" data-toggle="tab" href="#custom_code" role="tab"><i class="icon cp-cog3"></i> <?php _e( 'Custom Code', 'woomoby' ); ?></a>
                        <a class="nav-link" data-toggle="tab" href="#woomobyNotifications" role="tab"><i class="icon cp-bell2"></i> <?php _e( 'Notifications', 'woomoby' ); ?></a>
                        <div class="mb-4"></div>

                        <span class="nav-item nav-title"><?php _e( 'Layouts', 'woomoby' ); ?></span>
                        <a class="nav-link" data-toggle="tab" href="#layout_homepage" role="tab"><i class="icon cp-insert-template"></i> <?php _e( 'App Sections', 'woomoby' ); ?></a>
                        <a class="nav-link" data-toggle="tab" href="#layout_app" role="tab"><i class="icon cp-mobile"></i> <?php _e( 'Preview App', 'woomoby' ); ?></a>
                        <span class="nav-item nav-title"><?php _e( 'license', 'woomoby' ); ?></span>
                        <a class="nav-link" data-toggle="tab" href="#layout_license" role="tab"><i class="icon cp-insert-template"></i> <?php _e( 'License', 'woomoby' ); ?></a>
                    </nav>
                </div>

            </div>
        </div>
        <main class="col-md-9">
            <div class="main-wrap">
                <form id="form-settings">
                    <div class="page-navbar sticky-top">
                        <?php include_once( $this->globals['plugin_path'] . 'views/navbar.php' ); ?>
                        <div class="form-action" style="display: none;">
                           <button type="button" class="form-cancel btn btn-secondary"><i class="icon cp-blocked"></i> <?= _e('Cancel', 'woomoby'); ?></button>
                            <button type="submit" class="btn btn-primary ladda-button save-settings-spinner" data-style="zoom-out"><span class="ladda-label"><i class="icon cp-paperplane"></i> <?php _e( 'Save Changes', 'woomoby' ); ?></span></button>
                        </div>

                    </div>

                    <div class="page-content">

                        <input type="hidden" name="action" value="cp_settings_action">
                        <?php wp_nonce_field( 'cp_settings_action', 'cp_settings_nonce' ); ?>

                        <div class="tab-content">

                            <!-- General Tab -->
                            <?php // include_once( $this->globals['plugin_path'] . 'views/tabs/general.php' ); ?>


                            <!-- Branding Tab -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/branding.php' ); ?>


                            <!-- WooCommerce Pages -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/woocommerce-pages.php' ); ?>


                            <!-- Sliders -->                   
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/sliders.php' ); ?>


                            <!-- Theming -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/theming.php' ); ?>


                            <!-- Custom Code -->                   
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/custom-code.php' ); ?>
                            
                            <!-- Notifications -->                   
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/notifications.php' ); ?>

                            <!-- Home Page Layout -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/layout-homepage.php' ); ?>
                            
                            <!-- App Layout -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/layout-woomoby.php' ); ?>

                            <!-- App Lcense -->
                            <?php include_once( $this->globals['plugin_path'] . 'views/tabs/license-woomoby.php' ); ?>


                        </div>

                    </div>

                </form>

            </div>
        </main>

    </div>
</div>