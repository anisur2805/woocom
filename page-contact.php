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
		while ( have_posts() ):
		the_post();?>
<?php echo get_template_part( '/template-parts/breadcrumb' ); ?>

			<div class="contact-area pt-0 pb-60">
				<?php $page_class = is_page( 'contact-02' ) ? 'contact_two' : '';?>
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
										<li><a target="_blank" rel="noopener noreferrer" href=""><i
													class="bi-facebook"></i></a></li>
										<li><a href="//pinterest.com"><i class="bi-pinterest"></i></a></li>
										<!-- <li><a href="//thumblr.com"><i class="bi-tumblr"></i></a></li>
										<li><a href="//vimeo.com"><i class="bi-vimeo"></i></a></li> -->
										<li><a href="//twitter.com"><i class="bi-twitter"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-7">
							<div class="contact-form">
								<div class="contact-title mb-30">
									<h2>Get In Touch</h2>
								</div>
								<form class="contact-form-style">
									<div class="row">
										<div class="col-lg-6"><input name="name" placeholder="Name*" type="text">
										</div>
										<div class="col-lg-6"><input name="email" placeholder="Email*" type="email"></div>
										<div class="col-lg-12"><input name="subject" placeholder="Subject*" type="text"></div>
										<div class="col-lg-12"><textarea name="message"
												placeholder="Your Message*"></textarea><button class="submit"
												type="submit">SEND</button></div>
									</div>
								</form>
								<p class="form-messege"></p>
							</div>
						</div>
					</div>
				</div>
				<?php if( is_page('contact-03') ): ?>
				<div class="conditional_contact_3 elementor-section elementor-inner-section elementor-element elementor-element-69f688a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="69f688a" data-element_type="section">
					<div class="container elementor-column-gap-no">
					<div class="row">
						<div class="elementor-column col-md-4" data-id="fc4f063" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-e756b16 elementor-position-left elementor-widget-mobile__width-initial elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="e756b16" data-element_type="widget" data-widget_type="icon-box.default">
									<div class="elementor-widget-container">
										
										<div class="elementor-icon-box-wrapper">
											<div class="elementor-icon-box-icon">
												<span class="elementor-icon elementor-animation-">
												<i aria-hidden="true" class="kosi-icon- kosi-icon-location"></i> </span>
											</div>
											<div class="elementor-icon-box-content">
												<h5 class="elementor-icon-box-title">
													<span>Address </span>
												</h5>
												<p class="elementor-icon-box-description">236 5th SE Avenue, New York <br  />NY10000, United States </p>
											</div>
										</div>
									</div> 
					
					<div class="elementor-element elementor-element-74e4a48 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="74e4a48" data-element_type="widget" data-widget_type="icon-box.default">
					<div class="elementor-widget-container">
					<div class="elementor-icon-box-wrapper">
					<div class="elementor-icon-box-icon">
					<span class="elementor-icon elementor-animation-">
					<i aria-hidden="true" class="kosi-icon- kosi-icon-call"></i> </span>
					</div>
					<div class="elementor-icon-box-content">
					<h5 class="elementor-icon-box-title">
					<span>
					Phone </span>
					</h5>
					<p class="elementor-icon-box-description">
					Mobile: +(84) 546-6789<br>
					Hotline: +(84) 456-6789 </p>
					</div>
					</div>
					</div>
					</div>
					<div class="elementor-element elementor-element-0b3fd26 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="0b3fd26" data-element_type="widget" data-widget_type="icon-box.default">
					<div class="elementor-widget-container">
					<div class="elementor-icon-box-wrapper">
					<div class="elementor-icon-box-icon">
					<span class="elementor-icon elementor-animation-">
					<i aria-hidden="true" class="kosi-icon- kosi-icon-time-circle"></i> </span>
					</div>
					<div class="elementor-icon-box-content">
					<h5 class="elementor-icon-box-title">
					<span>
					Working Time </span>
					</h5>
					<p class="elementor-icon-box-description">
					Monday-Friday: 9:00 - 22:00<br>
					Saturday-Sunday: 9:00 - 21:00 </p>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					<div class="elementor-column col-md-8" data-id="6ea115f" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-b9c8df1 elementor-widget elementor-widget-kosi-contactform" data-id="b9c8df1" data-element_type="widget" data-widget_type="kosi-contactform.default">
					<div class="elementor-widget-container">
					<div class="elementor-form-wrapper" data-columns="1">
					<div role="form" class="wpcf7" id="wpcf7-f4-p4441-o1" lang="en-US" dir="ltr">
					<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
					<form action="/kosi/contact-01/#wpcf7-f4-p4441-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
					<div style="display: none;">
					<input type="hidden" name="_wpcf7" value="4">
					<input type="hidden" name="_wpcf7_version" value="5.5.3">
					<input type="hidden" name="_wpcf7_locale" value="en_US">
					<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f4-p4441-o1">
					<input type="hidden" name="_wpcf7_container_post" value="4441">
					<input type="hidden" name="_wpcf7_posted_data_hash" value="">
					</div>
					<div class="row-inline row">
					<div><label>Your name *</label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="John Doe" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"></span></div>
					<div><label>Your E-mail *</label><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your@email.com"></span></div>
					</div>
					<div><label>Subject</label><span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="This is an optional"></span></div>
					<div><label>Message *</label><span class="wpcf7-form-control-wrap textarea"><textarea name="textarea" cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Hi! I’d like to ask about..."></textarea></span></div>
					<div><input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span></div>
					<div class="wpcf7-response-output" aria-hidden="true"></div></form></div>
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
