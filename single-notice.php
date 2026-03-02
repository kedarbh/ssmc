<?php
/**
 * Single Notice template
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-primary py-10">
    <div class="container mx-auto px-4">
        <div class="flex items-center gap-2 text-blue-200 text-sm mb-3">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( get_post_type_archive_link('notice') ); ?>" class="hover:text-white transition">Notices</a>
            <span>/</span>
            <span class="text-white truncate"><?php the_title(); ?></span>
        </div>
        <h1 class="text-2xl md:text-3xl font-extrabold text-white max-w-3xl"><?php the_title(); ?></h1>
        <div class="flex flex-wrap items-center gap-4 mt-3 text-blue-200 text-sm">
            <span>📅 <?php echo get_the_date(); ?></span>
            <?php
            $terms = get_the_terms( get_the_ID(), 'notice_category' );
            if ( $terms && ! is_wp_error( $terms ) ) :
                foreach ( $terms as $term ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
                       class="bg-secondary text-primary font-semibold text-xs px-3 py-1 rounded-full hover:bg-yellow-400 transition">
                        <?php echo esc_html( $term->name ); ?>
                    </a>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Notice Content -->
            <article class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 p-8 md:p-10">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-8 rounded-xl overflow-hidden shadow">
                        <?php the_post_thumbnail( 'large', array('class' => 'w-full h-auto object-cover') ); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>

            <!-- Sidebar: Related Notices -->
            <aside class="lg:w-72 flex-shrink-0 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4 pb-3 border-b border-gray-100">Other Notices</h3>
                    <?php
                    $related = new WP_Query( array(
                        'post_type'      => 'notice',
                        'posts_per_page' => 5,
                        'post__not_in'   => array( get_the_ID() ),
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ) );
                    if ( $related->have_posts() ) : ?>
                        <ul class="space-y-3">
                        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                            <li class="pb-3 border-b border-gray-50 last:border-0">
                                <a href="<?php the_permalink(); ?>" class="group">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-primary transition line-clamp-2"><?php the_title(); ?></p>
                                    <span class="text-xs text-gray-400"><?php echo get_the_date(); ?></span>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-sm text-gray-400">No other notices found.</p>
                    <?php endif; ?>
                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url( get_post_type_archive_link('notice') ); ?>"
                       class="inline-block bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-800 transition shadow hover:-translate-y-0.5 w-full text-center">
                        &larr; Back to All Notices
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
