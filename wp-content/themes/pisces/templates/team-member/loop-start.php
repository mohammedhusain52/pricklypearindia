<?php
global $pisces_loop;
$loop_id = isset($pisces_loop['loop_id']) ? $pisces_loop['loop_id'] : uniqid('la-team-member-');
$loop_style = isset($pisces_loop['loop_style']) ? $pisces_loop['loop_style'] : 1;
$responsive_column = isset($pisces_loop['responsive_column']) ? $pisces_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);
$excerpt_length = isset($pisces_loop['excerpt_length']) ? $pisces_loop['excerpt_length'] : 15;
$slider_configs = isset($pisces_loop['slider_configs']) ? $pisces_loop['slider_configs'] : '';
$item_space = isset($pisces_loop['item_space']) ? $pisces_loop['item_space'] : '30';

$loopCssClass = array('la-loop','la-members');
$loopCssClass[] = 'la-members--style-' . $loop_style;

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