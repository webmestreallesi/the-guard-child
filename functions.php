<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'slick_css','theguard_alicobold','theguard_sicon','theguard_fontawesome','theguard_css','theguard_ownstyles','theguard_ownstyles' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css' );

// END ENQUEUE PARENT ACTION

/**** DEBUT TOP BAR CUSTOMIZATION***/
// Topbar 2 customization :
//	- align mail/phobe left
// 	- add polylang switcher languages
//doc : https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
if ( ! function_exists( 'theguard_topbar_r' ) ) {
	function theguard_topbar_r()
	{
		global $secretlab;
		if (isset ($secretlab['header-topbar'])) {
			$sl_header_topbar = $secretlab['header-topbar'];
			if ($sl_header_topbar == 1) {
				echo '<div class="sell_topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12 cdata">';
					theguard_phone_header();
					//theguard_email_header();
				echo '</div>
				<div class="col-md-2 col-sm-12 col-xs-12 languages">';
					//call language switcher polylang
					echo '<ul>';
					pll_the_languages(array('show_flags'=>1,'show_names'=>1, 'hide_current'=>1, 'dropdown'=>0));
					echo '</ul>';
				echo '</div>
				<div class="col-md-2 col-sm-12 col-xs-12 languages">';
					//lien espace client
					echo '<ul>';
					wp_nav_menu(array( 'menu' => 'Espace client Top', 'menu_id'=> 'menu-espace-client-top', 'container_class' => 'menu-customer_area',
    'echo' => true, 'before' => '<i class="ultimate1600-user"></i>', 'after' => '', 'link_before' => ''));
					echo '</ul>';
				echo '</div>  
				<div class="col-md-2 col-sm-12 col-xs-12 social">';	
					theguard_socialbuttons_header();
				echo '</div>  
				  					
			</div>
		</div>
	</div>';
			}
		}
	}
}

/*FIN TOP BAR CUSTOMIZATION*/

/*Sidebar customization*/
//list of pages - parent page id
function theguard_set_header_sidebar_layout_custom() {
	global $secretlab, $theguard_layout;
	$sl_sidebar_layout = isset($theguard_layout[$secretlab['theguard_pagetype_prefix'] . 'sidebar-layout']) ? $theguard_layout[$secretlab['theguard_pagetype_prefix'] . 'sidebar-layout'] : 1;
	if ($sl_sidebar_layout == 2 or $sl_sidebar_layout == 3) {
		echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 widget-area">';
		if ($secretlab['theguard_page_type'] == ''){
			$prefix = '';
		}else{
			$prefix = '_';
		}
		if (isset($theguard_layout[$secretlab['theguard_page_type'] . $prefix . 'left_sidebar_widgets'])) {
			dynamic_sidebar($theguard_layout[$secretlab['theguard_page_type'] . $prefix . 'left_sidebar_widgets']);
			//display sub pages
			child_page_nav();
		} else {
			dynamic_sidebar($secretlab['theguard_page_type'] . '_default_left_sidebar');
			//display sub pages
			child_page_nav();
		}
		echo '</div>';
	}
	if ($sl_sidebar_layout == 1) {
		echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main">';
	}
	if ($sl_sidebar_layout == 2) {
		echo '<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 pr40 pl40 main blogsidebarspage">';
	}
	if ($sl_sidebar_layout == 3) {
		echo '<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pl40 main blogsidebarpage">';
	}
	if ($sl_sidebar_layout == 4) {
		echo '<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 pr40 main blogsidebarpage">';
	}
}
/*end Sidebar customization*/

function child_page_nav(){
	$post = get_post();
	//GET CHILD PAGES IF THERE ARE ANY
	$children = get_pages('child_of='.$post->ID);
	//GET PARENT PAGE IF THERE IS ONE
	$parent = $post->post_parent;

	//DO WE HAVE SIBLINGS?
	$siblings =  get_pages('child_of='.$parent);

	if( count($children) != 0) {
	   $args = array(
		 'depth' => 1,
		 'title_li' => '',
		 'child_of' => $post
	   );

	} elseif($parent != 0) {
		echo 'enfants';
		$args = array(
			 'depth' => 2,
			 'title_li' => '',
			 'child_of' => $parent
		   );
	}
	//Show pages if this page has more than one sibling 
	// and if it has children 
	if(count($siblings) > 1 && !is_null($args))   
	{
		echo '<div class="sidebar-left-list-pages">';
				'<ul>';
			wp_list_pages($args);
		echo '	 </ul>';
		echo ' </div>';
	}
}

/*woocmmerce desactivation des onglets*/
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
    function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}
/*woocommerce sort by customization*/
// Edit WooCommerce dropdown menu item of shop page//
// Options: menu_order, popularity, rating, date, price, price-desc	
function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["price"]);
    unset($orderby["price-desc"]);
	unset($orderby["popularity"]);
	unset($orderby["rating"]);
	unset($orderby["date"]);
	unset($orderby["menu_order"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );
//remove orderby block	
remove_action( "woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30 );

/*on affiche pas le titre de la page woocoremmerce*/
	add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
*/
function woo_hide_page_title() {
	return false;
}
//affichage du titre de la page d'accueil de la boutique
add_filter( 'woocommerce_page_title', 'woo_shop_page_title');
function woo_shop_page_title( $page_title ) {
  if( 'Shop' == $page_title) {
			   return "Téléphones et périphériques";
	 }
}