<div class="tab-pane fade" id="layout_homepage" role="tabpanel">
    <div class="card">
        <div class="card-block">

            <center>
                <div class="frame-phone">
                    <div class="phone-screen" id="phone-screen">
                        <div class="screen-wrap">
                            <div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_one">
                                <?php _e( 'Click to select', 'woomoby' ); ?>
                                <?php _e( '<br>Selected Section: ', 'woomoby' ); ?><?php if($settings_options[ 'homepage']['slot_one']=="") echo "Empty"; else echo str_replace('_',' ',$settings_options[ 'homepage']['slot_one']); ?>
                            </div>
                        </div>

                        <div class="screen-wrap">
                            <div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_two">
                                <?php _e( 'Click to select', 'woomoby' ); ?>
                                <?php _e( '<br>Selected Section: ', 'woomoby' ); ?><?php if($settings_options[ 'homepage']['slot_two']=="") echo "Empty"; else echo str_replace('_',' ',$settings_options[ 'homepage']['slot_two']); ?>
                            </div>
                        </div>

                        <div class="screen-wrap">
                            <div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_three">
                                <?php _e( 'Click to select', 'woomoby' ); ?>
                                 <?php _e( '<br>Selected Section: ', 'woomoby' ); ?><?php if($settings_options[ 'homepage']['slot_three']=="") echo "Empty"; else echo str_replace('_',' ',$settings_options[ 'homepage']['slot_three']); ?>
                            </div>
                        </div>

                        <div class="screen-wrap">
                            <div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_four">
                                <?php _e( 'Click to select', 'woomoby' ); ?>
                                 <?php _e( '<br>Selected Section: ', 'woomoby' ); ?><?php if($settings_options[ 'homepage']['slot_four']=="") echo "Empty"; else echo str_replace('_',' ',$settings_options[ 'homepage']['slot_four']); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </center>
            <!--  Modal Slot 1 -->
            <div id="homepage_layout_one" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?php _e( 'Layout Slot 1', 'woomoby' ); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pr-5 pl-5">

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Image Slider</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="slider" type="radio" class="custom-control-input" <?php checked( 'slider', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Slider</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Categories</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_cards', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cards layout</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_list', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">List Layout</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Horizontal Scroll</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'hscroll_new', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'hscroll_featured', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'hscroll_best', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="hscroll_sale" type="radio" class="custom-control-input" <?php checked( 'hscroll_sale', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Product Grid</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'grid_new', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'grid_featured', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'grid_best', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_one" value="grid_sale" type="radio" class="custom-control-input" <?php checked( 'grid_sale', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                            </div>

                             <hr>

                           <fieldset class="form-group">
                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input name="homepage-slot_one" value="" type="radio" class="custom-control-input" <?php checked( '', $settings_options[ 'homepage']['slot_one'], true); ?> />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description text-danger">Make this slot empty</span>
                                    </label>
                                </div>
                            </fieldset>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <?php _e( 'Close', 'woomoby' ); ?>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!--  Modal Slot 2 -->
            <div id="homepage_layout_two" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?php _e( 'Layout Slot 2', 'woomoby' ); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pr-5 pl-5">

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Image Slider</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="slider" type="radio" class="custom-control-input" <?php checked( 'slider', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Slider</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Categories</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_cards', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cards layout</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_list', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">List Layout</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Horizontal Scroll</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'hscroll_new', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'hscroll_featured', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'hscroll_best', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="hscroll_sale" type="radio" class="custom-control-input" <?php checked( 'hscroll_sale', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Product Grid</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'grid_new', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'grid_featured', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'grid_best', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_two" value="grid_sale" type="radio" class="custom-control-input" <?php checked( 'grid_sale', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                            </div>

                             <hr>

                           <fieldset class="form-group">
                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input name="homepage-slot_two" value="" type="radio" class="custom-control-input" <?php checked( '', $settings_options[ 'homepage']['slot_two'], true); ?> />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description text-danger">Make this slot empty</span>
                                    </label>
                                </div>
                            </fieldset>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <?php _e( 'Close', 'woomoby' ); ?>
                            </button>
                        </div>

                    </div>
                </div>
            </div>


            <!--  Modal Slot 3 -->
            <div id="homepage_layout_three" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?php _e( 'Layout Slot 3', 'woomoby' ); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pr-5 pl-5">

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Image Slider</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="slider" type="radio" class="custom-control-input" <?php checked( 'slider', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Slider</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Categories</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_cards', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cards layout</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_list', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">List Layout</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Horizontal Scroll</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'hscroll_new', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'hscroll_featured', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'hscroll_best', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="hscroll_sale" type="radio" class="custom-control-input" <?php checked( 'hscroll_sale', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Product Grid</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'grid_new', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'grid_featured', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'grid_best', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_three" value="grid_sale" type="radio" class="custom-control-input" <?php checked( 'grid_sale', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                            </div>
                            <hr>
                            <fieldset class="form-group">
                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input name="homepage-slot_three" value="" type="radio" class="custom-control-input" <?php checked( '', $settings_options[ 'homepage']['slot_three'], true); ?> />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description text-danger">Make this slot empty</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <?php _e( 'Close', 'woomoby' ); ?>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal Slot 4 -->
            <div id="homepage_layout_four" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?php _e( 'Layout Slot 4', 'woomoby' ); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pr-5 pl-5">

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Image Slider</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="slider" type="radio" class="custom-control-input" <?php checked( 'slider', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Slider</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Categories</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_cards', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Cards layout</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="category_cards" type="radio" class="custom-control-input" <?php checked( 'category_list', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">List Layout</span>
                                            </label>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Horizontal Scroll</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'hscroll_new', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'hscroll_featured', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'hscroll_best', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="hscroll_sale" type="radio" class="custom-control-input" <?php checked( 'hscroll_sale', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                                <div class="col-sm-6">

                                    <fieldset class="form-group">
                                        <legend>Product Grid</legend>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_new" type="radio" class="custom-control-input" <?php checked( 'grid_new', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">New Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_featured" type="radio" class="custom-control-input" <?php checked( 'grid_featured', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Featured Products</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_best" type="radio" class="custom-control-input" <?php checked( 'grid_best', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Best Selling Products</span>
                                            </label>
                                        </div>
<!--                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input name="homepage-slot_four" value="grid_sale" type="radio" class="custom-control-input" <?php checked( 'grid_sale', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">On Sale Products</span>
                                            </label>
                                        </div>-->
                                    </fieldset>

                                </div>
                            </div>
                            <hr>
                            <fieldset class="form-group">
                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input name="homepage-slot_four" value="" type="radio" class="custom-control-input" <?php checked( '', $settings_options[ 'homepage']['slot_four'], true); ?> />
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description text-danger">Make this slot empty</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <?php _e( 'Close', 'woomoby' ); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>