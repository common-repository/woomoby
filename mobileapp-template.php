<?php
if (!defined('ABSPATH'))
    exit;
/*
 * Template Name: Woomoby
 * Description: A Page Template with a darker design.
 */

$settings = get_option('cp_settings_options');
$linkcolor = $settings['color_scheme']['links'];
$gridItems = $settings['grid_items'];
if ($gridItems == '') {
    $gridItems = 8;
}
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
        <?php /* if ($settings['custom_code']['css']) :
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
        <style type="text/css">
            .woomoby #wishlist{
                background: transparent;
                color: <?php echo $settings['color_scheme']['button_bg']; ?>;
                border: 1px solid <?php echo $settings['color_scheme']['button_bg']; ?>;
                border-radius: 0 !important;
                font-weight:bold;
            }
            .woomoby #buy,
            .woomoby #place_order,
            .woomoby .button,
            .woomoby .single_add_to_cart_button,
            .woomoby .wc-proceed-to-checkout a {
                color: <?php echo $settings['color_scheme']['button_text']; ?>;
                background: <?php echo $settings['color_scheme']['button_bg']; ?>;
                border-radius: 0 !important;
                font-weight:bold;
            }
            .woomoby #buy,.woomoby #wishlist{
                width:100%
            }
            .woomoby .carousel-control-prev-icon{
                background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M4 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            }
            .woomoby .carousel-control-next-icon{
                background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M1.5 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            }
            .woomoby .variations{
                border:none !important;
                background: transparent;
            }
            .woomoby .product-desc table{
                width: 100% !important;
            }
            .woomoby .product-desc table td.value{
                border:none !important;
                width: 85%;         
            }
            .woomoby .product-desc table td.label{
                background: none;
                border: 0;
                font-size: 20px;
                font-weight: normal;
            }
            .woomoby .quantity.buttons_added{
                width:100%;
            }
            .woomoby .quantity input[type="number"]{
                width:100%;
                max-width: none;
            }
            .woomoby .single_add_to_cart_button
            {
                color: <?php echo $settings['color_scheme']['button_text']; ?>;
                background-color: <?php echo $settings['color_scheme']['button_bg']; ?> !important;
                margin-top: 10px;
                width: 100%;
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
            .woomoby .products h3{
                border-bottom: 1px solid <?php echo $settings['color_scheme']['primary']; ?>;
            }
            .woomoby .products ul img {
                padding-top: 10px;
            }
            .woomoby .reset_variations{
                bottom: 100%;
            }
            .woomoby iframe{
                display:none !important;
            }
            @media (max-width: 479px){
                .woomoby #main {
                    padding: 110px 0 60px;
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
                                    $pagelink = home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $termId;
                                    ?>
                                    <li><a href="<?php echo $pagelink; ?>"><?php echo $term->name; ?></a>
                                        <?php if (isset($terms_id[$termId]) && $terms_id[$termId] !== ""): ?>
                                            <ul class="woomoby-child-menu">
                                                <?php foreach ($terms_id[$termId] as $child): ?>
                                                    <?php
                                                    $childlink = home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $child;
                                                    $term = get_term($child, 'product_cat');
                                                    ?>
                                                    <li><a href="<?php echo $childlink; ?>"><?php echo $term->name; ?></a></li>
                                                <?php endforeach; ?>
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
                <?php
                $first_option = $settings['homepage']['slot_one'];
                $second_option = $settings['homepage']['slot_two'];
                $third_option = $settings['homepage']['slot_three'];
                $fourth_option = $settings['homepage']['slot_four'];
                if (isset($_GET['woomobypage']) && $_GET['woomobypage'] != 'productdetail'):
                elseif (isset($_GET['woomobypage']) && $_GET['woomobypage'] != 'productcat'):
                elseif ($first_option == 'slider'):
                    ?>
                    <div class="gallery">
                        <div class="mask">
                            <?php
                            $img1 = $settings['home_slider']['one']['img'];
                            $img2 = $settings['home_slider']['two']['img'];
                            $img3 = $settings['home_slider']['three']['img'];
                            ?>
                            <div class="slideset">
                                <?php if ($img1): ?>
                                    <div class="slide">
                                        <img data-u="image" src="<?php echo $img1; ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($img2): ?>
                                    <div class="slide">
                                        <img data-u="image" src="<?php echo $img2; ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if ($img3): ?>
                                    <div class="slide">
                                        <img data-u="image" src="<?php echo $img3; ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <a href="#" class="btn-prev">Prev</a>
                            <a href="#" class="btn-next">Next</a>
                            <!--                        <div class="pagination"></div>-->
                        </div>
                    </div>


                <?php endif; ?>
                <div class="container">
                    <?php if (is_active_sidebar('cp-shop-sidebar')): ?>
                        <aside id="sidebar">
                            <?php dynamic_sidebar('cp-shop-sidebar'); ?>
                        </aside>
                    <?php endif; ?>
                    <?php if (!empty($_GET['woomobyPageId'])): ?>
                        <div id="content">
                            <?php
                            $postData = get_page($_GET['woomobyPageId']);
                            echo do_shortcode($postData->post_content);
                            ?>
                        </div>
                    <?php elseif (!empty($_GET['woomobypage'])): if ($_GET['woomobypage'] == 'productdetail'): ?>
                            <?php
                            $pro_id = $_GET['product_id'];
                            $product = wc_get_product($pro_id);
                            ?>    
                            <?php if (isset($_GET['add-to-cart'])): ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong><?php echo get_the_title($pro_id); ?></strong> is Added to cart 
                                    <a href="<?php echo home_url(); ?>/woomoby-cart"> <strong>View Cart</strong></a>
                                </div>
                            <?php endif; ?>       
                            <?php if (isset($_GET['add_to_wishlist'])): ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong><?php echo get_the_title($pro_id); ?></strong> is Added to Wishlist
                                    <a href="<?php echo home_url(); ?>/woomoby-wishlist"> <strong>View Wishlist</strong></a>
                                </div>    
                            <?php endif; ?>  
                            <div id="content">
                                <?php
                                $img = wp_get_attachment_image_url(get_post_thumbnail_id($pro_id), 'full')
                                ?>
                                <?php $attachments = $product->get_gallery_attachment_ids(); ?>       
                                <?php if (count($attachments) > 1): ?>
                                    <div class="row">
                                        <div id="woomobyCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <?php
                                                $slider = 0;
                                                foreach ($attachments as $attachment):
                                                    $active = "";
                                                    if ($slider == 0)
                                                        $active = "active ";
                                                    ?>
                                                    <div class="carousel-item <?php echo $active; ?>">
                                                        <?php echo wp_get_attachment_image($attachment, 'full'); ?>
                                                    </div>
                                                    <?php
                                                    $slider++;
                                                endforeach;
                                                ?>

                                            </div>
                                            <a class="carousel-control-prev" href="#woomobyCarousel" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#woomobyCarousel" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>    
                                <?php else: ?>
                                    <img src="<?php echo $img; ?>" alt="" class="img-responsive"> 
                                <?php endif; ?>
                                <div class="product-desc">
                                    <h2 class="custom-heading"><?php echo get_the_title($pro_id); ?></h2>
                                    <span><?php echo $product->get_price_html(); ?></span>
                                    <?php
                                    if ($product->is_type('variable')) {
                                        $attribute_keys = array_keys($product->get_attributes());
                                        ?>
                                        <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->id); ?>" data-product_variations="<?php echo htmlspecialchars(json_encode($product->get_available_variations())) ?>">
                                            <?php do_action('woocommerce_before_variations_form'); ?>
                                            <?php if (empty($product->get_available_variations()) && false !== $product->get_available_variations()) : ?>
                                                <p class="stock out-of-stock"><?php _e('This product is currently out of stock and unavailable.', 'woocommerce'); ?></p>
                                            <?php else : ?>
                                                <table class="variations" cellspacing="0">
                                                    <tbody>
                                                        <?php foreach ($product->get_attributes() as $attribute_name => $options) : ?>
                                                            <?php $options_array = $options->get_data(); ?>
                                                            <tr>
                                                                <td class="label"><label for="<?php echo sanitize_title($attribute_name); ?>"><?php echo wc_attribute_label($attribute_name); ?></label></td>
                                                                <td class="value">
                                                                    <?php
                                                                    $selected = isset($_REQUEST['attribute_' . sanitize_title($attribute_name)]) ? wc_clean(urldecode($_REQUEST['attribute_' . sanitize_title($attribute_name)])) : $product->get_variation_default_attribute($attribute_name);
                                                                    wc_dropdown_variation_attribute_options(array('options' => $options_array['options'], 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected));
                                                                    echo end($attribute_keys) === $attribute_name ? apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . __('Clear', 'woocommerce') . '</a>') : '';
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                                                <div class="single_variation_wrap">
                                                    <?php
                                                    /**
                                                     * woocommerce_before_single_variation Hook.
                                                     */
                                                    do_action('woocommerce_before_single_variation');

                                                    /**
                                                     * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
                                                     * @since 2.4.0
                                                     * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                                                     * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                                                     */
                                                    do_action('woocommerce_single_variation');

                                                    /**
                                                     * woocommerce_after_single_variation Hook.
                                                     */
                                                    do_action('woocommerce_after_single_variation');
                                                    ?>
                                                </div>

                                                <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                                            <?php endif; ?>

                                            <?php do_action('woocommerce_after_variations_form'); ?>
                                        </form>

                                    <?php } else { ?>
                                        <a id="buy" href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . $pro_id . '&add-to-cart=' . $pro_id; ?>" class="woomoby-btn">add To Cart</a>
                                    <?php } ?>
                                    <a id="wishlist" href="<?php echo esc_url(add_query_arg('add_to_wishlist', $pro_id)) ?>" rel="nofollow" data-product-id="<?php echo $pro_id ?>" class="woomoby-btn">Add To Wishlist</a>                                         
                                    <p><?php
                                        $post_object = get_post($pro_id);
                                        echo $post_object->post_content;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php elseif ($_GET['woomobypage'] == 'productcat'): ?>
                            <div id="content">
                                <div class="products">
                                    <?php
                                    $cat_id = $_GET['cat_id'];
                                    $args = array(
                                        'post_type' => 'product',
                                        'showposts' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'id',
                                                'terms' => $cat_id,
                                            ),
                                        ),
                                    );
                                    $loop = new WP_Query($args);
                                    if ($loop->have_posts()):
                                        ?>
                                        <ul class="list-none">
                                            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                                                <li>
                                                    <div class="proWidget">
                                                        <?php
                                                        $proimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                                                        ?>
                                                        <figure>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>">
                                                                <img src="<?php echo $proimg; ?>" alt="Product">
                                                            </a>
                                                        </figure>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>"><?php the_title(); ?></a>
                                                        </figcaption>
                                                        <?php $product = wc_get_product(get_the_ID()); ?>
                                                        <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>    
                                        </ul> 
                                        <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>          
                            </div>  
                            <?php
                        endif;
                    else:
                        ?>
                        <div id="content">
                            <!-- 1st Slot Start -->
                            <?php if ($first_option == 'category_cards' || $first_option == 'category_list'): ?>
                                <div class="products <?php
                                if ($first_option == 'category_list'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         $args = array(
                                             'taxonomy' => 'product_cat',
                                             'showposts' => $gridItems,
                                             'orderby' => 'name',
                                             'hide_empty' => 0
                                         );
                                         $all_categories = get_categories($args);
                                         if ($all_categories):
                                             ?>
                                        <ul class="list-none">
                                            <?php foreach ($all_categories as $cat): ?>
                                                <li>
                                                    <div class="proWidget">
                                                        <?php
                                                        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                                        $termimg = wp_get_attachment_url($thumbnail_id);
                                                        if ($termimg):
                                                            ?>
                                                            <figure>
                                                                <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>">
                                                                    <img src="<?php echo $termimg; ?>" alt="Product">
                                                                </a>
                                                            </figure>    
                                                        <?php endif; ?>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><?php echo $cat->name; ?></a>
                                                        </figcaption>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>    
                                        </ul> 
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($first_option == 'hscroll_new' || $first_option == 'hscroll_featured' || $first_option == 'hscroll_best' || $first_option == 'grid_new' || $first_option == 'grid_featured' || $first_option == 'grid_best'): ?>
                                <div class="products <?php
                                if ($first_option == 'hscroll_new' || $first_option == 'hscroll_featured' || $first_option == 'hscroll_best'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         if ($first_option == 'hscroll_new' || $first_option == 'grid_new') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'orderby' => 'date',
                                                 'order' => 'DESC'
                                             );
                                             echo "<h3>New Products</h3>";
                                         }
                                         if ($first_option == 'hscroll_featured' || $first_option == 'grid_featured') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'tax_query' => array(
                                                     array(
                                                         'taxonomy' => 'product_visibility',
                                                         'field' => 'name',
                                                         'terms' => 'featured',
                                                     ),
                                                 ),
                                             );
                                             echo "<h3>Featured Products</h3>";
                                         }
                                         if ($first_option == 'hscroll_best' || $first_option == 'grid_best') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'meta_key' => 'total_sales',
                                                 'orderby' => 'meta_value_num',
                                             );
                                             echo "<h3>Best Selling Products</h3>";
                                         }

                                         $query = new WP_Query($args);
                                         if ($query->have_posts()):
                                             ?>
                                        <ul class="list-none">
                                            <?php while ($query->have_posts()): $query->the_post();
                                                ?>
                                                <li>
                                                    <div class="proWidget">
                                                        <?php
                                                        $proimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                                                        ?>
                                                        <figure>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>">  
                                                                <img src="<?php echo $proimg; ?>" alt="Product">
                                                            </a>
                                                        </figure>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>"><?php the_title(); ?></a>
                                                        </figcaption>
                                                        <?php $product = wc_get_product(get_the_ID()); ?>
                                                        <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>    
                                        </ul> 
                                        <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>
                            <!-- 1st Slot End -->    
                            <!-- 2nd Slot Start -->
                            <?php
                            if ($second_option == 'slider'):
                                ?>
                                <div class="gallery">
                                    <div class="mask">
                                        <?php
                                        $img1 = $settings['home_slider']['one']['img'];
                                        $img2 = $settings['home_slider']['two']['img'];
                                        $img3 = $settings['home_slider']['three']['img'];
                                        ?>
                                        <div class="slideset">
                                            <?php if ($img1): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img1; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img2): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img2; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img3): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img3; ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="#" class="btn-prev">Prev</a>
                                        <a href="#" class="btn-next">Next</a>
                                        <!--                        <div class="pagination"></div>-->
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($second_option == 'category_cards' || $second_option == 'category_list'): ?>

                                <div class="products <?php
                                if ($second_option == 'category_list'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         $args = array(
                                             'taxonomy' => 'product_cat',
                                             'showposts' => $gridItems,
                                             'orderby' => 'name',
                                             'hide_empty' => 0
                                         );
                                         echo "<h3>Shop Categories</h3>";
                                         $all_categories = get_categories($args);
                                         if ($all_categories):
                                             ?>
                                        <ul class="list-none">
                                            <?php foreach ($all_categories as $cat): ?>
                                                <li>
                                                    <div class="proWidget">
                                                        <?php
                                                        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                                        $termimg = wp_get_attachment_url($thumbnail_id);
                                                        if ($termimg):
                                                            ?>
                                                            <figure>
                                                                <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><img src="<?php echo $termimg; ?>" alt="Product"></a>
                                                            </figure>
                                                        <?php endif; ?>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><?php echo $cat->name; ?></a>
                                                        </figcaption>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>    
                                        </ul> 
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($second_option == 'hscroll_new' || $second_option == 'hscroll_featured' || $second_option == 'hscroll_best' || $second_option == 'grid_new' || $second_option == 'grid_featured' || $second_option == 'grid_best'): ?>
                                <div class="products <?php
                                if ($second_option == 'hscroll_new' || $second_option == 'hscroll_featured' || $second_option == 'hscroll_best'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         if ($second_option == 'hscroll_new' || $second_option == 'grid_new') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'orderby' => 'date',
                                                 'order' => 'DESC'
                                             );
                                             echo "<h3>New Products</h3>";
                                         }
                                         if ($second_option == 'hscroll_featured' || $second_option == 'grid_featured') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'tax_query' => array(
                                                     array(
                                                         'taxonomy' => 'product_visibility',
                                                         'field' => 'name',
                                                         'terms' => 'featured',
                                                     ),
                                                 ),
                                             );
                                             echo "<h3>Featured Products</h3>";
                                         }
                                         if ($second_option == 'hscroll_best' || $second_option == 'grid_best') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'meta_key' => 'total_sales',
                                                 'orderby' => 'meta_value_num',
                                             );
                                             echo "<h3>Best Selling Products</h3>";
                                         }

                                         $query = new WP_Query($args);
                                         if ($query->have_posts()):
                                             ?>
                                        <ul class="list-none">
                                            <?php while ($query->have_posts()): $query->the_post();
                                                ?>
                                                <li>
                                                    <div class="proWidget">
                                                        <?php
                                                        $proimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                                                        ?>
                                                        <figure>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>">
                                                                <img src="<?php echo $proimg; ?>" alt="Product">
                                                            </a>
                                                        </figure>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>"><?php the_title(); ?></a>
                                                        </figcaption>
                                                        <?php $product = wc_get_product(get_the_ID()); ?>
                                                        <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>    
                                        </ul> 
                                        <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>  
                            <!-- 2nd Slot End -->   
                            <!-- 3rd Slot Start -->  
                            <?php if ($third_option == 'slider'):
                                ?>
                                <div class="gallery">
                                    <div class="mask">
                                        <?php
                                        $img1 = $settings['home_slider']['one']['img'];
                                        $img2 = $settings['home_slider']['two']['img'];
                                        $img3 = $settings['home_slider']['three']['img'];
                                        ?>
                                        <div class="slideset">
                                            <?php if ($img1): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img1; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img2): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img2; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img3): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img3; ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="#" class="btn-prev">Prev</a>
                                        <a href="#" class="btn-next">Next</a>
                                        <!--                        <div class="pagination"></div>-->
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($third_option == 'category_cards' || $third_option == 'category_list'): ?>
                                <div class="products <?php
                                if ($third_option == 'category_list'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         $args = array(
                                             'taxonomy' => 'product_cat',
                                             'showposts' => $gridItems,
                                             'orderby' => 'name',
                                             'hide_empty' => 0
                                         );
                                         echo "<h3>Shop Categories</h3>";
                                         $all_categories = get_categories($args);
                                         if ($all_categories):
                                             ?>
                                        <ul class="list-none">
                                            <?php foreach ($all_categories as $cat): ?>
                                                <li>
                                                    <div class="proWidget">

                                                        <?php
                                                        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                                        $termimg = wp_get_attachment_url($thumbnail_id);
                                                        if ($termimg):
                                                            ?>
                                                            <figure>
                                                                <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><img src="<?php echo $termimg; ?>" alt="Product"></a>
                                                            </figure>
                                                        <?php endif; ?>
                                                        <figcaption>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><?php echo $cat->name; ?></a>
                                                        </figcaption>

                                                    </div>
                                                </li>
                                            <?php endforeach; ?>    
                                        </ul> 
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($third_option == 'hscroll_new' || $third_option == 'hscroll_featured' || $third_option == 'hscroll_best' || $third_option == 'grid_new' || $third_option == 'grid_featured' || $third_option == 'grid_best'): ?>
                                <div class="products <?php
                                if ($third_option == 'hscroll_new' || $third_option == 'hscroll_featured' || $third_option == 'hscroll_best'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         if ($third_option == 'hscroll_new' || $third_option == 'grid_new') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'orderby' => 'date',
                                                 'order' => 'DESC'
                                             );
                                             echo "<h3>New Products</h3>";
                                         }
                                         if ($third_option == 'hscroll_featured' || $third_option == 'grid_featured') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'tax_query' => array(
                                                     array(
                                                         'taxonomy' => 'product_visibility',
                                                         'field' => 'name',
                                                         'terms' => 'featured',
                                                     ),
                                                 ),
                                             );
                                             echo "<h3>Featured Products</h3>";
                                         }
                                         if ($third_option == 'hscroll_best' || $third_option == 'grid_best') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'meta_key' => 'total_sales',
                                                 'orderby' => 'meta_value_num',
                                             );
                                             echo "<h3>Best Selling Products</h3>";
                                         }

                                         $query = new WP_Query($args);
                                         if ($query->have_posts()):
                                             ?>
                                        <ul class="list-none">
                                            <?php while ($query->have_posts()): $query->the_post();
                                                ?>
                                                <li>
                                                    <?php
                                                    $proimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                                                    ?>
                                                    <figure>
                                                        <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>">
                                                            <img src="<?php echo $proimg; ?>" alt="Product">
                                                        </a>
                                                    </figure>
                                                <figcaption>
                                                    <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>"><?php the_title(); ?></a>
                                                </figcaption>
                                                <?php $product = wc_get_product(get_the_ID()); ?>
                                                <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                </li>
                                            <?php endwhile; ?>    
                                        </ul> 
                                        <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>        
                            <!--3rd Slot End -->      
                            <!-- 4th Slot Start -->  
                            <?php if ($fourth_option == 'slider'):
                                ?>
                                <div class="gallery">
                                    <div class="mask">
                                        <?php
                                        $img1 = $settings['home_slider']['one']['img'];
                                        $img2 = $settings['home_slider']['two']['img'];
                                        $img3 = $settings['home_slider']['three']['img'];
                                        ?>
                                        <div class="slideset">
                                            <?php if ($img1): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img1; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img2): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img2; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($img3): ?>
                                                <div class="slide">
                                                    <img data-u="image" src="<?php echo $img3; ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="#" class="btn-prev">Prev</a>
                                        <a href="#" class="btn-next">Next</a>
                                        <!--                        <div class="pagination"></div>-->
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($fourth_option == 'category_cards' || $fourth_option == 'category_list'): ?>
                                <div class="products <?php
                                if ($fourth_option == 'category_list'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         $args = array(
                                             'taxonomy' => 'product_cat',
                                             'showposts' => $gridItems,
                                             'orderby' => 'name',
                                             'hide_empty' => 0
                                         );
                                         $all_categories = get_categories($args);
                                         if ($all_categories):
                                             ?>
                                        <ul class="list-none">
                                            <?php foreach ($all_categories as $cat): ?>
                                                <li>
                                                    <?php
                                                    $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                                    $termimg = wp_get_attachment_url($thumbnail_id);
                                                    if ($termimg):
                                                        ?>
                                                        <figure>
                                                            <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>">
                                                                <img src="<?php echo $termimg; ?>" alt="Product">
                                                            </a>
                                                        </figure>
                                                    <?php endif; ?> 
                                                <figcaption>
                                                    <a href="<?php echo home_url() . '/woomoby/?woomobypage=productcat&cat_id=' . $cat->term_id; ?>"><?php echo $cat->name; ?></a>
                                                </figcaption>
                                                <?php $product = wc_get_product(get_the_ID()); ?>
                                                <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                </li>
                                            <?php endforeach; ?>    
                                        </ul> 
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($fourth_option == 'hscroll_new' || $fourth_option == 'hscroll_featured' || $fourth_option == 'hscroll_best' || $fourth_option == 'grid_new' || $fourth_option == 'grid_featured' || $fourth_option == 'grid_best'): ?>
                                <div class="products <?php
                                if ($fourth_option == 'hscroll_new' || $fourth_option == 'hscroll_featured' || $fourth_option == 'hscroll_best'): echo 'list-view';
                                endif;
                                ?>">
                                         <?php
                                         if ($fourth_option == 'hscroll_new' || $fourth_option == 'grid_new') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'orderby' => 'date',
                                                 'order' => 'DESC'
                                             );
                                             echo "<h3>New Products</h3>";
                                         }
                                         if ($fourth_option == 'hscroll_featured' || $fourth_option == 'grid_featured') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'tax_query' => array(
                                                     array(
                                                         'taxonomy' => 'product_visibility',
                                                         'field' => 'name',
                                                         'terms' => 'featured',
                                                     ),
                                                 ),
                                             );
                                             echo "<h3>Featured Products</h3>";
                                         }
                                         if ($fourth_option == 'hscroll_best' || $fourth_option == 'grid_best') {
                                             $args = array(
                                                 'post_type' => 'product',
                                                 'showposts' => $gridItems,
                                                 'meta_key' => 'total_sales',
                                                 'orderby' => 'meta_value_num',
                                             );
                                             echo "<h3>Best Selling Products</h3>";
                                         }

                                         $query = new WP_Query($args);
                                         if ($query->have_posts()):
                                             ?>
                                        <ul class="list-none">
                                            <?php while ($query->have_posts()): $query->the_post();
                                                ?>
                                                <li>
                                                    <?php
                                                    $proimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                                                    ?>
                                                    <figure>
                                                        <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>">
                                                            <img src="<?php echo $proimg; ?>" alt="Product">
                                                        </a>
                                                    </figure>
                                                <figcaption>
                                                    <a href="<?php echo home_url() . '/woomoby/?woomobypage=productdetail&product_id=' . get_the_ID(); ?>"><?php the_title(); ?></a>
                                                </figcaption>
                                                <?php $product = wc_get_product(get_the_ID()); ?>
                                                <div class="priceTag"><?php echo $product->get_price_html(); ?></div>
                                                </li>
                                            <?php endwhile; ?>    
                                        </ul> 
                                        <?php
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>        

                        </div>
                    <?php endif; ?>

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