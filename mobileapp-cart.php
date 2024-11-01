<?php
if (!defined('ABSPATH'))
    exit;
/*
 * Template Name: Woomoby - Cart
 * Description: A Page Template with a darker design.
 */
$settings = get_option('cp_settings_options');
//var_dump($settings);
$linkcolor = $settings['color_scheme']['links'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $settings['site_name'] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        wp_head();


        $favicon_url = '';
        if ($settings['favicon']['url']) {
            $favicon_url = $settings['favicon']['url'] . '' . $settings['favicon']['name'] . '.png';
            ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo $favicon_url; ?>" />
        <?php } ?>
        <?php
        if ($settings['custom_code']['js']) :
            ?>
            <script>
    <?php echo $settings['custom_code']['js']; ?>
            </script> 
            <?php
        endif;
        ?>
         <?php
       /* if ($settings['custom_code']['css']) :
            ?>
            <style>
    <?php echo $settings['custom_code']['css']; ?> 
            </style> 
            <?php
        endif;
        */ ?>
        <?php
        if ($settings['custom_code']['analytics']) :
            ?>
            <script>
    <?php echo $settings['custom_code']['analytics']; ?>
            </script> 
            <?php
        endif;
        ?>
        <style>
            .woomoby #buy,
            .woomoby #wishlist,
            .woomoby #place_order,
            .woomoby input[type="submit"],
            .woomoby .wc-proceed-to-checkout a {
                color: <?php echo $settings['color_scheme']['button_text']; ?>;
                background-color: <?php echo $settings['color_scheme']['button_bg']; ?> !important ;
                border-radius: 0 !important;
            }
            .woomoby .nav{
                background:<?php echo $settings['color_scheme']['primary']; ?>; 
            }
            .woomoby .fa{
                color: <?php echo $settings['color_scheme']['navbar_bg']; ?>; 
            }
            .woomoby #header , .woomoby #sidebar{
                background:<?php echo $settings['color_scheme']['primary']; ?>;
            }
            .woomoby #header a{
                color:<?php echo $settings['color_scheme']['navbar_text']; ?>;
                outline:none;
            }
            .woomoby .child_list_opener i{               
                color:<?php echo $settings['color_scheme']['navbar_text']; ?>;
            }
            .woomoby .continue-shopping{
                display:none;
            }
            .woomoby .products h3{
                border-bottom: 1px solid <?php echo $settings['color_scheme']['primary']; ?>;
            }
            .woomoby .products .proWidget figcaption, .woomoby .products .proWidget figure {
                background: #d6d5d5;
            }
            .woomoby .products ul img {
                padding-top: 10px;
            }
            .woomoby .woocommerce-message{
                display:none;
            }
            .woomoby iframe{
                display:none !important;
            }
            @media (max-width: 479px){
                .woomoby .nav {
                    padding: 0;
                }
            }

        </style> 
    </head>
    <body class="<?php
    if ($settings['enable_rtl'] == 1) {
        echo "rtl";
    }
    ?> <?php
    if ($settings['enable_left_panel']) {
        echo 'with-sidebar';
    }
    ?> woomoby" style="background: <?php echo $settings['color_scheme']['body_bg']; ?>;">
<!--        <div class="loader"></div>-->
        <div id="wrapper">
            <header id="header">
                <a href="#" class="btn-opener"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <div class="container">
                    <a href="<?php echo home_url(); ?>/woomoby" class="woomoby-logo" style="background-image:url('<?php echo $settings['site_logo'] ?>');"></a>
                    <?php
                    $terms_id = unserialize($settings['header_menu']);
                    if ($terms_id):
                        ?>
                        <nav class="nav">
                           <ul class="list-none">
                                <?php foreach ($terms_id[0] as $termId): ?>
                                    <?php
                                    $term = get_term($termId, 'product_cat');
                                    $pagelink = home_url() . '/woomoby/?woomobypage=productcat&cat_id='.$termId;
                                    ?>
                                    <li><a href="<?php echo $pagelink; ?>"><?php echo $term->name; ?></a>
                                    <?php if(isset($terms_id[$termId]) && $terms_id[$termId]!==""):?>
                                        <ul class="woomoby-child-menu">
                                            <?php foreach($terms_id[$termId] as $child):?>
                                             <?php $childlink = home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $child;
                                             $term = get_term($child, 'product_cat');
                                             ?>
                                                <li><a href="<?php echo $childlink; ?>"><?php echo $term->name; ?></a></li>
                                            <?php endforeach;?>
                                        </ul>
                                    <?php endif; ?>    
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
                <a href="javascript:history.go(-1)" class="btn-refresh"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </header>
            <main id="main">
                <div class="container">
                    <?php if (is_active_sidebar('cp-shop-sidebar')): ?>
                        <aside id="sidebar">
                            <?php dynamic_sidebar('cp-shop-sidebar'); ?>
                        </aside>
                    <?php endif; ?>
                    <?php while (have_posts()): the_post(); ?>
                        <div class="woomoby-cart">
                            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                                <?php do_action('woocommerce_before_cart_table'); ?>

                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
                                            <th class="product-price-2"><?php _e('Price', 'woocommerce'); ?></th>
                                            <th class="product-quantity"><?php _e('Quantity', 'woocommerce'); ?></th>
                                            <th class="product-subtotal"><?php _e('Total', 'woocommerce'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php do_action('woocommerce_before_cart_contents'); ?>

                                        <?php
                                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                                //$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                $product_permalink = home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . $product_id;
                                                ?>
                                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                                    <td class="product-remove">
                                                        <?php
                                                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($_product->get_sku())
                                                                ), $cart_item_key);
                                                        ?>
                                                    </td>

                                                    <td class="product-thumbnail">
                                                        <?php
                                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                                        if (!$product_permalink) {
                                                            echo $thumbnail;
                                                        } else {
                                                            printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                                        }
                                                        ?>
                                                    </td>

                                                    <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                                        <?php
                                                        if (!$product_permalink) {
                                                            echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;';
                                                        } else {
                                                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
                                                        }

                                                        // Meta data
                                                        echo WC()->cart->get_item_data($cart_item);

                                                        // Backorder notification
                                                        if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                            echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                                                        }
                                                        ?>
                                                    </td>

                                                    <td class="product-price-2" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                                        <?php
                                                        echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                                        ?>
                                                    </td>

                                                    <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                                        <?php
                                                        if ($_product->is_sold_individually()) {
                                                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                                        } else {
                                                            $product_quantity = woocommerce_quantity_input(array(
                                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                                'input_value' => $cart_item['quantity'],
                                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                                'min_value' => '0',
                                                                    ), $_product, false);
                                                        }

                                                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                                        ?>
                                                    </td>

                                                    <td class="product-subtotal" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
                                                        <?php
                                                        echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>

                                        <?php do_action('woocommerce_cart_contents'); ?>

                                        <tr>
                                            <td colspan="6" class="actions">

                                                <input type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>" />

                                                <?php do_action('woocommerce_cart_actions'); ?>

                                                <?php wp_nonce_field('woocommerce-cart'); ?>
                                            </td>
                                        </tr>

                                        <?php do_action('woocommerce_after_cart_contents'); ?>
                                    </tbody>
                                </table>
                                <?php do_action('woocommerce_after_cart_table'); ?>
                            </form>
                        </div>
                        <div class="woomoby-totals">
                            <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                                <?php do_action('woocommerce_before_cart_totals'); ?>

                                <h2><?php _e('Cart totals', 'woocommerce'); ?></h2>

                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                    <tr class="cart-subtotal">
                                        <th><?php _e('Subtotal', 'woocommerce'); ?></th>
                                        <td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                                    </tr>

                                    <tr class="order-total">
                                        <th><?php _e('Total', 'woocommerce'); ?></th>
                                        <td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                                    </tr>

                                    <?php do_action('woocommerce_cart_totals_after_order_total'); ?>

                                </table>

                                <div class="wc-proceed-to-checkout">
                                    <a href="<?php echo home_url(); ?>/woomoby-checkout/" class="checkout-button button alt wc-forward">
                                        Proceed to checkout</a>
                                </div>

                                <?php do_action('woocommerce_after_cart_totals'); ?>

                            </div>     
                        </div>   

                    <?php endwhile; ?>

                    <!-- END OF CONTENT DIV -->
                </div>
            </main>
            <?php if ($settings['enable_toolbar'] == 1): ?>
                <footer id="footer" style="background: <?php echo $settings['color_scheme']['primary']; ?>;">
                    <div class="container">
                        <div class="copyright" style="color:<?php echo $settings['color_scheme']['navbar_text']; ?>;"><p><?php echo $settings['footer_copyright']; ?></p></div>
                        <nav class="nav" style="color:<?php echo $settings['color_scheme']['navbar_text']; ?>;">
                            <?php echo $settings['footer_menu']; ?>
                        </nav>
                    </div>
                </footer>
            <?php endif; ?>
            <ul class="fixed-links">
                <li><a href="<?php echo home_url(); ?>/woomoby"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
                <li><a href="<?php echo home_url(); ?>/woomoby-wishlist"><i class="fa fa-heart" aria-hidden="true"></i><span>Wishlist</span></a></li>
                <li><a href="<?php echo home_url(); ?>/woomoby-account"><i class="fa fa-user" aria-hidden="true"></i><span>Account</span></a></li>
                <li><a href="<?php echo home_url(); ?>/woomoby-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Cart</span></a></li>
            </ul>
        </div>
        <?php
        wp_footer();
        ?>
    </body>
</html>