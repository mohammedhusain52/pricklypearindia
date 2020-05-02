<?php

$header_layout = Pisces()->layout->get_header_layout();

$header_access_icon = Pisces()->settings->get('header_access_icon');

$show_header_top        = Pisces()->settings->get('enable_header_top');
$header_top_elements    = Pisces()->settings->get('header_top_elements');
$custom_header_top_html = Pisces()->settings->get('use_custom_header_top');

$aside_sidebar_name = apply_filters('pisces/filter/aside_widget_bottom', 'aside-widget');

$enable_header_aside = false;

if(!empty($header_access_icon)){
    foreach($header_access_icon as $component){
        if(isset($component['type']) && $component['type'] == 'aside_header'){
            $enable_header_aside = true;
            break;
        }
    }
}

?>
<aside id="header_menu_burger" class="header--menu-burger">
    <div class="header_menu-burger-inner">
        <a class="btn-aside-toggle" href="#"><i class="pisces-icon-simple-remove"></i></a>
        <nav class="nav-menu-burger accordion-menu"><?php
            wp_nav_menu(array(
                'container'         => false,
                'theme_location'    => 'aside-nav'
            ));
            ?></nav>
    </div>
</aside>
<?php if($enable_header_aside): ?>
    <aside id="header_aside" class="header--aside">
        <div class="header-aside-wrapper">
            <a class="btn-aside-toggle" href="#"><i class="pisces-icon-simple-remove"></i></a>
            <div class="header-aside-inner">
                <?php if(is_active_sidebar($aside_sidebar_name)): ?>
                    <div class="header-widget-bottom">
                        <?php
                        dynamic_sidebar($aside_sidebar_name);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </aside>
<?php endif;?>


<?php if($show_header_top == 'custom' && !empty($custom_header_top_html) ): ?>
<header id="masthead" class="site-header">
    <div class="site-header-top use-custom-html">
        <div class="container">
            <?php echo Pisces_Helper::remove_js_autop($custom_header_top_html); ?>
        </div>
    </div>
</header>
<?php endif; ?>
<?php if($show_header_top == 'yes' && !empty($header_top_elements) ): ?>
<header id="masthead" class="site-header">
    <div class="site-header-top use-default">
        <div class="container">
            <div class="header-top-elements">
                <?php
                foreach($header_top_elements as $component){
                    if(isset($component['type'])){
                        echo Pisces_Helper::render_access_component($component['type'], $component, 'header_component');
                    }
                }
                ?>
            </div>
        </div>
    </div>
</header>
<?php endif; ?>
<header id="masthead_aside" class="header--aside">
    <div class="site-header-inner">
        <div class="container">
            <div class="header-main clearfix">
                <div class="header-component-outer header-left">
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url( '/'  ) ); ?>" rel="home">
                            <figure class="logo--normal"><?php Pisces()->layout->render_logo();?></figure>
                            <figure class="logo--transparency"><?php Pisces()->layout->render_transparency_logo();?></figure>
                        </a>
                    </div>
                </div>
                <div class="header-component-outer header-right">
                    <div class="header_component header_component--link la_compt_iem la_com_action--aside_header"><a rel="nofollow" class="component-target" href="javascript:;"><span></span></a></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- #masthead -->