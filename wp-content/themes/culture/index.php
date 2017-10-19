<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header(); ?>

<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12 archive-wrap">
				<div class="inner-content">
					<div class="entry-listing">
						<?php 
							// Start the Loop.
                            $index = 0;
							if(have_posts()) : 
							while(have_posts() && $index < 3) : the_post();
							get_template_part( 'template-parts/content', 'preview' );
							$index++;
							endwhile;
						?>
						<?php else : 
						// Include the page content template.
						get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
						
					</div><!-- .entry-listing-->
				</div><!-- .inner-content-->
			</div><!-- #content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->

<?php get_footer(); ?>