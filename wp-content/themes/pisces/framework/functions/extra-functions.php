<?php if ( ! defined( 'ABSPATH' ) ) { die; }

add_filter('LaStudio/global_loop_variable', 'pisces_set_loop_variable');
if(!function_exists('pisces_set_loop_variable')){
    function pisces_set_loop_variable( $var = ''){
        return 'pisces_loop';
    }
}

add_filter('lastudio/google_map_api', 'pisces_add_googlemap_api');
if(!function_exists('pisces_add_googlemap_api')){
    function pisces_add_googlemap_api( $key = '' ){
        return Pisces()->settings->get('google_key', $key);
    }
}

add_filter('pisces/filter/page_title', 'pisces_override_page_title_bar_title');
if(!function_exists('pisces_override_page_title_bar_title')){
    function pisces_override_page_title_bar_title( $title ){

        $_tmp = '<header><div class="page-title h2">%s</div></header>';

        $context = (array) Pisces()->get_current_context();

        if(in_array('is_singular', $context)){
            $custom_title = Pisces()->settings->get_post_meta( get_queried_object_id(), 'page_title_custom');
            if(!empty( $custom_title) ){
                return sprintf($_tmp, $custom_title);
            }
        }

        if(in_array('is_tax', $context) || in_array('is_category', $context) || in_array('is_tag', $context)){
            $custom_title = Pisces()->settings->get_term_meta( get_queried_object_id(), 'page_title_custom');
            if(!empty( $custom_title) ){
                return sprintf($_tmp, $custom_title);
            }
        }

        return $title;
    }
}

add_action( 'pre_get_posts', 'pisces_set_posts_per_page_for_portfolio_cpt' );
if(!function_exists('pisces_set_posts_per_page_for_portfolio_cpt')){
    function pisces_set_posts_per_page_for_portfolio_cpt( $query ) {
        if ( !is_admin() && $query->is_main_query() ) {
            if( is_post_type_archive( 'la_portfolio' ) || is_tax(get_object_taxonomies( 'la_portfolio' ))){
                $pf_per_page = (int) Pisces()->settings->get('portfolio_per_page', 9);
                $query->set( 'posts_per_page', $pf_per_page );
            }
        }
    }
}

add_filter('yith_wc_social_login_icon', 'pisces_override_yith_wc_social_login_icon', 10, 3);
if(!function_exists('pisces_override_yith_wc_social_login_icon')){
    function pisces_override_yith_wc_social_login_icon($social, $key, $args){
        if(!is_admin()){
            $social = sprintf(
                '<a class="%s" href="%s">%s</a>',
                'social_login ywsl-' . esc_attr($key) . ' social_login-' . esc_attr($key),
                $args['url'],
                isset( $args['value']['label'] ) ? $args['value']['label'] : $args['value']
            );
        }
        return $social;
    }
}

add_action('wp', 'pisces_hook_maintenance');
if(!function_exists('pisces_hook_maintenance')){
    function pisces_hook_maintenance(){
        wp_reset_postdata();
        $enable_private = Pisces()->settings->get('enable_maintenance', 'no');
        if($enable_private == 'yes'){
            if(!is_user_logged_in()){
                $page_id = Pisces()->settings->get('maintenance_page');
                if(empty($page_id)){
                    wp_redirect(wp_login_url());
                    exit;
                }
                else{
                    $page_id = absint($page_id);
                    if(!is_page($page_id)){
                        wp_redirect(get_permalink($page_id));
                        exit;
                    }
                }
            }
        }
    }
}

add_filter('widget_archives_args', 'pisces_modify_widget_archives_args');
if(!function_exists('pisces_modify_widget_archives_args')){
    function pisces_modify_widget_archives_args( $args ){
        if(isset($args['show_post_count'])){
            unset($args['show_post_count']);
        }
        return $args;
    }
}
if(isset($_GET['la_doing_ajax'])){
    remove_action('template_redirect', 'redirect_canonical');
}
add_filter('woocommerce_redirect_single_search_result', '__return_false');


/**
 * Ensure that a specific theme is never updated. This works by removing the
 * theme from the list of available updates.
 */

add_filter('http_request_args', 'pisces_hidden_theme_update', 10, 2);

if(!function_exists('pisces_hidden_theme_update')){
    function pisces_hidden_theme_update( $response, $url ){
        $pos = strpos($url, '//api.wordpress.org/themes/update-check');
        if($pos === 5 || $pos === 6){
            $themes = json_decode( $response['body']['themes'], true );
            if(isset($themes['themes']['pisces'])){
                unset($themes['themes']['pisces']);
            }
            if(isset($themes['themes']['pisces-child'])){
                unset($themes['themes']['pisces-child']);
            }
            $response['body']['themes'] = json_encode( $themes );
        }
        return $response;
    }
}



add_filter('pisces/filter/breadcrumbs/items', 'pisces_theme_setup_breadcrumbs_for_dokan', 10, 2);
if(!function_exists('pisces_theme_setup_breadcrumbs_for_dokan')){
    function pisces_theme_setup_breadcrumbs_for_dokan( $items, $args ){
        if (  function_exists('dokan_is_store_page') && dokan_is_store_page() ) {

            $custom_store_url = dokan_get_option( 'custom_store_url', 'dokan_general', 'store' );

            $author      = get_query_var( $custom_store_url );
            $seller_info = get_user_by( 'slug', $author );

            $items[] = sprintf(
                '<div class="la-breadcrumb-item"><a href="%4$s" class="%2$s" rel="tag" title="%3$s">%1$s</a></div>',
                esc_attr(ucwords($custom_store_url)),
                'la-breadcrumb-item-link',
                esc_attr(ucwords($custom_store_url)),
                esc_url(site_url() .'/'.$custom_store_url)
            );
            $items[] = sprintf(
                '<div class="la-breadcrumb-item"><span class="%2$s">%1$s</span></div>',
                esc_attr($seller_info->data->display_name),
                'la-breadcrumb-item-link'
            );
        }

        return $items;
    }
}


add_filter('pisces/filter/show_page_title', 'pisces_filter_show_page_title', 10, 1 );
add_filter('pisces/filter/show_breadcrumbs', 'pisces_filter_show_breadcrumbs', 10, 1 );

if(!function_exists('pisces_filter_show_page_title')){
    function pisces_filter_show_page_title( $show ){
        $context = Pisces()->get_current_context();
        if( in_array( 'is_product', $context ) && Pisces()->settings->get('product_single_hide_page_title', 'no') == 'yes' ){
            return false;
        }
        return $show;
    }
}

if(!function_exists('pisces_filter_show_breadcrumbs')){
    function pisces_filter_show_breadcrumbs( $show ){
        $context = Pisces()->get_current_context();
        if( in_array( 'is_product', $context ) && Pisces()->settings->get('product_single_hide_breadcrumb', 'no') == 'yes'){
            return false;
        }
        return $show;
    }
}


add_filter('LaStudio/swatches/args/show_option_none', 'pisces_allow_translate_woo_text_in_swatches', 10, 1);
if(!function_exists('pisces_allow_translate_woo_text_in_swatches')){
    function pisces_allow_translate_woo_text_in_swatches( $text ){
        return esc_html_x( 'Choose an option', 'front-view', 'pisces' );
    }
}

add_filter('LaStudio/swatches/get_attribute_thumbnail_src', 'pisces_allow_resize_image_url_in_swatches', 10, 4);

if(!function_exists('pisces_allow_resize_image_url_in_swatches')){
    function pisces_allow_resize_image_url_in_swatches( $image_url, $image_id, $size_name, $instance ) {
        if($size_name == 'la_swatches_image_size'){
            $width = $instance->get_width();
            $height = $instance->get_height();
            $image_url = Pisces()->images->get_attachment_image_url($image_id, array( $width, $height ));
            return $image_url;
        }
        return $image_url;
    }
}

add_filter('LaStudio/swatches/get_product_variation_image_url_by_attribute', 'pisces_allow_resize_variation_image_url_by_attribute_in_swatches', 10, 2);
if(!function_exists('pisces_allow_resize_variation_image_url_by_attribute_in_swatches')){
    function pisces_allow_resize_variation_image_url_by_attribute_in_swatches( $image_url, $image_id ) {
        global $precise_loop;
        if(isset($precise_loop['image_size'])){
            return Pisces()->images->get_attachment_image_url($image_id, $precise_loop['image_size'] );
        }
        return $image_url;
    }
}

/** Added since 2.0.3 */

remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );