<?php

global $wp_query, $wp_rewrite, $pisces_loop;

$blog_item_space = Pisces()->settings->get('blog_item_space', 'default');

if($blog_item_space == 'zero'){
    $blog_item_space = 0;
}

$blog_design = Pisces()->settings->get('blog_design', 'grid_4');
$blog_columns = wp_parse_args( (array) Pisces()->settings->get('blog_post_column'), array('lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1, 'mb' => 1) );
$blog_masonry = ( Pisces()->settings->get('blog_masonry') == 'on' ) ? true : false;
$blog_pagination_type = Pisces()->settings->get('blog_pagination_type', 'pagination');
$css_classes = array( 'la-loop', 'showposts-loop', 'blog-main-loop' );
$css_classes[] = 'blog-pagination-type-' . $blog_pagination_type;
$css_classes[] = 'blog-' . $blog_design;
$css_classes[] = 'grid-items';
$css_classes[] = 'grid-space-' . $blog_item_space;
if( false === strpos( $blog_design, 'list') ){
    $css_classes[] = 'blog-' . str_replace('grid_', '', $blog_design);
    foreach( $blog_columns as $screen => $value ){
        $css_classes[] = $screen . '-grid-'. $value .'-items';
    }
}

$data_js_component = array();

if($blog_masonry){
    $css_classes[] = 'js-el la-isotope-container';
    $data_js_component[] = 'DefaultMasonry';
}
$page_path = '';
if($blog_pagination_type == 'infinite_scroll'){
    $css_classes[] = 'js-el la-infinite-container';
    $data_js_component[] = 'InfiniteScroll';
}
if($blog_pagination_type == 'load_more'){
    $css_classes[] = 'js-el la-infinite-container infinite-show-loadmore';
    $data_js_component[] = 'InfiniteScroll';
}
if($blog_pagination_type == 'infinite_scroll' || $blog_pagination_type == 'load_more'){
    $page_link = get_pagenum_link();
    if ( !$wp_rewrite->using_permalinks() || is_admin() || strpos($page_link, '?') ) {
        if (strpos($page_link, '?') !== false)
            $page_path = apply_filters( 'get_pagenum_link', $page_link . '&amp;paged=');
        else
            $page_path = apply_filters( 'get_pagenum_link', $page_link . '?paged=');
    }
    else {
        $page_path = apply_filters( 'get_pagenum_link', $page_link . user_trailingslashit( $wp_rewrite->pagination_base . "/" ));
    }
}

$pisces_loop['blog_design'] = $blog_design;
?>
<div
    class="<?php echo esc_attr(implode(' ', $css_classes)); ?>"
    <?php if(!empty($data_js_component)) echo 'data-la_component="'. esc_attr(json_encode($data_js_component)) .'"'; ?>
    data-item_selector=".blog_item"
    data-page_num="<?php echo esc_attr( get_query_var('paged') ? get_query_var('paged') : 1 ) ?>"
    data-page_num_max="<?php echo esc_attr( $wp_query->max_num_pages ? $wp_query->max_num_pages : 1 ) ?>"
    data-path="<?php echo esc_url( $page_path ) ?>">