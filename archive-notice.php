<?php
/**
 * Archive template for Notices
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-primary py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white">Notice Board</h1>
        <p class="text-blue-200 mt-2">Stay up to date with the latest announcements from campus.</p>
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
                        <a href="<?php the_permalink(); ?>" class="group block bg-white rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 hover:border-primary overflow-hidden">
                            <div class="flex gap-4 items-start p-5">
                                <!-- Date badge -->
                                <div class="bg-primary/10 border border-primary/20 rounded-lg p-3 text-center min-w-[58px] flex-shrink-0">
                                    <span class="block text-primary font-bold text-xl leading-none"><?php echo get_the_date('d'); ?></span>
                                    <span class="block text-primary/70 text-xs uppercase mt-1"><?php echo get_the_date('M'); ?></span>
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
                                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition truncate"><?php the_title(); ?></h2>
                                    <p class="text-sm text-gray-500 mt-1 line-clamp-2"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                                </div>

                                <!-- Arrow -->
                                <div class="text-gray-400 group-hover:text-primary transition flex-shrink-0 self-center">
                                    &rarr;
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

            <!-- Sidebar: Categories Filter -->
            <aside class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 pb-3 border-b border-gray-100">
                        <span>🔖</span> Filter by Category
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
