<?php
if (!function_exists('get_breadcrumb')) {
	function get_breadcrumb($arrow_sign = '/') {
		/* === OPTIONS === */
		$text['home'] = esc_html__('Home', 'woocom'); // text for the 'Home' link 
		/* translators: %s: Category name. */
		$text['category'] = esc_html__('Archive by Category "%s"', 'woocom'); // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment // text for a category page
		/* translators: %s: Taxonomy name. */
		$text['tax'] = esc_html__('Archive for "%s"', 'woocom'); // text for a taxonomy page // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		/* translators: %s: Search query params. */
		$text['search'] = esc_html__('Search Results for "%s" Query', 'woocom'); // text for a search results page // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		/* translators: %s: Tag name. */
		$text['tag'] = esc_html__('Posts Tagged "%s"', 'woocom'); // text for a tag page // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		/* translators: %s: Author name. */
		$text['author'] = esc_html__('Articles Posted by %s', 'woocom'); // text for an author page // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		$text['404'] = esc_html__('Error 404', 'woocom'); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = '<span class="breadcrumb_delimiter">&nbsp; ' . $arrow_sign . ' &nbsp;</span>'; // delimiter between crumbs
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink = home_url() . '/';
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<div class="woocom-breadcrumb"> <a href="' . esc_url($homeLink) . '">' . esc_html($text['home']) . '</a></div>';
		} else {

			echo '<div class="woocom-breadcrumb">' . sprintf($link, $homeLink, $text['home']) . $delimiter; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped


			if (is_category()) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);

					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					// echo esc_attr($cats);
					$allowed_tag = array(
						'a' => array(
							'href' => true,
							'rel' => true,
						),
						'span' => array(
							'property' => true
						)
					);
					echo wp_kses($cats, $allowed_tag);
					// echo $cats;
				}
				echo sprintf($before . $text['category'], single_cat_title('', false) . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_tax()) {
				$thisTerm = get_term_by('id', get_queried_object_id(), get_queried_object()->taxonomy);
				if (!empty($thisTerm) && $thisTerm->parent != 0) {
					$cats = get_category_parents($thisTerm->parent, true, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo apply_filters('woocom_breadcrumb_taxonomy_filter', $cats);
				}
				echo sprintf($before . $text['tax'], single_cat_title('', false) . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_search()) {
				echo sprintf($before . $text['search'], get_search_query() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_day()) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf($before . get_the_time('d') . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_month()) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo sprintf($before . get_the_time('F') . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_year()) {
				echo sprintf($before . get_the_time('Y') . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_single() && !is_attachment()) {
				if (get_post_type() != 'post') {
					if (get_post_type() == 'product') {
						if (class_exists('WooCommerce')) {
							printf($link, get_permalink(wc_get_page_id('shop')), 'Products'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							if ($showCurrent == 1) echo sprintf($delimiter . $before . get_the_title() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
					} else {
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						if ($showCurrent == 1) echo sprintf($delimiter . $before . get_the_title() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				} else {
					$cat = get_the_category();
					$cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo sprintf($cats);
					if ($showCurrent == 1) echo sprintf("%s %s %s", $before, get_the_title(), $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
				$post_type = get_post_type_object(get_post_type());
				if (isset($post_type) && !empty($post_type)) {
					if (class_exists('WooCommerce')) {
						echo sprintf($before . get_the_title(get_option('woocommerce_shop_page_id')) . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} else {
						echo sprintf($before . $post_type->labels->singular_name . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				} else {
					if (class_exists('WooCommerce')) {
						if (is_shop()) {
							echo '<span class="current font-medium md:font-semibold">' . get_the_title(get_option('woocommerce_shop_page_id')) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
					}
				}
			} elseif (is_attachment()) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID);
				if (is_array($cat) && !empty($cat)) {
					$cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo sprintf($cats);
				}
				printf($link, get_permalink($parent), $parent->post_title); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				if ($showCurrent == 1) echo sprintf($delimiter . $before . get_the_title() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_page() && !$post->post_parent) {
				if ($showCurrent == 1) echo sprintf($before . get_the_title() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_page() && $post->post_parent) {
				$parent_id = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_post($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo sprintf("%s", $breadcrumbs[$i]); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					if ($i != count($breadcrumbs) - 1) echo sprintf($delimiter);
				}
				if ($showCurrent == 1) echo sprintf($delimiter . $before . get_the_title() . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_tag()) {
				echo sprintf($before . $text['tag'], single_tag_title('', false) . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_author()) {
				global $author;
				$userdata = get_userdata($author);
				echo sprintf($before . $text['author'], $userdata->display_name . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} elseif (is_404()) {
				echo sprintf($before . $text['404'] . $after); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			if (get_query_var('paged')) {
				if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
				echo esc_html__('Page', 'woocom') . ' ' . get_query_var('paged'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
			}

			echo '</div>';
		}
	}
}
