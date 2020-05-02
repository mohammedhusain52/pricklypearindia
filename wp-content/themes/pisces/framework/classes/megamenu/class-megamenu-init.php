<?php if ( ! defined( 'ABSPATH' ) ) { die; }

if(!class_exists('Pisces_MegaMenu_Init')){
    class Pisces_MegaMenu_Init{

        protected static $fields = array();

        protected static $default_metakey = '';

        private static $instance = null;

        public static function get_instance() {
            if ( null === static::$instance ) {
                static::$instance = new self();
            }
            return static::$instance;
        }
        private function __construct( ) {
            add_action( 'wp_loaded',                        array( $this, 'loadWalkerEdit' ), 9);
            add_filter( 'wp_setup_nav_menu_item',           array( $this, 'setupNavMenuItem' ));
            add_action( 'wp_nav_menu_item_custom_fields',   array( $this, 'addCustomFields' ), 10, 4);
            add_action( 'wp_update_nav_menu_item',          array( $this, 'updateMenuItem' ), 10, 3);
            add_filter( 'nav_menu_item_title',              array( $this, 'addIconToMenuItem' ),10, 4);
            add_filter( 'nav_menu_css_class',               array( $this, 'nav_menu_css_class' ),10, 4);

            $query_args = array(
                'post_type'         => 'la_block',
                'orderby'           => 'title',
                'order'             => 'ASC',
                'posts_per_page'    => 20
            );

            self::$default_metakey = '_mm_meta';
            self::$fields = array(
                'icon' => array(
                    'id'    => 'icon',
                    'type'  => 'icon',
                    'title' => esc_html__('Custom Icon','pisces')
                ),
                'nolink' => array(
                    'id'    => 'nolink',
                    'type'  => 'switcher',
                    'title' => esc_html__("Don't link",'pisces')
                ),
                'only_icon' => array(
                    'id'    => 'only_icon',
                    'type'  => 'switcher',
                    'title' => esc_html__("Show Only Icon",'pisces')
                ),
                'hide' => array(
                    'id'    => 'hide',
                    'type'  => 'switcher',
                    'title' => esc_html__("Don't show a link",'pisces')
                ),
                'menu_type' => array(
                    'id'    => 'menu_type',
                    'type'  => 'select',
                    'title' => esc_html__('Menu Type','pisces'),
                    'options' => array(
                        'narrow'      => esc_html__('Narrow','pisces'),
                        'wide'  => esc_html__('Wide','pisces')
                    ),
                    'default' => 'narrow'
                ),
                'submenu_position' => array(
                    'id'    => 'submenu_position',
                    'type'  => 'select',
                    'title' => esc_html__('SubMenu Position','pisces'),
                    'info' => esc_html__('Apply for parent with "Menu Type" is "narrow"','pisces'),
                    'options' => array(
                        'right'     => esc_html__('Right','pisces'),
                        'left'      => esc_html__('Left','pisces'),
                    ),
                    'default'   => 'right'
                ),
                'force_full_width' => array(
                    'id'    => 'force_full_width',
                    'type'  => 'switcher',
                    'title' => esc_html__('Force Full Width','pisces'),
                    'info' => esc_html__('Set 100% window width for popup','pisces')
                ),
                'popup_max_width' => array(
                    'id'    => 'popup_max_width',
                    'type'  => 'number',
                    'title' => esc_html__('Popup Max Width','pisces'),
                    'after' => 'px',
                    'wrap_class' => 'la-element-popup-max-width'
                ),
                'popup_column' => array(
                    'id'    => 'popup_column',
                    'type'  => 'select',
                    'title' => esc_html__('Popup Columns','pisces'),
                    'options' => array(
                        '1'         => esc_html__('1 Column','pisces'),
                        '2'         => esc_html__('2 Columns','pisces'),
                        '3'         => esc_html__('3 Columns','pisces'),
                        '4'         => esc_html__('4 Columns','pisces'),
                        '5'         => esc_html__('5 Columns','pisces'),
                        '6'         => esc_html__('6 Columns','pisces')
                    ),
                    'default'   => '4'
                ),
                'item_column' => array(
                    'id'    => 'item_column',
                    'type'  => 'text',
                    'title' => esc_html__('Columns','pisces'),
                    'desc' => esc_html__('will occupy x columns of parent popup columns', 'pisces')
                ),
                'block' => array(
                    'id'            => 'block',
                    'type'           => 'select',
                    'title'         => esc_html__('Custom Block Before Menu Item','pisces'),
                    'options'       => 'posts',
                    'query_args'    => $query_args,
                    'default_option' => esc_html__('Select a block','pisces')
                ),
                'block2' => array(
                    'id'            => 'block2',
                    'type'          => 'select',
                    'title'         => esc_html__('Custom Block After Menu Item','pisces'),
                    'options'       => 'posts',
                    'query_args'    => $query_args,
                    'default_option' => esc_html__('Select a block','pisces')
                ),
                'popup_background' => array(
                    'id'           => 'popup_background',
                    'type'         => 'background',
                    'title' 	   => esc_html__('Popup Background','pisces')
                ),
                'tip_label' => array(
                    'id'        => 'tip_label',
                    'type'      => 'text',
                    'title' 	=> esc_html__('Tip Label','pisces')
                ),
                'tip_color' => array(
                    'id'        => 'tip_color',
                    'type'      => 'color_picker',
                    'title' 	=> esc_html__('Tip Color','pisces')
                ),
                'tip_background_color' => array(
                    'id'        => 'tip_background_color',
                    'type'      => 'color_picker',
                    'title' 	=> esc_html__('Tip Background','pisces')
                )
            );
        }

        public function loadWalkerEdit() {
            add_filter( 'wp_edit_nav_menu_walker', array( $this, 'findWalkerEdit' ), 99 );
        }

        public function findWalkerEdit( $walker ) {
            $walker = 'Pisces_MegaMenu_Walker_Edit';
            return $walker;
        }

        public function setupNavMenuItem($menu_item){
            $meta_value = Pisces()->settings->get_post_meta($menu_item->ID, '', self::$default_metakey, true);
            foreach ( self::$fields as $key => $value ){
                $menu_item->$key = isset($meta_value[$key]) ? $meta_value[$key] : '';
            }
            return $menu_item;
        }

        public function updateMenuItem( $menu_id, $menu_item_db_id, $menu_item_args ) {
            if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
                return;
            }
            check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

            $key = self::$default_metakey;

            if ( ! empty( $_POST[$key][$menu_item_db_id] ) ) {
                $value = $_POST[$key][$menu_item_db_id];
            }
            else {
                $value = null;
            }

            if(!empty($value)){
                update_post_meta( $menu_item_db_id, $key, $value );
            }
            else {
                delete_post_meta( $menu_item_db_id, $key );
            }
        }

        public function addCustomFields( $id, $item, $depth, $args ) {
            if(function_exists('la_fw_add_element')){
                ?><div class="lastudio-megamenu-settings description-wide la-content">
                <h3><?php esc_html_e('MegaMenu Settings','pisces');?></h3>
                <div class="lastudio-megamenu-custom-fields">
                    <?php
                    foreach ( self::$fields as $key => $field ) {
                        $unique     = self::$default_metakey . '['.$item->ID.']';
                        $default    = ( isset( $field['default'] ) ) ? $field['default'] : '';
                        $elem_id    = ( isset( $field['id'] ) ) ? $field['id'] : '';

                        $field['name'] = $unique. '[' . $elem_id . ']';
                        $field['id'] = $elem_id . '_' . $item->ID;
                        $elem_value =  isset($item->$key) ? $item->$key : $default;
                        echo la_fw_add_element( $field, $elem_value, $unique );
                    }
                    ?>
                </div>
                </div><?php
            }
        }

        public function addIconToMenuItem($output, $item, $args, $depth){
            if ( !is_a( $args->walker, 'Pisces_MegaMenu_Walker' ) && $item->icon){
                $icon_class = 'mm-icon ' . $item->icon;
                $icon = "<i class=\"".esc_attr($icon_class)."\"></i>";
                $output = $icon . $output;
            }
            return $output;
        }

        public function nav_menu_css_class( $classes, $item, $args, $depth ){
            if(!is_a( $args->walker, 'Pisces_MegaMenu_Walker' )){
                if ( $item->hide ) {
                    $classes[] = "mm-item-hide";
                }
                if ( $item->nolink ) {
                    $classes[] = "mm-item-nolink";
                }
                if ( $item->only_icon ) {
                    $classes[] = "mm-item-onlyicon";
                }
            }
            return $classes;
        }
    }
}