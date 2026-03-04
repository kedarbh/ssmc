<?php
/**
 * The main template file
 *
 * Lesson 2: The Template Hierarchy
 * WordPress looks for specific files to load content. If you are on a single post,
 * it looks for single.php. If it doesn't find it, it falls back to index.php.
 * This file is the ultimate fallback for everything.
 *
 * @package ssmc-custom
 */

get_header(); // This includes the header.php file
?>

<!-- Fallback Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-12 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight">SSMC Chitwan</h1>
    </div>
</div>

<main id="primary" class="py-16 md:py-24 bg-gray-50 min-h-[40vh]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-16">

	<?php
	// Lesson 3: The WordPress Loop
	// The Loop is how WordPress displays posts/pages based on the current URL.
	if ( have_posts() ) : 

		/* Start the Loop */
		while ( have_posts() ) :
			the_post(); // Sets up post data so we can use functions like the_title()

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>	

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php

		endwhile;

	else :
		echo '<p>Sorry, no content found.</p>';

	endif;
	?>

        </div>
    </div>
</main>

<?php
get_footer(); // This includes the footer.php file
?>
