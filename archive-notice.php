<?php
/**
 * Archive template for Notices
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <!-- Decorative background element -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white">Notice Board</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">Notice Board</h1>
        <p class="text-blue-100/70 mt-3 max-w-xl font-light text-lg">Official news, updates, and announcements from Shaheed Smriti Multiple Campus.</p>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Main Notices List -->
            <main class="flex-1">
                <?php if ( have_posts() ) : ?>
                    <div class="space-y-4">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="group block bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-primary/20 hover:-translate-y-1 overflow-hidden">
                            <div class="flex gap-6 items-start p-6">
                                <!-- Date badge -->
                                <div class="bg-primary/5 border border-primary/10 rounded-xl p-3 text-center min-w-[64px] flex-shrink-0 group-hover:bg-primary group-hover:border-primary transition-all duration-300">
                                    <span class="block text-primary group-hover:text-white font-extrabold text-2xl leading-none transition-colors duration-300"><?php echo get_the_date('d'); ?></span>
                                    <span class="block text-primary/60 group-hover:text-white/80 text-[10px] font-bold uppercase mt-1 tracking-wider transition-colors duration-300"><?php echo get_the_date('M'); ?></span>
                                </div>

                                <!-- Notice Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <?php
                                        $terms = get_the_terms( get_the_ID(), 'notice_category' );
                                        if ( $terms && ! is_wp_error( $terms ) ) :
                                            foreach ( $terms as $term ) : ?>
                                                <span class="bg-secondary/20 text-yellow-800 text-xs font-semibold px-2 py-0.5 rounded-full"><?php echo esc_html( $term->name ); ?></span>
                                            <?php endforeach;
                                        endif; ?>
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300 mb-2"><?php the_title(); ?></h2>
                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2"><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                                </div>

                                <!-- Arrow -->
                                <div class="text-gray-300 group-hover:text-primary transition-all duration-300 flex-shrink-0 self-center transform group-hover:translate-x-1">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        <?php the_posts_pagination( array(
                            'prev_text' => '&larr; Prev',
                            'next_text' => 'Next &rarr;',
                            'class'     => 'flex gap-2',
                        ) ); ?>
                    </div>

                <?php else : ?>
                    <div class="text-center bg-white rounded-xl p-16 shadow-sm border border-gray-100">
                        <span class="text-5xl">📭</span>
                        <p class="mt-4 text-gray-500 text-lg">No notices published yet.</p>
                    </div>
                <?php endif; ?>
            </main>

            <!-- Sidebar -->
            <aside class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 sticky top-24 overflow-hidden group/sidebar hover:shadow-md transition-all duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none translate-x-4 -translate-y-4"></div>
                    
                    <h3 class="font-extrabold text-gray-900 mb-6 flex items-center gap-3 pb-4 border-b border-gray-100 relative z-10">
                        <span class="text-xl">🔖</span> Notice Categories
                    </h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="<?php echo get_post_type_archive_link('notice'); ?>"
                               class="flex justify-between items-center text-sm text-gray-700 hover:text-primary transition py-1">
                                All Notices
                            </a>
                        </li>
                        <?php
                        $notice_cats = get_terms( array(
                            'taxonomy'   => 'notice_category',
                            'hide_empty' => false,
                        ) );
                        if ( $notice_cats && ! is_wp_error( $notice_cats ) ) :
                            foreach ( $notice_cats as $cat ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                                       class="flex justify-between items-center text-sm text-gray-700 hover:text-primary transition py-1 border-t border-gray-50">
                                        <?php echo esc_html( $cat->name ); ?>
                                        <span class="bg-gray-100 text-gray-500 text-xs rounded-full px-2 py-0.5"><?php echo $cat->count; ?></span>
                                    </a>
                                </li>
                            <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
