<?php
	$row = get_row_index();
	$image = $args['photo'];
	$name = $args['name'];
	$title_affiliation = $args['title_&_affiliation'];
	$bio = $args['bio'];
?>
<div class="team-card cell">
	<div class="inner grid-x flex-dir-column align-middle">
		<div class="photo-wrap relative">
			<?php 
			if( !empty( $image ) ): ?>
			<div class="img-wrap team-img-wrap circle">
				<img src="<?php echo $image['sizes']['team-photo']; ?>" width="<?php echo $image['sizes']['team-photo-width']; ?>" height="<?php echo $image['sizes']['team-photo-height']; ?>" alt="<?php echo $image['caption']; ?>" />
			</div>
			<?php endif; ?>
			<?php get_template_part('template-parts/icons-svgs/three-stripes');?>
		</div>
		<div class="relative text-center">
			<h3 class="h4 uppercase"><?php echo $name;?></h3>
			<h4 class="h6"><?php echo $title_affiliation;?></h4>
		</div>
		<div class="btn-wrap">
			<button class="button<?php if($add_chev == 'true'):?> chev-link grid-x align-middle<?php endif;?>" data-open="person-<?php echo $row ;?>">
				<span>Bio</span>
				<svg xmlns="http://www.w3.org/2000/svg" width="9.254" height="15.679" viewBox="0 0 9.254 15.679">
				  <path id="Path_773" data-name="Path 773" d="M267.723,1265.463l7.132,7.132-7.132,7.132" transform="translate(-267.016 -1264.756)" fill="none" stroke="#000" stroke-width="2"/>
				</svg>
			</button>
		</div>
	</div>
</div>

<div class="reveal team-reveal" id="person-<?php echo $row ;?>" data-reveal>
	<div class="top-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/team-reveal-lines.png);background-size: cover;">
		<div class="grid-x align-right">
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" width="37.973" height="38.615" viewBox="0 0 37.973 38.615">
		  		<g id="Icon_ionic-ios-close-circle-outline" data-name="Icon ionic-ios-close-circle-outline" transform="translate(-0.389 -0.067)">
					<rect id="Rectangle_170" data-name="Rectangle 170" width="37.973" height="38.615" rx="18.986" transform="translate(0.389 0.067)" fill="#019fdb"/>
					<path id="Path_55" data-name="Path 55" d="M26.316,24.289,21.586,19.56l4.729-4.729A1.434,1.434,0,0,0,24.288,12.8l-4.729,4.729L14.829,12.8A1.434,1.434,0,0,0,12.8,14.831L17.53,19.56,12.8,24.289a1.387,1.387,0,0,0,0,2.028,1.425,1.425,0,0,0,2.028,0l4.729-4.729,4.729,4.729a1.441,1.441,0,0,0,2.028,0A1.425,1.425,0,0,0,26.316,24.289Z" transform="translate(-0.181 -0.182)"/>
					<path id="Path_56" data-name="Path 56" d="M19.375,5.529A13.841,13.841,0,1,1,9.583,9.583a13.755,13.755,0,0,1,9.792-4.054m0-2.154a16,16,0,1,0,16,16,16,16,0,0,0-16-16Z" fill="#0fa3df"/>
		  		</g>
				</svg>
			</button>
		</div>
		<div class="grid-x align-center">
			<div class="cell">
				<div class="photo-title">
					<div class="grid-x flex-dir-column align-middle">
						<div class="photo-wrap relative">
							<?php 
							if( !empty( $image ) ): ?>
							<div class="img-wrap team-img-wrap circle">
								<img src="<?php echo $image['sizes']['team-photo']; ?>" width="<?php echo $image['sizes']['team-photo-width']; ?>" height="<?php echo $image['sizes']['team-photo-height']; ?>" alt="<?php echo $image['caption']; ?>" />
							</div>
							<?php endif; ?>
							<?php get_template_part('template-parts/icons-svgs/three-stripes');?>
						</div>
						<div class="text-center">
							<h3 class="h4 uppercase"><?php echo $name;?></h3>
							<h4 class="h6"><?php echo $title_affiliation;?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="grid-x align-center">
		<div class="cell">
			<div class="inner">
				<div class="text-wrap">
					<?php echo $bio;?>
				</div>
			</div>
		</div>
	</div>
	</button>
</div>