<?php
/**
 * Template part for displaying page content in page.php
 */
?>
	
	<?php 
		if( have_rows('page_modules') ):
			while ( have_rows('page_modules') ) : the_row();

				// if( get_row_layout() == 'graphical_callout' ):
				// 	get_template_part('template-parts/modules/graphical-callout');
				// elseif( get_row_layout() == 'image_&_copy_card' ):
				// 	get_template_part('template-parts/modules/part-image-copy-card');
				// elseif( get_row_layout() == 'text' ):
				// 	get_template_part('template-parts/modules/text');
				// endif;
	
			endwhile;
		endif;
	?>
