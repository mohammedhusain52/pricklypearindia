<?php
global $pisces_loop;
$thumbnail_size     = !empty($pisces_loop['image_size']) ? $pisces_loop['image_size'] : 'thumbnail';
$title_tag      = !empty($pisces_loop['title_tag']) ? $pisces_loop['title_tag'] : 'h3';
$show_excerpt   = ( isset($pisces_loop['excerpt_length']) && 0 < absint($pisces_loop['excerpt_length']) ) ? true : false;

$post_class     = array('loop-item','grid-item','blog_item');
$post_class[]   = 'hide-excerpt';
?>
<article <?php post_class($post_class); ?>>
    <div class="blog_item--inner item-inner clearfix">
        <div class="blog_item--inner2 item-inner-wrap">
            <?php if(has_post_thumbnail()): ?>
                <div class="blog_item--thumbnail blog_item--thumbnail-with-effect">
                    <a href="<?php the_permalink();?>">
                        <?php Pisces()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                        <div class="item--overlay"></div>
                    </a>
                </div>
            <?php endif; ?>
            <div class="blog_item--info">
                <header class="blog_item--title entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="blog_item--meta entry-meta clearfix"><?php
                    pisces_entry_meta_item_postdate();
                ?></div><!-- .entry-meta -->
            </div>
        </div>
    </div>
</article>