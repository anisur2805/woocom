<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package woocom
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		/**
		 * Function hooked in to woocom_page add_action
		 * 
		 * @hooked woocom_page_header 				- 10
		 * @hooked woocom_page_content 				- 20
		 */
		do_action('woocom_page');
		?>
	</article><!-- #post-## -->