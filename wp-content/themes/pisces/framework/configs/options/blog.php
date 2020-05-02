<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Blog settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function pisces_options_section_blog( $sections )
{
    $sections['blog'] = array(
        'name'          => 'blog_panel',
        'title'         => esc_html_x('Blog', 'admin-view', 'pisces'),
        'icon'          => 'fa fa-newspaper-o',
        'sections' => array(
            array(
                'name'      => 'blog_general_section',
                'title'     => esc_html_x('General Blog', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_blog',
                        'type'      => 'image_select',
                        'title'     => esc_html_x('Blog Page Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'admin-view', 'pisces'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, true)
                    ),
                    array(
                        'id'        => 'blog_small_layout',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Enable Small Layout', 'admin-view', 'pisces'),
                        'dependency' => array('layout_blog_col-1c', '==', 'true'),
                        'options'   => array(
                            'on'        => esc_html_x('On', 'admin-view', 'pisces'),
                            'off'       => esc_html_x('Off', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'page_title_bar_layout_blog_global',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Page Title Bar', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show the page title bar for the assigned blog page in "settings > reading" or blog archive pages', 'admin-view', 'pisces'),
                        'options'   => array(
                            'on'        => esc_html_x('On', 'admin-view', 'pisces'),
                            'off'       => esc_html_x('Off', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'blog_design',
                        'default'   => 'grid_4',
                        'title'     => esc_html_x('Blog Design', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the layout for the assigned blog page in "settings > reading" or blog archive pages', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'grid_1'        => esc_html_x('Grid Style 01', 'admin-view', 'pisces'),
                            'grid_2'        => esc_html_x('Grid Style 02', 'admin-view', 'pisces'),
                            'grid_3'        => esc_html_x('Grid Style 03', 'admin-view', 'pisces'),
                            'grid_4'        => esc_html_x('Grid Style 04', 'admin-view', 'pisces'),
                            'grid_5'        => esc_html_x('Grid Style 05', 'admin-view', 'pisces'),
                            'grid_6'        => esc_html_x('Grid Style 06', 'admin-view', 'pisces'),
                            'grid_7'        => esc_html_x('Grid Style 07', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'      => 'blog_post_column',
                        'default'   => array(
                            'xlg' => 1,
                            'lg' => 1,
                            'md' => 1,
                            'sm' => 1,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html_x('Blog Post Columns', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the amount of columns for the grid layout when using it for the assigned blog page in "settings > reading" or blog archive pages or search results page.', 'admin-view', 'pisces'),
                        'type'      => 'column_responsive',
                        'dependency' => array('blog_design', 'any', 'grid_1,grid_2,grid_3,grid_4,grid_5,grid_6,grid_7'),
                    ),
                    array(
                        'id'        => 'blog_item_space',
                        'default'   => 'default',
                        'title'     => esc_html_x('Blog Item Space', 'admin-view', 'pisces'),
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
                        'id'        => 'featured_images_blog',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Featured Image on Blog Archive Page', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display featured images on the blog or archive pages.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),

                    array(
                        'id'        => 'blog_thumbnail_size',
                        'type'      => 'text',
                        'default'   => 'full',
                        'title'     => esc_html_x('Blog Image Size', 'admin-view', 'pisces'),
                        'dependency' => array('featured_images_blog_on', '==', 'true'),
                        'desc'      => esc_html_x('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'admin-view', 'pisces')
                    ),
                    array(
                        'id'        => 'format_content_blog',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Format content on Blog Archive Page', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display format content on the blog or archive pages.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false),
                        'dependency' => array('featured_images_blog_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'blog_content_display',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'excerpt',
                        'title'     => esc_html_x('Blog Content Display', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls if the blog content displays an excerpt or full content for the assigned blog page in "settings > reading" or blog archive pages.', 'admin-view', 'pisces'),
                        'options'   => array(
                            'excerpt'   => esc_html_x('Excerpt', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'blog_excerpt_length',
                        'type'      => 'slider',
                        'default'   => 20,
                        'title'     => esc_html_x( 'Excerpt Length', 'admin-view', 'pisces' ),
                        'desc'      => esc_html_x('Controls the number of words in the post excerpts for the assigned blog page in "settings > reading" or blog archive pages.', 'admin-view', 'pisces'),
                        'options'   => array(
                            'step'    => 1,
                            'min'     => 0,
                            'max'     => 500,
                            'unit'    => ''
                        ),
                        'dependency' => array('blog_content_display_excerpt', '==', 'true')
                    ),
                    array(
                        'id'        => 'blog_masonry',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Enable Blog Masonry', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false),
                        'dependency' => array('blog_design', 'any', 'grid_1,grid_2,grid_3,grid_4,grid_5,grid_6,grid_7'),
                    ),
                    array(
                        'id'        => 'blog_pagination_type',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'pagination',
                        'title'     => esc_html_x('Pagination Type', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls the pagination type for the assigned blog page in "settings > reading" or blog pages.', 'admin-view', 'pisces'),
                        'options'   => array(
                            'pagination' => esc_html_x('Pagination', 'admin-view', 'pisces'),
                            'infinite_scroll' => esc_html_x('Infinite Scroll', 'admin-view', 'pisces'),
                            'load_more' => esc_html_x('Load More Button', 'admin-view', 'pisces')
                        )
                    )
                )
            ),
            array(
                'name'      => 'blog_single_section',
                'title'     => esc_html_x('Blog Single Post', 'admin-view', 'pisces'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_single_post',
                        'type'      => 'image_select',
                        'title'     => esc_html_x('Single Page Layout', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'admin-view', 'pisces'),
                        'default'   => 'inherit',
                        'radio'     => true,
                        'options'   => Pisces_Options::get_config_main_layout_opts(true, true)
                    ),
                    array(
                        'id'        => 'single_small_layout',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Enable Small Layout', 'admin-view', 'pisces'),
                        'dependency' => array('layout_single_post_col-1c', '==', 'true'),
                        'options'   => array(
                            'on'        => esc_html_x('On', 'admin-view', 'pisces'),
                            'off'       => esc_html_x('Off', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'page_title_bar_layout_post_single_global',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Page Title Bar', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to show the page title bar for the single post', 'admin-view', 'pisces'),
                        'options'   => array(
                            'on'        => esc_html_x('On', 'admin-view', 'pisces'),
                            'off'       => esc_html_x('Off', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'featured_images_single',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html_x('Featured Image / Video on Single Blog Post', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display featured images and videos on single blog posts.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'single_post_thumbnail_size',
                        'type'      => 'text',
                        'default'   => 'full',
                        'title'     => esc_html_x('Featured Image Size', 'admin-view', 'pisces'),
                        'dependency' => array('featured_images_single_on', '==', 'true'),
                        'desc'      => esc_html_x('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'admin-view', 'pisces')
                    ),
                    array(
                        'id'        => 'blog_pn_nav',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Previous/Next Pagination', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the previous/next post pagination for single blog posts.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'blog_post_title',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'below',
                        'title'     => esc_html_x('Post Title', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Controls if the post title displays above or below the featured post image or is disabled.', 'admin-view', 'pisces'),
                        'options'   => array(
                            'below'        => esc_html_x('Below', 'admin-view', 'pisces'),
                            'above'        => esc_html_x('Above', 'admin-view', 'pisces'),
                            'off'          => esc_html_x('Disabled', 'admin-view', 'pisces')
                        )
                    ),
                    array(
                        'id'        => 'blog_author_info',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Author Info Box', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the author info box below posts.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'blog_social_sharing_box',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Social Sharing Box', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display the social sharing box.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'blog_related_posts',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Related Posts', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display related posts.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'blog_related_design',
                        'default'   => '1',
                        'title'     => esc_html_x('Related Design', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'        => esc_html_x('Style 1', 'admin-view', 'pisces')
                        ),
                        'dependency' => array('blog_related_posts_on', '==', 'true'),
                    ),
                    array(
                        'id'        => 'blog_related_by',
                        'default'   => 'random',
                        'title'     => esc_html_x('Related Posts By', 'admin-view', 'pisces'),
                        'type'      => 'select',
                        'options'   => array(
                            'category'      => esc_html_x('Category', 'admin-view', 'pisces'),
                            'tag'           => esc_html_x('Tag', 'admin-view', 'pisces'),
                            'both'          => esc_html_x('Category & Tag', 'admin-view', 'pisces'),
                            'random'        => esc_html_x('Random', 'admin-view', 'pisces')

                        ),
                        'dependency' => array('blog_related_posts_on', '==', 'true'),
                    ),
                    array(
                        'id'        => 'blog_related_max_post',
                        'type'      => 'slider',
                        'default'   => 1,
                        'title'     => esc_html_x( 'Maximum Related Posts', 'admin-view', 'pisces' ),
                        'options'   => array(
                            'step'    => 1,
                            'min'     => 1,
                            'max'     => 10,
                            'unit'    => ''
                        ),
                        'dependency' => array('blog_related_posts_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'blog_comments',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html_x('Comments', 'admin-view', 'pisces'),
                        'desc'      => esc_html_x('Turn on to display comments.', 'admin-view', 'pisces'),
                        'options'   => Pisces_Options::get_config_radio_onoff(false)
                    )
                )
            )
        )
    );
    return $sections;
}