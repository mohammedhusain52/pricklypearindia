.la_testimonials--style-1 .testimonial_item--excerpt,
.la_testimonials--style-7 .testimonial_item--excerpt,
.three-font-family,
.highlight-font-family {
  font-family: <?php echo ( $highlight_font_family ) ?>;
}

h1,
.h1, h2,
.h2, h3,
.h3, h4,
.h4, h5,
.h5, h6,
.h6, .title-xlarge, .mega-menu .mm-popup-wide .inner > ul.sub-menu > li > a, .heading-font-family {
  font-family: <?php echo ( $heading_font_family ) ?>;
}

body, .la-blockquote.style-1 footer, .la-blockquote.style-2 footer {
  font-family: <?php echo ( $body_font_family ) ?>;
}

.background-color-primary, .item--link-overlay:before, .la_compt_iem .component-target-badget, .wc-toolbar .wc-ordering ul li:hover a, .wc-toolbar .wc-ordering ul li.active a, .header6-fallback-inner .dl-menuwrapper li:not(.dl-back) > a .mm-text:before, .dl-menu .tip.hot,
.mega-menu .tip.hot,
.menu .tip.hot, .blog_item--thumbnail-with-effect .item--overlay, .comment-form .form-submit input, .social-media-link.style-round a:hover, .social-media-link.style-square a:hover, .social-media-link.style-circle a:hover, .social-media-link.style-outline a:hover, .social-media-link.style-circle-outline a:hover, .la-members--style-6 .la-member__info-title-role:after, .la-members--style-7 .la-member__image .item--overlay, .la-members--style-8 .la-member__info-title a:before, .banner-type-hover_effect .banner--link-overlay:after, .la_testimonials--style-3 .testimonial_item--title:before, .la-newsletter-popup .yikes-easy-mc-form .yikes-easy-mc-submit-button:hover, .portfolios-loop.pf-style-3 .item--link-overlay, .la-timeline-wrap.style-1 .timeline-block .timeline-dot, .la-woo-product-gallery .woocommerce-product-gallery__trigger, .product--summary .single_add_to_cart_button:hover, .wc-tabs li a:after, .woocommerce-MyAccount-navigation li:hover a, .woocommerce-MyAccount-navigation li.is-active a, .registration-form .button, .la-loader.spinner1, .la-loader.spinner2, .la-loader.spinner3 [class*="bounce"], .la-loader.spinner4 [class*="dot"], .la-loader.spinner5 div, .socials-color a:hover, .iconboxes_demo_1_style_2.la-sc-icon-boxes .icon-boxes-inner:hover .btn, .service_demo_8 > .wpb_column > .vc_column-inner:before, .service_demo_8 > .wpb_column:hover > .vc_column-inner .btn, .circle-icon-lists.la-lists-icon .la-sc-icon-item > span, .coffee-menu .coffee-menu-item:hover:before, .wpb_widgetised_column .otw-widget-form .otw-submit {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.background-color-secondary, .la-pagination ul .page-numbers.current, .slick-slider .slick-dots button, .comment-form .form-submit input:hover, .social-media-link.style-round a, .social-media-link.style-square a, .social-media-link.style-circle a, [class*="vc_tta-la-"] .tabs-la-1 .vc_tta-tabs-list li a:after, .la-newsletter-popup .yikes-easy-mc-form .yikes-easy-mc-submit-button, .product--summary .single_add_to_cart_button {
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.background-color-three, .socials-color a {
  background-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?>;
}

.background-color-body {
  background-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?>;
}

.background-color-border {
  background-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
}

a:focus, a:hover, .search-form .search-button:hover, .slick-slider .slick-dots li:hover span,
.slick-slider .slick-dots .slick-active span, .slick-slider .slick-arrow:hover,
.la-slick-nav .slick-arrow:hover, .vertical-style ul li:hover a, .vertical-style ul li.active a, .filter-style-1 ul li:hover a, .filter-style-1 ul li.active a,
.filter-style-default ul li:hover a,
.filter-style-default ul li.active a, .filter-style-2 ul li:hover a, .filter-style-2 ul li.active a, .filter-style-3 ul li:hover a, .filter-style-3 ul li.active a, .wc-toolbar .wc-view-toggle .active, .wc-toolbar .wc-view-count li.active, .widget.widget_product_tag_cloud .active a,
.widget.product-sort-by .active a,
.widget.widget_layered_nav .active a,
.widget.la-price-filter-list .active a, .product_list_widget a:hover, #header_aside .btn-aside-toggle:hover, .header6-fallback .btn-aside-toggle:hover, .dl-menu .tip.hot .tip-arrow:before,
.mega-menu .tip.hot .tip-arrow:before,
.menu .tip.hot .tip-arrow:before, .blog_item--meta a:hover, .blog_item--meta-footer .la-favorite-link:hover i,
.blog_item--meta-footer .comments-link:hover i, .blog_item--meta-footer .la-sharing-posts:hover > span > i, .blog_item--meta-footer .la-favorite-link a.added i, .la-sharing-single-posts .social--sharing a:hover, .pf-info-wrapper .la-sharing-single-portfolio .social--sharing a:hover, ul.list-dots.primary > li:before,
ul.list-checked.primary > li:before, body .vc_toggle.vc_toggle_default.vc_toggle_active .vc_toggle_title h4, .wpb-js-composer [class*="vc_tta-la-"] .vc_active .vc_tta-panel-heading .vc_tta-panel-title, [class*="vc_tta-la-"] .tabs-la-3 .vc_tta-tabs-list li.vc_active a, [class*="vc_tta-la-"] .tabs-la-5 .vc_tta-tabs-list li.vc_active a, .subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-submit-button:hover, .subscribe-style-04 .yikes-easy-mc-form .yikes-easy-mc-submit-button:hover, .wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-1 .vc_active .vc_tta-panel-title, .wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-2 .vc_tta-panel.vc_active .vc_tta-panel-title, .wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-3 .vc_tta-panel.vc_active .vc_tta-title-text, .la-timeline-wrap.style-1 .timeline-block .timeline-subtitle, .product_item .price ins, .products-list .product_item .product_item--info .add_compare:hover,
.products-list .product_item .product_item--info .add_wishlist:hover, .product--summary .social--sharing a:hover, .product--summary .add_compare:hover,
.product--summary .add_wishlist:hover, .cart-collaterals .woocommerce-shipping-calculator .button:hover,
.cart-collaterals .la-coupon .button:hover, .iconboxes_demo_3_style_1.la-sc-icon-boxes:hover .box-description a, .service_demo_6 .la-item-wrap:hover a, .iconboxes_demo_17_style_1.la-sc-icon-boxes:hover .box-description a, .wpb_widgetised_column .otw-widget-form .otw-input-wrap:after {
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.text-color-primary {
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.swatch-wrapper:hover, .swatch-wrapper.selected, .social-media-link.style-outline a:hover, .social-media-link.style-circle-outline a:hover, [class*="vc_tta-la-"] .tabs-la-3 .vc_tta-tabs-list li.vc_active a, .la-woo-thumbs .la-thumb.slick-current:before, .iconboxes_demo_1_style_2.la-sc-icon-boxes .icon-boxes-inner:hover .btn {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.border-color-primary {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.border-top-color-primary {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.border-bottom-color-primary {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.border-left-color-primary {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.border-right-color-primary {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.la-pagination ul .page-numbers, .filter-style-2 ul li a, .woocommerce-message,
.woocommerce-error,
.woocommerce-info, .form-row label, div.quantity, .widget_recent_entries .pr-item .pr-item--right a:not(:hover), .widget_recent_comments li.recentcomments a, .product_list_widget a, .product_list_widget .amount, #header_aside .btn-aside-toggle, .sidebar-inner ul.menu li.current-cat > a, .sidebar-inner ul.menu li.current-cat-parent > a, .sidebar-inner ul.menu li.open > a, .sidebar-inner ul.menu li:hover > a, .blog_item--meta-footer .la-favorite-link i + span,
.blog_item--meta-footer .comments-link i + span, .showposts-loop.blog-4 .entry-date, .showposts-loop.blog-5 .entry-date, .tags-list .tags-list-item, .single_post_item--meta .entry-date, .la-sharing-single-posts .social--sharing a, .author-info__name a, .post-navigation .post-title, .commentlist .comment-meta .comment-author, .comment-form label, .woocommerce-Reviews span#reply-title, .woocommerce-Reviews .comment_container .meta .woocommerce-review__author, .portfolio-nav i, .pf-info-wrapper ul .pf-info-value, .pf-info-wrapper .la-sharing-single-portfolio .social--sharing a, .la-blockquote.style-2, ul.list-dots.secondary > li:before,
ul.list-checked.secondary > li:before, .la-members--style-4 .member-social,
.la-members--style-3 .member-social,
.la-members--style-1 .member-social, [class*="vc_tta-la-"] .vc_tta-tabs-list li:hover > a,
[class*="vc_tta-la-"] .vc_tta-tabs-list li.vc_active > a, [class*="vc_tta-la-"] .tabs-la-1 .vc_tta-tabs-list li:hover > a:after,
[class*="vc_tta-la-"] .tabs-la-1 .vc_tta-tabs-list li.vc_active > a:after, [class*="vc_tta-la-"] .tabs-la-5 .vc_tta-tabs-list li a, .la_testimonials--style-1, .la_testimonials--style-3 .testimonial_item--title, .la_testimonials--style-6 .testimonial_item--title, .cf7-style-default .wpcf7-form-control-wrap .wpcf7-select,
.cf7-style-default .wpcf7-form-control-wrap .wpcf7-text,
.cf7-style-default .wpcf7-form-control-wrap .wpcf7-textarea, .cf7-style-01 .wpcf7-form-control-wrap .wpcf7-select,
.cf7-style-01 .wpcf7-form-control-wrap .wpcf7-text,
.cf7-style-01 .wpcf7-form-control-wrap .wpcf7-textarea, .la-newsletter-popup, .la-newsletter-popup .yikes-easy-mc-form .yikes-easy-mc-email:focus, .subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-email:focus, .subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-submit-button, .subscribe-style-03 .yikes-easy-mc-form, .la-circle-progress .sc-cp-t,
.la-circle-progress .sc-cp-v, .la-pricing-box-wrap.style-1 .pricing-heading, .products-list .product_item .product_item--info .add_compare,
.products-list .product_item .product_item--info .add_wishlist, .la-woo-thumbs .slick-arrow, .product--summary .single-price-wrapper .price, .product--summary .product_meta-top .sku_wrapper, .product--summary .product_meta_sku_wrapper, .product--summary .social--sharing a, .product--summary .group_table label, .product--summary .variations td, .product--summary .add_compare,
.product--summary .add_wishlist, .product--summary .add_compare:hover:after,
.product--summary .add_wishlist:hover:after, .wc-tabs li a, .wc-tab .wc-tab-title, .shop_table td.product-price,
.shop_table td.product-subtotal, .shop_table .product-name a, .cart-collaterals .shop_table, .cart-collaterals .woocommerce-shipping-calculator .button,
.cart-collaterals .la-coupon .button, .woocommerce > p.cart-empty:before, table.woocommerce-checkout-review-order-table, .wc_payment_methods .wc_payment_method label, .woocommerce-order ul strong {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.text-color-secondary {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

input:focus, select:focus, textarea:focus, .la-pagination ul .page-numbers.current, .la-pagination ul .page-numbers:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.border-color-secondary {
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

.border-top-color-secondary {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

.border-bottom-color-secondary {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

.border-left-color-secondary {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

.border-right-color-secondary {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?> !important;
}

h1,
.h1, h2,
.h2, h3,
.h3, h4,
.h4, h5,
.h5, h6,
.h6, .title-xlarge, table th {
  color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?>;
}

.text-color-heading {
  color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.border-color-heading {
  border-color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.border-top-color-heading {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.border-bottom-color-heading {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.border-left-color-heading {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.border-right-color-heading {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("heading_color","#343538") ) ?> !important;
}

.star-rating, .filter-style-1 ul li a,
.filter-style-default ul li a, .product .product-price del,
.product .price del, .wc-toolbar .wc-view-count ul, [class*="vc_tta-la-"] .tabs-la-3 .vc_tta-tabs-list li:hover a {
  color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?>;
}

.text-color-three {
  color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

[class*="vc_tta-la-"] .tabs-la-3 .vc_tta-tabs-list li:hover a {
  border-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?>;
}

.border-color-three {
  border-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

.border-top-color-three {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

.border-bottom-color-three {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

.border-left-color-three {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

.border-right-color-three {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("three_color","#b5b7c4") ) ?> !important;
}

body, .la_testimonials--style-2 .testimonial_item--role, .la-newsletter-popup .yikes-easy-mc-form .yikes-easy-mc-email, .subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-email, table.woocommerce-checkout-review-order-table .variation,
table.woocommerce-checkout-review-order-table .product-quantity {
  color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?>;
}

.text-color-body {
  color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

.border-color-body {
  border-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

.border-top-color-body {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

.border-bottom-color-body {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

.border-left-color-body {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

.border-right-color-body {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?> !important;
}

input, select, textarea, table,
table th,
table td, .elm-loadmore-ajax a, .share-links a, .select2-container .select2-selection--single, .wc-toolbar .wc-ordering, .wc-toolbar .wc-ordering ul, .swatch-wrapper, .widget_shopping_cart_content .total, .calendar_wrap caption, .widget-border.widget, .widget-border-bottom.widget, .sidebar-inner .widget_archive .menu li a, .sidebar-inner .widget_tag_cloud .tagcloud a, .showposts-loop.blog-3 .blog_item--info, .showposts-loop.blog-2 .blog_item--info, .showposts-loop.search-main-loop .item-inner, .commentlist .comment_container, .la-blockquote.style-2, .la-blockquote.style-2 footer, .social-media-link.style-outline a, body .vc_toggle.vc_toggle_default, .la_testimonials--style-3 .testimonial_item--inner, .la-newsletter-popup .yikes-easy-mc-form .yikes-easy-mc-email, .subscribe-style-01 .yikes-easy-mc-form .yikes-easy-mc-email, .wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-1 .vc_tta-panel-title, .wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-style-la-3 .vc_tta-panel, .la-timeline-wrap.style-1 .timeline-line, .la-timeline-wrap.style-2 .timeline-title:after, .line-fullwidth, .shop_table.cart td, .iconboxes_demo_3_style_1.la-sc-icon-boxes .icon-boxes-inner {
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
}

.border-color {
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?> !important;
}

.border-top-color {
  border-top-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?> !important;
}

.border-bottom-color {
  border-bottom-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?> !important;
}

.border-left-color {
  border-left-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?> !important;
}

.border-right-color {
  border-right-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?> !important;
}

h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .title-xlarge {
  font-weight: 700;
}

/** end **/
.btn {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.btn.btn-primary {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.btn.btn-primary:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-outline {
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-outline:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.btn.btn-style-flat.btn-color-primary {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.btn.btn-style-flat.btn-color-primary:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-flat.btn-color-white {
  background-color: #fff;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-flat.btn-color-white:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.btn.btn-style-flat.btn-color-white2 {
  background-color: #fff;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-flat.btn-color-white2:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-flat.btn-color-gray {
  background-color: <?php echo esc_attr( Pisces()->settings->get("text_color","#9d9d9d") ) ?>;
}

.btn.btn-style-flat.btn-color-gray:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.btn.btn-style-outline:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.btn.btn-style-outline.btn-color-black {
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-outline.btn-color-black:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.btn.btn-style-outline.btn-color-primary {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.btn.btn-style-outline.btn-color-primary:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  color: #fff;
}

.btn.btn-style-outline.btn-color-white {
  border-color: #fff;
  color: #fff;
}

.btn.btn-style-outline.btn-color-white:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.btn.btn-style-outline.btn-color-white2 {
  border-color: rgba(255, 255, 255, 0.5);
  color: #fff;
}

.btn.btn-style-outline.btn-color-white2:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  color: #fff;
}

.btn.btn-style-outline.btn-color-gray {
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-outline.btn-color-gray:hover {
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.woocommerce.add_to_cart_inline a {
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.woocommerce.add_to_cart_inline a:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  color: #fff;
}

.elm-loadmore-ajax a {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.elm-loadmore-ajax a:hover {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

form.track_order .button,
.products-list .product_item .product_item--info .add_to_cart_button,
.place-order .button,
.wc-proceed-to-checkout .button,
.widget_shopping_cart_content .button,
.woocommerce-MyAccount-content form .button,
.lost_reset_password .button,
form.register .button,
.checkout_coupon .button,
.woocomerce-form .button {
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  color: #fff;
  border-radius: 3em;
  min-width: 150px;
  text-transform: uppercase;
}

form.track_order .button:hover,
.products-list .product_item .product_item--info .add_to_cart_button:hover,
.place-order .button:hover,
.wc-proceed-to-checkout .button:hover,
.widget_shopping_cart_content .button:hover,
.woocommerce-MyAccount-content form .button:hover,
.lost_reset_password .button:hover,
form.register .button:hover,
.checkout_coupon .button:hover,
.woocomerce-form .button:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  color: #fff;
}

.shop_table.cart td.actions .button {
  background-color: transparent;
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("border_color","rgba(150,150,150,0.30)") ) ?>;
}

.shop_table.cart td.actions .button:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.widget_price_filter .button {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.widget_price_filter .button:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

#masthead_aside,
#header_aside {
  background-color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_background","#fff") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_text_color","#9d9d9d") ) ?>;
}

#masthead_aside h1, #masthead_aside .h1, #masthead_aside h2, #masthead_aside .h2, #masthead_aside h3, #masthead_aside .h3, #masthead_aside h4, #masthead_aside .h4, #masthead_aside h5, #masthead_aside .h5, #masthead_aside h6, #masthead_aside .h6, #masthead_aside .title-xlarge,
#header_aside h1,
#header_aside .h1,
#header_aside h2,
#header_aside .h2,
#header_aside h3,
#header_aside .h3,
#header_aside h4,
#header_aside .h4,
#header_aside h5,
#header_aside .h5,
#header_aside h6,
#header_aside .h6,
#header_aside .title-xlarge {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_heading_color","#343538") ) ?>;
}

#masthead_aside ul:not(.sub-menu) > li > a,
#header_aside ul:not(.sub-menu) > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_color","#343538") ) ?>;
}

#masthead_aside ul:not(.sub-menu) > li:hover > a,
#header_aside ul:not(.sub-menu) > li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_hover_color","#35d56a") ) ?>;
}

.header--aside .header_component--dropdown-menu .menu {
  background-color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_background","#fff") ) ?>;
}

.header--aside .header_component > a {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_color","#343538") ) ?>;
}

.header--aside .header_component:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_hover_color","#35d56a") ) ?>;
}

ul.mega-menu .popup li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_color","#696c75") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .popup li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .popup li.active > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .mm-popup-wide .popup li.mm-item-level-2 > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .mm-popup-wide .popup li.mm-item-level-2:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .mm-popup-wide .popup li.mm-item-level-2.active > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .popup > .inner,
ul.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li ul.sub-menu,
ul.mega-menu .mm-popup-narrow ul ul {
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_bg","#fff") ) ?>;
}

ul.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li li:hover > a,
ul.mega-menu .mm-popup-narrow li.menu-item:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .mm-popup-wide .inner > ul.sub-menu > li li li.active > a,
ul.mega-menu .mm-popup-narrow li.menu-item.active > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_dropdown_link_hover_bg","rgba(0,0,0,0)") ) ?>;
}

ul.mega-menu .mm-popup-wide .popup > .inner {
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_bg","#fff") ) ?>;
}

ul.mega-menu .mm-popup-wide .inner > ul.sub-menu > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_wide_dropdown_heading_color","#252634") ) ?>;
}

.site-main-nav .main-menu > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_lv_1_color","#303744") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-main-nav .main-menu > li.active > a,
.site-main-nav .main-menu > li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mm_lv_1_hover_color","#303744") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header .header_component > .component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("header_link_color","#343538") ) ?>;
}

.site-header .header_component--linktext:hover > a .component-target-text,
.site-header .header_component:not(.la_com_action--linktext):hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("header_link_hover_color","#35d56a") ) ?>;
}

.site-header-top {
  background-color: <?php echo esc_attr( Pisces()->settings->get("header_top_background_color","rgba(0,0,0,0)") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("header_top_text_color","rgba(255,255,255,0.2)") ) ?>;
}

.site-header-top .header_component .component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("header_top_text_color","rgba(255,255,255,0.2)") ) ?>;
}

.site-header-top .header_component a.component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("header_top_link_color","#fff") ) ?>;
}

.site-header-top .header_component:hover a .component-target-text {
  color: <?php echo esc_attr( Pisces()->settings->get("header_top_link_hover_color","#35d56a") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .header_component > .component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("transparency_header_text_color","#fff") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .header_component > a {
  color: <?php echo esc_attr( Pisces()->settings->get("transparency_header_link_color","#fff") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .header_component:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("transparency_header_link_hover_color","#35d56a") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("transparency_mm_lv_1_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("transparency_mm_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li.active > a,
.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("transparency_mm_lv_1_hover_color","rgba(0,0,0,0)") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("transparency_mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li.active:before,
.enable-header-transparency .site-header:not(.is-sticky) .site-main-nav .main-menu > li:hover:before {
  background-color: <?php echo esc_attr( Pisces()->settings->get("transparency_mm_lv_1_hover_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header-mobile .site-header-inner {
  background-color: <?php echo esc_attr( Pisces()->settings->get("header_mb_background","#fff") ) ?>;
}

.site-header-mobile .header_component > .component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("header_mb_text_color","#343538") ) ?>;
}

.site-header-mobile .mobile-menu-wrap {
  background-color: <?php echo esc_attr( Pisces()->settings->get("mb_background","#fff") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menuwrapper ul {
  background: <?php echo esc_attr( Pisces()->settings->get("mb_background","#fff") ) ?>;
  border-color: rgba(140, 140, 140, 0.2);
}

.site-header-mobile .mobile-menu-wrap .dl-menuwrapper li {
  border-color: rgba(140, 140, 140, 0.2);
}

.site-header-mobile .mobile-menu-wrap .dl-menu > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_1_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_1_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu > li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_1_hover_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_1_hover_bg_color","#2635c4") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu ul > li > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_2_color","#252634") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_2_bg_color","rgba(0,0,0,0)") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu ul > li:hover > a {
  color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_2_hover_color","#fff") ) ?>;
  background-color: <?php echo esc_attr( Pisces()->settings->get("mb_lv_2_hover_bg_color","#2635c4") ) ?>;
}

.enable-header-transparency .site-header-mobile:not(.is-sticky) .site-header-inner {
  background-color: <?php echo esc_attr( Pisces()->settings->get("header_mb_transparency_background","#fff") ) ?>;
}

.enable-header-transparency .site-header-mobile:not(.is-sticky) .header_component > .component-target {
  color: <?php echo esc_attr( Pisces()->settings->get("header_mb_transparency_text_color","#343538") ) ?>;
}

.cart-flyout {
  background-color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_background","#fff") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_text_color","#9d9d9d") ) ?>;
}

.cart-flyout .cart-flyout__heading {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_heading_color","#343538") ) ?>;
  font-family: <?php echo ( $heading_font_family ) ?>;
}

.cart-flyout .product_list_widget a {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_color","#343538") ) ?>;
}

.cart-flyout .product_list_widget a:hover {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_hover_color","#35d56a") ) ?>;
}

.cart-flyout .widget_shopping_cart_content .total {
  color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_heading_color","#343538") ) ?>;
}

.footer-top {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_text_color","#9d9d9d") ) ?>;
}

.footer-top a {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_link_color","#9d9d9d") ) ?>;
}

.footer-top a:hover {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_link_hover_color","#35d56a") ) ?>;
}

.footer-top .widget .widget-title {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_heading_color","#fff") ) ?>;
}

.footer-bottom {
  background-color: <?php echo esc_attr( Pisces()->settings->get("footer_copyright_background_color","#9d9d9d") ) ?>;
  color: <?php echo esc_attr( Pisces()->settings->get("footer_copyright_text_color","#9d9d9d") ) ?>;
}

.footer-bottom a {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_copyright_link_color","#9d9d9d") ) ?>;
}

.footer-bottom a:hover {
  color: <?php echo esc_attr( Pisces()->settings->get("footer_copyright_link_hover_color","#9d9d9d") ) ?>;
}

.site-header-mobile .mobile-menu-wrap .dl-menu {
  border-width: 1px 0 0;
  border-style: solid;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.076);
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.076);
}

.site-header-mobile .mobile-menu-wrap .dl-menu li {
  border-width: 1px 0 0;
  border-style: solid;
}

.site-header-mobile .mobile-menu-wrap .dl-menuwrapper li.dl-subviewopen,
.site-header-mobile .mobile-menu-wrap .dl-menuwrapper li.dl-subview,
.site-header-mobile .mobile-menu-wrap .dl-menuwrapper li:first-child {
  border-top-width: 0;
}

.wpb-js-composer [class*="vc_tta-la-"] .vc_tta-panel-heading .vc_tta-panel-title .vc_tta-icon {
  margin-right: 10px;
}

.la-myaccount-page .la_tab_control li.active a,
.la-myaccount-page .la_tab_control li:hover a,
.la-myaccount-page .ywsl-label {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.la-myaccount-page .btn-create-account:hover {
  color: #fff;
  background-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
  border-color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.btn.btn-style-outline-bottom:hover {
  background: none !important;
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
  border-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?> !important;
}

.product_item .product_item--thumbnail .wrap-addto .button {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}

.product_item .product_item--thumbnail .wrap-addto .button.added, .product_item .product_item--thumbnail .wrap-addto .button:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.product_item .product_item--thumbnail .add_to_cart_button:hover {
  background-color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.product--summary .add_compare.added,
.product--summary .add_wishlist.added,
.products-list .product_item .product_item--info .add_compare:hover,
.products-list .product_item .product_item--info .add_compare.added,
.products-list .product_item .product_item--info .add_wishlist:hover,
.products-list .product_item .product_item--info .add_wishlist.added {
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
}

.elm-loadmore-ajax .btn.btn-style-outline {
  padding: 0;
  border-width: 0 0 1px;
  min-width: 0;
  text-transform: none;
  font-size: 14px;
  font-weight: normal;
}

.elm-loadmore-ajax .btn.btn-style-outline:hover {
  color: <?php echo esc_attr( Pisces()->settings->get("primary_color","#35d56a") ) ?>;
  background-color: transparent;
}

@media (max-width: 767px) {
  .la-advanced-product-filters {
    background-color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_background","#fff") ) ?>;
    color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_text_color","#9d9d9d") ) ?>;
  }
  .la-advanced-product-filters .widget-title {
    color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_heading_color","#343538") ) ?>;
  }
  .la-advanced-product-filters a {
    color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_color","#343538") ) ?>;
  }
  .la-advanced-product-filters a:hover {
    color: <?php echo esc_attr( Pisces()->settings->get("offcanvas_link_hover_color","#35d56a") ) ?>;
  }
}

.nav-menu-burger {
  color: <?php echo esc_attr( Pisces()->settings->get("secondary_color","#343538") ) ?>;
}
