<?php
add_action( 'tgmpa_register', 'pisces_register_required_plugins' );

if(!function_exists('pisces_register_required_plugins')){

	function pisces_register_required_plugins() {

        $initial_required = array(
            'lastudio-core' => array(
                'source'    => 'https://la-studioweb.com/file-resouces/pisces/plugins/lastudio-core/3.0.5/lastudio-core.zip',
                'version'   => '3.0.5'
            ),
            'pisces-demo-data' => array(
                'source'    => 'https://la-studioweb.com/file-resouces/pisces/plugins/pisces-demo-data/1.0.0/pisces-demo-data.zip',
                'version'   => '1.0.0'
            ),
            'revslider' => array(
                'source'    => 'https://la-studioweb.com/file-resouces/shared/plugins/revslider/6.1.5/revslider.zip',
                'version'   => '6.1.5'
            ),
            'js_composer' => array(
                'source'    => 'https://la-studioweb.com/file-resouces/shared/plugins/js_composer/6.0.5/js_composer.zip',
                'version'   => '6.0.5'
            )
        );

        $from_option = get_option('pisces_required_plugins_list', $initial_required);

		$plugins = array();

		$plugins[] = array(
			'name'					=> esc_html_x('WPBakery Visual Composer', 'admin-view', 'pisces'),
			'slug'					=> 'js_composer',
            'source'				=> isset($from_option['js_composer'], $from_option['js_composer']['source']) ? $from_option['js_composer']['source'] : $initial_required['js_composer']['source'],
            'required'				=> true,
            'version'				=> isset($from_option['js_composer'], $from_option['js_composer']['version']) ? $from_option['js_composer']['version'] : $initial_required['js_composer']['version']
		);

		$plugins[] = array(
			'name'					=> esc_html_x('LA Studio Core', 'admin-view', 'pisces'),
			'slug'					=> 'lastudio-core',
            'source'				=> isset($from_option['lastudio-core'], $from_option['lastudio-core']['source']) ? $from_option['lastudio-core']['source'] : $initial_required['lastudio-core']['source'],
            'required'				=> true,
            'version'				=> isset($from_option['lastudio-core'], $from_option['lastudio-core']['version']) ? $from_option['lastudio-core']['version'] : $initial_required['lastudio-core']['version']
		);

		$plugins[] = array(
			'name'					=> esc_html_x('Pisces Package Demo Data', 'admin-view', 'pisces'),
			'slug'					=> 'pisces-demo-data',
            'source'				=> isset($from_option['pisces-demo-data'], $from_option['pisces-demo-data']['source']) ? $from_option['pisces-demo-data']['source'] : $initial_required['pisces-demo-data']['source'],
            'required'				=> true,
            'version'				=> isset($from_option['pisces-demo-data'], $from_option['pisces-demo-data']['version']) ? $from_option['pisces-demo-data']['version'] : $initial_required['pisces-demo-data']['version']
		);

		$plugins[] = array(
			'name'     				=> esc_html_x('WooCommerce', 'admin-view', 'pisces'),
			'slug'     				=> 'woocommerce',
			'version'				=> '3.8.0',
			'required' 				=> false
		);

		$plugins[] = array(
			'name'					=> esc_html_x('Slider Revolution', 'admin-view', 'pisces'),
			'slug'					=> 'revslider',
            'source'				=> isset($from_option['revslider'], $from_option['revslider']['source']) ? $from_option['revslider']['source'] : $initial_required['revslider']['source'],
            'required'				=> false,
            'version'				=> isset($from_option['revslider'], $from_option['revslider']['version']) ? $from_option['revslider']['version'] : $initial_required['revslider']['version']
		);

		$plugins[] = array(
			'name'     				=> esc_html_x('Envato Market', 'admin-view', 'pisces'),
			'slug'     				=> 'envato-market',
			'source'   				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' 				=> false,
			'version' 				=> '2.0.3'
		);

		$plugins[] = array(
			'name' 					=> esc_html_x('Contact Form 7', 'admin-view', 'pisces'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false
		);

		$plugins[] = array(
			'name'     				=> esc_html_x('YITH WooCommerce Wishlist', 'admin-view', 'pisces'),
			'slug'     				=> 'yith-woocommerce-wishlist',
			'required' 				=> false
		);

		$plugins[] = array(
			'name'     				=> esc_html_x('YITH WooCommerce Compare', 'admin-view', 'pisces'),
			'slug'     				=> 'yith-woocommerce-compare',
			'required' 				=> false
		);

		$plugins[] = array(
			'name' 					=> esc_html_x('Easy Forms for MailChimp by YIKES', 'admin-view', 'pisces'),
			'slug' 					=> 'yikes-inc-easy-mailchimp-extender',
			'required' 				=> false
		);

		$config = array(
			'id'           				=> 'pisces',
			'default_path' 				=> '',
			'menu'         				=> 'tgmpa-install-plugins',
			'has_notices'  				=> true,
			'dismissable'  				=> true,
			'dismiss_msg'  				=> '',
			'is_automatic' 				=> false,
			'message'      				=> ''
		);

		tgmpa( $plugins, $config );

	}

}