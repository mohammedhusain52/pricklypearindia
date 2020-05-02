<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

global $woocommerce_loop, $pisces_loop;

$woocommerce_loop['is_main_loop'] = true;

$active_shop_masonry = Pisces()->settings->get('active_shop_masonry', 'off');
$shop_masonry_column_type = Pisces()->settings->get('shop_masonry_column_type', 'default');
$woocommerce_shop_masonry_columns = Pisces()->settings->get('woocommerce_shop_masonry_columns');

$product_masonry_item_width = Pisces()->settings->get('product_masonry_item_width', 270);
$product_masonry_item_height = Pisces()->settings->get('product_masonry_item_height', 450);
$woocommerce_shop_masonry_custom_columns = Pisces()->settings->get('woocommerce_shop_masonry_custom_columns');
$shop_masonry_item_setting = Pisces()->settings->get('shop_masonry_item_setting');

$item_gap = Pisces()->settings->get('shop_item_space', 'default');

if($item_gap == 'zero'){
    $item_gap = 0;
}

$column_tmp = Pisces()->settings->get('woocommerce_shop_page_columns');

if(isset($woocommerce_loop['is_main_loop']) && $woocommerce_loop['is_main_loop'] == true && $active_shop_masonry == 'on'){
    $column_tmp = $woocommerce_shop_masonry_columns;
}

?>
<?php
$view_mode = Pisces()->settings->get('shop_catalog_display_type', 'grid');
$columns = shortcode_atts(
    array(
        'xlg'	=> 1,
        'lg' 	=> 1,
        'md' 	=> 1,
        'sm' 	=> 1,
        'xs' 	=> 1,
        'mb' 	=> 1
    ),
    $column_tmp
);
$mb_column = $columns;

if(isset($woocommerce_loop['is_main_loop']) && $woocommerce_loop['is_main_loop'] == true && $active_shop_masonry == 'on' && $shop_masonry_column_type == 'custom'){
    $mb_column = shortcode_atts(
        array(
            'md' 	=> 1,
            'sm' 	=> 1,
            'xs' 	=> 1,
            'mb' 	=> 1
        ),
        $woocommerce_shop_masonry_custom_columns
    );
}

$view_mode = apply_filters('pisces/filter/catalog_view_mode', $view_mode);

if(isset($woocommerce_loop['is_main_loop']) && $woocommerce_loop['is_main_loop'] == true && $active_shop_masonry == 'on'){
    $view_mode = 'grid';
}

$design = Pisces()->settings->get("shop_catalog_grid_style", '1');

$loopCssClass = array();
$loopCssClass[] = 'products';
$loopCssClass[] = 'products-' . $view_mode;
$loopCssClass[] = 'grid-space-' . $item_gap;
$loopCssClass[] = 'products-grid-' . $design;

$masonry_component_type = '';

if(isset($woocommerce_loop['is_main_loop']) && $woocommerce_loop['is_main_loop'] == true && $active_shop_masonry == 'on'){
    $woocommerce_loop['prods_masonry'] = true;
    $loopCssClass[] = 'prods_masonry';
    $loopCssClass[] = 'js-el la-isotope-container';
    if( $shop_masonry_column_type != 'custom' ){
        $loopCssClass[] = 'grid-items';
        $masonry_component_type = 'DefaultMasonry';
        foreach( $columns as $screen => $value ){
            $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
        }
    }
    else{
        $__new_item_sizes = array();
        if(!empty($shop_masonry_item_setting) && is_array($shop_masonry_item_setting)){
            foreach($shop_masonry_item_setting as $k => $size){
                $__new_item_sizes[$k] = $size;
                if(!empty($size['image_size'])){
                    $__new_item_sizes[$k]['image_size'] = Pisces_Helper::get_image_size_from_string($size['image_size']);
                }
            }
        }
        $loopCssClass[] = 'prods_masonry--cover-bg';
        $woocommerce_loop['masonry_item_sizes'] = $__new_item_sizes;
        $pisces_loop['disable_alt_image'] = true;
        $masonry_component_type = 'AdvancedMasonry';
    }
    $pisces_loop['image_size'] = Pisces_Helper::get_image_size_from_string(Pisces()->settings->get('product_masonry_image_size', 'shop_catalog'));
    ?>
    <div data-la_component="InsertCustomCSS" class="js-el append-css-to-head hidden">
        .wc-toolbar .wc-toolbar-right{ display:none };
    </div>
<?php
}
else{
    $loopCssClass[] = 'grid-items';
    foreach( $columns as $screen => $value ){
        $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
    }
}

?>
<div class="row">
    <div class="col-xs-12">
        <ul class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>"<?php
echo ' data-item_selector=".product_item"';
echo ' data-item_margin="0"';
echo ' data-item-width="'.esc_attr($product_masonry_item_width).'"';
echo ' data-item-height="'.esc_attr($product_masonry_item_height).'"';
echo ' data-md-col="'.esc_attr($mb_column['md']).'"';
echo ' data-sm-col="'.esc_attr($mb_column['sm']).'"';
echo ' data-xs-col="'.esc_attr($mb_column['xs']).'"';
echo ' data-mb-col="'.esc_attr($mb_column['mb']).'"';
echo ' data-la_component="'.esc_attr($masonry_component_type).'"';
echo ' data-la-effect="sequencefade"';
?>>