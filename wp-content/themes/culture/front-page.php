<?php
/**
 * Created by PhpStorm.
 * User: Elan Majkrzak
 * Date: 10/12/2017
 * Time: 5:46 PM
 */
$logo_dir = '/images/tc_symphony_logo.svg';

get_header(); ?>

<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12 archive-wrap">
				<div class="inner-content">

					<!-- #logo section-->
					<div id="logo">
                        <?php
                            $logo = file_get_contents(get_template_directory_uri().$logo_dir, FILE_USE_INCLUDE_PATH);

                            echo $logo;
                        ?>
					</div>
					<!-- #logo -->
					<div class="entry-listing">
						<?php
						// Start the Loop.
						if(have_posts()) :
							while(have_posts()) : the_post();
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous page', 'culture' ),
								'next_text'          => __( 'Next page <i class="fa fa-angle-right" aria-hidden="true"></i>', 'culture' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'culture' ) . ' </span>',
							));
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