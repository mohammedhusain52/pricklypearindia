<?php

$header_layout = Pisces()->layout->get_header_layout();

$header_access_icon = Pisces()->settings->get('header_access_icon');

$show_header_top        = Pisces()->settings->get('enable_header_top');
$header_top_elements    = Pisces()->settings->get('header_top_elements');
$custom_header_top_html = Pisces()->settings->get('use_custom_header_top');

$store_working_hours = Pisces()->settings->get('store_working_hours');
$store_email = Pisces()->settings->get('store_email');
$store_phone = Pisces()->settings->get('store_phone');

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
<?php if($enable_header_aside): ?>
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
<?php endif;?>
<header id="masthead" class="site-header">
    <?php if($show_header_top == 'custom' && !empty($custom_header_top_html) ): ?>
        <div class="site-header-top use-custom-html">
            <div class="container">
                <?php echo Pisces_Helper::remove_js_autop($custom_header_top_html); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if($show_header_top == 'yes' && !empty($header_top_elements) ): ?>
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
    <?php endif; ?>
    <div class="site-header-outer">
        <div class="site-header-inner">
            <div class="container">
                <div class="header-main clearfix">
                    <div class="header-component-outer header-left">
                        <div class="header-component-inner clearfix">
                            <?php if(!empty($store_phone)): ?>
                                <div class="header_component header_component--linktext la_compt_iem la_com_action--linktext">
                                    <span class="component-target"><i class="fa fa-phone"></i><span class="component-target-text"><?php echo esc_html($store_phone) ?></span></span>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($store_email)): ?>
                                <div class="header_component header_component--linktext la_compt_iem la_com_action--linktext">
                                    <a class="component-target" href="<?php echo esc_url('mailto:'. $store_email)?>"><i class="fa fa-envelope-o"></i><span class="component-target-text"><?php echo esc_html($store_email) ?></span></a>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($store_working_hours)): ?>
                                <div class="header_component header_component--linktext la_compt_iem la_com_action--linktext hidden-md">
                                    <span class="component-target"><i class="fa fa-clock-o"></i><span class="component-target-text"><?php echo esc_html($store_working_hours) ?></span></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="header-component-outer header-middle">
                        <div class="site-branding">
                            <a href="<?php echo esc_url( home_url( '/'  ) ); ?>" rel="home">
                                <figure class="logo--normal"><?php Pisces()->layout->render_logo();?></figure>
                                <figure class="logo--transparency"><?php Pisces()->layout->render_transparency_logo();?></figure>
                            </a>
                        </div>
                    </div>
                    <div class="header-component-outer header-right">
                        <div class="header-component-inner clearfix">
                            <?php
                            if(!empty($header_access_icon)){
                                foreach($header_access_icon as $component){
                                    if(isset($component['type'])){
                                        echo Pisces_Helper::render_access_component($component['type'], $component, 'header_component');
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="la-header-sticky-height"></div>
    </div>
</header>
<!-- #masthead -->