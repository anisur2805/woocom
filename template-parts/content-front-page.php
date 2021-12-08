<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->
	<?php woocom_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'woocom'),
                'after'  => '</div>',
            )
        );
        ?>
	</div><!-- .entry-content -->
	<?php if (get_edit_post_link()) : ?>
	<footer class="entry-footer">
		<?php
            edit_post_link(
            sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'woocom'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                ),
            '<span class="edit-link">',
            '</span>'
        );
            ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> --> <div
	class="product-area  pb-60 ">
	<div class="container">
		<div class="section-title text-center  ">
			<h2>DAILY DEALS!</h2>
			<p class=""></p>
		</div>
		<div class="product-tab-list pt-30 pb-55 text-center nav nav-pills" role="tablist">
			<div class="nav-item"><a href="#" role="tab" data-rb-event-key="newArrival" tabindex="-1"
					aria-selected="false" class="nav-link">
					<h4>New Arrivals</h4>
				</a></div>
			<div class="nav-item"><a href="#" role="tab" data-rb-event-key="bestSeller" aria-selected="true"
					class="nav-link active">
					<h4>Best Sellers</h4>
				</a></div>
			<div class="nav-item"><a href="#" role="tab" data-rb-event-key="saleItems" tabindex="-1"
					aria-selected="false" class="nav-link">
					<h4>Sale Items</h4>
				</a></div>
		</div>
		<div class="tab-content">
			<div role="tabpanel" aria-hidden="true" class="fade tab-pane">
				<div class="row">
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b07f"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2021/09/Vivo-Y21-image.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-12%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b07f">Vivo v21</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 13640</span><span class="old">৳ 15500</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b089"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/oneplus-7t-pro-mclaren.jpg"
										alt=""><img class="hover-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/OnePlus-7T-Pro-blue.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-5%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b089">OnePlus 7T</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 62700</span><span class="old">৳ 66000</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08c"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/10/Oppo-F17.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-10%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08c">Oppo F17</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i></div>
								<div class="product-price"><span>৳ 18891</span><span class="old">৳ 20990</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08a"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/04/Samsung-Galaxy-Z-Flip-new.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-15%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08a">Samsung Galaxy Z Flip</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 127499.15</span><span class="old">৳ 149999</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08b"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/12/Motorola-Moto-G9-Plus.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08b">Motorola Moto G9 Plus</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 27999 </span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08d"><img
										class="default-img"
										src="https://fdn2.gsmarena.com/vv/pics/microsoft/microsoft-surface-duo2-1.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08d">Microsoft Surface Duo 2</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 135000 </span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" aria-hidden="false" class="fade tab-pane active show">
				<div class="row">
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08c"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/10/Oppo-F17.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-10%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08c">Oppo F17</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i></div>
								<div class="product-price"><span>৳ 18891</span><span class="old">৳ 20990</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08a"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/04/Samsung-Galaxy-Z-Flip-new.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-15%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08a">Samsung Galaxy Z Flip</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 127499.15</span><span class="old">৳ 149999</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b089"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/oneplus-7t-pro-mclaren.jpg"
										alt=""><img class="hover-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/OnePlus-7T-Pro-blue.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-5%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b089">OnePlus 7T</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 62700</span><span class="old">৳ 66000</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08d"><img
										class="default-img"
										src="https://fdn2.gsmarena.com/vv/pics/microsoft/microsoft-surface-duo2-1.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08d">Microsoft Surface Duo 2</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 135000 </span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b07f"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2021/09/Vivo-Y21-image.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-12%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b07f">Vivo v21</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 13640</span><span class="old">৳ 15500</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08b"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/12/Motorola-Moto-G9-Plus.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08b">Motorola Moto G9 Plus</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 27999 </span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" aria-hidden="true" class="fade tab-pane">
				<div class="row">
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b07f"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2021/09/Vivo-Y21-image.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-12%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b07f">Vivo v21</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 13640</span><span class="old">৳ 15500</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b089"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/oneplus-7t-pro-mclaren.jpg"
										alt=""><img class="hover-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2019/10/OnePlus-7T-Pro-blue.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-5%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b089">OnePlus 7T</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 62700</span><span class="old">৳ 66000</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08c"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/10/Oppo-F17.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-10%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08c">Oppo F17</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i></div>
								<div class="product-price"><span>৳ 18891</span><span class="old">৳ 20990</span></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-3 col-lg-3 col-sm-6 ">
						<div class="product-wrap mb-25">
							<div class="product-img"><a href="/product/6196ec0ea99917055789b08a"><img
										class="default-img"
										src="https://www.mobiledokan.com/wp-content/uploads/2020/04/Samsung-Galaxy-Z-Flip-new.jpg"
										alt=""></a>
								<div class="product-img-badges"><span class="pink">-15%</span><span
										class="purple">New</span></div>
								<div class="product-action">
									<div class="pro-same-action pro-wishlist"><button class=""
											title="Add to wishlist"><i class="pe-7s-like"></i></button></div>
									<div class="pro-same-action pro-cart"><button class="" title="Add to cart"> <i
												class="pe-7s-cart"></i> Buy Now</button></div>
									<div class="pro-same-action pro-quickview"><button title="Quick View"><i
												class="pe-7s-look"></i></button></div>
								</div>
							</div>
							<div class="product-content text-center">
								<h3><a href="/product/6196ec0ea99917055789b08a">Samsung Galaxy Z Flip</a></h3>
								<div class="product-rating"><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o yellow"></i><i
										class="fa fa-star-o yellow"></i><i class="fa fa-star-o"></i></div>
								<div class="product-price"><span>৳ 127499.15</span><span class="old">৳ 149999</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>