<!-- HEADER 6 START -->
<div class="shortheader1 <?php sell_header6_switch(); ?>">
    <?php theguard_topbar_r(); ?>

    <div class="sell_menuline default" <?php theguard_sticky_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <?php theguard_logo_img(); ?>

                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 nav-wrap">
                    <div class="navbar navbar-default">

                            <div class="navbar-header visible-sm visible-xs pull-right">
                                <button type="button" class="navbar-toogle open-menu-list" data-toggle="collapse" data-target="#responsive-menu"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="collapse navbar-collapse pull-right" id="responsive-menu">
                                <ul class="nav navbar-nav nav-list">
                                    <?php theguard_set_nav(); ?>
                                    <?php theguard_search_menu(); ?>
                                    <?php theguard_cart_menu(); ?>
                                </ul>
                            </div>
                    </div>
                </div>
				<?php
				echo '<div class="col-md-1 col-sm-12 col-xs-12 soumission">';		
					echo '<ul>';
					wp_nav_menu(array( 'menu' => 'Demande de soumission Top', 'menu_id'=> 'menu-soumission-top', 'container_class' => 'menu-customer_area',
					'echo' => true, 'before' => '', 'after' => '', 'link_before' => ''));
					echo '</ul>';
				echo '</div>';
				?>
            </div>
        </div>
    </div>

    <div class="container-fluid pageheading">
        <div class="overslider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?
						//si on est dans la boutique
						// afficher le titre de la catégories ou du produit
						//autrement afficher titre page
						//ici ajouter le title de la page woocommerce : catégorie ou produit*/
						global $secretlab;
						global $post, $product;
						if ($secretlab['theguard_page_type'] == 'shop') {
							if(!is_shop()){
								if(single_cat_title("", false))
								{
									//on affiche le nom  de  la catégorie
									$current_category = single_cat_title("", false);
									echo '<h1 itemprop="name" class="product_title entry-title">'.$current_category.'</h1>';
								}else{
									//on affiche le titre du produit
									the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' );
								}
							}else{
								//on affiche le titre de la boutique
								echo '<h1 itemprop="name" class="product_title entry-title">Téléphones et périphériques</h1>';
							}
						}else{
						?>
						<h1><?php
                            echo get_the_title();
                            ?></h1>
						<? 
						} //fin affichage titre
						?>
                        <div class="hidden-xs hidden-sm">
                            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                                <?php if ( function_exists('yoast_breadcrumb') )
                                {yoast_breadcrumb('','');} ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="sliderh4under">
            <?php theguard_set_customized_slider(); ?>
        </div>
    </div>

</div>
<!-- HEADER 6 END -->
