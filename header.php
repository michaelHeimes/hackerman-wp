<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<link rel="canonical" href="https://www.thehackermanfoundation.org" />
	
	  <link rel="apple-touch-icon" sizes="57x57" href="<?=get_template_directory_uri();?>/apple-icon-57x57.png">
	  <link rel="apple-touch-icon" sizes="60x60" href="<?=get_template_directory_uri();?>/apple-icon-60x60.png">
	  <link rel="apple-touch-icon" sizes="72x72" href="<?=get_template_directory_uri();?>/apple-icon-72x72.png">
	  <link rel="apple-touch-icon" sizes="76x76" href="<?=get_template_directory_uri();?>/apple-icon-76x76.png">
	  <link rel="apple-touch-icon" sizes="114x114" href="<?=get_template_directory_uri();?>/apple-icon-114x114.png">
	  <link rel="apple-touch-icon" sizes="120x120" href="<?=get_template_directory_uri();?>/apple-icon-120x120.png">
	  <link rel="apple-touch-icon" sizes="144x144" href="<?=get_template_directory_uri();?>/apple-icon-144x144.png">
	  <link rel="apple-touch-icon" sizes="152x152" href="<?=get_template_directory_uri();?>/apple-icon-152x152.png">
	  <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri();?>/apple-icon-180x180.png">
	  <link rel="icon" type="image/png" sizes="192x192"  href="<?=get_template_directory_uri();?>/android-icon-192x192.png">
	  <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri();?>/favicon-32x32.png">
	  <link rel="icon" type="image/png" sizes="96x96" href="<?=get_template_directory_uri();?>/favicon-96x96.png">
	  <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri();?>/favicon-16x16.png">
	  <meta name="msapplication-TileColor" content="#ffffff">
	  <meta name="msapplication-TileImage" content="<?=get_template_directory_uri();?>/ms-icon-144x144.png">
	  <meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'trailhead' ); ?></a>
		
				<header class="site-header" role="banner">
					<?php //get_template_part( 'template-parts/nav', 'offcanvas-topbar' ); ?>
					<div class="grid-x grid-padding-x align-center">
						<?php trailhead_top_nav_left();?>
						<ul class="menu logo-menu cell shrink show-for-tablet">
							<li class="logo branding">
								<a href="<?php echo home_url(); ?>">
								<?php 
								$header_logo = get_field('header_logo', 'option');
								if( !empty( $header_logo ) ){
									echo wp_get_attachment_image( $header_logo['id'], 'full' );
								};?>
								</a>
							</li>
						</ul>
						<?php trailhead_top_nav_right();?>
						<ul class="menu logo-menu mobile cell small-12 hide-for-tablet grid-x align-center">
							<li class="logo branding text-center small-12">
								<a href="<?php echo home_url(); ?>">
								<?php 
								$header_logo = get_field('header_logo', 'option');
								if( !empty( $header_logo ) ){
									echo wp_get_attachment_image( $header_logo['id'], 'full' );
								};?>
								</a>
							</li>
						</ul>
					</div>
				</header><!-- #masthead -->
				
				<a href="#top" id="sticky"><img src="<?=get_template_directory_uri();?>/assets/image/logo-sticky.png" alt="The Hackerman Foundation"></a>
				
				<div class="off-canvas-wrapper">
				
				<!-- Load off-canvas container. Feel free to remove if not using. -->			
				<?php get_template_part( 'template-parts/content', 'offcanvas' ); ?>
				
					<div class="off-canvas-content" data-off-canvas-content>
						<div id="page" class="site">
	