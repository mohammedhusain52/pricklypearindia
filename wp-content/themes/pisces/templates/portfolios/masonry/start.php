<?php
global $pisces_loop;


$loop_id            = isset($pisces_loop['loop_id']) ? $pisces_loop['loop_id'] : uniqid('la-show-portfolios-');
$style              = isset($pisces_loop['loop_style']) ? $pisces_loop['loop_style'] : '1';
$item_space           = isset($pisces_loop['item_space']) ? $pisces_loop['item_space'] : 0;
$responsive_column  = isset($pisces_loop['responsive_column']) ? $pisces_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);

$column_type    = isset($pisces_loop['column_type']) ? $pisces_loop['column_type'] : 'default';
$item_width     = isset($pisces_loop['base_item_w']) ? $pisces_loop['base_item_w'] : 300;
$item_height    = isset($pisces_loop['base_item_h']) ? $pisces_loop['base_item_h'] : 300;
$mb_column      = isset($pisces_loop['mb_column']) ? $pisces_loop['mb_column'] : array('md'=> 1,'sm'=> 1,'xs'=> 1, 'mb' => 1);


$enable_skill_filter    = isset($pisces_loop['enable_skill_filter']) ? true : false;
$filter_style           = isset($pisces_loop['filter_style']) ? $pisces_loop['filter_style'] : '1';
$filters                = isset($pisces_loop['filters']) ? $pisces_loop['filters'] : '';

$loopCssClass   = array('la-loop','portfolios-loop');
$loopCssClass[] = 'pf-style-' . $style;
$loopCssClass[] = 'pf-masonry js-el';
$loopCssClass[] = 'la-isotope-container';
$loopCssClass[] = 'grid-space-'. $item_space;
$loopCssClass[] = 'masonry__column-type-'. $column_type;

$custom_configs = array();

if($column_type != 'custom'){
    $loopCssClass[] = 'grid-items';
    foreach( $responsive_column as $screen => $value ){
        $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
    }
}

?>
<?php if($enable_skill_filter): ?>
    <div data-la_component="MasonryFilter" class="js-el la-isotope-filter-container filter-style-<?php echo esc_attr($filter_style);?>" data-isotope_container="#<?php echo esc_html($loop_id) ?> .la-isotope-container">
        <div class="la-toggle-filter"><?php echo esc_html_x('All', 'front-view', 'pisces'); ?></div><ul><li class="active" data-filter="*"><a href="#"><?php echo esc_html_x('All', 'front-view', 'pisces'); ?></a></li><?php
            if(!empty($filters)){
                $filters = explode(',', $filters);
                foreach($filters as $filter){
                    $category = get_term($filter, 'la_portfolio_skill');
                    if(!is_wp_error($category) && $category){
                        printf('<li data-filter="la_portfolio_skill-%s"><a href="#">%s</a></li>',
                            esc_attr($category->slug),
                            esc_html($category->name)
                        );
                    }
                }
            }
        ?></ul>
    </div>
<?php endif; ?>
<div class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>"<?php
echo ' data-item_selector=".portfolio-item"';
echo ' data-item_margin="0"';
echo ' data-config_isotope="'.esc_attr(json_encode($custom_configs)).'"';
echo ' data-item-width="'.esc_attr($item_width).'"';
echo ' data-item-height="'.esc_attr($item_height).'"';
echo ' data-md-col="'.esc_attr($mb_column['md']).'"';
echo ' data-sm-col="'.esc_attr($mb_column['sm']).'"';
echo ' data-xs-col="'.esc_attr($mb_column['xs']).'"';
echo ' data-mb-col="'.esc_attr($mb_column['mb']).'"';
echo ' data-la_component="' . ( $column_type != 'custom' ? 'DefaultMasonry' : 'AdvancedMasonry'). '"';
?>>