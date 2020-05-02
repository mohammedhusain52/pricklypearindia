<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Pisces_Visual_Composer{

    public $category;

    public static $instance = null;

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct(){

        $this->category = esc_html_x( 'La Studio', 'admin-view', 'pisces');

        if(!class_exists('Vc_Manager')) return false;

        add_action( 'vc_before_init', array( $this, 'vcBeforeInit') );
        add_action( 'vc_after_init', array( $this, 'vcAfterInit') );
        add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG , array( $this, 'customFilterTags' ), 10, 3 );
        add_filter('vc_tta_container_classes', array( $this, 'modifyTtaTabsClasses'), 10, 2 );

    }

    public function vcBeforeInit(){
        vc_automapper()->setDisabled( true );
        vc_manager()->disableUpdater( true );
        vc_manager()->setIsAsTheme( true );
        if(class_exists( 'WooCommerce' )){
            remove_action( 'wp_enqueue_scripts', 'vc_woocommerce_add_to_cart_script' );
        }
        add_filter('vc_map_get_param_defaults', array( $this, 'modifyCssAnimationValue' ), 10, 2);
    }

    public function vcAfterInit(){
        $this->overrideVcSection();
        //$this->overrideMessage();
        $this->overrideProgressBar();
        $this->overridePieChart();
        $this->overrideTtaAccordion();
        $this->overrideTtaTabs();
        $this->overrideTtaTour();
        $this->overrideTtaSection();

        if( function_exists('vc_set_default_editor_post_types') ){
            $list = array(
                'page',
                'post',
                'la_block',
                'la_portfolio'
            );
            vc_set_default_editor_post_types( $list );
        }
    }

    public function modifyCssAnimationValue($value, $param){
        if( 'css_animation' ==  $param['param_name'] && 'none' == $value){
            $value = '';
        }
        return $value;
    }

    public function customFilterTags($css_classes, $shortcode_name, $atts){
        if ( $shortcode_name == 'vc_progress_bar' ){
            if( isset($atts['display_type']) ){
                $css_classes .= ' vc_progress_bar_' . esc_attr($atts['display_type']);
            }
        }
        if ( $shortcode_name == 'vc_tta_tabs' || $shortcode_name == 'vc_tta_accordion' || $shortcode_name == 'vc_tta_tour' ){
            if( isset($atts['style']) && strpos($atts['style'], 'la-') !== false ){
                $css_classes = preg_replace('/ vc_tta-(o|shape|spacing|gap|color)[0-9a-zA-Z\_\-]+/','',$css_classes);
                if($shortcode_name == 'vc_tta_tabs'){
                    $css_classes .= ' vc_tta-o-no-fill';
                    $css_classes = str_replace('vc_tta-style-','tabs-',$css_classes);
                    $css_classes = str_replace('vc_general ','',$css_classes);
                }
                if($shortcode_name == 'vc_tta_tour'){
                    $css_classes = str_replace('vc_tta-style-','tour-',$css_classes);
                    $css_classes = str_replace('vc_general ','',$css_classes);
                }
            }
        }
        if($shortcode_name == 'vc_btn'){
            if(!empty($atts['style']) && in_array($atts['style'], array('modern', 'outline', 'custom', 'outline-custom'))){
                if( false !== strpos( $css_classes, 'vc_btn3-container')){
                    $css_classes .= ' la-vc-btn';
                }
            }
        }

        if ( $shortcode_name == 'vc_row' ) {
            $css_classes .= ' la_fp_slide la_fp_child_section';
        }

        return $css_classes;
    }

    public function overrideMessage(){
        $shortcode_name = 'vc_message';

        $shortcode_object = vc_get_shortcode($shortcode_name);
        $shortcode_params = $shortcode_object['params'];
        
        $icon_type = self::getParamIndex($shortcode_params,'icon_type');
        
        if($icon_type !== -1){
            $shortcode_params[$icon_type]['value'][esc_html_x( 'None', 'admin-view', 'pisces' )] = 'none';
        }

        vc_map_update($shortcode_name , array(
            'category' => $this->category,
            'params' => $shortcode_params
        ));
    }

    public function overrideProgressBar(){
        vc_map_update( 'vc_progress_bar', array(
            'category' => $this->category,
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => __( 'Values', 'pisces' ),
                    'param_name' => 'values',
                    'description' => __( 'Enter values for graph - value, title and color.', 'pisces' ),
                    'value' => urlencode( json_encode( array(
                        array(
                            'label' => __( 'Development', 'pisces' ),
                            'value' => '90',
                        ),
                        array(
                            'label' => __( 'Design', 'pisces' ),
                            'value' => '80',
                        ),
                        array(
                            'label' => __( 'Marketing', 'pisces' ),
                            'value' => '70',
                        ),
                    ) ) ),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Label', 'pisces' ),
                            'param_name' => 'label',
                            'description' => __( 'Enter text used as title of bar.', 'pisces' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Value', 'pisces' ),
                            'param_name' => 'value',
                            'description' => __( 'Enter value of bar.', 'pisces' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => __( 'Color', 'pisces' ),
                            'param_name' => 'color',
                            'value' => array(
                                    __( 'Default', 'pisces' ) => '',
                                ) + array(
                                    __( 'Classic Grey', 'pisces' ) => 'bar_grey',
                                    __( 'Classic Blue', 'pisces' ) => 'bar_blue',
                                    __( 'Classic Turquoise', 'pisces' ) => 'bar_turquoise',
                                    __( 'Classic Green', 'pisces' ) => 'bar_green',
                                    __( 'Classic Orange', 'pisces' ) => 'bar_orange',
                                    __( 'Classic Red', 'pisces' ) => 'bar_red',
                                    __( 'Classic Black', 'pisces' ) => 'bar_black',
                                ) + getVcShared( 'colors-dashed' ) + array(
                                    __( 'Gradient', 'pisces' ) => 'gradient',
                                    __( 'Custom Color', 'pisces' ) => 'custom'
                                ),
                            'description' => __( 'Select single bar background color.', 'pisces' ),
                            'admin_label' => true,
                            'param_holder_class' => 'vc_colored-dropdown',
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => __( 'Custom color', 'pisces' ),
                            'param_name' => 'customcolor',
                            'description' => __( 'Select custom single bar background color.', 'pisces' ),
                            'dependency' => array(
                                'element' => 'color',
                                'value' => array( 'custom' ),
                            ),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => __( 'Custom text color', 'pisces' ),
                            'param_name' => 'customtxtcolor',
                            'description' => __( 'Select custom single bar text color.', 'pisces' ),
                            'dependency' => array(
                                'element' => 'color',
                                'value' => array( 'custom' ),
                            )
                        ),
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Units', 'pisces' ),
                    'param_name' => 'units',
                    'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Color', 'pisces' ),
                    'param_name' => 'bgcolor',
                    'value' => array(
                            __( 'Classic Grey', 'pisces' ) => 'bar_grey',
                            __( 'Classic Blue', 'pisces' ) => 'bar_blue',
                            __( 'Classic Turquoise', 'pisces' ) => 'bar_turquoise',
                            __( 'Classic Green', 'pisces' ) => 'bar_green',
                            __( 'Classic Orange', 'pisces' ) => 'bar_orange',
                            __( 'Classic Red', 'pisces' ) => 'bar_red',
                            __( 'Classic Black', 'pisces' ) => 'bar_black',
                        ) + getVcShared( 'colors-dashed' ) + array(
                            __( 'Gradient', 'pisces' ) => 'gradient',
                            __( 'Custom Color', 'pisces' ) => 'custom'
                        ),
                    'description' => __( 'Select bar background color.', 'pisces' ),
                    'admin_label' => true,
                    'param_holder_class' => 'vc_colored-dropdown',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Bar custom background color', 'pisces' ),
                    'param_name' => 'custombgcolor',
                    'description' => __( 'Select custom background color for bars.', 'pisces' ),
                    'dependency' => array(
                        'element' => 'bgcolor',
                        'value' => array( 'custom' ),
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Bar custom text color', 'pisces' ),
                    'param_name' => 'customtxtcolor',
                    'description' => __( 'Select custom text color for bars.', 'pisces' ),
                    'dependency' => array(
                        'element' => 'bgcolor',
                        'value' => array( 'custom' ),
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => __( 'Options', 'pisces' ),
                    'param_name' => 'options',
                    'value' => array(
                        __( 'Add stripes', 'pisces' ) => 'striped',
                        __( 'Add animation (Note: visible only with striped bar).', 'pisces' ) => 'animated',
                    ),
                ),
                vc_map_add_css_animation(),
                array(
                    'type' => 'el_id',
                    'heading' => __( 'Element ID', 'pisces' ),
                    'param_name' => 'el_id'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', 'pisces' ),
                    'param_name' => 'el_class',
                    'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'pisces' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'CSS box', 'pisces' ),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'pisces' ),
                ),
            )
        ));
    }

    public function overridePieChart(){
        $shortcode_tag = 'vc_pie';
        $shortcode_object = vc_get_shortcode($shortcode_tag);
        $shortcode_params = $shortcode_object['params'];

        $shortcode_params = array(
            array(
                'type' => 'dropdown',
                'param_name' => 'style',
                'value' => array(
                    esc_html_x( 'Style 01', 'admin-view', 'pisces' ) => '1',
                    esc_html_x( 'Style 02', 'admin-view', 'pisces' ) => '2',
                ),
                'default'   => '1',
                'heading' => esc_html_x( 'Style', 'admin-view', 'pisces' ),
                'description' => esc_html_x( 'Select display style.', 'admin-view', 'pisces' )
            )
        ) + $shortcode_params ;

        vc_map_update( $shortcode_tag , array(
            'category' => $this->category,
            'params'   => $shortcode_params
        ));
    }

    public function overrideTtaAccordion(){
        vc_map_update('vc_tta_accordion' , array(
            'category' => $this->category,
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'param_name' => 'style',
                    'value' => array(
                        esc_html_x( 'Pisces 01', 'admin-view', 'pisces' ) => 'la-1',
                        esc_html_x( 'Pisces 02', 'admin-view', 'pisces' ) => 'la-2',
                        esc_html_x( 'Pisces 03', 'admin-view', 'pisces' ) => 'la-3',
                        esc_html_x( 'Classic', 'admin-view', 'pisces' ) => 'classic',
                        esc_html_x( 'Modern', 'admin-view', 'pisces' ) => 'modern',
                        esc_html_x( 'Flat', 'admin-view', 'pisces' ) => 'flat',
                        esc_html_x( 'Outline', 'admin-view', 'pisces' ) => 'outline',
                    ),
                    'heading' => esc_html_x( 'Style', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion display style.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'shape',
                    'value' => array(
                        esc_html_x( 'Rounded', 'admin-view', 'pisces' ) => 'rounded',
                        esc_html_x( 'Square', 'admin-view', 'pisces' ) => 'square',
                        esc_html_x( 'Round', 'admin-view', 'pisces' ) => 'round',
                    ),
                    'heading' => esc_html_x( 'Shape', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion shape.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'color',
                    'value' => getVcShared( 'colors-dashed' ),
                    'std' => 'grey',
                    'heading' => esc_html_x( 'Color', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion color.', 'admin-view', 'pisces' ),
                    'param_holder_class' => 'vc_colored-dropdown',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'param_name' => 'no_fill',
                    'heading' => esc_html_x( 'Do not fill content area?', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Do not fill content area with color.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'spacing',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        '1px' => '1',
                        '2px' => '2',
                        '3px' => '3',
                        '4px' => '4',
                        '5px' => '5',
                        '10px' => '10',
                        '15px' => '15',
                        '20px' => '20',
                        '25px' => '25',
                        '30px' => '30',
                        '35px' => '35',
                    ),
                    'heading' => esc_html_x( 'Spacing', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion spacing.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'gap',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        '1px' => '1',
                        '2px' => '2',
                        '3px' => '3',
                        '4px' => '4',
                        '5px' => '5',
                        '10px' => '10',
                        '15px' => '15',
                        '20px' => '20',
                        '25px' => '25',
                        '30px' => '30',
                        '35px' => '35',
                    ),
                    'heading' => esc_html_x( 'Gap', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion gap.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'c_align',
                    'value' => array(
                        esc_html_x( 'Left', 'admin-view', 'pisces' ) => 'left',
                        esc_html_x( 'Right', 'admin-view', 'pisces' ) => 'right',
                        esc_html_x( 'Center', 'admin-view', 'pisces' ) => 'center',
                    ),
                    'heading' => esc_html_x( 'Alignment', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion section title alignment.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'autoplay',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => 'none',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '10' => '10',
                        '20' => '20',
                        '30' => '30',
                        '40' => '40',
                        '50' => '50',
                        '60' => '60',
                    ),
                    'std' => 'none',
                    'heading' => esc_html_x( 'Autoplay', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select auto rotate for accordion in seconds (Note: disabled by default).', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'param_name' => 'collapsible_all',
                    'heading' => esc_html_x( 'Allow collapse all?', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Allow collapse all accordion sections.', 'admin-view', 'pisces' ),
                ),
                // Control Icons
                array(
                    'type' => 'dropdown',
                    'param_name' => 'c_icon',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        esc_html_x( 'Chevron', 'admin-view', 'pisces' ) => 'chevron',
                        esc_html_x( 'Plus', 'admin-view', 'pisces' ) => 'plus',
                        esc_html_x( 'Triangle', 'admin-view', 'pisces' ) => 'triangle',
                    ),
                    'std' => 'plus',
                    'heading' => esc_html_x( 'Icon', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion navigation icon.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'c_position',
                    'value' => array(
                        esc_html_x( 'Left', 'admin-view', 'pisces' ) => 'left',
                        esc_html_x( 'Right', 'admin-view', 'pisces' ) => 'right',
                    ),
                    'dependency' => array(
                        'element' => 'c_icon',
                        'not_empty' => true,
                    ),
                    'heading' => esc_html_x( 'Position', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select accordion navigation icon position.', 'admin-view', 'pisces' ),
                ),
                // Control Icons END
                array(
                    'type' => 'textfield',
                    'param_name' => 'active_section',
                    'heading' => esc_html_x( 'Active section', 'admin-view', 'pisces' ),
                    'value' => 1,
                    'description' => esc_html_x( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html_x( 'Extra class name', 'admin-view', 'pisces' ),
                    'param_name' => 'el_class',
                    'description' => esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'admin-view', 'pisces' ),
                ),
            )
        ));
    }

    public function overrideTtaTabs(){
        vc_map_update( 'vc_tta_tabs', array(
            'category' => $this->category,
            'params' => array(
                array(
                    'type' => 'textfield',
                    'param_name' => 'title',
                    'heading' => _x( 'Widget title', 'admin-view', 'pisces' ),
                    'description' => _x( 'Enter text used as widget title (Note: located above content element).', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'style',
                    'value' => array(
                        esc_html_x( 'Pisces 01', 'admin-view', 'pisces' ) => 'la-1',
                        esc_html_x( 'Pisces 02', 'admin-view', 'pisces' ) => 'la-2',
                        esc_html_x( 'Pisces 03', 'admin-view', 'pisces' ) => 'la-3',
                        esc_html_x( 'Pisces 04', 'admin-view', 'pisces' ) => 'la-4',
                        esc_html_x( 'Pisces 05', 'admin-view', 'pisces' ) => 'la-5',
                        esc_html_x( 'Classic', 'admin-view', 'pisces' ) => 'classic',
                        esc_html_x( 'Modern', 'admin-view', 'pisces' ) => 'modern',
                        esc_html_x( 'Flat', 'admin-view', 'pisces' ) => 'flat',
                        esc_html_x( 'Outline', 'admin-view', 'pisces' ) => 'outline',
                    ),
                    'heading' => esc_html_x( 'Style', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs display style.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'shape',
                    'value' => array(
                        esc_html_x( 'Rounded', 'admin-view', 'pisces' ) => 'rounded',
                        esc_html_x( 'Square', 'admin-view', 'pisces' ) => 'square',
                        esc_html_x( 'Round', 'admin-view', 'pisces' ) => 'round',
                    ),
                    'heading' => esc_html_x( 'Shape', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs shape.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'color',
                    'heading' => esc_html_x( 'Color', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs color.', 'admin-view', 'pisces' ),
                    'value' => getVcShared( 'colors-dashed' ),
                    'std' => 'grey',
                    'param_holder_class' => 'vc_colored-dropdown',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),

                array(
                    'type' => 'checkbox',
                    'param_name' => 'no_fill_content_area',
                    'heading' => esc_html_x( 'Do not fill content area?', 'admin-view', 'pisces' ),
                    'std' => 'true',
                    'description' => esc_html_x( 'Do not fill content area with color.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'spacing',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        '1px' => '1',
                        '2px' => '2',
                        '3px' => '3',
                        '4px' => '4',
                        '5px' => '5',
                        '10px' => '10',
                        '15px' => '15',
                        '20px' => '20',
                        '25px' => '25',
                        '30px' => '30',
                        '35px' => '35',
                    ),
                    'heading' => esc_html_x( 'Spacing', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs spacing.', 'admin-view', 'pisces' ),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'gap',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        '1px' => '1',
                        '2px' => '2',
                        '3px' => '3',
                        '4px' => '4',
                        '5px' => '5',
                        '10px' => '10',
                        '15px' => '15',
                        '20px' => '20',
                        '25px' => '25',
                        '30px' => '30',
                        '35px' => '35',
                    ),
                    'heading' => esc_html_x( 'Gap', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs gap.', 'admin-view', 'pisces' ),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'tab_position',
                    'value' => array(
                        esc_html_x( 'Top', 'admin-view', 'pisces' ) => 'top',
                        esc_html_x( 'Bottom', 'admin-view', 'pisces' ) => 'bottom',
                    ),
                    'heading' => esc_html_x( 'Position', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs navigation position.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'alignment',
                    'value' => array(
                        esc_html_x( 'Left', 'admin-view', 'pisces' ) => 'left',
                        esc_html_x( 'Right', 'admin-view', 'pisces' ) => 'right',
                        esc_html_x( 'Center', 'admin-view', 'pisces' ) => 'center',
                    ),
                    'heading' => esc_html_x( 'Alignment', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs section title alignment.', 'admin-view', 'pisces' ),
                    'std' => 'center',
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'autoplay',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => 'none',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '10' => '10',
                        '20' => '20',
                        '30' => '30',
                        '40' => '40',
                        '50' => '50',
                        '60' => '60',
                    ),
                    'std' => 'none',
                    'heading' => esc_html_x( 'Autoplay', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select auto rotate for tabs in seconds (Note: disabled by default).', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'active_section',
                    'heading' => esc_html_x( 'Active section', 'admin-view', 'pisces' ),
                    'value' => 1,
                    'description' => esc_html_x( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'pagination_style',
                    'value' => array(
                        esc_html_x( 'None', 'admin-view', 'pisces' ) => '',
                        esc_html_x( 'Square Dots', 'admin-view', 'pisces' ) => 'outline-square',
                        esc_html_x( 'Radio Dots', 'admin-view', 'pisces' ) => 'outline-round',
                        esc_html_x( 'Point Dots', 'admin-view', 'pisces' ) => 'flat-round',
                        esc_html_x( 'Fill Square Dots', 'admin-view', 'pisces' ) => 'flat-square',
                        esc_html_x( 'Rounded Fill Square Dots', 'admin-view', 'pisces' ) => 'flat-rounded',
                    ),
                    'heading' => esc_html_x( 'Pagination style', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select pagination style.', 'admin-view', 'pisces' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('classic','modern','flat','outline')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'pagination_color',
                    'value' => getVcShared( 'colors-dashed' ),
                    'heading' => esc_html_x( 'Pagination color', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select pagination color.', 'admin-view', 'pisces' ),
                    'param_holder_class' => 'vc_colored-dropdown',
                    'std' => 'grey',
                    'dependency' => array(
                        'element' => 'pagination_style',
                        'not_empty' => true,
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html_x( 'Extra class name', 'admin-view', 'pisces' ),
                    'param_name' => 'el_class',
                    'description' => esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html_x( 'CSS box', 'admin-view', 'pisces' ),
                    'param_name' => 'css',
                    'group' => esc_html_x( 'Design Options', 'admin-view', 'pisces' ),
                ),
            )
        ));
    }

    public function overrideTtaSection(){
        $shortcode_tag = 'vc_tta_section';
        $shortcode_object = vc_get_shortcode($shortcode_tag);
        $shortcode_params = $shortcode_object['params'];
        $i_type_idx = self::getParamIndex($shortcode_params,'i_type');
        $el_class_idx = self::getParamIndex($shortcode_params,'el_class');
        if($i_type_idx !== -1 && $el_class_idx !== -1){
            $el_class = $shortcode_params[$el_class_idx];
            $shortcode_params[$i_type_idx]['value'][esc_html_x('LaStudio Icon Outline', 'admin-view', 'pisces')] = 'la_icon_outline';
            $shortcode_params[$el_class_idx] = array (
                'type' => 'iconpicker',
                'heading' => _x( 'Icon', 'admin-view', 'pisces' ),
                'param_name' => 'i_icon_la_icon_outline',
                'value' => 'la-icon design-2_image',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'la_icon_outline',
                    'iconsPerPage' => 50,
                ),
                'dependency' => array(
                    'element' => 'i_type',
                    'value' => 'la_icon_outline',
                )
            );
            $shortcode_params[] = $el_class;
            vc_map_update($shortcode_tag , array(
                'params' => $shortcode_params
            ));
        }
    }

    public function modifyTtaTabsClasses($classes, $atts){
        if(isset($atts['style']) && strpos($atts['style'],'la-') !== false && isset($atts['alignment'])){
            $classes[] = 'vc_tta-' . $atts['style'];
            $classes[] = 'vc_tta-alignment-' . $atts['alignment'];
        }
        return $classes;
    }

    public function overrideTtaTour(){
        vc_map_update( 'vc_tta_tour', array(
            'category' => $this->category,
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'param_name' => 'style',
                    'value' => array(
                        esc_html_x( 'Pisces 01', 'admin-view', 'pisces' ) => 'la-1',
                    ),
                    'heading' => esc_html_x( 'Style', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs display style.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'tab_position',
                    'value' => array(
                        esc_html_x( 'Left', 'admin-view', 'pisces' ) => 'left',
                        esc_html_x( 'Right', 'admin-view', 'pisces' ) => 'right',
                    ),
                    'heading' => esc_html_x( 'Position', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tour navigation position.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'alignment',
                    'value' => array(
                        esc_html_x( 'Left', 'admin-view', 'pisces' ) => 'left',
                        esc_html_x( 'Right', 'admin-view', 'pisces' ) => 'right',
                        esc_html_x( 'Center', 'admin-view', 'pisces' ) => 'center',
                    ),
                    'heading' => esc_html_x( 'Alignment', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tabs section title alignment.', 'admin-view', 'pisces' ),
                    'std' => 'center',
                ),
                array(
                    'type' => 'hidden',
                    'param_name' => 'autoplay',
                    'std' => 'none',
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'controls_size',
                    'value' => array(
                        esc_html_x( 'Auto', 'admin-view', 'pisces' ) => '',
                        esc_html_x( 'Extra large', 'admin-view', 'pisces' ) => 'xl',
                        esc_html_x( 'Large', 'admin-view', 'pisces' ) => 'lg',
                        esc_html_x( 'Medium', 'admin-view', 'pisces' ) => 'md',
                        esc_html_x( 'Small', 'admin-view', 'pisces' ) => 'sm',
                        esc_html_x( 'Extra small', 'admin-view', 'pisces' ) => 'xs',
                    ),
                    'heading' => esc_html_x( 'Navigation width', 'admin-view', 'pisces' ),
                    'description' => esc_html_x( 'Select tour navigation width.', 'admin-view', 'pisces' ),
                ),

                array(
                    'type' => 'textfield',
                    'param_name' => 'active_section',
                    'heading' => esc_html_x( 'Active section', 'admin-view', 'pisces' ),
                    'value' => 1,
                    'description' => esc_html_x( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html_x( 'Extra class name', 'admin-view', 'pisces' ),
                    'param_name' => 'el_class',
                    'description' => esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'admin-view', 'pisces' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html_x( 'CSS box', 'admin-view', 'pisces' ),
                    'param_name' => 'css',
                    'group' => esc_html_x( 'Design Options', 'admin-view', 'pisces' ),
                ),
            )
        ));
    }

    public function overrideVcSection(){
        vc_add_params('vc_section', array(
            array(
                'type' => 'dropdown',
                'heading' => _x('Section Behaviour', 'admin-view', 'pisces'),
                'param_name' => 'fp_auto_height',
                'admin_label' => true,
                'value' => array(
                    _x('Full Height', 'admin-view', 'pisces') => 'off',
                    _x('Auto Height', 'admin-view', 'pisces') => 'on',
                    _x('Responsive Auto Height', 'admin-view', 'pisces') => 'responsive',
                    _x('Top Fixed Header', 'admin-view', 'pisces') => 'fixed_top',
                    _x('Bottom Fixed Footer', 'admin-view', 'pisces') => 'fixed_bottom',
                ),
                'description' => _x('Select section row behaviour.', 'admin-view', 'pisces'),
                'group' => esc_html_x('One Page Settings', 'admin-view', 'pisces'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'heading' => _x('Anchor', 'admin-view', 'pisces'),
                'param_name' => 'fp_anchor',
                'admin_label'   => true,
                'value' => '',
                'description' => _x('Enter an anchor (ID).', 'admin-view', 'pisces'),
                'dependency' => array('element' => 'fp_auto_height', 'value' => array('off', 'on', 'responsive')),
                'group' => esc_html_x('One Page Settings', 'admin-view', 'pisces'),
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'heading' => _x('Tooltip', 'admin-view', 'pisces'),
                'param_name' => 'fp_tooltip',
                'dependency' => array('element' => 'fp_auto_height', 'value' => array('off', 'on', 'responsive')),
                'value' => '',
                'group' => esc_html_x('One Page Settings', 'admin-view', 'pisces'),
            ),
            array(
                'type' => 'checkbox',
                'class' => '',
                'heading' => _x('Rows as Slides', 'admin-view', 'pisces'),
                'param_name' => 'fp_column_slide',
                'dependency' => array('element' => 'fp_auto_height', 'value' => array('off', 'on', 'responsive')),
                'value' => '',
                'group' => esc_html_x('One Page Settings', 'admin-view', 'pisces'),
                'description' => _x('Enable if you want to show each row in this section as slides.', 'admin-view', 'pisces'),
            ),
            array(
                'type' => 'checkbox',
                'class' => '',
                'heading' => _x('No Scrollbars', 'admin-view', 'pisces'),
                'param_name' => 'fp_no_scrollbar',
                'dependency' => array('element' => 'fp_auto_height', 'value' => array('off', 'on', 'responsive')),
                'value' => '',
                'group' => esc_html_x('One Page Settings', 'admin-view', 'pisces'),
                'description' => _x('Enable if scrolloverflow is enabled but you don\'t want to show scrollbars for this section.', 'admin-view', 'pisces'),
            )
        ));
    }

    protected function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }
        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name=>$value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = $this->arrayToObject($value);
                }
            }
            return $object;
        }
        else {
            return false;
        }
    }

    public static function getParamIndex($array, $attr){
        foreach ($array as $index => $entry) {
            if ($entry['param_name'] == $attr) {
                return $index;
            }
        }
        return -1;
    }

}