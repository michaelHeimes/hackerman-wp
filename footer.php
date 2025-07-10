<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
$news_anchor_id = get_field('news_anchor_id', 'option') ?? null;
$news_heading = get_field('global_footer_news_heading', 'option') ?? null;
$news_links = get_field('global_footer_news_links', 'option') ?? null;

$global_footer_logo = get_field('global_footer_logo', 'option') ?? null;
$global_footer_contact_email = get_field('global_footer_contact_email', 'option') ?? null;
$global_footer_copyright_text = get_field('global_footer_copyright_text', 'option') ?? null;
?>

				<footer id="colophon" class="site-footer">
					<div class="container">
						<div class="row">
							<section id="<?=sanitize_title($news_anchor_id);?>" class="col news">
								<?php if( $news_heading ):?>
									<h2 class="h3-like uppercase"><?=wp_kses_post( $news_heading );?></h3>
								<?php endif;?>
								<div class="controls">
									<a href="#" id="news_playpause" class="playpause pause"></a>
								</div>
								<div class="news-holder">
									<?php $i = 1; foreach($news_links as $news_link):
										$url = $news_link['url'] ?? null;
										$article_title = $news_link['article_title'] ?? null;
										$source = $news_link['source'] ?? null;
										if( $url || $article_title || $source ):
									?>
										<div class="news-article<?php if( $i == 1 ):?> active<?php endif;?>">
											<a href="<?=esc_url($url);?>" target="_blank" aria-label="Links to <?=wp_kses_post($source);?> to the article '<?=wp_kses_post($article_title);?>' in a new tab">
												<?php if( $article_title ):?>
													<?=wp_kses_post($article_title);?>
												<?php endif;?>
											</a>
											<?php if( $source ):?>
												<p class="source"><?=wp_kses_post($source);?></p>
											<?php endif;?>
										</div>
									<?php $i++; endif; endforeach;?>
								</div>
							</section>
							<section id="footer" class="col">
								<a href="#top" rel="home" title="<?php bloginfo( 'name' ); ?>">
									<?php if( $global_footer_logo ) {
										echo wp_get_attachment_image( $global_footer_logo['id'], 'full' );
									} else {
										bloginfo( 'name' );
									};?>
								</a>
								<?php if( $global_footer_contact_email ):?>
									<a href="mailto: <?=esc_url($global_footer_contact_email);?>">
										<?=esc_attr($global_footer_contact_email);?>
									</a>
								<?php endif;?>
								<?php if( $global_footer_copyright_text ):?>
									<p class="copyright">&copy; <?=date('Y');?> <?=wp_kses_post($global_footer_copyright_text);?></p>
								<?php endif;?>
							</section>
						</div>
					</div>
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
