<?php

/**
 * Template Name: Contact Us
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		the_post(); ?>
		<?php // echo get_template_part('/template-parts/breadcrumb'); ?>

		<div class="contact-area pt-0 pb-60">
			<?php $page_class = is_page('contact-02') ? 'contact_two' : ''; ?>
			<div class="container<?php echo $page_class; ?>">

				<div class="contact-map mb-10">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7295.928435579297!2d90.38430800000002!3d23.890887499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1639254595417!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>

				<div class="custom-row-2">
					<div class="col-lg-4 col-md-5">
						<div class="contact-info-wrap">
							<div class="single-contact-info">
								<div class="contact-icon"><i class="bi-phone"></i></div>
								<div class="contact-info-dec">
									<p>+8801150338042</p>
								</div>
							</div>
							<div class="single-contact-info">
								<div class="contact-icon"><i class="bi-globe"></i></div>
								<div class="contact-info-dec">
									<p><a href="mailto:anhamoni1@gmail.com">wonderstech@gmail.com</a></p>
								</div>
							</div>
							<div class="single-contact-info">
								<div class="contact-icon"><i class="bi-map"></i></div>
								<div class="contact-info-dec">
									<p>Address goes here, </p>
									<p>street, Crossroad 123.</p>
								</div>
							</div>
							<div class="contact-social text-center">
								<h3>Follow Us</h3>
								<ul>
									<li><a target="_blank" rel="noopener noreferrer" href=""><i class="bi-facebook"></i></a></li>
									<li><a href="#"><i class="bi-pinterest"></i></a></li>
									<li><a href="#"><i class="bi-twitter"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-7">
						<div class="contact-form">
							<div class="contact-title mb-30">
								<h2>Get In Touch</h2>
							</div>
							<?php if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) ) :
								//echo do_shortcode('[wpforms id="4569"]');
							endif; ?>							
						</div>
					</div>
				</div>
			</div>
			<?php if (is_page('contact-03')) : ?>
				<div class="conditional_contact_3 section inner-section 69f688a section-full_width section-height-default section-height-default" data-id="69f688a" data-_type="section">
					<div class="container column-gap-no">
						<div class="row">
							<div class="column col-md-4" data-id="fc4f063" data-_type="column">
								<div class="widget-wrap populated">
									<div class="e756b16 position-left widget-mobile__width-initial view-default vertical-align-top widget widget-icon-box" data-id="e756b16" data-_type="widget" data-widget_type="icon-box.default">
										<div class="widget-container">

											<div class="icon-box-wrapper">
												<div class="icon-box-icon">
													<span class="icon animation-">
														<i aria-hidden="true" class="kosi-icon- kosi-icon-location"></i> </span>
												</div>
												<div class="icon-box-content">
													<h5 class="icon-box-title">
														<span>Address </span>
													</h5>
													<p class="icon-box-description">236 5th SE Avenue, New York <br />NY10000, United States </p>
												</div>
											</div>
										</div>

										<div class="74e4a48 position-left view-default vertical-align-top widget widget-icon-box" data-id="74e4a48" data-_type="widget" data-widget_type="icon-box.default">
											<div class="widget-container">
												<div class="icon-box-wrapper">
													<div class="icon-box-icon">
														<span class="icon animation-">
															<i aria-hidden="true" class="kosi-icon- kosi-icon-call"></i> </span>
													</div>
													<div class="icon-box-content">
														<h5 class="icon-box-title">
															<span>
																Phone </span>
														</h5>
														<p class="icon-box-description">
															Mobile: +(84) 546-6789<br>
															Hotline: +(84) 456-6789 </p>
													</div>
												</div>
											</div>
										</div>
										<div class="0b3fd26 position-left view-default vertical-align-top widget widget-icon-box" data-id="0b3fd26" data-_type="widget" data-widget_type="icon-box.default">
											<div class="widget-container">
												<div class="icon-box-wrapper">
													<div class="icon-box-icon">
														<span class="icon animation-">
															<i aria-hidden="true" class="kosi-icon- kosi-icon-time-circle"></i> </span>
													</div>
													<div class="icon-box-content">
														<h5 class="icon-box-title">
															<span>
																Working Time </span>
														</h5>
														<p class="icon-box-description">
															Monday-Friday: 9:00 - 22:00<br>
															Saturday-Sunday: 9:00 - 21:00 </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="column col-md-8" data-id="6ea115f" data-_type="column">
								<div class="widget-wrap populated">
									<div class=" widget widget-kosi-contactform" data-id="" data-_type="widget" data-widget_type="kosi-contactform.default">
										<div class="widget-container">
											<div class="form-wrapper" data-columns="1">
												<div role="form" class="wpcf7" id="wpcf7-f4-p4441-o1" lang="en-US" dir="ltr">
													<div class="screen-reader-response">
														<p role="status" aria-live="polite" aria-atomic="true"></p>
														<ul></ul>
													</div>
													<?php if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) ) :
														//echo do_shortcode('[wpforms id="4569"]');
													endif; ?>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
		<?php
			endif;
		endwhile; // End of the loop.
		?>
</main><!-- #main -->
<?php
get_sidebar();
get_footer();
