<?php
/**
 * Archive template for Programs
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-primary py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white">Academic Programs</h1>
        <p class="text-blue-200 mt-2">Explore our undergraduate and graduate programs.</p>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Department filter tabs -->
        <?php
        $departments = get_terms( array( 'taxonomy' => 'department', 'hide_empty' => false ) );
        if ( $departments && ! is_wp_error( $departments ) ) : ?>
        <div class="flex flex-wrap gap-3 mb-10">
            <a href="<?php echo get_post_type_archive_link('program'); ?>"
               class="px-5 py-2 rounded-full font-medium text-sm bg-primary text-white shadow hover:bg-blue-800 transition">
                All
            </a>
            <?php foreach ( $departments as $dept ) : ?>
            <a href="<?php echo esc_url( get_term_link( $dept ) ); ?>"
               class="px-5 py-2 rounded-full font-medium text-sm bg-white text-gray-700 shadow hover:bg-primary hover:text-white transition border border-gray-200">
                <?php echo esc_html( $dept->name ); ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition group flex flex-col border border-gray-100 overflow-hidden">
                    <!-- Thumbnail -->
                    <div class="h-48 bg-gray-200 overflow-hidden relative">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition duration-500' ) ); ?>
                        <?php else : ?>
                            <div class="w-full h-full bg-gradient-to-br from-primary to-blue-800 flex items-center justify-center">
                                <span class="text-white text-4xl">🎓</span>
                            </div>
                        <?php endif; ?>

                        <!-- Dept badge -->
                        <?php
                        $depts = get_the_terms( get_the_ID(), 'department' );
                        if ( $depts && ! is_wp_error( $depts ) ) : ?>
                            <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                <?php echo esc_html( $depts[0]->name ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <h2 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-gray-500 text-sm mb-6 flex-1 line-clamp-3"><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>"
                           class="inline-flex items-center gap-2 text-primary font-semibold text-sm group-hover:text-secondary transition w-fit">
                            Learn More <span class="group-hover:translate-x-1 transition">&rarr;</span>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>

            <div class="mt-10">
                <?php the_posts_pagination( array( 'prev_text' => '&larr; Prev', 'next_text' => 'Next &rarr;' ) ); ?>
            </div>

        <?php else : ?>
            <div class="text-center bg-white rounded-xl p-16 shadow-sm border border-gray-100">
                <span class="text-5xl">🎓</span>
                <p class="mt-4 text-gray-500 text-lg">No programs added yet.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
