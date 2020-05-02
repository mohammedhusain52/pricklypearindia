<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Additional code settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function pisces_options_section_additional_code( $sections )
{
    $sections['additional_code'] = array(
        'name'          => 'additional_code_panel',
        'title'         => esc_html_x('Additional Code', 'admin-view', 'pisces'),
        'icon'          => 'fa fa-code',
        'fields'        => array(
            array(
                'id'        => 'google_key',
                'type'      => 'text',
                'title'     => esc_html_x('Google API Key', 'admin-view', 'pisces'),
                'desc'      => esc_html_x('Type your Google API Key here.', 'admin-view', 'pisces')
            ),
            array(
                'id'        => 'instagram_token',
                'type'      => 'text',
                'title'     => esc_html_x('Instagram Access Token', 'admin-view', 'pisces'),
                'info'      => sprintf( '%s <a href="%s" target="_blank">%s</a>',
                    esc_html_x('In order to display your photos you need an Access Token from Instagram. To get yours, You can use the button on', 'admin-view', 'pisces'),
                    'http://la-studioweb.com/tool/instagram-token-plugin.php',
                    esc_html_x('this page', 'admin-view', 'pisces')
                )
            ),
            array(
                'id'        => 'la_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'class'     => 'la-customizer-section-large',
                'title'     => esc_html_x('Custom CSS', 'admin-view', 'pisces'),
                'desc'      => esc_html_x('Paste your custom CSS code here.', 'admin-view', 'pisces'),
            ),
            array(
                'id'        => 'header_js',
                'type'      => 'ace_editor',
                'mode'      => 'javascript',
                'title'     => esc_html_x('Header Javascript Code', 'admin-view', 'pisces'),
                'desc'      => esc_html_x('Paste your custom JS code here. The code will be added to the header of your site.', 'admin-view', 'pisces')
            ),
            array(
                'id'        => 'footer_js',
                'type'      => 'ace_editor',
                'mode'      => 'javascript',
                'title'     => esc_html_x('Footer Javascript Code', 'admin-view', 'pisces'),
                'desc'     => esc_html_x('Paste your custom JS code here. The code will be added to the footer of your site.', 'admin-view', 'pisces')
            )
        )
    );
    return $sections;
}