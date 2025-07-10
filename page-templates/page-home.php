<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

$banner_background_video = $fields['banner_background_video'] ?? null;
$banner_heading = $fields['banner_heading'] ?? null;
$banner_text = $fields['banner_text'] ?? null;

$interest_areas_anchor_id = $fields['interest_areas_anchor_id'] ?? null;
$interest_area_cards = $fields['interest_area_cards'] ?? null;

$about_areas_anchor_id = $fields['about_areas_anchor_id'] ?? null;
$about_heading = $fields['about_heading'] ?? null;
$about_email_text = $fields['about_email_text'] ?? null;
$about_email_address = $fields['about_email_address'] ?? null;
$about_copy = $fields['about_copy'] ?? null;

$impact_anchor_id = $fields['impact_anchor_id'] ?? null;
$impact_title = $fields['impact_title'] ?? null;
$impact_text = $fields['impact_text'] ?? null;
$impact_slides = $fields['impact_slides'] ?? null;

$legacy_anchor_id = $fields['legacy_anchor_id'] ?? null;
$legacy_images = $fields['legacy_images'] ?? null;
$legacy_heading = $fields['legacy_heading'] ?? null;
$legacy_copy = $fields['legacy_copy'] ?? null;


?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php if( $banner_background_video || $banner_background_video  || $banner_background_video  ):?>
						<header class="entry-header home-banner text-center">
							<?php if( $banner_background_video ):?>
								<video id="background-video" loop muted autoplay>
									<source src="<?=$banner_background_video;?>" type="video/mp4">
								</video>
							<?php endif;?>
							
							
							<div class="container">
								<section id="heading" class="text-center">
									<?php if( $banner_heading ):?>
										<h1><?=esc_html($banner_heading);?></h1>
									<?php endif;?>
									<?php if($banner_text):?>
										<p class="center"><?=esc_html($banner_text);?></p>
									<?php endif;?>
								</section>
							</div>
							
						</header><!-- .entry-header -->
					<?php endif;?>
				
					<section class="entry-content" itemprop="text">						

						<?php if($interest_area_cards):?>
							<section id="<?=sanitize_title($interest_areas_anchor_id);?>" class="interest-areas">
								<div class="container">
									<div class="areas">
										<ul>
											<?php foreach($interest_area_cards as $card):
												$image = $card['image'] ?? null;
												$title = $card['title'] ?? null;	
											?>
												<li>
													<?php if($image) {
														echo wp_get_attachment_image( $image['id'], 'large' );	
													}?>
													<?php if( $title ):?>
														<h2><?=esc_html($title);?></h2>
													<?php endif;?>
												</li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
							</section>
						<?php endif;?>
						
						<?php if( $about_areas_anchor_id || $about_heading || $about_email_text || $about_email_address  || $about_copy ):?>
							<section id="<?=sanitize_title($about_areas_anchor_id);?>" class="about">
								<div class="container">
									<div class="row">
										<div class="col intro">
											<?php if($about_heading):?>
												<h2><?=wp_kses_post($about_heading);?></h2>
											<?php endif;?>
											<?php if( $about_email_text && $about_email_address ):?> 
												<a href="mailto: <?=esc_attr($about_email_address );?>" class="uppercase">
													<?=wp_kses_post($about_email_text);?>
												</a>
											<?php endif;?>
										</div>
										<?php if( $about_copy ):?>
											<div class="col content">
												<?=wp_kses_post($about_copy);?>
											</div>
										<?php endif;?>
									</div>
								</div>
							</section>
						<?php endif;?>
						
						<?php if( $impact_anchor_id || $impact_title || $impact_text || $impact_slides ):?>
							<section id="<?=sanitize_title($impact_anchor_id);?>" class="impact">
								<div class="container">
									<?php if( $impact_title || $impact_text ):?>
										<div class="heading row reverse">
											<?php if( $impact_title ):?>
												<div class="col">
													<h2 class="h3-like"><?=wp_kses_post($impact_title);?></h2>
												</div>
											<?php endif;?>
											<?php if( $impact_text ):?>
												<div class="col">
													<p><?=esc_html($impact_text);?></p>
												</div>
											<?php endif;?>
										</div>
									<?php endif;?>
									<?php if($impact_slides):?>
										<div class="slideshow">
											<?php $i = 1; foreach($impact_slides as $slide):
												$image = $slide['image'] ?? null;
												$heading = $slide['heading'] ?? null;
												$text = $slide['text'] ?? null;
											?>
												<div class="slide<?php if($i == 1):?> active ready<?php endif;?><?php if($i == 2):?> next<?php endif;?>">
													<?php if($image):?>
														<div class="image">
															<?=wp_get_attachment_image( $image['id'], 'full' );?>
														</div>
													<?php endif;?>
													<?php if( $heading || $text ):?>
														<div class="content">
															<?php if( $heading ):?>
																<h2 class="uppercase"><?=esc_html($heading);?></h2>
															<?php endif;?>
															<?php if( $text ):?>
															<h3><?=esc_html($text);?></h3>
															<?php endif;?>
														</div>
													<?php endif;?>
												</div>
											<?php $i++; endforeach;?>
											<a id="next-slide" alt="Next Slide" href="#"></a>
										</div>
									<?php endif;?>
								</div>
							</section>
						<?php endif;?>
						
						<?php if( $legacy_anchor_id || $legacy_images || $legacy_heading || $legacy_copy ):?>
							<section id="legacy-container" class="legacy-container">
								<div class="container" id="<?=sanitize_title($legacy_anchor_id);?>">
									<div class="row">
										<?php if( $legacy_images ):?>
											<div class="col images">
												<?php $i = 1; foreach($legacy_images  as $legacy_image ):?>
													<div class="image slide<?=$i;?>">
														<?=wp_get_attachment_image( $legacy_image['id'], 'large' );?>
													</div>
												<?php $i++; endforeach;?>
											</div>
										<?php endif;?>
										<div class="col content">
											<h2>A Legacy of Giving</h2>
											<p>The Hackerman Foundation comes from a long line of generational giving that began with a vision from husband and wife team, Willard Hackerman and Lillian Patz Hackerman in the spirit of their parents, and even their parents’ parents.</p>
											<p>Each generation has devoted generous amounts of time and funding to various institutions with a particular focus on underserved and underseen communities. Since her parents’ passing, their daughter Nancy Hackerman has taken the helm. She remains steadfast in honoring the vision of her parents while also staying nimble enough to meet the needs of communities today.</p>
										</div>
									</div>
								</div>
							</section>
						<?php endif;?>
						
					</section> <!-- end article section -->
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();