<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content <?php theguard_number_of_columns(); ?>" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( esc_html__( 'Daily Archives: %s', 'the-guard' ), get_the_date() );
					elseif ( is_month() ) :
						printf( esc_html__( 'Monthly Archives: %s', 'the-guard' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'the-guard' ) ) );
					elseif ( is_year() ) :
						printf( esc_html__( 'Yearly Archives: %s', 'the-guard' ), get_the_date( _x( 'Y', 'yearly archives date format', 'the-guard' ) ) );
					else :
						esc_html_e( 'Archives', 'the-guard' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content' ); ?>
			<?php endwhile; ?>

			<?php
			echo '<div class="blogpagination">';
			echo paginate_links();
			echo '</div>';
			?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
