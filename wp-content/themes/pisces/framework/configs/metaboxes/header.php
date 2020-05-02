<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * MetaBox
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function pisces_metaboxes_section_header( $sections )
{
    $sections['header'] = array(
        'name'      => 'header',
        'title'     => esc_html_x('Header', 'admin-view', 'pisces'),
        'icon'      => 'laicon-header',
        'fields'    => array(
            array(
                'id'            => 'hide_header',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html_x('Hide header', 'admin-view', 'pisces'),
                'options'       => Pisces_Options::get_config_radio_opts(false)
            ),
            array(
                'id'            => 'header_layout',
                'type'          => 'select',
                'class'         => 'chosen',
                'title'         => esc_html_x('Header Layout', 'admin-view', 'pisces'),
                'desc'          => esc_html_x('Controls the layout of the header.', 'admin-view', 'pisces'),
                'default'       => 'inherit',
                'options'       => Pisces_Options::get_config_header_layout_opts(false, true),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            ),
            array(
                'id'            => 'header_full_width',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html_x('100% Header Width', 'admin-view', 'pisces'),
                'desc'          => esc_html_x('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'admin-view', 'pisces'),
                'options'       => Pisces_Options::get_config_radio_opts(),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            ),
            array(
                'id'            => 'header_transparency',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html_x('Enable Header Transparency', 'admin-view', 'pisces'),
                'options'       => Pisces_Options::get_config_radio_opts(),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            ),
            array(
                'id'            => 'header_sticky',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html_x('Enable Header Sticky', 'admin-view', 'pisces'),
                'options'       => array(
                    'inherit'   => esc_html_x('Inherit', 'admin-view', 'pisces'),
                    'no'        => esc_html_x('Disable', 'admin-view', 'pisces'),
                    'auto'      => esc_html_x('Activate when scroll up', 'admin-view', 'pisces'),
                    'yes'       => esc_html_x('Activate when scroll up & down', 'admin-view', 'pisces')
                ),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            )
        )
    );
    return $sections;
}