<?php

global $pisces_loop;

$blog_design            = isset($pisces_loop['blog_design']) ? $pisces_loop['blog_design'] : 'grid';
$title_tag              = 'h2';
$show_featured_image    = (Pisces()->settings->get('featured_images_blog') == 'on') ? true : false;
$show_format_content    = false;
$tmp_img_size           = Pisces_Helper::get_image_size_from_string(Pisces()->settings->get('blog_thumbnail_size', 'full'), 'full');
$content_display_type   = ( Pisces()->settings->get('blog_content_display', 'excerpt') == 'excerpt') ? 'excerpt' : 'full';
$post_class             = array('loop-item','grid-item', 'blog_item');

$style          = str_replace('grid_', '', $blog_design);

if($show_featured_image){
    $show_format_content    = (Pisces()->settings->get('format_content_blog') == 'on') ? true : false;
}

if($show_featured_image){
    $post_class[] = 'show-featured-image';
    if(!has_post_thumbnail()){
        $post_class[] = 'no-featured-image';
    }
}else{
    $post_class[] = 'hide-featured-image';
}
if($show_format_content){
    $post_class[] = 'show-format-content';
}else{
    $post_class[] = 'hide-format-content';
}
if($content_display_type != 'full' && !Pisces()->settings->get('blog_excerpt_length')){
    $post_class[] = 'hide-excerpt';
}

$thumbnail_size = $tmp_img_size;

$loop_index = isset($pisces_loop['loop_index']) ? $pisces_loop['loop_index'] : 0;
$loop_index++;
$pisces_loop['loop_index'] = $loop_index;


$thumbnail_size = apply_filters('pisces/filter/blog/post_thumbnail', $thumbnail_size, $pisces_loop);
?>
<article <?php post_class($post_class); ?>>
    <div class="blog_item--inner item-inner">
        <div class="blog_item--inner2 item-inner-wrap">
            <?php
            if($show_featured_image){
                $flag_format_content = false;
                if($show_format_content){
                    switch(get_post_format()){
                        case 'link':
                            $link = Pisces()->settings->get_post_meta( get_the_ID(), 'format_link' );
                            if(!empty($link)){
                                printf(
                                    '<div class="blog_item--thumbnail format-link">%2$s<div class="format-content">%1$s</div><a class="post-link-overlay" href="%1$s"></a></div>',
                                    esc_url($link),
                                    (has_post_thumbnail() ? Pisces()->images->get_post_thumbnail(get_the_ID(), $thumbnail_size) : '')
                                );
                                $flag_format_content = true;
                            }
                            break;
                        case 'quote':
                            $quote_content = Pisces()->settings->get_post_meta(get_the_ID(), 'format_quote_content');
                            $quote_author = Pisces()->settings->get_post_meta(get_the_ID(), 'format_quote_author');
                            $quote_background = Pisces()->settings->get_post_meta(get_the_ID(), 'format_quote_background');
                            $quote_color = Pisces()->settings->get_post_meta(get_the_ID(), 'format_quote_color');
                            if(!empty($quote_content)){
                                $quote_content = '<p class="format-quote-content">'. $quote_content .'</p>';
                                if(!empty($quote_author)){
                                    $quote_content .= '<span class="quote-author">'. $quote_author .'</span>';
                                }
                                $styles = array();
                                $styles[] = 'background-color:' . $quote_background;
                                $styles[] = 'color:' . $quote_color;
                                printf(
                                    '<div class="blog_item--thumbnail format-quote" style="%3$s"><div class="format-content">%1$s</div><a class="post-link-overlay" href="%2$s"></a></div>',
                                    $quote_content,
                                    get_the_permalink(),
                                    esc_attr( implode(';', $styles) )
                                );
                                $flag_format_content = true;
                            }

                            break;

                        case 'gallery':
                            $ids = Pisces()->settings->get_post_meta(get_the_ID(), 'format_gallery');
                            $ids = explode(',', $ids);
                            $ids = array_map('trim', $ids);
                            $ids = array_map('absint', $ids);
                            $__tmp = '';
                            if(!empty( $ids )){
                                foreach($ids as $image_id){
                                    $__tmp .= sprintf('<div><a href="%1$s">%2$s</a></div>',
                                        get_the_permalink(),
                                        Pisces()->images->get_attachment_image( $image_id, $thumbnail_size)
                                    );
                                }
                            }
                            if(has_post_thumbnail()){
                                $__tmp .= sprintf('<div><a href="%1$s">%2$s</a></div>',
                                    get_the_permalink(),
                                    Pisces()->images->get_post_thumbnail(get_the_ID(), $thumbnail_size )
                                );
                            }
                            if(!empty($__tmp)){
                                printf(
                                    '<div class="blog_item--thumbnail format-gallery"><div data-la_component="AutoCarousel" class="js-el la-slick-slider" data-slider_config="%1$s">%2$s</div></div>',
                                    esc_attr(json_encode(array(
                                        'slidesToShow' => 1,
                                        'slidesToScroll' => 1,
                                        'dots' => false,
                                        'arrows' => true,
                                        'speed' => 300,
                                        'autoplay' => false,
                                        'prevArrow'=> '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                                        'nextArrow'=> '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
                                    ))),
                                    $__tmp
                                );
                                $flag_format_content = true;
                            }
                            break;

                    }
                }
                if(!$flag_format_content && has_post_thumbnail()){ ?>
                    <div class="blog_item--thumbnail blog_item--thumbnail-with-effect">
                        <a href="<?php the_permalink();?>">
                            <?php Pisces()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                            <span class="pf-icon pf-icon-<?php echo get_post_format() ? get_post_format() : 'standard' ?>"></span>
                            <div class="item--overlay"></div>
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="blog_item--info clearfix">
                <?php
                if( $style == 1 || $style == 2 || $style == 3 || $style == 7) {
                    pisces_entry_meta_item_category_list('<div class="blog_item--category-link">', '</div>', '');
                }
                ?>
                <header class="blog_item--title entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="blog_item--meta entry-meta clearfix"><?php
                    pisces_entry_meta_item_author();
                    pisces_entry_meta_item_postdate();
                    if( $style == 4 || $style == 5 ) {
                        pisces_entry_meta_item_category_list('<div class="blog_item--category-link">','</div>','');
                    }
                    ?></div><!-- .entry-meta -->
                <?php
                if($content_display_type != 'full'){
                    if( Pisces()->settings->get('blog_excerpt_length') ){
                        echo '<div class="blog_item--excerpt entry-excerpt">';
                        the_excerpt();
                        echo '</div>';
                    }
                }
                else{
                    echo '<div class="blog_item--excerpt entry-content">';
                    the_content( esc_html_x( 'Continue reading', 'front-view', 'pisces' ) );
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html_x( 'Pages:', 'front-view', 'pisces' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html_x( 'Page', 'front-view', 'pisces' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                    echo '</div>';
                }
                ?>
                <?php if($content_display_type != 'full' && Pisces()->settings->get('blog_excerpt_length') ) :?>
                    <footer class="blog_item--meta-footer clearfix">
                        <a class="btn btn-style-outline btn-size-sm btn-color-gray btn-shape-round btn-brw-2" href="<?php the_permalink();?>"><?php echo esc_html_x('Read more', 'front-view', 'pisces'); ?></a>
                        <?php if( $style == 2 || $style == 3 || $style == 7 ) :?>
                            <div class="la-sharing-posts">
                                <span><i class="fa fa-share-alt"></i></span>
                                <?php pisces_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '')); ?>
                            </div>
                            <?php
                            pisces_get_favorite_link();
                            pisces_entry_meta_item_comment_post_link_with_icon();
                            ?>
                        <?php endif; ?>
                    </footer>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>