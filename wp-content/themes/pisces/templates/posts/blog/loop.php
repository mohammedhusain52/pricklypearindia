<?php
global $pisces_loop;
$thumbnail_size = !empty($pisces_loop['image_size']) ? $pisces_loop['image_size'] : 'thumbnail';
$title_tag      = !empty($pisces_loop['title_tag']) ? $pisces_loop['title_tag'] : 'h3';
$show_excerpt   = ( isset($pisces_loop['excerpt_length']) && 0 < absint($pisces_loop['excerpt_length']) ) ? true : false;
$style          = isset($pisces_loop['loop_style']) ? $pisces_loop['loop_style'] : 1;

$post_class     = array('loop-item','grid-item','blog_item');
$post_class[]   = ( $show_excerpt ? 'show' : 'hide' ) .  '-excerpt';
if(!has_post_thumbnail()){
    $post_class[] = 'no-featured-image';
}
?>
<article <?php post_class($post_class); ?>>
    <div class="blog_item--inner item-inner">
        <div class="blog_item--inner2 item-inner-wrap">
            <?php if(has_post_thumbnail()): ?>
                <div class="blog_item--thumbnail blog_item--thumbnail-with-effect">
                    <a href="<?php the_permalink();?>">
                        <?php Pisces()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                        <span class="pf-icon pf-icon-link"></span>
                        <div class="item--overlay"></div>
                    </a>
                </div>
            <?php endif; ?>
            <div class="blog_item--info clearfix">
                <?php
                if( $style == 1 || $style == 2 || $style == 3 || $style == 7) {
                    pisces_entry_meta_item_category_list('<div class="blog_item--category-link">', '</div>', '');
                }
                ?>
                <div class="blog_item--title entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </div>
                <div class="blog_item--meta entry-meta clearfix"><?php
                    pisces_entry_meta_item_author();
                    pisces_entry_meta_item_postdate();
                    if( $style == 4 || $style == 5 ) {
                        pisces_entry_meta_item_category_list('<div class="blog_item--category-link">','</div>','');
                    }
                    ?></div><!-- .entry-meta -->
                <?php if($show_excerpt): ?>
                    <div class="blog_item--excerpt entry-excerpt"><?php the_excerpt(); ?></div>
                <?php endif; ?>
                <div class="blog_item--meta-footer clearfix">
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
                </div>
            </div>
        </div>
    </div>
</article>