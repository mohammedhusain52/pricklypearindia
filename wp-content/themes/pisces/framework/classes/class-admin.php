<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Pisces_Admin {

    public function __construct(){
        $this->init_page_options();
        $this->init_meta_box();
        $this->init_shortcode_manager();
        Pisces_MegaMenu_Init::get_instance();
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts') );
        add_action( 'customize_register', array( $this, 'override_customize_control') );
        add_action( 'registered_post_type', array( $this, 'remove_revslider_metabox') );
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu') );
    }

    public function admin_scripts(){
        wp_enqueue_style('pisces-admin-css', Pisces::$template_dir_url. '/assets/admin/css/admin.css');
        wp_enqueue_script('pisces-admin-theme', Pisces::$template_dir_url . '/assets/admin/js/admin.js', array( 'jquery'), false, true );
    }

    public function init_page_options(){
        $options = !empty(Pisces()->options()->sections) ? Pisces()->options()->sections : array();
        if(class_exists('LaStudio_Options')) {
            $settings = array(
                'menu_title' => esc_html_x('Theme Options', 'admin-view', 'pisces'),
                'menu_type' => 'theme',
                'menu_slug' => 'theme_options',
                'ajax_save' => false,
                'show_reset_all' => true,
                'disable_header' => false,
                'framework_title' => esc_html_x('Pisces', 'admin-view', 'pisces')
            );
            if(!empty($options)){
                LaStudio_Options::instance( $settings, $options, Pisces::get_option_name());
            }
        }
        if(class_exists('LaStudio_Customize') && function_exists('la_convert_option_to_customize')){
            if(!empty($options)){
                $customize_options = la_convert_option_to_customize($options);
                LaStudio_Customize::instance( $customize_options, Pisces::get_option_name());
            }
        }
    }

    public function init_meta_box(){


        $default_metabox_opts = !empty(Pisces()->options()->metabox_sections) ? Pisces()->options()->metabox_sections : array();

        if(!class_exists('LaStudio_Metabox')){
            return;
        }
        if(empty($default_metabox_opts)){
            return;
        }

        $metaboxes = array();
        $taxonomy_metaboxes = array();

        /**
         * Pages
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Page Options', 'admin-view', 'pisces'),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional',
                'fullpage'
            ))
        );

        /**
         * Post
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Post Options', 'admin-view', 'pisces'),
            'post_type' => 'post',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'post',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Product
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Product View Options', 'admin-view', 'pisces'),
            'post_type' => 'product',
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Portfolio
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Portfolio Options', 'admin-view', 'pisces'),
            'post_type' => 'la_portfolio',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Testimonial
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Testimonial Information', 'admin-view', 'pisces'),
            'post_type' => 'la_testimonial',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'testimonial'
            ))
        );

        /**
         * Member
         */
        $metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Page Options', 'admin-view', 'pisces'),
            'post_type' => 'la_team_member',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'member',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Product Category
         */
        $taxonomy_metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Product Category Options', 'admin-view', 'pisces'),
            'taxonomy' => 'product_cat',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Category
         */
        $taxonomy_metaboxes[] = array(
            'id'        => Pisces::get_original_option_name(),
            'title'     => esc_html_x('Category Options', 'admin-view', 'pisces'),
            'taxonomy' => 'category',
            'sections'  => Pisces()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );
        LaStudio_Metabox::instance($metaboxes);
        LaStudio_Taxonomy::instance($taxonomy_metaboxes);
    }

    public function init_shortcode_manager(){
        if(class_exists('LaStudio_Shortcode_Manager')){
            $options       = array();
            $options[]     = array(
                'title'      => esc_html_x('La Shortcodes', 'admin-view', 'pisces'),
                'shortcodes' => array(
                    array(
                        'name'      => 'la_text',
                        'title'     => esc_html_x('Custom Text', 'admin-view', 'pisces'),
                        'fields'    => array(
                            array(
                                'id'    => 'color',
                                'type'  => 'color_picker',
                                'title' => esc_html_x('Color', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'font_size',
                                'type'      => 'responsive',
                                'title'     => esc_html_x('Font Size', 'admin-view', 'pisces'),
                                'desc'      => esc_html_x('Enter the font size (ie 20px )', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'line_height',
                                'type'      => 'responsive',
                                'title'     => esc_html_x('Line Height', 'admin-view', 'pisces'),
                                'desc'      => esc_html_x('Enter the line height (ie 20px )', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'    => 'el_class',
                                'type'  => 'text',
                                'title' => esc_html_x('Extra Class Name', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'textarea',
                                'title' => esc_html_x('Content', 'admin-view', 'pisces')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_btn',
                        'title'     => esc_html_x('Button', 'admin-view', 'pisces'),
                        'fields'    => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => esc_html_x('Text', 'admin-view', 'pisces'),
                                'default' => esc_html_x('Text on the button', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'link',
                                'type'      => 'fieldset',
                                'title'     => esc_html_x('URL (Link)', 'admin-view', 'pisces'),
                                'desc'      => esc_html_x('Add link to button.', 'admin-view', 'pisces'),
                                'before'    => '<div data-parent-atts="1" data-atts="link" data-atts-separator="|">',
                                'after'     => '</div>',
                                'fields'    => array(
                                    array(
                                        'id'    => 'url',
                                        'type'  => 'text',
                                        'title' => esc_html_x('URL', 'admin-view', 'pisces'),
                                        'default' => '#',
                                        'attributes' => array(
                                            'data-child-atts' => 'url'
                                        )
                                    ),
                                    array(
                                        'id'    => 'title',
                                        'type'  => 'text',
                                        'title' => esc_html_x('Link Text', 'admin-view', 'pisces'),
                                        'attributes' => array(
                                            'data-child-atts' => 'title'
                                        )
                                    ),
                                    array(
                                        'id'        => 'target',
                                        'type'      => 'radio',
                                        'default'   => '_self',
                                        'class'     => 'la-radio-style',
                                        'title'     => esc_html_x('Open link in a new tab', 'admin-view', 'pisces'),
                                        'options'   => array(
                                            '_self' => esc_html_x('No', 'admin-view', 'pisces'),
                                            '_blank' => esc_html_x('Yes', 'admin-view', 'pisces')
                                        ),
                                        'attributes' => array(
                                            'data-child-atts' => 'target',
                                            'data-check' => 'yes'
                                        )
                                    ),
                                ),
                            ),

                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Style', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select button display style.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    'flat'          => esc_html_x('Flat', 'admin-view', 'pisces'),
                                    'outline'       => esc_html_x('Outline', 'admin-view', 'pisces'),
                                ),
                                'default' => 'flat'
                            ),
                            array(
                                'id'    => 'border_width',
                                'type'  => 'select',
                                'title' => esc_html_x('Border width', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select border width.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    '0'       => esc_html_x('None', 'admin-view', 'pisces'),
                                    '1'       => esc_html_x('1px', 'admin-view', 'pisces'),
                                    '2'       => esc_html_x('2px', 'admin-view', 'pisces'),
                                    '3'       => esc_html_x('3px', 'admin-view', 'pisces')
                                ),
                                'default' => 'square'
                            ),
                            array(
                                'id'    => 'shape',
                                'type'  => 'select',
                                'title' => esc_html_x('Shape', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select button shape.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    'rounded'   => esc_html_x('Rounded', 'admin-view', 'pisces'),
                                    'square'    => esc_html_x('Square', 'admin-view', 'pisces'),
                                    'round'     => esc_html_x('Round', 'admin-view', 'pisces')
                                ),
                                'default' => 'square'
                            ),
                            array(
                                'id'    => 'color',
                                'type'  => 'select',
                                'title' => esc_html_x('Color', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select button color.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    'black'      => esc_html_x('Black', 'admin-view', 'pisces'),
                                    'primary'    => esc_html_x('Primary', 'admin-view', 'pisces'),
                                    'white'      => esc_html_x('White', 'admin-view', 'pisces'),
                                    'white2'     => esc_html_x('White2', 'admin-view', 'pisces'),
                                    'gray'       => esc_html_x('Gray', 'admin-view', 'pisces'),
                                ),
                                'default' => 'black'
                            ),
                            array(
                                'id'    => 'size',
                                'type'  => 'select',
                                'title' => esc_html_x('Size', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select button display size.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    'md'    => esc_html_x('Normal', 'admin-view', 'pisces'),
                                    'lg'    => esc_html_x('Large', 'admin-view', 'pisces'),
                                    'sm'    => esc_html_x('Small', 'admin-view', 'pisces'),
                                    'xs'    => esc_html_x('Mini', 'admin-view', 'pisces')
                                ),
                                'default' => 'md'
                            ),
                            array(
                                'id'    => 'align',
                                'type'  => 'select',
                                'title' => esc_html_x('Alignment', 'admin-view', 'pisces'),
                                'desc'  => esc_html_x('Select button alignment.', 'admin-view', 'pisces'),
                                'options'        => array(
                                    'inline'    => esc_html_x('Inline', 'admin-view', 'pisces'),
                                    'left'      => esc_html_x('Left', 'admin-view', 'pisces'),
                                    'right'     => esc_html_x('Right', 'admin-view', 'pisces'),
                                    'center'    => esc_html_x('Center', 'admin-view', 'pisces')
                                ),
                                'default' => 'left'
                            ),
                            array(
                                'id'    => 'el_class',
                                'type'  => 'text',
                                'title' => esc_html_x('Extra Class Name', 'admin-view', 'pisces'),
                                'desc' => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'pisces')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_dropcap',
                        'title'     => esc_html_x('DropCap', 'admin-view', 'pisces'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Design', 'admin-view', 'pisces'),
                                'options'        => array(
                                    '1'          => esc_html_x('Style 1', 'admin-view', 'pisces')
                                )
                            ),
                            array(
                                'id'    => 'color',
                                'type'  => 'color_picker',
                                'title' => esc_html_x('Text Color', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'text',
                                'title' => esc_html_x('Content', 'admin-view', 'pisces')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_quote',
                        'title'     => esc_html_x('Custom Quote', 'admin-view', 'pisces'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Design', 'admin-view', 'pisces'),
                                'options'        => array(
                                    '1'          => esc_html_x('Style 1', 'admin-view', 'pisces'),
                                    '2'          => esc_html_x('Style 2', 'admin-view', 'pisces')
                                )
                            ),
                            array(
                                'id'    => 'author',
                                'type'  => 'text',
                                'title' => esc_html_x('Source Name', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => esc_html_x('Source Link', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'textarea',
                                'title' => esc_html_x('Content', 'admin-view', 'pisces')
                            )
                        )
                    ),
                    array(
                        'name'          => 'la_icon_list',
                        'title'         => esc_html_x('Icon List', 'admin-view', 'pisces'),
                        'view'          => 'clone',
                        'clone_id'      => 'la_icon_list_item',
                        'clone_title'   => esc_html_x('Add New', 'admin-view', 'pisces'),
                        'fields'        => array(
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html_x('Extra Class', 'admin-view', 'pisces'),
                                'desc'      => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'pisces'),
                            )
                        ),
                        'clone_fields'  => array(
                            array(
                                'id'        => 'icon',
                                'type'      => 'icon',
                                'default'   => 'fa fa-check',
                                'title'     => esc_html_x('Icon', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'icon_color',
                                'type'      => 'color_picker',
                                'title'     => esc_html_x('Icon Color', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'content',
                                'type'      => 'textarea',
                                'title'     => esc_html_x('Content', 'admin-view', 'pisces')
                            ),
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html_x('Extra Class', 'admin-view', 'pisces'),
                                'desc'     => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'pisces'),
                            )
                        )
                    ),
                )
            );
            LaStudio_Shortcode_Manager::instance( $options );
        }
    }

    public function remove_revslider_metabox($post_type){
        add_action('do_meta_boxes', function () use ($post_type) {
            remove_meta_box('mymetabox_revslider_0', $post_type, 'normal');
        });
    }

    public function admin_menu(){
        /*
         * @Todo remove the submenu items
         * @Example: Custom Header,Custom Background
         * We need use global variable `$submenu`
         */

    }

    public function override_customize_control( $wp_customize ) {
        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('background_image');
        $wp_customize->remove_control('display_header_text');
        $wp_customize->remove_control('site_icon');
        $wp_customize->remove_control('custom_css');
    }


    public function admin_init(){
        add_filter('tiny_mce_before_init', array( $this, 'add_control_to_tinymce'));
        add_filter('mce_buttons_2', array( $this, 'add_button_to_tinymce'));
    }

    public function add_button_to_tinymce($buttons){
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }

    public function add_control_to_tinymce($settings){
        $style_formats = array(
            array(
                'title' => esc_html_x('Styled Subtitle', 'admin-view', 'pisces'),
                'inline' => 'small',
                'classes' => 'small'
            ),
            array(
                'title' => esc_html_x('Title H1', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h1'
            ),
            array(
                'title' => esc_html_x('Title H2', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h2'
            ),
            array(
                'title' => esc_html_x('Title H3', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h3'
            ),
            array(
                'title' => esc_html_x('Title H4', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h4'
            ),
            array(
                'title' => esc_html_x('Title H5', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h5'
            ),
            array(
                'title' => esc_html_x('Title H6', 'admin-view', 'pisces'),
                'block' => 'div',
                'classes' => 'h6'
            ),
            array(
                'title' => esc_html_x('Light Title', 'admin-view', 'pisces'),
                'inline' => 'span',
                'classes' => 'light'
            ),
            array(
                'title' => esc_html_x('Highlight Font', 'admin-view', 'pisces'),
                'inline' => 'span',
                'classes' => 'highlight-font-family'
            )
        );
        $settings['wordpress_adv_hidden'] = false;
        $settings['style_formats'] = json_encode($style_formats);
        return $settings;
    }
}