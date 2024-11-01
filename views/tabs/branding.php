<div class="tab-pane fade show active" id="branding" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">
            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Header Menu', 'woomoby'); ?></label>
                <?php 
                $OrderT = get_option('woomobyPagesOrder');
                $args = array(
                        'taxonomy' => 'product_cat',
                        'post_type' => 'product'
                );
                $termsData = get_terms($args);
                $termsData = json_decode(json_encode($termsData),true);
                $newTermsArray = array();
                $terms_id = unserialize($settings_options['header_menu']);
                if($OrderT){
                    foreach ($OrderT as $termValue) {
                        $termKey = array_search($termValue, array_column($termsData, 'term_id'));
                        $newTermsArray[$termValue] = $termsData[$termKey];
                    }
                    $termsData = $newTermsArray;
                }
                if($termsData):
                        ?>
                <div class="col-md-8">
                    <div id="listContainer">
                            <ul class="group sortable">
                                <?php
                                $count = 1;
                                $all_items = [];
                                
                                foreach ($termsData as $menupage):
                                    $all_items[$menupage['term_id']] =  $menupage;
                                    $count++;
                                endforeach;
                                if(isset($terms_id[0])):
                                foreach($terms_id[0] as $parents):
                                    $parent = $all_items[$parents];
                                ?>
                                        <li class="listItem groupItem" id="item-<?php echo $parent['term_id']; ?>" data-id="<?php echo $parent['term_id']; ?>" data-parent-id="0">
                                        <input class="menu_checkbox" type="checkbox" name="header_menu[]" value="<?php echo $parent['term_id']; ?>" checked>
                                        <?php echo $parent['name']; ?>
                                        <ul class="group child-menu" data-id="<?php echo $parent['term_id']; ?>"> <div class="groupTitle"></div>
                                            <?php if(isset($terms_id[$parents]) && is_array($terms_id[$parents])): ?>
                                                <?php foreach($terms_id[$parents] as $children): 
                                                    $child = $all_items[$children]; ?>
                                                    <li class="listItem groupItem" id="item-<?php echo $child['term_id']; ?>" data-id="<?php echo $child['term_id']; ?>" data-parent-id="<?php echo $parent['term_id']; ?>">
                                                        <input class="menu_checkbox" type="checkbox" name="header_menu[]" value="<?php echo $child['term_id']; ?>" checked>
                                                        <?php echo $child['name']; ?>
                                                        <ul class="group child-menu" data-id="<?php echo $child['term_id']; ?>"> <div class="groupTitle"></div>
                                                        </ul>
                                                    </li>
                                                <?php unset($all_items[$children]); endforeach; ?>                                            
                                            <?php endif; ?>

                                        </ul>
                                    </li>
                                <?php
                                unset($all_items[$parents]); endforeach;
                                endif;
                                ?>
                            <?php
                            foreach($all_items as $unselected): ?>
                           <li class="listItem groupItem" id="item-<?php echo $unselected['term_id']; ?>" data-id="<?php echo $unselected['term_id']; ?>" data-parent-id="0">
                                        <input class="menu_checkbox" type="checkbox" name="header_menu[]" value="<?php echo $unselected['term_id']; ?>" >
                                        <?php echo $unselected['name']; ?>
                                        <ul class="group child-menu" data-id="<?php echo $unselected['term_id']; ?>"> <div class="groupTitle"></div>
                                        </ul>
                                </li>
                            <?php endforeach; ?>
                            
                            </ul>
                        </div>    
                    
                  <?php /* <ul id="sortable">
                       <?php $count=1; foreach($termsData as $menupage): ?>
                            <li class="ui-state-default" id="item-<?php echo $menupage['term_id'];?>"><input type="checkbox" name="header_menu[]" value="<?php echo $menupage['term_id'];?>" <?php if(!empty($terms_id)): if(in_array($menupage['term_id'],$terms_id) ){ echo 'checked';} endif;?>><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $menupage['name']; ?></li>
                        <?php $count++; endforeach;?>
                      </ul> */ ?>
                    <!--<textarea class="form-control" name="header_menu"><?= $settings_options['header_menu']; ?></textarea>-->
                    <small class="form-text text-muted"><?php _e('Menu you want to have displayed at top of your website.', 'woomoby'); ?></small>
                </div>
                <?php endif;?>
            </div>
            <hr class="mb-4 mt-4">
            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Website Name', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <input class="form-control" name="site_name" type="text" value="<?= $settings_options['site_name']; ?>">
                    <small class="form-text text-muted"><?php _e('The name you want to have displayed for your website.', 'woomoby'); ?></small>
                </div>
            </div>
            <hr class="mb-4 mt-4">
            <div class="row">
                <label class="col-md-4 col-form-label"><?php  _e('Grid Items', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="grid-items" value="<?= $settings_options['grid_items']; ?>" />
                    <small class="form-text text-muted"><?php  _e('Number of items displayed in a grid.', 'woomoby'); ?></small>
                </div>
            </div>
<!--            <hr class="mb-4 mt-4">
            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Footer Copyright', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <textarea class="form-control" name="footer_copyright"><?= $settings_options['footer_copyright']; ?></textarea>
                    <small class="form-text text-muted"><?php _e('The pages footer text.', 'woomoby'); ?></small>
                </div>
            </div>-->
<!--            <hr class="mb-4 mt-4">
            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Footer Menu', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <textarea class="form-control" name="footer_menu"><?= $settings_options['footer_menu']; ?></textarea>
                    <small class="form-text text-muted"><?php // _e('The footer pages .', 'woomoby'); ?></small>
                </div>
            </div>-->
            <hr class="mb-4 mt-4">

            <div class="form-group">
                <h5 class="mb-0"><?php _e('Site Logo', 'woomoby'); ?></h5>
                <p><?php _e('Recommended size 175x40', 'woomoby'); ?></p>

                <div id='site_logo-preview' class="pb-2">
                    <img alt="" style="max-height: 60px; max-width: 220px; box-shadow: 0 1px 2px rgba(0,0,0,.1); background: #f8f8f8; padding: 4px;" src="<?= esc_url( $settings_options['site_logo'] ); ?>" />
                </div>

                <button type="button" data-identifier="site_logo" id="logo-upload" class="btn btn-xs btn-info btn-ladda action-image-upload" data-style="zoom-out"><span class="ladda-label"><?php _e('Upload', 'woomoby'); ?></span></button>
                <button type="button" id="site_logo-delete" <?php if ( ! $settings_options['site_logo'] ) { echo "style='display: none;'"; } ?> class="btn btn-danger btn-ladda action-image-delete" data-identifier="site_logo" data-style="zoom-out"><span class="ladda-label"><?php _e('Remove', 'woomoby'); ?></span></button>
            </div>

            <hr class="mb-4 mt-4">

            <div class="form-group">
                <?php
                    $favicon_url = '';
                    if ( $settings_options['favicon']['url'] ) {
                        $favicon_url = $settings_options['favicon']['url'].''.$settings_options['favicon']['name'].'.png'; 
                    }
                ?>

                <h5 class="mb-0"><?php _e('Favicon', 'woomoby'); ?></h5>
                <p><?php _e('Recommended size 512x512, it will be resize for different devices', 'woomoby'); ?></p>

                <span id='favicon-preview'>
                    <img alt="" style="max-height: 32px; max-width: 32px;" src="<?= esc_url( $favicon_url ); ?>" />
                </span>

                <button type="button" data-identifier="favicon" id="favicon-upload" class="btn btn-xs btn-info btn-ladda action-image-upload" data-style="zoom-out"><span class="ladda-label"><?php _e('Upload', 'cp'); ?></span></button>
                <button type="button" id="favicon-delete" <?php if ( ! $favicon_url ) { echo "style='display: none;'"; } ?> class="btn btn-danger btn-ladda action-image-delete" data-identifier="favicon" data-style="zoom-out"><span class="ladda-label"><?php _e('Remove', 'woomoby'); ?></span></button>
                <small id="favicon-error" class="text-danger mt-2"></small>
            </div>

            <hr class="mb-4 mt-4">

            <h5 class="mb-3"><?php _e('Color Scheme', 'woomoby'); ?></h5>

<!--            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php //_e('Body Background', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-body_bg" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['body_bg']; ?>">
                </div>
            </div>-->

            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php _e('Header Color', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-primary" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['primary']; ?>">
                </div>
            </div>

<!--            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php // _e('Links Color', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-links" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['links']; ?>">
                </div>
            </div>-->


<!--            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php // _e('Browser Address Bar', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-address_bar" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['address_bar']; ?>">
                </div>
            </div>-->
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php _e('Navbar Text', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-navbar_text" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['navbar_text']; ?>">
                </div>
            </div>

            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php _e('Navbar Icon Color', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-navbar_bg" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['navbar_bg']; ?>">
                </div>
            </div>
            <hr class="mb-4 mt-4">
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php _e('Button Text', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-button_text" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['button_text']; ?>">
                </div>
            </div>
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php _e('Button Background', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-button_bg" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['button_bg']; ?>">
                </div>
            </div>
<!--            <hr class="mb-4 mt-4">
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php // _e('Cart Badge Text', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-cart_badge_text" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['cart_badge_text']; ?>">
                </div>
            </div>
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php // _e('Cart Badge Background', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-cart_badge_bg" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['cart_badge_bg']; ?>">
                </div>
            </div>
            <hr class="mb-4 mt-4">
            <div class="form-group row pb-3">
                <label class="col-md-6 col-form-label"><?php // _e('Sale Label Text', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-label_text" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['label_text']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6 col-form-label"><?php // _e('Sale Label Background', 'woomoby'); ?></label>
                <div class="col-md-2">
                    <input type="text" name="color-label_bg" class="form-control colorpicker" data-preferred-format="hex" value="<?= $settings_options['color_scheme']['label_bg']; ?>">
                </div>
            </div>-->

        </div>
    </div>

</div>