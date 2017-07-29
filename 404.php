<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package sparkling
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="post-inner-content">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sparkling' ); ?></h1>
					</header><!-- .page-header -->

					
					

						

				</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
