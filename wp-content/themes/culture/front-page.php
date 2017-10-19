<?php
/**
 * Created by PhpStorm.
 * User: Elan Majkrzak
 * Date: 10/12/2017
 * Time: 5:46 PM
 * @TODO add sponsors post type and listing on front page
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
                    <?php
                        $mission_statement = new WP_Query( array( 'category_name' => 'mission-statement' ) );
                        if ($mission_statement->have_posts()) {
	                        $mission_statement->the_post();

	                        echo '<h1 class="post-title" id="mission-statement">' . get_the_content() . '</h1>';

	                        wp_reset_postdata();
                        }

                        if ( 'posts' == get_option( 'show_on_front' ) ) {
                            include(get_home_template());
                        } else {
	                        include(get_page_template());
                        }
                    ?>
				</div><!-- .inner-content-->
			</div><!-- #content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->

<?php get_footer(); ?>