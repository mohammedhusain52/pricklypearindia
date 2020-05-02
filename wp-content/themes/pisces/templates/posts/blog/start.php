<?php
global $pisces_loop;

$layout = isset($pisces_loop['loop_layout']) ? $pisces_loop['loop_layout'] : 'grid';
$style = isset($pisces_loop['loop_style']) ? $pisces_loop['loop_style'] : 1;
$responsive_column = isset($pisces_loop['responsive_column']) ? $pisces_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);
$slider_configs = isset($pisces_loop['slider_configs']) ? $pisces_loop['slider_configs'] : '';
$item_space = isset($pisces_loop['item_space']) ? $pisces_loop['item_space'] : '30';

$loopCssClass = array('la-loop','showposts-loop');
$loopCssClass[] = "$layout-$style";
$loopCssClass[] = 'showposts-' . $layout;

$loopCssClass[] = 'grid-items';
$loopCssClass[] = 'grid-space-'. $item_space;

if(!empty($slider_configs)){
    $loopCssClass[] = 'js-el la-slick-slider';
}else{
    foreach( $responsive_column as $screen => $value ){
        $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
    }
}

printf(
    '<div class="%1$s"%2$s>',
    esc_attr(implode(' ', $loopCssClass)),
    (!empty($slider_configs) ? ' data-la_component="AutoCarousel" ' . $slider_configs : '')
);