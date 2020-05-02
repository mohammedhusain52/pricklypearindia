<?php
global $pisces_loop;

$loop_index     = isset($pisces_loop['loop_index']) ? absint($pisces_loop['loop_index']) : 0;
$loop_index++;
$pisces_loop['loop_index'] = $loop_index;

$loop_id        = isset($pisces_loop['loop_id']) ? $pisces_loop['loop_id'] : uniqid('la_pf_');

$image_size     = isset($pisces_loop['image_size']) && !empty($pisces_loop['image_size']) ? $pisces_loop['image_size'] : 'full';
$title_tag      = isset($pisces_loop['title_tag']) && !empty($pisces_loop['title_tag']) ? $pisces_loop['title_tag'] : 'h3';
$post_class     = array('loop-item','grid-item','portfolio-item');

$item_sizes     = !empty($pisces_loop['item_sizes']) ? $pisces_loop['item_sizes']: array();
$item_w         = 1;
$item_h         = 1;
if(!empty($item_sizes[$loop_index-1]['w']) && ( $_tmp_size = $item_sizes[$loop_index-1]['w'] )){
    $item_w = $_tmp_size;
}
if(!empty($item_sizes[$loop_index-1]['h']) && ( $_tmp_size = $item_sizes[$loop_index-1]['h'] )){
    $item_h = $_tmp_size;
}
if(!empty($item_sizes[$loop_index-1]['s'])){
    $thumbnail_size = $item_sizes[$loop_index-1]['s'];
}else{
    $thumbnail_size = $image_size;
}

$thumbnail_size = apply_filters('pisces/filter/portfolio/post_thumbnail', $thumbnail_size, $pisces_loop);

$thumbnail_url = Pisces()->images->get_post_thumbnail_url( get_the_ID(), $thumbnail_size);
?>
<div <?php post_class($post_class); ?> data-width="<?php echo esc_attr($item_w);?>" data-height="<?php echo esc_attr($item_h);?>">
    <div class="item-inner">
        <div class="item-thumb-cover">
            <div class="cover-img" style="background-image: url(<?php echo esc_url($thumbnail_url) ?>)">
                <a href="<?php the_permalink()?>" data-id="<?php the_ID()?>">
                    <img src="<?php echo esc_url($thumbnail_url) ?>" alt="<?php the_title_attribute()?>"/>
                </a>
            </div>
        </div>
        <div class="item--info">
            <div class="item--info-inner item--holder">
                <div class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </div>
                <div class="entry-tax-list">
                    <?php echo get_the_term_list(get_the_ID(), 'la_portfolio_skill', '', ', ');?>
                </div>
            </div>
        </div>
        <?php the_title( sprintf( '<a href="%s" class="item--link-overlay"><span class="icon-plus"></span><span class="hidden">', esc_url( get_the_permalink() ) ), '</span></a>' ); ?>
    </div>
</div>