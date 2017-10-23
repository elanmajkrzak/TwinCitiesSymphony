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
?>

<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12 archive-wrap">
				<div class="inner-content">
					<div class="entry-listing">
						<?php 
							// Start the Loop.
                            $index = 0;
						    query_posts('cat=-' . get_cat_ID('Sponsors') . ',-' . get_cat_ID('Mission Statement'));

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
        <div class="row">
            <div id="container">
                <div class="container">
                    <h1 class="tcs-title">Sponsors</h1>
			        <?php
			        // Start the Loop.
			        $index = 0;
			        query_posts('cat=' . get_cat_ID('Sponsors'));
			        if(have_posts()) :
				        while(have_posts()) : the_post();
					        if ($index % 3 == 0 || $index == 0) :
						        ?>

                                <div class="row">
                                    <div id="content" class="col-12 archive-wrap">
                                        <div class="inner-content">
                                            <div class="entry-listing">
					        <?php endif;
					        get_template_part( 'template-parts/content', 'sponsor' );
					        $index++;
					        if ($index % 3 == 0 || $wp_query->current_post + 1 == $wp_query->post_count) :
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
        </div>
	</div><!-- .container -->
</div><!-- #container -->