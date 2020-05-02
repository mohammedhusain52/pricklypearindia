<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Portfolio settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function pisces_options_section_portfolio( $sections )
{
    $sections['portfolio'] = array(
        'name' => 'portfolio_panel',
        'title' => esc_html_x('Portfolio', 'admin-view', 'pisces'),
        'icon' => 'fa fa-th',
        'sections' => array(
            array(
                'name'      => 'portfolio_general_section',
                'title'     => esc_html_x('General Setting', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_archive_portfolio',
                        'type'      => 'image_select',
                        'title'     => esc_html_x('Archive Portfolio Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the layout of archive portfolio page', 'admin-view', 'pisces'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'main_full_width_archive_portfolio',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'inherit',
                        'title'     => esc_html_x('100% Main Width', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('[Portfolio] Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_opts()
                    ),
                    array(
                        'id'            => 'main_space_archive_portfolio',
                        'type'          => 'spacing',
                        'title'         => esc_html_x('Custom Main Space', 'admin-view', 'pisces'),
                        'desc'          => esc_html_x('[Portfolio]Leave empty if you not need', 'admin-view', 'pisces'),
                        'unit' 	        => 'px'
                    ),
                    array(
                        'id'        => 'portfolio_display_type',
                        'default'   => 'grid',
                        'title'     => esc_html_x('Display Type as', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the type display of portfolio for the archive page', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'grid'           => esc_html_x('Grid', 'admin-view', 'pisces'),
                            'masonry'        => esc_html_x('Masonry', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'portfolio_item_space',
                        'default'   => '0',
                        'title'     => esc_html_x('Item Padding', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Select gap between item in grids', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            '0'         => esc_html_x('0px', 'admin-view', 'pisces'),
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
                        'id'        => 'portfolio_display_style',
                        'default'   => '1',
                        'title'     => esc_html_x('Select Style', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'           => esc_html_x('Style 01', 'admin-view', 'pisces'),
                            '2'           => esc_html_x('Style 02', 'admin-view', 'pisces'),
                            '3'           => esc_html_x('Style 03', 'admin-view', 'pisces'),
                            '4'           => esc_html_x('Style 04', 'admin-view', 'pisces'),
                            '5'           => esc_html_x('Style 05', 'admin-view', 'pisces'),
                            '6'           => esc_html_x('Style 06', 'admin-view', 'pisces'),
                            '7'           => esc_html_x('Style 07', 'admin-view', 'pisces'),
                            '8'           => esc_html_x('Style 08', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'portfolio_column',
                        'type'      => 'column_responsive',
                        'title'     => esc_html_x('Portfolio Column', 'admin-view', 'pisces'),
                        'default'   => array(
                            'xlg' => 3,
                            'lg' => 3,
                            'md' => 2,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        )
                    ),
                    array(
                        'id'        => 'portfolio_per_page',
                        'type'      => 'number',
                        'default'   => 10,
                        'attributes'=> array(
                            'min' => 1,
                            'max' => 100
                        ),
                        'title'     => esc_html_x('Total Portfolio will be display in a page', 'admin-view', 'pisces')
                    ),
                    array(
                        'id'        => 'portfolio_thumbnail_size',
                        'type'      => 'text',
                        'default'   => 'full',
                        'title'     => esc_html_x('Portfolio Thumbnail size', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'admin-view', 'pisces')
                    )
                )
            ),
            array(
                'name'      => 'single_portfolio_general_section',
                'title'     => esc_html_x('Portfolio Single', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_single_portfolio',
                        'type'      => 'image_select',
                        'title'     => esc_html_x('Single Portfolio Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the layout of portfolio detail page', 'admin-view', 'pisces'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'single_portfolio_nextprev',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Show Next / Previous Portfolio', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display next/previous portfolio', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    )
                )
            )
        )
    );
    return $sections;
}