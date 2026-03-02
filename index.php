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

<main id="primary" class="site-main">

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

</main>

<?php
get_footer(); // This includes the footer.php file
?>
