<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Pisces_FavoritePosts {

    public static $instance = null;

    public $setting = null;

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct(){

        $this->setting = array(
            'cookie_name'       => 'la_favorites',
            'user_meta_key'     => 'la_favorites',
            'meta_key'          => 'la_total_favorites',
            'cookie_life'       => MONTH_IN_SECONDS,
            'posttype_allow'    => array('post')
        );

        $this->init();

    }

    public function init(){
        add_action( 'wp_ajax_la_favorite_posts', array( $this, 'ajax_process' ) );
        add_action( 'wp_ajax_nopriv_la_favorite_posts', array( $this, 'ajax_process' ) );
    }

    public function ajax_process(){
        if(check_ajax_referer( 'favorite_posts', 'security', false )){
            if(!isset($_REQUEST['post_id'])){
                wp_send_json_error(array(
                    'message' => __('Invalid Post ID', 'pisces')
                ));
            }
            $post_id = absint($_REQUEST['post_id']);
            if(!$post_id){
                wp_send_json_error(array(
                    'message' => __('Invalid Post ID', 'pisces')
                ));
            }

            $method = ( !empty( $_REQUEST['type'] ) && $_REQUEST['type'] == 'remove' ? 'remove_favorite' : 'add_favorite' );

            $status = $this->$method($post_id);
            if($status){
                wp_send_json_success(array(
                    'count' => $status
                ));
            }
        }
        else{
            wp_send_json_error(array(
                'message' => __('Invalid security key', 'pisces')
            ));
        }
    }

    public function add_favorite( $post_id = 0 ){
        $post_type = get_post_type($post_id);
        if($post_type){
            $count = (int) get_post_meta($post_id, $this->setting['meta_key'], true);
            $lists = $this->get_favorite_lists();
            if ( !in_array($post_id, $lists) ) {
                $count = $count + 1;
                update_post_meta($post_id, $this->setting['meta_key'], $count);
                $lists[] = $post_id;
                $this->set_lists_for_user($lists);
                $this->set_lists_for_cookie($lists);
            }
            return $count;
        }
        return false;
    }

    public function remove_favorite( $post_id = 0 ){
        $post_type = get_post_type($post_id);
        if($post_type){
            $count = (int) get_post_meta($post_id, $this->setting['meta_key'], true);
            $count = max(0, $count - 1);
            $lists = $this->get_favorite_lists();

            if(($key = array_search($post_id, $lists)) !== false) {
                unset($lists[$key]);
                update_post_meta($post_id, $this->setting['meta_key'], $count);
                $this->set_lists_for_user($lists);
                $this->set_lists_for_cookie($lists);
            }

            return $count;
        }
        return false;
    }

    public function get_favorite_lists(){
        $lists = array_merge(
            $this->get_lists_from_cookie(),
            $this->get_lists_from_usermeta()
        );
        return array_values( array_unique( $lists ) );
    }

    public function get_lists_from_cookie( $site_id = null ){

        $lists = array();

        if (empty($_COOKIE[ $this->setting['cookie_name'] ])) return $lists;

        global $blog_id;
        $site_id = ( is_multisite() && is_null($site_id) ) ? $blog_id : $site_id;
        if ( !is_multisite() ) $site_id = 1;

        $values = json_decode(stripslashes($_COOKIE[$this->setting['cookie_name']]), true);

        if(empty($values)) return $lists;

        foreach( $values as $value ){
            if( isset($value['site_id']) && $value['site_id'] == $site_id ){
                $lists = $value['posts'];
                break;
            }
        }

        return $lists;
    }

    public function get_lists_from_usermeta( $user_login = '' ){

        $lists = array();

        if (!empty($user_login)){
            $user = get_user_by( 'login', $user_login );
            if(!$user) return $lists;
        }else{
            $user = wp_get_current_user();
            if(!$user->ID) return $lists;
        }

        $lists = get_user_meta( $user->ID , $this->setting['user_meta_key'], true);

        return !empty($lists) ? $lists : array();
    }

    public function set_lists_for_user( $lists = array(), $user_login = '' ){

        if(empty($lists)){
            return;
        }

        if (!empty($user_login)){
            $user = get_user_by( 'login', $user_login );
            if(!$user) return;
        }else{
            $user = wp_get_current_user();
            if(!$user->ID) return;
        }

        update_user_meta( $user->ID, $this->setting['user_meta_key'], $lists);
    }

    public function set_lists_for_cookie( $lists = array(), $site_id = null ) {

        global $blog_id;
        $site_id = ( is_multisite() && is_null($site_id) ) ? $blog_id : $site_id;
        if ( !is_multisite() ) $site_id = 1;

        $key = false;

        $values = array();

        if(!empty($_COOKIE[ $this->setting['cookie_name'] ])){
            $values = json_decode($_COOKIE[ $this->setting['cookie_name'] ], true);
            if(!empty($values)){
                foreach($values as $k => $value){
                    if( isset($value['site_id']) && $value['site_id'] == $site_id ){
                        $key = $k;
                        break;
                    }
                }
                if($key !== false){
                    $values[$key] = array(
                        'site_id'   => $site_id,
                        'posts'     => $lists
                    );
                }else{
                    $values[] = array(
                        'site_id'   => $site_id,
                        'posts'     => $lists
                    );
                }
            }else{
                $values[] = array(
                    'site_id'   => $site_id,
                    'posts'     => $lists
                );
            }
        }

        else {
            $values[] = array(
                'site_id'   => $site_id,
                'posts'     => $lists
            );
        }

        setcookie( $this->setting['cookie_name'], json_encode($values), time() + $this->setting['cookie_life'], '/' );
    }
}