<?php 
	$content_alignment = get_theme_mod('woocom_about_align', 'center');
 ?>
<section class="about-services py-5 bg-gray text-<?php echo $content_alignment; ?>">
	<div class="container">
		<div class="row">
			<h2 id="wc-about-title"><?php echo esc_html( get_theme_mod('woocom_about_title', 'About Services', 'woocom') ); ?></h2>
			<div id="wc-about-desc">
				<?php 
					echo apply_filters('the_content', get_theme_mod('woocom_about_desc'));
					
					$attachment_id = attachment_url_to_postid( get_theme_mod('woocom_image_upload'));
					echo wp_get_attachment_image( $attachment_id );
				 ?>
			</div>
			<p></p>
		</div>
	</div>
</section>