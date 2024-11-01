<?php
if (!defined('ABSPATH'))
    exit;
global $current_user, $wp_roles;
$error = array();
/* If profile was saved, update profile. */
if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == 'update-user' && wp_verify_nonce($_POST['update-user-nonce'], 'update-user')) {

    /* Update user password. */
    if (!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        if ($_POST['pass1'] == $_POST['pass2'])
            wp_update_user(array('ID' => $current_user->ID, 'user_pass' => esc_attr($_POST['pass1'])));
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if (!empty($_POST['url']))
        wp_update_user(array('ID' => $current_user->ID, 'user_url' => esc_url($_POST['url'])));
    if (!empty(sanitize_email($_POST['email']))) {
        if (!is_email(sanitize_email($_POST['email'])))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif (email_exists(sanitize_email($_POST['email'])) != $current_user->id)
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else {
            wp_update_user(array('ID' => $current_user->ID, 'user_email' => sanitize_email($_POST['email'])));
        }
    }

    if (!empty(sanitize_text_field($_POST['first-name'])))
        update_user_meta($current_user->ID, 'first_name', sanitize_text_field($_POST['first-name']));
    if (!empty(sanitize_text_field($_POST['last-name'])))
        update_user_meta($current_user->ID, 'last_name', sanitize_text_field($_POST['last-name']));
    /* Redirect so the page will show updated info. */
    /* I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if (count($error) == 0) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect(get_permalink());
        exit;
    }
}
/*
 * Template Name: Woomoby - Account
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
            .woomoby .products .proWidget figcaption, .woomoby .products .proWidget figure {
                background: #d6d5d5;
            }
            .woomoby .products ul img {
                padding-top: 10px;
            }
            .woomoby input[type=submit]{
                width: 100%;
                border-radius: 0px !important;
            }
            .woomoby input[type=checkbox]{
                -webkit-appearance: checkbox;
                width: 16px;
                margin: 0;
            }
            .woomoby .woocommerce-order-details .order_item a{
                   pointer-events: none;
            }
            .woomoby .woocommerce-message{
                display:none;
            }
            .woomoby .login-remember{
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
                <?php /*
                  $first_option = $settings['homepage']['slot_one'];
                  $second_option = $settings['homepage']['slot_two'];
                  $third_option = $settings['homepage']['slot_three'];
                  $fourth_option = $settings['homepage']['slot_four'];
                  if ($first_option == 'slider'):
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
                  <?php endif; */ ?>
                <div class="container">
                    <?php if (is_active_sidebar('cp-shop-sidebar')): ?>
                        <aside id="sidebar">
                            <?php dynamic_sidebar('cp-shop-sidebar'); ?>
                        </aside>
                    <?php endif; ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php if (isset($_GET['woomobyPage']) && $_GET['woomobyPage'] == 'edit-account'): ?>
                            <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                                <p class="form-username">
                                    <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                                    <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta('first_name', $current_user->ID); ?>" />
                                </p><!-- .form-username -->
                                <p class="form-username">
                                    <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                                    <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta('last_name', $current_user->ID); ?>" />
                                </p><!-- .form-username -->
                                <p class="form-email">
                                    <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                                    <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta('user_email', $current_user->ID); ?>" />
                                </p><!-- .form-email -->
                                <p class="form-password">
                                    <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                                    <input class="text-input" name="pass1" type="password" id="pass1" />
                                </p><!-- .form-password -->
                                <p class="form-password">
                                    <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                                    <input class="text-input" name="pass2" type="password" id="pass2" />
                                </p><!-- .form-password -->
                                <?php
                                //action hook for plugin and extra fields
                                do_action('edit_user_profile', $current_user);
                                ?>
                                <p class="form-submit">
                                    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                                    <?php wp_nonce_field('update-user', 'update-user-nonce') ?>
                                    <input name="action" type="hidden" id="action" value="update-user" />
                                </p>
                            </form>


                        <?php else: ?>
                            <?php
                            if (is_user_logged_in()) {
                                ?>
                                Hello <?php echo $current_user->user_nicename; ?> (not <?php echo $current_user->user_nicename; ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>">? Log out)</a>
                                <ul class="dashboard-links">
                                    <li><a href="<?php echo home_url(); ?>/woomoby-account/">Dashboard</a></li>
                                    <li><a href="<?php echo home_url(); ?>/woomoby-account/?woomobyPage=edit-account">Account details</a></li>
                                    <li><a href="<?php echo home_url(); ?>/woomoby-wishlist/">Wishlist</a></li>
                                    <li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Log out</a></li>
                                </ul>
                            <?php } else { ?>
                                <?php wp_login_form(); ?> 
                                <?php
                            }
                            ?>
                        <?php endif; ?>        
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