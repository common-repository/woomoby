<?php
if (!defined('ABSPATH'))
    exit;
/*
 * Template Name: Woomoby - Wishlist
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
            .woomoby .button,
            .woomoby .wc-proceed-to-checkout a {
                color: <?php echo $settings['color_scheme']['button_text']; ?>;
                background: <?php echo $settings['color_scheme']['button_bg']; ?>;
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
            .woomoby .nav {
                padding: 0;
            }
            .woomoby .wishlist_table tr th, .woomoby .wishlist_table tr td{
                font-size:12px;
            } 
            .woomoby .wishlist_table .product-name a{
                pointer-events: none;
            }
            .woomoby .woocommerce-message{
                display:none;
            }
            .woomoby iframe{
                display:none !important;
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
                       <?php the_content();?>
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
        <script>
            jQuery('.product-add-to-cart .product_type_variable').each(function(){
                var current_id = jQuery(this).attr('data-product_id');
               jQuery(this).attr('href', '<?php echo home_url(); ?>/woomoby/?woomobypage=productdetail&product_id='+current_id+'');
            });
        </script>
    </body>
</html>