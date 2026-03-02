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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="flex flex-col min-h-screen">
	<a class="sr-only focus:not-sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'ssmc-custom' ); ?></a>

	<header id="masthead" class="bg-white shadow-sm sticky top-0 z-50">
        <!-- Top Bar for Contact Info -->
        <div class="bg-primary text-white py-2 px-4 shadow-inner">
            <div class="container mx-auto flex justify-between items-center text-sm">
                <div>
                    <span class="mr-4">📞 +977-56-000000</span>
                    <span>✉️ info@ssmcchitwan.edu.np</span>
                </div>
                <div>
                    <a href="#" class="hover:text-secondary transition">Student Login</a>
                </div>
            </div>
        </div>

        <!-- Main Navigation Header -->
		<div class="container mx-auto px-4 py-4 flex justify-between items-center">
			<div class="site-branding flex items-center gap-4">
                <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xl">
                    S
                </div>
				<div>
                    <h1 class="text-2xl font-bold text-primary m-0 leading-tight">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="hover:text-secondary transition"><?php bloginfo( 'name' ); ?></a>
                    </h1>
					<?php
					$ssmc_custom_description = get_bloginfo( 'description', 'display' );
					if ( $ssmc_custom_description || is_customize_preview() ) :
						?>
						<p class="text-sm text-gray-500 m-0"><?php echo esc_html( $ssmc_custom_description ); ?></p>
					<?php endif; ?>
	                </div>
				</div>

				<nav id="site-navigation" class="hidden lg:flex lg:items-center relative" aria-label="<?php esc_attr_e( 'Primary Menu', 'ssmc-custom' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
	                        'container_class' => 'flex items-center',
	                        'menu_class' => 'flex gap-6 font-medium text-gray-700 items-center',
	                        'fallback_cb' => 'ssmc_custom_primary_menu_fallback',
	                        'walker' => new Tailwind_Nav_Walker(),
						)
					);
					?>
				</nav>

	            <button id="mobile-menu-toggle" class="lg:hidden text-primary focus:outline-none focus:ring-2 focus:ring-secondary rounded-md p-2" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'ssmc-custom' ); ?>">
	                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
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
