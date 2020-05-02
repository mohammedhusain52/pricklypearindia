<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * WooCommerce settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function pisces_options_section_woocommerce( $sections )
{
    $sections['woocommerce'] = array(
        'name' => 'woocommerce_panel',
        'title' => esc_html_x('WooCommerce', 'admin-view', 'pisces'),
        'icon' => 'fa fa-shopping-cart',
        'sections' => array(
            array(
                'name'      => 'woocommerce_general_section',
                'title'     => esc_html_x('General WooCommerce', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_archive_product',
                        'type'      => 'image_select',
                        'title'     => esc_html_x('WooCommerce Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the layout of shop page, product category, product tags and search page', 'admin-view', 'pisces'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'catalog_mode',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Catalog Mode', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to disable the shopping functionality of WooCommerce.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'catalog_mode_price',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Catalog Mode Price', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to do not show product price', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false),
                        'dependency' => array('catalog_mode_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'active_shop_filter',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Advanced WooCommerce Filter', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn off/on advance shop filter', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'hide_shop_toolbar',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Hide WooCommerce Toolbar', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn off/on WooCommerce Toolbar', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'shop_catalog_display_type',
                        'default'   => 'grid',
                        'title'     => esc_html_x('Shop display as type', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the type display of product for the shop page', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'grid'        => esc_html_x('Grid', 'admin-view', 'pisces'),
                            'list'        => esc_html_x('List', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'shop_catalog_grid_style',
                        'default'   => '1',
                        'title'     => esc_html_x('Grid Style', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the type display of product for the shop page', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'        => esc_html_x('Style 01', 'admin-view', 'pisces'),
                            '2'        => esc_html_x('Style 02', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'active_shop_masonry',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Enable Shop Masonry', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn off/on Shop Masonry Mode', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),

                    array(
                        'id'        => 'shop_masonry_column_type',
                        'default'   => '1',
                        'title'     => esc_html_x('Masonry Column Type', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'        => esc_html_x('Default', 'admin-view', 'pisces'),
                            'custom'         => esc_html_x('Custom', 'admin-view', 'pisces')
                        ),
                        'dependency' => array('active_shop_masonry_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'product_masonry_image_size',
                        'default'   => 'shop_catalog',
                        'title'     => esc_html_x('Masonry Product Image Size', 'admin-view', 'pisces'),
                        'info'      => esc_html_x('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'admin-view', 'pisces'),
                        'type'      => 'text',
                        'dependency' => array('shop_masonry_column_type', '==', 'custom')
                    ),
                    array(
                        'id'        => 'product_masonry_item_width',
                        'default'   => '270',
                        'title'     => esc_html_x('Set your product item default width', 'admin-view', 'pisces'),
                        'info'      => esc_html_x('Enter numeric only', 'admin-view', 'pisces'),
                        'type'      => 'text',
                        'dependency' => array('shop_masonry_column_type', '==', 'custom')
                    ),
                    array(
                        'id'        => 'product_masonry_item_height',
                        'default'   => '450',
                        'title'     => esc_html_x('Set your product item default height', 'admin-view', 'pisces'),
                        'info'      => esc_html_x('Enter numeric only', 'admin-view', 'pisces'),
                        'type'      => 'text',
                        'dependency' => array('shop_masonry_column_type', '==', 'custom')
                    ),

                    array(
                        'id'        => 'woocommerce_shop_page_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('WooCommerce Number of Product Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the main shop page', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('active_shop_masonry_off', '==', 'true')
                    ),

                    array(
                        'id'        => 'woocommerce_shop_masonry_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('WooCommerce Number of Product Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the main shop page', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('active_shop_masonry_on|shop_masonry_column_type', '==|==', 'true|default')
                    ),

                    array(
                        'id'        => 'woocommerce_shop_masonry_custom_columns',
                        'default'   => array(
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'options'   => array(
                            'xlg' => false,
                            'lg' => false
                        ),
                        'title'     => esc_html_x('WooCommerce Number of Product Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the main shop page', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('active_shop_masonry_on|shop_masonry_column_type', '==|==', 'true|custom')
                    ),

                    array(
                        'id'        => 'enable_shop_masonry_custom_setting',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Enable Custom Item Settings', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false),
                        'dependency' => array('active_shop_masonry_on|shop_masonry_column_type', '==|==', 'true|custom')
                    ),
                    array(
                        'id'        => 'shop_masonry_item_setting',
                        'type'      => 'group',
                        'title'     => esc_html_x('Add Item Sizes', 'admin-view', 'pisces'),
                        'button_title'    => esc_html_x('Add','admin-view', 'pisces'),
                        'accordion_title' => 'size_name',
                        'default'   => array(
                            array(
                                'size_name' => esc_html_x('1x Width + 1x Height', 'admin-view', 'pisces'),
                                'width' => 1,
                                'height' => 1
                            )
                        ),
                        'fields'    => array(
                            array(
                                'id'        => 'size_name',
                                'type'      => 'text',
                                'default'   => esc_html_x('1x Width + 1x Height', 'admin-view', 'pisces'),
                                'title'     => esc_html_x('Size Name', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'width',
                                'default'   => '1',
                                'title'     => esc_html_x('Width', 'admin-view', 'pisces'),
                                'info'      => esc_html_x('it will occupy x width of base item width ( example: this item will be occupy 2x width of base width you need entered "2")', 'admin-view', 'pisces'),
                                'type'      => 'select',
                                'options'   => array(
                                    '0.5'      => esc_html_x('0.5x width', 'admin-view', 'pisces'),
                                    '1'        => esc_html_x('1x width', 'admin-view', 'pisces'),
                                    '1.5'      => esc_html_x('1.5x width', 'admin-view', 'pisces'),
                                    '2'        => esc_html_x('2x width', 'admin-view', 'pisces'),
                                    '2.5'      => esc_html_x('2.5x width', 'admin-view', 'pisces'),
                                    '3'        => esc_html_x('3x width', 'admin-view', 'pisces'),
                                    '3.5'      => esc_html_x('3.5x width', 'admin-view', 'pisces'),
                                    '4'        => esc_html_x('4x width', 'admin-view', 'pisces')
                                )
                            ),
                            array(
                                'id'        => 'height',
                                'default'   => '1',
                                'title'     => esc_html_x('Height', 'admin-view', 'pisces'),
                                'info'      => esc_html_x('it will occupy x height of base item height ( example: this item will be occupy 2x height of base height you need entered "2")', 'admin-view', 'pisces'),
                                'type'      => 'select',
                                'options'   => array(
                                    '0.5'      => esc_html_x('0.5x height', 'admin-view', 'pisces'),
                                    '1'        => esc_html_x('1x height', 'admin-view', 'pisces'),
                                    '1.5'      => esc_html_x('1.5x height', 'admin-view', 'pisces'),
                                    '2'        => esc_html_x('2x height', 'admin-view', 'pisces'),
                                    '2.5'      => esc_html_x('2.5x height', 'admin-view', 'pisces'),
                                    '3'        => esc_html_x('3x height', 'admin-view', 'pisces'),
                                    '3.5'      => esc_html_x('3.5x height', 'admin-view', 'pisces'),
                                    '4'        => esc_html_x('4x height', 'admin-view', 'pisces')
                                )
                            )
                        ),
                        'dependency' => array('active_shop_masonry_on|shop_masonry_column_type|enable_shop_masonry_custom_setting_on', '==|==|==', 'true|custom|true')
                    ),

                    array(
                        'id'        => 'shop_item_space',
                        'default'   => 'default',
                        'title'     => esc_html_x('Shop Item Space', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'    => esc_html_x('Default', 'admin-view', 'pisces'),
                            'zero'       => esc_html_x('0px', 'admin-view', 'pisces'),
                            '5'          => esc_html_x('5px', 'admin-view', 'pisces'),
                            '10'         => esc_html_x('10px', 'admin-view', 'pisces'),
                            '15'         => esc_html_x('15px', 'admin-view', 'pisces'),
                            '20'         => esc_html_x('20px', 'admin-view', 'pisces'),
                            '25'         => esc_html_x('25px', 'admin-view', 'pisces'),
                            '30'         => esc_html_x('30px', 'admin-view', 'pisces'),
                            '35'         => esc_html_x('35px', 'admin-view', 'pisces'),
                            '40'         => esc_html_x('40px', 'admin-view', 'pisces'),
                            '45'         => esc_html_x('45px', 'admin-view', 'pisces'),
                            '50'         => esc_html_x('50px', 'admin-view', 'pisces'),
                            '55'         => esc_html_x('55px', 'admin-view', 'pisces'),
                            '60'         => esc_html_x('60px', 'admin-view', 'pisces'),
                            '65'         => esc_html_x('65px', 'admin-view', 'pisces'),
                            '70'         => esc_html_x('70px', 'admin-view', 'pisces'),
                            '75'         => esc_html_x('75px', 'admin-view', 'pisces'),
                            '80'         => esc_html_x('80px', 'admin-view', 'pisces'),
                        )
                    ),

                    array(
                        'id'        => 'product_per_page_allow',
                        'default'   => '12,15,30',
                        'title'     => esc_html_x('WooCommerce Number of Products per Page Allow', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of products that display per page.', 'admin-view', 'pisces'),
                        'info'      => esc_html_x('Comma-separated. ( i.e: 3,6,9)', 'admin-view', 'pisces'),
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'product_per_page_default',
                        'default'   => 12,
                        'title'     => esc_html_x('WooCommerce Number of Products per Page', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('The value of field must be as one value of setting above', 'admin-view', 'pisces'),
                        'type'      => 'number',
                        'attributes'=> array(
                            'min' => 1,
                            'max' => 100
                        )
                    ),
                    array(
                        'id'        => 'woocommerce_enable_crossfade_effect',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('WooCommerce Crossfade Image Effect', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the product crossfade image effect on the product.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_toggle_grid_list',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('WooCommerce Product Grid / List View', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the grid/list toggle on the main shop page and archive shop pages.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_rating_on_catalog',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('WooCommerce Show Ratings', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the ratings on the main shop page and archive shop pages.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_quickview_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('WooCommerce Show Quick View Button', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_wishlist_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('WooCommerce Show Wishlist Button', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_compare_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('WooCommerce Show Compare Button', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    )
                )
            ),
            array(
                'name'      => 'woocommerce_single_section',
                'title'     => esc_html_x('Product Page Settings', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_single_product',
                        'type'      => 'image_select',
                        'radio'     => true,
                        'title'     => esc_html_x('Product Page Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the layout for detail product page', 'admin-view', 'pisces'),
                        'default'   => 'col-1c',
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'woocommerce_product_page_design',
                        'default'   => '1',
                        'title'     => esc_html_x('Product Page Design', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'        => esc_html_x('Design 01', 'admin-view', 'pisces'),
                            '2'        => esc_html_x('Design 02', 'admin-view', 'pisces'),
                            '3'        => esc_html_x('Design 03', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'product_single_hide_breadcrumb',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'no',
                        'title'     => esc_html__('Hide Breadcrumbs', 'pisces'),
                        'desc'      => esc_html__('In Page Title Bar', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'product_single_hide_page_title',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'no',
                        'title'     => esc_html__('Hide Page Title', 'pisces'),
                        'desc'      => esc_html__('In Page Title Bar', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'product_single_hide_product_title',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'no',
                        'title'     => esc_html__('Hide Product Title', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'product_sharing',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Product Sharing Option', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show social sharing on the product page', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'related_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('WooCommerce Related Products', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show related products on the product page', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'related_product_title',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Related Title','admin-view', 'pisces'),
                        'dependency'=> array('related_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'related_product_subtitle',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Related Sub Title','admin-view', 'pisces'),
                        'dependency'=> array('related_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'related_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('WooCommerce Related Product Number of Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the related', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('related_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'upsell_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('WooCommerce Up-sells Products', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show Up-sells products on the product page', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'upsell_product_title',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Up-sells Title','admin-view', 'pisces'),
                        'dependency'=> array('upsell_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'upsell_product_subtitle',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Up-sells Sub Title','admin-view', 'pisces'),
                        'dependency'=> array('upsell_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'upsell_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('WooCommerce Up-sells Product Number of Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the Up-sells', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('upsell_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'woo_enable_custom_tab',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Custom Tabs Detail Page', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show custom tabs on the product page', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woo_custom_tab_title',
                        'type'      => 'text',
                        'title'     => esc_html_x('Custom Tab Title','admin-view', 'pisces'),
                        'dependency'=> array('woo_enable_custom_tab_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'woo_custom_tab_content',
                        'type'      => 'wp_editor',
                        'title'     => esc_html_x('Custom Tab Content', 'admin-view', 'pisces'),
                        'dependency'=> array('woo_enable_custom_tab_on', '==', 'true'),
                    )
                )
            ),
            array(
                'name'      => 'woocommerce_cart_section',
                'title'     => esc_html_x('Cart Page Settings', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-shopping-cart',
                'fields'    => array(
                    array(
                        'id'        => 'crosssell_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('WooCommerce Cross-sells Products', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show Cross-sells products on the product page', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'crosssell_product_title',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Cross-sells Title','admin-view', 'pisces'),
                        'dependency'=> array('crosssell_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'crosssell_product_subtitle',
                        'type'      => 'text',
                        'title'     => esc_html_x('WooCommerce Cross-sells Sub Title','admin-view', 'pisces'),
                        'dependency'=> array('crosssell_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'crosssell_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('WooCommerce Cross-sells Product Number of Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the number of columns for the Cross-sells', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('crosssell_products_on', '==', 'true')
                    )
                )
            )
        )
    );
    return $sections;
}