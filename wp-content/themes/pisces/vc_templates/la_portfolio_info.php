<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = $el_class = $advanced_opts = $tag_label = $client_label = $client_value = $category_label = $date_label = $date_value = $share_label = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract($atts);

global $post;

if(!is_singular('la_portfolio')){
    return;
}

$opts = explode(',', $advanced_opts);
if(!empty($opts)){
?>
<div class="pf-info-wrapper">
    <ul>
        <?php if(in_array('tag', $opts)):?>
        <li><span class="pf-info-label"><?php echo esc_html($tag_label); ?></span><span class="pf-info-value"><?php echo get_the_term_list($post->ID, 'la_portfolio_skill', '', ', ');?></span></li>
        <?php endif;?>
        <?php if(in_array('client', $opts)):?>
            <li><span class="pf-info-label"><?php echo esc_html($client_label); ?></span><span class="pf-info-value"><?php echo esc_html($client_value);?></span></li>
        <?php endif;?>
        <?php if(in_array('category', $opts)):?>
            <li><span class="pf-info-label"><?php echo esc_html($category_label); ?></span><span class="pf-info-value"><?php echo get_the_term_list($post->ID, 'la_portfolio_category', '', ', ');?></span></li>
        <?php endif;?>
        <?php if(in_array('date', $opts)):?>
            <li><span class="pf-info-label"><?php echo esc_html($date_label); ?></span><span class="pf-info-value"><?php echo esc_html($date_value);?></span></li>
        <?php endif;?>
    </ul>
    <?php if(in_array('share', $opts)):?>
        <div class="la-sharing-single-portfolio">
            <span class="pf-info-label"><?php echo esc_html($share_label); ?></span></span>
            <?php
                pisces_social_sharing(get_the_permalink($post->ID), get_the_title($post->ID), (has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'full') : ''));
            ?>
        </div>
    <?php endif;?>
</div>
<?php
}