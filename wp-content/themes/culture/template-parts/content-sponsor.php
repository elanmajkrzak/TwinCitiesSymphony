<?php
/**
 * Created by PhpStorm.
 * User: Elan Majkrzak
 * Date: 10/20/2017
 * Time: 10:41 AM
 */?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page-sponsor col-md-4 col-sm-12'); ?>>
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->