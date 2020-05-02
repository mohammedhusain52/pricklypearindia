<?php

$mobile_footer_bar       = (Pisces()->settings->get('enable_header_mb_footer_bar','no') == 'yes') ? true : false;
$mobile_footer_bar_items =  Pisces()->settings->get('header_mb_footer_bar_component', array());

?>
<?php if( 'yes' == Pisces()->settings->get('backtotop_btn', 'no') ): ?>
<div class="clearfix">
    <div class="backtotop-container">
        <a href="#page" class="btn-backtotop btn btn-secondary"><span class="fa-angle-up"></span></a>
    </div>
</div>
<?php endif; ?>
<?php
    Pisces()->layout->render_footer_tpl();
?>
    </div><!-- .site-inner -->
</div><!-- #page-->
<!-- <?php  if($mobile_footer_bar && !empty($mobile_footer_bar_items)): ?> 
    <div class="footer-handheld-footer-bar">
        <div class="footer-handheld__inner">
            <?php
            foreach($mobile_footer_bar_items as $component){
                if(isset($component['type'])){
                    echo Pisces_Helper::render_access_component($component['type'], $component, 'handheld_component');
                }
            }
            ?>
        </div>
    </div>-->
<?php endif; ?>

<div class="searchform-fly-overlay">
    <a href="javascript:;" class="btn-close-search">
        <i class="pisces-icon-simple-remove"></i>
    </a>
    <div class="searchform-fly">
        <p><?php echo esc_html_x('Start typing and press Enter to search', 'front-view', 'pisces')?></p>
        <?php
            if(function_exists('get_product_search_form')){
                get_product_search_form();
            }else{
                get_search_form();
            }
        ?>
    </div>
</div>
<!-- .search-form -->

<div class="cart-flyout">
    <div class="cart-flyout--inner">
        <a href="javascript:;" class="btn-close-cart"><i class="pisces-icon-simple-remove"></i></a>
        <div class="cart-flyout__content">
            <div class="cart-flyout__heading"><?php echo esc_html_x('Shopping Cart', 'front-view', 'pisces') ?></div>
            <div class="cart-flyout__loading"><div class="la-loader spinner3"><div class="dot1"></div><div class="dot2"></div><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
            <div class="widget_shopping_cart_content">
            </div>
        </div>
    </div>
</div>
<div class="la-overlay-global"></div>


<?php
$show_popup = Pisces()->settings->get('enable_newsletter_popup');
$only_home_page = Pisces()->settings->get('only_show_newsletter_popup_on_home_page');
$delay = Pisces()->settings->get('newsletter_popup_delay', 2000);
$popup_content = Pisces()->settings->get('newsletter_popup_content');
$show_checkbox = Pisces()->settings->get('show_checkbox_hide_newsletter_popup', false);
$back_display_time = Pisces()->settings->get('newsletter_popup_show_again', '1');
if($show_popup){
    if($only_home_page && !is_front_page()){
        $show_popup = false;
    }
}
if($show_popup && !empty($popup_content)):
    ?>
    <div class="la-newsletter-popup" data-back-time="<?php echo esc_attr( floatval($back_display_time) ); ?>" data-show-mobile="<?php echo Pisces()->settings->get('disable_popup_on_mobile') ? 1 : 0 ?>" id="la_newsletter_popup" data-delay="<?php echo esc_attr( absint($delay) ); ?>">
        <a href="#" class="btn-close-newsletter-popup"><span class="pisces-icon-simple-close"></span></a>
        <div class="newsletter-popup-content"><?php echo Pisces_Helper::remove_js_autop($popup_content); ?></div>
        <?php if($show_checkbox): ?>
            <label class="lbl-dont-show-popup"><input type="checkbox" id="dont_show_popup"/><?php echo esc_html(Pisces()->settings->get('popup_dont_show_text')) ?></label>
        <?php endif;?>
    </div>
<?php endif; ?>

<?php
do_action('pisces/action/after_render_body');
do_action('pisces/action/footer');
wp_footer();
?>

<!-- <script type="text/javascript">
function downloadJSAtOnload() {
var element = document.createElement("script");
element.src = "https://www.youtube.com/yts/jsbin/player_ias-vflJiqSE7/en_US/base.js";
document.body.appendChild(element);
}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;
</script> -->

</body>
</html>