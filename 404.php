<?php
/**
 * The custom template for displaying 404 pages (Not Found)
 */

get_template_part( 'header-no-sidebar');
?>

	<div id="primary" class="content-area mb80 error404">
		<div id="content" class="site-content" role="main">
			<div class="page-wrapper">
				<div class="page-content text-center">
					
					<div class="e404">
						<div class="block">
							<div class="wrapper" data-anim="base wrapper">	
								<span class="sicon-cctv-2"></span>
								<div class="circle" data-anim="base left"></div>
								<div class="circle" data-anim="base right"></div>
							</div>
							
							<h1><?php esc_html_e( 'Désolé ! Page non trouvée !', 'the-guard' ); ?></h1>
							<div class="big">404</div>
						</div>
						<p><?php esc_html_e( 'Il semble que le contenu de cette page a été déplacé. Nous vous proposons de refaire une recherche :', 'the-guard' ); ?></p>
						<?php get_search_form(); ?>
					</div>
			</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
