<div class="col-xl-6 col-lg-5 d-none d-lg-block">
								<div class="main-menu">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'primary-menu',
												'menu_id'        => 'main-menu',
												'container'      => 'nav',
											)
										);
									?>
								</div>

								<?php
									$menu_name = 'primary-menu';
									$locations = get_nav_menu_locations();
									$menu      = wp_get_nav_menu_object( $locations[$menu_name] );
									$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
								?>
								<div class="main-menu d-none">
									<nav class="menu-woocom-primary-menu-container">

									<?php if ( !empty( $menuitems ) && is_array( $menuitems ) ): ?>

										<ul id="main-menu" class="menu">

											<?//php foreach ($menuitems as $v) : // $pid = $v->ID; var_dump( $pid);
											// echo "<pre>";
											// print_r( $v);

											// if( !$v->menu_item_parent) {
											// 	$child_menu_items = $v->get_child_menu_items($menuitems, $v->ID );
											// 	$has_children = !empty( $child_menu_items) && is_array( $child_menu_items);
											// 	$has_submenu_class = !empty( $has_children) ? 'test-menu' : '';

											// 	if( !$has_children) { ?>

												<!-- <li id="menu-item-<?//php echo esc_attr( $v->ID ) ?>" class="menu-item menu-item-type<?//php echo esc_attr($v->post_type); ?> menu-item-object-<?//php echo esc_attr($v->object); ?> menu-item-<?//php esc_attr($v->post_name) ?> menu-item-<?//php echo esc_attr( $v->ID ) ?>">
													<a href="<?//php echo esc_url($v->url); ?>"><?//php echo esc_html($v->title) ?></a>
												</li> -->

												<?//php } else { ?>
													<!-- <li id="menu-item-<?//php echo esc_attr( $v->ID ) ?>" class="menu-item menu-item-type<?//php echo esc_attr($v->post_type); ?> menu-item-object-<?//php echo esc_attr($v->object); ?> menu-item-<?//php esc_attr($v->post_name) ?> menu-item-<?//php echo esc_attr( $v->ID ) ?>">
													<a href="<?//php echo esc_url($v->url); ?>"><?//php echo esc_html($v->title) ?></a>
														<ul class="sub-menu">
															<li id="menu-item-<?//php echo $v; ?>" class="menu-item menu-item-type-<?//php echo esc_attr($v->post_type); ?> menu-item-object-custom menu-item-"><a href="/shop/?wc_nc=2"><?//php echo $v; ?></a></li>
														</ul>
												</li> -->

												<?//php }
											// }

											//?>

											<?//php endforeach; ?>
										</ul>

									<?php endif;?>
									</nav>
								</div>

							</div>