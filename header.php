<?php

/**
 * The Header template for our theme
 */
 
sell_set_globals();
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php 
	    theguard_headicons();
		
        do_action('get_header_scripts');
		theguard_set_boxed_background();
		wp_head();
	?>
</head>
<?
$examplePost = get_post();

echo $examplePost->ID;
echo "page courante :".$examplePost->ID;
print_r(array_values($posts));
$tab =  $posts['ID'];
echo $tab;
?>
<body <?php body_class(); ?>>

<?php
	theguard_pageloader();
    theguard_set_boxed_layout();
	theguard_head_num();
?>

<main>
	<div class="container">
		<div class="row">
			<?php
			theguard_set_header_sidebar_layout_custom();
			?>

