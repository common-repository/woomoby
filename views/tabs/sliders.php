<div class="tab-pane fade" id="sliders" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">
            
            <h5 class="mb-0"><?php _e('Top Slider', 'woomoby'); ?></h5>
            <p class="mb-4"><?php _e('Recommended size 800x400', 'woomoby'); ?></p>

            <div class="row">
                <div class="col-sm-4">
                    <div class="slider-box">

                        <p class="text-center"><?php _e('Slider One', 'woomoby'); ?></p>
                        <span id='home_slider_one-preview'>
                            <img alt="" style="max-width: 100%;" src="<?= esc_url( $settings_options['home_slider']['one']['img'] ); ?>" />
                        </span>

<!--                        <div class="mt-3 mb-3">
                            <small><?php // _e('Slider Link', 'woomoby'); ?></small>
                            <input class="form-control form-control-sm" name="home_slider_one_link" type="text" value="<?= $settings_options['home_slider']['one']['url']; ?>">
                        </div>-->

                        <center>
                            <button type="button" id="home_slider_one" data-identifier="home_slider_one" class="btn btn-info btn-ladda action-image-upload" data-style="zoom-out"><span class="ladda-label"><?= _e('Upload', 'dtcwm'); ?></span></button>
                            <button type="button" id="home_slider_one-delete" <?php if ( ! $settings_options['home_slider']['one']['img'] ) { echo "style='display: none;'"; } ?> class="btn btn-danger btn-ladda action-image-delete" data-identifier="home_slider_one" data-style="zoom-out"><span class="ladda-label"><?= _e('Remove', 'dtcwm'); ?></span></button>
                        </center>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="slider-box">
              
                        <p class="text-center"><?php _e('Slider Two', 'woomoby'); ?></p>
                        <span id='home_slider_two-preview'>
                            <img alt="" style="max-width: 100%;" src="<?= esc_url( $settings_options['home_slider']['two']['img'] ); ?>" />
                        </span>

                        <!--<div class="mt-3 mb-3">-->
                            <!--<small><?php // _e('Slider Link', 'woomoby'); ?></small>-->
                            <!--<input class="form-control form-control-sm" name="home_slider_two_link" type="text" value="<?= $settings_options['home_slider']['two']['url']; ?>">-->
                        <!--</div>-->

                        <center>
                            <button type="button" id="home_slider_two" data-identifier="home_slider_two" class="btn btn-info btn-ladda action-image-upload" data-style="zoom-out"><span class="ladda-label"><?= _e('Upload', 'woomoby'); ?></span></button>
                            <button type="button" id="home_slider_two-delete" <?php if ( ! $settings_options['home_slider']['two']['img'] ) { echo "style='display: none;'"; } ?> class="btn btn-danger btn-ladda action-image-delete" data-identifier="home_slider_two" data-style="zoom-out"><span class="ladda-label"><?= _e('Remove', 'woomoby'); ?></span></button>
                        </center>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="slider-box">

                        <p class="text-center"><?php _e('Slider Three', 'woomoby'); ?></p>
                        <span id='home_slider_three-preview'>
                            <img alt="" style="max-width: 100%;" src="<?= esc_url( $settings_options['home_slider']['three']['img'] ); ?>" />
                        </span>

<!--                        <div class="mt-3 mb-3">
                            <small><?php // _e('Slider Link', 'woomoby'); ?></small>
                            <input class="form-control form-control-sm" name="home_slider_three_link" type="text" value="<?= $settings_options['home_slider']['three']['url']; ?>">
                        </div>-->

                        <center>
                            <button type="button" id="home_slider_three" data-identifier="home_slider_three" class="btn btn-info btn-ladda action-image-upload" data-style="zoom-out"><span class="ladda-label"><?= _e('Upload', 'woomoby'); ?></span></button>
                            <button type="button" id="home_slider_three-delete" <?php if ( ! $settings_options['home_slider']['three']['img'] ) { echo "style='display: none;'"; } ?> class="btn btn-danger btn-ladda action-image-delete" data-identifier="home_slider_three" data-style="zoom-out"><span class="ladda-label"><?= _e('Remove', 'woomoby'); ?></span></button>
                        </center>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>