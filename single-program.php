<?php
/**
 * Single Program template
 *
 * @package ssmc-custom
 */

get_header();
$depts = get_the_terms( get_the_ID(), 'department' );
$dept_name = ( $depts && ! is_wp_error( $depts ) ) ? $depts[0]->name : 'Program';
?>

<div class="bg-primary py-10">
    <div class="container mx-auto px-4">
        <div class="flex items-center gap-2 text-blue-200 text-sm mb-3">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>" class="hover:text-white transition">Programs</a>
            <span>/</span>
            <span class="text-white truncate"><?php the_title(); ?></span>
        </div>
        <div class="flex flex-wrap items-center gap-3 mb-3">
            <span class="bg-secondary text-primary font-bold text-xs px-3 py-1 rounded-full"><?php echo esc_html( $dept_name ); ?></span>
        </div>
        <h1 class="text-2xl md:text-4xl font-extrabold text-white max-w-3xl"><?php the_title(); ?></h1>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Main Content -->
            <article class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 p-8 md:p-10">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-8 rounded-xl overflow-hidden shadow-md">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-72 flex-shrink-0 space-y-6">
                <!-- Quick Info Box -->
                <div class="bg-gradient-to-br from-primary to-blue-900 text-white rounded-xl p-6 shadow-inner">
                    <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-3">Program Info</h3>
                    <ul class="space-y-3 text-sm text-blue-100">
                        <li class="flex gap-2 items-start"><span>🎓</span> <span><?php echo esc_html( $dept_name ); ?> Faculty</span></li>
                        <li class="flex gap-2 items-start"><span>📅</span> <span>4-Year Program</span></li>
                        <li class="flex gap-2 items-start"><span>🏛️</span> <span>Affiliated to Tribhuvan University</span></li>
                    </ul>
                    <a href="#" class="mt-6 inline-block w-full bg-secondary text-primary font-semibold text-center py-2.5 rounded-lg hover:bg-yellow-400 transition text-sm shadow hover:-translate-y-0.5">
                        Apply Now
                    </a>
                </div>

                <!-- Other Programs -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4 pb-3 border-b border-gray-100">Other Programs</h3>
                    <?php
                    $related = new WP_Query( array(
                        'post_type'      => 'program',
                        'posts_per_page' => 4,
                        'post__not_in'   => array( get_the_ID() ),
                    ) );
                    if ( $related->have_posts() ) : ?>
                        <ul class="space-y-3">
                        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                            <li class="pb-3 border-b border-gray-50 last:border-0">
                                <a href="<?php the_permalink(); ?>" class="group flex items-center gap-2">
                                    <span class="text-primary">🎓</span>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-primary transition"><?php the_title(); ?></span>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-sm text-gray-400">No other programs found.</p>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>"
                   class="inline-block bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-800 transition shadow hover:-translate-y-0.5 w-full text-center">
                    &larr; All Programs
                </a>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
