<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Culture
 * @since 1.0
 * @version 1.0
 * @TODO make content display properly
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-content-box'); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			_e("<h3 class='sticky-post'>featured</h3>",'culture');
		endif;
	?>
	
	<header class="entry-header clearfix">	
		<?php //if ( 'post' === get_post_type()){ ?>
			<div class="col-md-9 col-sm-12 col-xs-12 ttl-cat-wrap <?php if ( get_post_type() != 'post' ) { ?> border-none <?php } ?>">
				<h1 class="entry-title">
					<?php if(is_single()){ ?>
						<?php the_title(); ?>
					<?php } else { ?>
						<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php } ?>
				</h1>
				<?php if(has_category()){ ?><span class="category"><?php the_category('&nbsp;,'); ?></span><?php } ?>
			</div>
		<?php
		//} 
		?>
		
		<?php if ( 'post' === get_post_type() ){
			$event_date = get_post_meta(get_the_ID(), 'event_date', true ); ?>
			<div class="col-md-3 col-sm-12 col-xs-12 date-auth-wrap">
				<h5 class="date"><?php if($event_date && in_category('concerts-and-events')){
						echo date('l F jS Y', strtotime($event_date));
                    } else {
				        echo 'Posted on ' . get_the_date(get_option('date_format'));
					}?></h5>
			</div>
		<?php 
		} 
		?>		
		
		<?php if ( 'page' === get_post_type() ){ ?>
			<div class="col-md-9 col-sm-12 col-xs-12 ttl-cat-wrap <?php if ( get_post_type() != 'post' ) { ?> border-none <?php } ?>">
				<h1 class="entry-title">					
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h1>
			</div>
		<?php 
		} 
		?>
	</header><!-- .entry-header -->

	<?php
		culture_post_thumbnail('full'); // post thumbnail
	?>

	<div class="entry-content">
		<?php
			/* Post Tags */		
			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'culture' ) );
			if ( $tags_list ) {
				printf( '<div class="post-tags"><i class="fa fa-tag" aria-hidden="true"></i><span class="screen-reader-text">%1$s </span>%2$s</div>',
					_x( 'Tags', 'Used before tag names.', 'culture' ),
					$tags_list
				);
			}
		
			/* translators: %s: Name of current post */
			if(is_single()){ 
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'culture' ),
					get_the_title()
				) );
			} else {
				the_excerpt( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'culture' ),
					get_the_title()
				) );
			}
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->