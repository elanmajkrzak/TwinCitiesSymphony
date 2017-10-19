<?php
/**
 * Created by PhpStorm.
 * User: Elan Majkrzak
 * Date: 10/19/2017
 * Time: 4:32 PM
 * @TODO add separator for upcoming and past
 * @TODO change display for concerts and events
 */

get_header(); ?>

	<div id="container">
		<div class="container">
			<?php
			// Start the Loop.
			$index = 0;
			if(have_posts()) :
				while(have_posts()) : the_post();
				if ($index % 3 == 0) :
			?>

				<div class="row">
					<div id="content" class="col-12 archive-wrap">
						<div class="inner-content">
							<div class="entry-listing">
							<?php endif;
								get_template_part( 'template-parts/content', 'preview' );
								$index++;
								if ($index % 3 == 0 || !has_more_posts()) :
							?>
							</div><!-- .entry-listing-->
						</div><!-- .inner-content-->
					</div><!-- #content -->
				</div><!-- .row -->
			<?php
				endif;
				endwhile;
				else :
			?>
				<div class="row">
					<div id="content" class="col-12 archive-wrap">
						<div class="inner-content">
							<div class="entry-listing">
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							</div><!-- .entry-listing-->
						</div><!-- .inner-content-->
					</div><!-- #content -->
				</div><!-- .row -->
			<?php endif; ?>
		</div><!-- .container -->
	</div><!-- #container -->

<?php get_footer(); ?>