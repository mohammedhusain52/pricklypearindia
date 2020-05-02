<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
    <div class="wc_page_description">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    	<header class="woocommerce-products-header">
	<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    	</header>
	<?php endif; ?>
    </div>
		<?php

		$catalog_column = Pisces()->settings->get('woocommerce_catalog_columns');
		$catalog_column = shortcode_atts(
			array(
				'xlg'	=> 4,
				'lg' 	=> 3,
				'md' 	=> 3,
				'sm' 	=> 2,
				'xs' 	=> 1,
				'mb' 	=> 1
			),
			$catalog_column
		);
		$catalog_class = array('catalog-grid-1 products grid-items');
		foreach( $catalog_column as $screen => $value ){
			$catalog_class[]  =  sprintf('%s-grid-%s-items', $screen, $value);
		}

		global $woocommerce_loop;

		$woocommerce_loop['is_main_loop'] = true;

		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

		<div id="la_shop_products" class="la-shop-products">

			<div class="la-ajax-shop-loading"><div class="la-ajax-loading-outer"><div class="la-loader spinner3"><div class="dot1"></div><div class="dot2"></div><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div><div class="cube1"></div><div class="cube2"></div><div class="cube3"></div><div class="cube4"></div></div></div></div>

            <?php
            $cat_html = woocommerce_maybe_show_product_subcategories('');
            if(!empty($cat_html)){
                echo '<div class="product-categories-wrapper"><ul class="'. esc_attr(implode(' ', $catalog_class)) .'">' . $cat_html .'</ul></div>';
            }
            ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		</div>

		<?php else : ?>

            <div class="wc-toolbar-container"><div class="hidden wc-toolbar wc-toolbar-top clearfix"></div></div>
			<div id="la_shop_products" class="la-shop-products no-products-found">
				<div class="la-ajax-shop-loading"><div class="la-ajax-loading-outer"><div class="la-loader spinner3"><div class="dot1"></div><div class="dot2"></div><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div><div class="cube1"></div><div class="cube2"></div><div class="cube3"></div><div class="cube4"></div></div></div></div>

                <?php
                $cat_html = woocommerce_maybe_show_product_subcategories('');
                if(!empty($cat_html)){
                    echo '<div class="product-categories-wrapper"><ul class="'. esc_attr(implode(' ', $catalog_class)) .'">' . $cat_html .'</ul></div>';
                }
                ?>

				<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
				?>
			</div>

		<?php endif; ?>

		<?php
			$woocommerce_loop['is_main_loop'] = false;
		?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>


<?php get_footer( 'shop' ); ?>
