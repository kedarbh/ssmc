<?php
/**
 * Single Faculty Member template
 *
 * @package ssmc-custom
 */

get_header();
$depts = get_the_terms( get_the_ID(), 'department' );
$dept_name = ( $depts && ! is_wp_error( $depts ) ) ? $depts[0]->name : '';
?>

<div class="bg-primary py-10">
    <div class="container mx-auto px-4">
        <div class="flex items-center gap-2 text-blue-200 text-sm mb-3">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( get_post_type_archive_link('faculty') ); ?>" class="hover:text-white transition">Faculty</a>
            <span>/</span>
            <span class="text-white truncate"><?php the_title(); ?></span>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Faculty Profile Card -->
            <aside class="lg:w-72 flex-shrink-0 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center">
                    <!-- Photo -->
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4 border-4 border-secondary shadow-lg">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail', array('class' => 'w-full h-full object-cover') ); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode( get_the_title() ); ?>&background=e0e7ff&color=1e3a8a&size=128"
                                 alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <h1 class="text-xl font-extrabold text-gray-800"><?php the_title(); ?></h1>
                    <?php if ( $dept_name ) : ?>
                        <p class="text-secondary font-semibold text-sm mt-1"><?php echo esc_html( $dept_name ); ?></p>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url( get_post_type_archive_link('faculty') ); ?>"
                   class="inline-block w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-blue-800 transition shadow text-center hover:-translate-y-0.5">
                    &larr; Back to Faculty
                </a>
            </aside>

            <!-- Faculty Bio Content -->
            <article class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 p-8 md:p-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4 border-gray-100">About</h2>
                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>
