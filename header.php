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
			theguard_set_header_sidebar_layout();
			?>
<?//GET CHILD PAGES IF THERE ARE ANY
		$children = get_pages('child_of='.$post->ID);

		//GET PARENT PAGE IF THERE IS ONE
		$parent = $post->post_parent;

		//DO WE HAVE SIBLINGS?
		$siblings =  get_pages('child_of='.$parent);

		if( count($children) != 0) {
		   $args = array(
			 'depth' => 1,
			 'title_li' => '',
			 'child_of' => $post->ID
		   );

		} elseif($parent != 0) {
			$args = array(
				 'depth' => 1,
				 'title_li' => '',
				 'exclude' => $post->ID,
				 'child_of' => $parent
			   );
		}
		//Show pages if this page has more than one sibling 
		// and if it has children 
		if(count($siblings) > 1 && !is_null($args))   
		{
?>
		<div class="widget subpages">
		<h3 class="widgettitle">Also in this Section</h3>
			 <ul class="pages-list">
			 <?php wp_list_pages($args);  ?>
			 </ul>
		 </div>

