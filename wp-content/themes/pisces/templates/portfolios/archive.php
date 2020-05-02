<?php
global $pisces_loop;

$tmp = $pisces_loop;

$loop_layout = Pisces()->settings->get('portfolio_display_type', 'grid');
$loop_style = Pisces()->settings->get('portfolio_display_style', '1');

$pisces_loop['loop_layout'] = $loop_layout;
$pisces_loop['loop_style'] = $loop_style;
$pisces_loop['responsive_column'] = Pisces()->settings->get('portfolio_column', array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1));
$pisces_loop['image_size'] = Pisces_Helper::get_image_size_from_string(Pisces()->settings->get('portfolio_thumbnail_size', 'full'),'full');
$pisces_loop['title_tag'] = 'h4';
$pisces_loop['excerpt_length'] = 15;
$pisces_loop['item_gap'] = (int) Pisces()->settings->get('portfolio_item_space', 0);

echo '<div id="archive_portfolio_listing" class="la-portfolio-listing">';

if( have_posts() ){

    get_template_part("templates/portfolios/{$loop_layout}/start", $loop_style);

    while( have_posts() ){

        the_post();

        get_template_part("templates/portfolios/{$loop_layout}/loop", $loop_style);

    }

    get_template_part("templates/portfolios/{$loop_layout}/end", $loop_style);

}

echo '</div>';
/**
 * Display pagination and reset loop
 */

pisces_the_pagination();

wp_reset_postdata();

$pisces_loop = $tmp;