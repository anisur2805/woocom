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
	<?php echo get_template_part('/template-parts/breadcrumb'); ?>
	<div class="contact-area pt-100 pb-100">
		<div class="container">
		
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
	</div>
	<?php
                endwhile; // End of the loop.
            ?>
</main><!-- #main -->
<?php
get_sidebar();
get_footer();
