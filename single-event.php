<?php

/**
 * Single Event template
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-12 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="hover:text-white transition-colors duration-200">Events</a>
            <span class="opacity-40">/</span>
            <span class="text-white truncate max-w-[200px]"><?php the_title(); ?></span>
        </nav>

        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary text-primary text-[10px] font-bold uppercase tracking-widest mb-4 shadow-lg shadow-black/10">
                Campus Event
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight mb-6"><?php the_title(); ?></h1>

            <div class="flex flex-wrap items-center gap-6 text-blue-100/80 text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Event Date: <?php echo get_the_date(); ?>
                </span>
            </div>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Event Content -->
            <article class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
                    </div>
                <?php endif; ?>

                <div class="text-gray-700 leading-[1.8] font-normal
                            [&_h1]:text-4xl [&_h1]:font-black [&_h1]:text-gray-900 [&_h1]:mt-12 [&_h1]:mb-6
                            [&_h2]:text-3xl [&_h2]:font-black [&_h2]:text-gray-900 [&_h2]:mt-10 [&_h2]:mb-6
                            [&_h3]:text-2xl [&_h3]:font-black [&_h3]:text-gray-900 [&_h3]:mt-8 [&_h3]:mb-4
                            [&_h4]:text-xl [&_h4]:font-black [&_h4]:text-gray-900 [&_h4]:mt-6 [&_h4]:mb-4
                            [&_p]:mb-6 
                            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-6 [&_li]:mb-2
                            [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-6 
                            [&_a]:text-primary [&_a]:font-bold [&_a]:underline hover:[&_a]:text-secondary hover:[&_a]:no-underline
                            [&_strong]:text-gray-900 [&_strong]:font-bold
                            [&_blockquote]:border-l-4 [&_blockquote]:border-primary/20 [&_blockquote]:pl-6 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-8">
                    <?php the_content(); ?>
                </div>
            </article>

            <aside class="lg:w-80 flex-shrink-0">
                <div class="sticky top-24 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 overflow-hidden group/sidebar transition-all duration-300">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none translate-x-4 -translate-y-4"></div>

                        <h3 class="font-extrabold text-gray-900 mb-6 pb-4 border-b border-gray-100 relative z-10">Other Events</h3>
                        <?php
                        $related = new WP_Query(array(
                            'post_type'      => 'event',
                            'posts_per_page' => 5,
                            'post__not_in'   => array(get_the_ID()),
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        ));
                        if ($related->have_posts()) : ?>
                            <ul class="space-y-4 relative z-10">
                                <?php while ($related->have_posts()) : $related->the_post(); ?>
                                    <li class="group/item">
                                        <a href="<?php the_permalink(); ?>" class="block">
                                            <p class="text-sm font-bold text-gray-800 group-hover/item:text-primary transition-colors duration-200 line-clamp-2 leading-tight mb-1"><?php the_title(); ?></p>
                                            <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider"><?php echo get_the_date('M d, Y'); ?></span>
                                        </a>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </ul>
                        <?php else : ?>
                            <p class="text-sm text-gray-400 italic">No other events found.</p>
                        <?php endif; ?>
                    </div>

                    <div class="text-center">
                        <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>"
                            class="inline-flex items-center justify-center gap-2 bg-primary text-white font-bold px-6 py-4 rounded-xl hover:bg-blue-800 transition-all duration-300 shadow-lg shadow-primary/20 hover:-translate-y-1 w-full text-sm uppercase tracking-widest">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            All Events
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>