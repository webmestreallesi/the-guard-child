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