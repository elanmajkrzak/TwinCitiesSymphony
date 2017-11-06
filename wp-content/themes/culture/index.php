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
						    query_posts('cat=-' . get_cat_ID('Sponsors') . ',-' . get_cat_ID('Mission Statement')  . ',-' . get_cat_ID('Uncategorized'));

							if(have_posts()) : 
							while(have_posts() && $index < 3) : the_post();
							    $postClasses = '';
							    if ($wp_query->found_posts == 2 && $index == 0) {
								    $postClasses = 'front-page-preview col-md-4 col-md-offset-2 col-sm-12';
                                } else if ($wp_query->found_posts == 1 && $index == 0) {
								    $postClasses = 'front-page-preview col-md-4 col-md-offset-4 col-sm-12';
                                } else {
									$postClasses = 'front-page-preview col-md-4 col-sm-12';
                                }
								include(locate_template('template-parts/content-preview.php'));
							    $index++;
							endwhile;
							wp_reset_postdata();
						?>
						<?php else : 
						// Include the page content template.
						get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
						
					</div><!-- .entry-listing-->
				</div><!-- .inner-content-->
			</div><!-- #content -->
		</div><!-- .row -->
		<?php
		// Start the Loop.
		$index = 0;
		$numSponsors = query_posts('cat=' . get_cat_ID('Sponsors'));
		if(have_posts()) : ?>
        <div class="row">
            <div id="container">
                <div class="container">
                    <h1 class="tcs-title">Sponsors</h1>
                    <?php
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
                    wp_reset_postdata();
                    ?>
                </div><!-- .container -->
            </div><!-- #container -->
        </div>
        <?php endif; ?>
	</div><!-- .container -->
</div><!-- #container -->