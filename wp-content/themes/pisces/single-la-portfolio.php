<?php
get_header();

the_post();

do_action( 'pisces/action/before_render_main' ); ?>
<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <main id="site-content" class="<?php echo esc_attr(Pisces()->layout->get_main_content_css_class('col-xs-12 site-content'))?>">
                <div class="site-content-inner">

                    <?php do_action( 'pisces/action/before_render_main_inner' );?>

                    <div class="page-content">
                        <div class="single-post-content single-portfolio-content clearfix">
                            <?php

                            do_action( 'pisces/action/before_render_main_content' );

                            echo '<div class="portfolio-single-page">';
                            the_content();
                            echo '</div>';

                            do_action( 'pisces/action/after_render_main_content' );

                            ?>
                        </div>
                    </div>

                    <?php do_action( 'pisces/action/after_render_main_inner' );?>
                </div>
            </main>
            <!-- #site-content -->
            <?php get_sidebar();?>
        </div>
        <div class="row portfolio-nav">
            <div class="col-xs-4">
                <?php
                $prev = get_previous_post(false,'','la_portfolio_category');
                if(!empty($prev) && isset($prev->ID)){
                    printf(
                        '<a href="%s"><i class="pisces-icon-arrow-tail-left"></i><span>%s</span></a>',
                        get_the_permalink($prev->ID),
                        esc_html_x('Prev', 'front-end', 'pisces')
                    );
                }
                ?>
            </div>
            <div class="col-xs-4">
                <?php
                $post_terms = wp_get_post_terms( get_the_ID(), 'la_portfolio_category' );
                if ( is_array( $post_terms ) && isset( $post_terms[0] ) && is_object( $post_terms[0] ) ) {
                    $term_id = $post_terms[0]->term_id;
                    echo '<div class="nav-parents">';
                    echo sprintf('<a href="%s"><i class="fa-th-large"></i></a>',
                        esc_url(get_term_link($term_id, 'la_portfolio_category'))
                    );
                    echo '</div>';
                }
                ?>
            </div>
            <div class="col-xs-4">
                <?php
                $next = get_next_post(false,'','la_portfolio_category');
                if(!empty($next) && isset($next->ID)){
                    printf(
                        '<a href="%s"><span>%s</span><i class="pisces-icon-arrow-tail-right"></i></a>',
                        get_the_permalink($next->ID),
                        esc_html_x('Next', 'front-end', 'pisces')
                    );
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- .site-main -->
<?php do_action( 'pisces/action/after_render_main' ); ?>
<?php get_footer();?>