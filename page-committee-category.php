<?php
/**
 * Template Name: Committee Category
 *
 * @package ssmccustom
 */

get_header(); ?>

<!-- Premium Page Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white truncate max-w-[200px]"><?php the_title(); ?></span>
        </nav>
        
        <div class="max-w-4xl">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight"><?php the_title(); ?></h1>
            <p class="text-blue-100/70 mt-6 max-w-2xl font-light text-xl leading-relaxed">
                <?php 
                if ( has_excerpt() ) {
                    echo get_the_excerpt();
                } else {
                    echo 'Explore the various dedicated sub-committees that drive the operational, academic, and administrative excellence of our campus.';
                }
                ?>
            </p>
        </div>
    </div>
</div>

<!-- Committees Section -->
<section class="py-16 md:py-24 bg-gray-50 min-h-[50vh]">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <?php
            // Main page content loop
            while ( have_posts() ) :
                the_post();
                
                // Using the standard block/content editor where shortcodes will be placed and parsed
                the_content();
                
                endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
