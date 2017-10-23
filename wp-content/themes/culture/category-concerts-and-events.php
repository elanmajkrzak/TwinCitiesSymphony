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

    $today = date( 'Y-m-d' );
    $upcoming_args = array(
        'post_type'      => 'post',
        'meta_query'     => array(
            array(
                'key'     => 'event_date',
                'value'   => $today,
                'compare' => '>=',
                'type'    => 'DATE'
            )
        ),
        'category_name' => 'concerts-and-events',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    );

    $upcoming_events = new WP_Query($upcoming_args);

    if($upcoming_events->have_posts() || $past_events->have_posts()) :
	    $index = 0;
        while($upcoming_events->have_posts()) : $upcoming_events->the_post();
        if ($index == 0) : ?>

        <div class="row">
            <div id="container">
                <div class="container">
                    <h1 class="tcs-title">Upcoming Events</h1>
                </div>
            </div>
        </div>
    <?php endif;
        if ($index % 3 == 0 || $index == 0) :
    ?>
        <div class="row">
            <div id="content" class="col-12 archive-wrap">
                <div class="inner-content">
                    <div class="entry-listing">
    <?php endif;
        get_template_part( 'template-parts/content', 'preview' );
        $index++;
        if ($index % 3 == 0 || $upcoming_events->current_post + 1 == $upcoming_events->post_count) :
    ?>
                    </div><!-- .entry-listing-->
                </div><!-- .inner-content-->
            </div><!-- #content -->
        </div><!-- .row -->
    <?php
        endif;
        endwhile;

        wp_reset_postdata();

	    $past_args = array(
		    'post_type'      => 'post',
		    'meta_query'     => array(
			    array(
				    'key'     => 'event_date',
				    'value'   => $today,
				    'compare' => '<',
				    'type'    => 'DATE'
			    )
		    ),
		    'category_name' => 'concerts-and-events',
		    'meta_key' => 'event_date',
		    'orderby' => 'meta_value',
		    'order' => 'DESC'
	    );

	    $past_events = new WP_Query($past_args);

	    $index = 0;
	    while($past_events->have_posts()) : $past_events->the_post();
		    if ($index == 0) : ?>

                <div class="row">
                    <div id="container">
                        <div class="container">
                            <h1 class="tcs-title">Past Events</h1>
                        </div>
                    </div>
                </div>
		    <?php endif;
		    if ($index % 3 == 0 || $index == 0) :
			    ?>
                <div class="row">
                <div id="content" class="col-12 archive-wrap">
                <div class="inner-content">
                <div class="entry-listing">
		    <?php endif;
		    get_template_part( 'template-parts/content', 'preview' );
		    $index++;
		    if ($index % 3 == 0 || $past_events->current_post + 1 == $past_events->post_count) :
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
                        <h1 class="tcs-title">No upcoming events, please check back later</h1>
                    </div><!-- .entry-listing-->
                </div><!-- .inner-content-->
            </div><!-- #content -->
        </div><!-- .row -->
    <?php endif; ?>
    </div><!-- .container -->
    </div><!-- #container -->

<?php
get_footer(); ?>