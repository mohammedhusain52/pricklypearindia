<?php
global $pisces_loop;
$loop_id            = isset($pisces_loop['loop_id']) ? $pisces_loop['loop_id'] : uniqid('la-show-portfolios-');
$layout             = isset($pisces_loop['loop_layout']) ? $pisces_loop['loop_layout'] : 'grid';
$style              = isset($pisces_loop['loop_style']) ? $pisces_loop['loop_style'] : 1;
$item_space         = isset($pisces_loop['item_space']) ? $pisces_loop['item_space'] : 0;
$responsive_column  = isset($pisces_loop['responsive_column']) ? $pisces_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);
$slider_configs     = isset($pisces_loop['slider_configs']) ? $pisces_loop['slider_configs'] : '';

$loopCssClass = array('la-loop','portfolios-loop');
$loopCssClass[] = 'pf-style-' . $style;
$loopCssClass[] = 'pf-' . $layout;
$loopCssClass[] = 'grid-space-'. $item_space;

if(!empty($slider_configs)){
    $loopCssClass[] = 'js-el la-slick-slider';
}else{
    $loopCssClass[] = 'grid-items';
    foreach( $responsive_column as $screen => $value ){
        $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
    }
}

printf(
    '<div class="%1$s"%2$s>',
    esc_attr(implode(' ', $loopCssClass)),
    (!empty($slider_configs) ? ' data-la_component="AutoCarousel" ' . $slider_configs : '')
);