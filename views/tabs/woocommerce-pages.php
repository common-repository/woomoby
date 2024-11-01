<div class="tab-pane fade" id="woocommerce_pages" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">

            <!-- Product Listing -->
            <h5 class="mb-3"><?php _e('Product Catalog', 'woomoby'); ?></h5>

            <div class="row pb-5">
                <label class="col-md-4 col-form-label"><?php _e('Add to Cart Button', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="catalog-add_to_cart" value="1" <?php checked(1, $settings_options['catalog']['add_to_cart'], true); ?> />
                        <small class="form-text text-muted"><?php _e('Hide / show the add to cart option on the shop page.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Listing Layout', 'woomoby'); ?></label>
                <div class="col-md-5">
                    <select name="catalog-listing_layout" class="form-control custom-select">
                        <option value="list" <?php selected( $settings_options['catalog']['listing_layout'], 'list' ); ?>><?php _e('List', 'woomoby'); ?></option>
                        <option value="grid" <?php selected( $settings_options['catalog']['listing_layout'], 'grid' ); ?>><?php _e('Grid', 'woomoby'); ?></option>
                    </select>
                    <small class="form-text text-muted"><?php _e('Select the product listing layout.', 'woomoby'); ?></small>
                </div>
            </div>

            <hr class="mb-4 mt-4">

            <!-- View Product -->
            <h5 class="mb-3"><?php _e('View Product', 'woomoby'); ?></h5>

            <div class="row pb-5">
                <label class="col-md-4 col-form-label"><?php _e('Enable Related', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="single_product-enable_related" value="1" <?php checked(1, $settings_options['single_product']['enable_related'], true); ?> />
                        <small class="form-text text-muted"><?php _e('If enabled a related tab will be created to list similar products.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

<!--            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Enable Reviews', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="single_product-enable_reviews" value="1" <?php // checked(1, $settings_options['single_product']['enable_reviews'], true); ?> />
                        <small class="form-text text-muted"><?php // _e('If enabled users will be able to see and post reviews.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>-->

            <hr class="mb-4 mt-4">

            <!-- Shopping -->
            <h5 class="mb-3"><?php _e('Shopping Cart', 'woomoby'); ?></h5>

            <div class="row mb-5">
                <label class="col-md-4 col-form-label"><?php _e('Enable Coupons', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="cart-enable_coupons" value="1" <?php checked(1, $settings_options['cart']['enable_coupons'], true); ?> />
                        <small class="form-text text-muted"><?php _e('Hide / show the coupon option.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

            <div class="row mb-5">
                <label class="col-md-4 col-form-label"><?php _e('Cart Totals', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="cart-enable_cart_totals" value="1" <?php checked(1, $settings_options['cart']['enable_cart_totals'], true); ?> />
                        <small class="form-text text-muted"><?php _e('Hide / show the cart totals block.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Toolbar Navigation', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="cart-toolbar_navigation" value="1" <?php checked(1, $settings_options['cart']['toolbar_navigation'], true); ?> />
                        <small class="form-text text-muted"><?php _e('If enabled the checkout button will be place on the toolbar.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

            <hr class="divider mb-4 mt-4">

            <!-- Checkout -->
            <h5 class="mb-3"><?php _e('Checkout', 'woomoby'); ?></h5>
       
            <div class="row">
                <label class="col-md-4 col-form-label"><?php _e('Toolbar Navigation', 'woomoby'); ?></label>
                <div class="col-md-8">
                    <label class="display-block">
                        <input type="checkbox" class="switchery" name="checkout-toolbar_navigation" value="1" <?php checked(1, $settings_options['checkout']['toolbar_navigation'], true); ?> />
                        <small class="form-text text-muted"><?php _e('If enabled the procceed to checkout button will be place within the toolbar.', 'woomoby'); ?></small>
                    </label>
                </div>
            </div>

<!--            <hr class="divider mb-4 mt-4">

             Category Page 
            <h5 class="mb-3"><?php // _e('Category', 'woomoby'); ?></h5>
       
            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Page Layout', 'woomoby'); ?></label>
                <div class="col-md-5">
                    <select name="category-layout" class="form-control custom-select">
                        <option value="cards" <?php // selected( $settings_options['category']['layout'], 'cards' ); ?>><?php // _e('Cards', 'woomoby'); ?></option>
                        <option value="list_tier" <?php // selected( $settings_options['category']['layout'], 'list_tier' ); ?>><?php // _e('List one tier sub-categories', 'woomoby'); ?></option>
                        <option value="list_all" <?php // selected( $settings_options['category']['layout'], 'list_all' ); ?>><?php // _e('List all sub-categories', 'woomoby'); ?></option>
                    </select>
                    <small class="form-text text-muted"><?php // _e('Select the layout for the category page.', 'woomoby'); ?></small>
                </div>
            </div>-->

<!--            <hr class="divider mb-4 mt-4">

             Acount Page 
            <h5 class="mb-3"><?php // _e('My Account', 'woomoby'); ?></h5>
       
            <div class="row">
                <label class="col-md-4 col-form-label"><?php // _e('Dashboard Layout', 'woomoby'); ?></label>
                <div class="col-md-5">
                    <select name="account-dashboard_layout" class="form-control custom-select">
                        <option value="list" <?php // selected( $settings_options['account']['dashboard_layout'], 'list' ); ?>><?php // _e('List Navigation', 'woomoby'); ?></option>
                        <option value="grid" <?php // selected( $settings_options['account']['dashboard_layout'], 'grid' ); ?>><?php // _e('Grid Navigation', 'woomoby'); ?></option>
                    </select>
                    <small class="form-text text-muted"><?php // _e('Select the account dashboard navigation layout.', 'woomoby'); ?></small>
                </div>
            </div>-->


        </div>
    </div>

</div>
