<?php
/**
 * Archive template for Faculty
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-primary py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white">Our Faculty</h1>
        <p class="text-blue-200 mt-2">Meet the dedicated educators and staff at Shaheed Smriti Multiple Campus.</p>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Department filter -->
        <?php
        $departments = get_terms( array( 'taxonomy' => 'department', 'hide_empty' => false ) );
        if ( $departments && ! is_wp_error( $departments ) ) : ?>
        <div class="flex flex-wrap gap-3 mb-10">
            <a href="<?php echo get_post_type_archive_link('faculty'); ?>"
               class="px-5 py-2 rounded-full font-medium text-sm bg-primary text-white shadow hover:bg-blue-800 transition">All</a>
            <?php foreach ( $departments as $dept ) : ?>
            <a href="<?php echo esc_url( get_term_link( $dept ) ); ?>"
               class="px-5 py-2 rounded-full font-medium text-sm bg-white text-gray-700 shadow hover:bg-primary hover:text-white transition border border-gray-200">
                <?php echo esc_html( $dept->name ); ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php while ( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>"
                   class="group bg-white rounded-xl shadow-sm hover:shadow-lg transition border border-gray-100 overflow-hidden text-center p-6 flex flex-col items-center">

                    <!-- Photo -->
                    <div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-4 border-white shadow-md bg-gray-200 group-hover:border-secondary transition">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode( get_the_title() ); ?>&background=e0e7ff&color=1e3a8a&size=128"
                                 alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>

                    <h3 class="font-bold text-gray-800 group-hover:text-primary transition text-base leading-tight"><?php the_title(); ?></h3>

                    <?php
                    $depts = get_the_terms( get_the_ID(), 'department' );
                    if ( $depts && ! is_wp_error( $depts ) ) : ?>
                        <p class="text-xs text-secondary font-semibold mt-1"><?php echo esc_html( $depts[0]->name ); ?></p>
                    <?php endif; ?>

                    <?php if ( get_the_excerpt() ) : ?>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2"><?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?></p>
                    <?php endif; ?>
                </a>
            <?php endwhile; ?>
            </div>

            <div class="mt-10">
                <?php the_posts_pagination( array( 'prev_text' => '&larr; Prev', 'next_text' => 'Next &rarr;' ) ); ?>
            </div>

        <?php else : ?>
            <div class="text-center bg-white rounded-xl p-16 shadow-sm border border-gray-100">
                <span class="text-5xl">👩‍🏫</span>
                <p class="mt-4 text-gray-500 text-lg">No faculty members added yet.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
