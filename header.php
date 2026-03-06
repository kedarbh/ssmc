<?php

/**
 * The header for our theme
 *
 * @package ssmc-custom
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="flex flex-col min-h-screen">
		<a class="sr-only focus:not-sr-only" href="#primary"><?php esc_html_e('Skip to content', 'ssmc-custom'); ?></a>

		<header id="masthead" class="bg-white shadow-sm sticky top-0 z-50">
			<!-- Top Bar for Contact Info -->
			<div class="bg-primary text-white py-2 px-4 shadow-inner relative z-20">
				<div class="container mx-auto flex justify-between items-center text-sm h-6">
					<div class="flex items-center flex-grow overflow-hidden mr-6">
						<span class="bg-secondary text-primary font-bold px-3 py-0.5 rounded-sm text-xs uppercase tracking-wider whitespace-nowrap z-10 relative">Updates</span>

						<div class="flex-grow overflow-hidden relative ml-3 h-full flex items-center">
							<?php
							$notice_args = array(
								'post_type'      => 'notice',
								'posts_per_page' => 5,
								'post_status'    => 'publish',
							);
							$notice_query = new WP_Query($notice_args);

							if ($notice_query->have_posts()) : ?>
								<div class="animate-ticker">
									<?php
									ob_start();
									while ($notice_query->have_posts()) : $notice_query->the_post();
									?>
										<a href="<?php the_permalink(); ?>" class="hover:text-secondary transition hover:underline">
											<?php echo '<span class="text-secondary/70 mr-1">•</span> ' . get_the_title(); ?>
										</a>
									<?php
									endwhile;
									wp_reset_postdata();
									$ticker_items = ob_get_clean();
									?>
									<div class="flex items-center space-x-8 px-4 shrink-0">
										<?php echo $ticker_items; ?>
									</div>
									<div class="flex items-center space-x-8 px-4 shrink-0" aria-hidden="true">
										<?php echo $ticker_items; ?>
									</div>
								</div>
							<?php else : ?>
								<div class="text-gray-300 italic text-xs ml-4">No recent updates.</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="shrink-0">
						<a href="https://app.emis.com.np/" target="_blank" rel="noopener noreferrer" class="bg-white/10 hover:bg-white/20 hover:text-white px-3 py-1 rounded-md transition font-medium flex items-center gap-1.5 focus:ring-2 focus:ring-white">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
							</svg>
							HEMIS
						</a>
					</div>
				</div>
			</div>

			<!-- Main Navigation Header -->
			<div class="container mx-auto px-4 flex justify-between items-stretch">
				<div class="site-branding flex items-center gap-4 py-4">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="shrink-0 flex items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?> Logo" class="h-16 w-auto" />
					</a>
					<div>
						<h1 class="text-2xl font-bold text-primary m-0 leading-tight">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="hover:text-secondary transition"><?php bloginfo('name'); ?></a>
						</h1>
						<?php
						$ssmc_custom_description = get_bloginfo('description', 'display');
						if ($ssmc_custom_description || is_customize_preview()) :
						?>
							<p class="text-sm text-gray-500 m-0"><?php echo esc_html($ssmc_custom_description); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<nav id="site-navigation" class="hidden lg:flex lg:items-stretch" aria-label="<?php esc_attr_e('Primary Menu', 'ssmc-custom'); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container_class' => 'flex items-stretch',
							'menu_class' => 'flex gap-2 font-medium text-gray-700 items-stretch',
							'fallback_cb' => 'ssmc_custom_primary_menu_fallback',
							'walker' => new Tailwind_Nav_Walker(),
						)
					);
					?>
				</nav>

				<button id="mobile-menu-toggle" class="lg:hidden text-primary focus:outline-none focus:ring-2 focus:ring-secondary rounded-md p-2 my-4" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'ssmc-custom'); ?>">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
					</svg>
				</button>
			</div>

			<!-- Mobile Menu (Hidden by default) -->
			<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 shadow-md" hidden>
				<div class="container mx-auto px-4 py-4">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'mobile-primary-menu',
							'container_class' => 'w-full',
							'menu_class' => 'flex flex-col space-y-1 font-medium text-gray-700',
							'fallback_cb' => 'ssmc_custom_primary_menu_fallback',
							'walker' => new Tailwind_Mobile_Nav_Walker(),
						)
					);
					?>
				</div>
			</div>
		</header>

		<main id="primary" class="flex-grow">