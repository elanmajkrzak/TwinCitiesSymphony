<?php
/**
 * Created by PhpStorm.
 * User: Elan Majkrzak
 * Date: 10/19/2017
 * Time: 4:55 PM
 * @TODO add date to preview for concerts and events, maybe add preview image too?
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page-preview col-md-4 col-sm-12'); ?>>
	<header class="entry-header clearfix">
		<div class="col-12 ttl-cat-wrap">
			<h1 class="entry-title">
				<?php if(is_single()){ ?>
					<?php the_title(); ?>
				<?php } else { ?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<?php } ?>
			</h1>
			<?php if(has_category()){ ?><span class="category"><?php the_category('&nbsp;,'); ?></span><?php } ?>
		</div>
	</header><!-- .entry-header -->

	<?php
	culture_post_thumbnail('full'); // post thumbnail
	?>
</article><!-- #post-## -->