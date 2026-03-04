<?php
/**
 * The template for displaying search results pages
 *
 * @package ssmc-custom
 */

get_header(); ?>

<!-- Search Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white">Search Results</span>
        </nav>
        
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search results for: %s', 'ssmc-custom' ), '<span class="text-secondary italic">"' . get_search_query() . '"</span>' );
            ?>
        </h1>
    </div>
</div>

<section class="py-16 md:py-24 bg-gray-50 min-h-[60vh]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <?php if ( have_posts() ) : ?>

                <div class="space-y-6">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                            <div class="flex flex-col md:flex-row gap-6">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="w-full md:w-48 h-32 shrink-0 rounded-2xl overflow-hidden shadow-sm">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition duration-500')); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="flex-grow">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-primary bg-primary/5 px-2 py-0.5 rounded-full">
                                            <?php echo esc_html( get_post_type() ); ?>
                                        </span>
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                    </div>
                                    
                                    <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="text-gray-500 font-light leading-relaxed line-clamp-2 text-sm mb-4">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-primary group-hover:gap-3 transition-all">
                                        Read More
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="mt-12">
                    <?php 
                    the_posts_pagination( array(
                        'prev_text' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>',
                        'next_text' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                        'class'     => 'pagination-premium',
                    ) ); 
                    ?>
                </div>

            <?php else : ?>

                <div class="bg-white rounded-3xl p-16 text-center shadow-sm border border-gray-100">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-4xl mx-auto mb-6 grayscale opacity-50">
                        🔍
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-4">No results found</h2>
                    <p class="text-gray-500 font-light max-w-sm mx-auto mb-10">We couldn't find anything matching your search. Try different keywords or check your spelling.</p>
                    
                    <div class="max-w-md mx-auto">
                        <?php get_search_form(); ?>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php
get_footer();
