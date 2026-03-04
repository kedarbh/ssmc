<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ssmc-custom
 */

get_header();
?>

<!-- Premium Page Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <!-- Decorative background elements -->
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
            <?php if ( has_excerpt() ) : ?>
                <p class="text-blue-100/70 mt-6 max-w-2xl font-light text-xl leading-relaxed">
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Main Content Area -->
<section class="py-16 md:py-24 bg-gray-50 min-h-[400px]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <article id="post-<?php the_ID(); ?>" <?php body_class('bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-16'); ?>>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <?php the_post_thumbnail( 'large', array('class' => 'w-full h-auto object-cover') ); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-blue prose-lg max-w-none text-gray-700 leading-relaxed font-light prose-headings:font-extrabold prose-headings:text-gray-900 prose-p:mb-6 prose-img:rounded-2xl prose-img:shadow-md">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>

                <?php
                if ( comments_open() || get_comments_number() ) :
                    echo '<div class="mt-16 pt-16 border-t border-gray-100">';
                    comments_template();
                    echo '</div>';
                endif;
                ?>
            </article>
        </div>
    </div>
</section>

<?php
get_footer();
