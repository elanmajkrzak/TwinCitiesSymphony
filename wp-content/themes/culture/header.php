<?php
/**
 * The Header for our theme
 *
 * @subpackage Culture
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
<!-- #header Section Starts -->
<header id="header">	
	<!-- .header-wrapper -->
	<div class="header-wrapper">		
		<!-- .header-nav -->
		<div class="header-nav">
			<div class="container">
				<div class="row">
					
					<!-- #main-navigation-->
					<?php 
					if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'Header' ) ){
						wp_nav_menu(array( 'container_class' => 'main-navigation col-md-8 col-sm-8 col-xs-3', 'container_id' => 'main-navigation', 'menu_id' => 'main-nav','menu_class' => 'menu clearfix','theme_location' => 'Header' )); 
					}
					else{
					?>
					<nav id="main-navigation" class="main-navigation col-md-8 col-sm-8 col-xs-3">
						<ul id="main-nav" class="menu clearfix">
							<?php wp_list_pages('title_li=&depth=0'); ?>
						</ul>
					</nav>
					<?php 
					}
					?>
					<!-- #main-navigation -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .header-nav -->		
	</div><!-- .header-wrapper -->
	
	<!-- display .header-banner for "Blog page template" -->
	<?php if ( is_page_template( 'page-templates/template-blog.php' ) ) { ?>
		<!-- .header-banner -->
		<div class="header-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<?php 
						$authorid = get_theme_mod( 'user_id');
						$username = get_the_author_meta('display_name',$authorid);
						$userbio  = get_the_author_meta('description',$authorid);		
						?>
						<!-- .author description starts -->
						<?php if (!empty($authorid)){ ?>
							<div class="author-desc-box">																	
								<div class="author-image"><?php culture_get_author_avatar($authorid); ?></div>
								<div class="author-detail">
									<?php if(!empty($username)){ ?>
										<div class="author-name">
											<h3><?php echo esc_attr( $username ); ?></h3>								
										</div>
									<?php } ?>
									
									<?php if(!empty($userbio)){ ?>
										<div class="author-desc">
											<h5><?php echo esc_attr( $userbio ); ?></h5>								
										</div>
									<?php } ?>
								</div><!-- .author-detail -->							
							</div><!-- .author-desc-box ends -->
						<?php } ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .header-banner ends -->
	<?php 
	} 
	?>
</header>
<!-- #header Section Ends -->