<?php
/**
 * Archive template for Programs
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
            <span class="text-white">Academic Programs</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">Academic Programs</h1>
        <p class="text-blue-100/70 mt-3 max-w-xl font-light text-lg">Empowering students through high-quality, accessible higher education in multiple disciplines.</p>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Department filter tabs -->
        <?php
        $departments = get_terms( array( 'taxonomy' => 'department', 'hide_empty' => false ) );
        if ( $departments && ! is_wp_error( $departments ) ) : ?>
        <div class="flex flex-wrap items-center gap-3 mb-12">
            <span class="text-gray-500 text-xs font-bold uppercase tracking-wider mr-2">Filter By:</span>
            <a href="<?php echo get_post_type_archive_link('program'); ?>"
               class="px-6 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest bg-primary text-white shadow-lg shadow-primary/20 hover:bg-blue-800 transition-all duration-300">
                All Programs
            </a>
            <?php foreach ( $departments as $dept ) : ?>
            <a href="<?php echo esc_url( get_term_link( $dept ) ); ?>"
               class="px-6 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest bg-white text-gray-700 shadow-sm hover:shadow-md hover:bg-gray-50 transition-all duration-300 border border-gray-100">
                <?php echo esc_html( $dept->name ); ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 group flex flex-col border border-gray-100 overflow-hidden hover:-translate-y-2">
                    <!-- Thumbnail -->
                    <div class="h-48 bg-gray-200 overflow-hidden relative">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-out' ) ); ?>
                        <?php else : ?>
                            <div class="w-full h-full bg-gradient-to-br from-primary to-blue-800 flex items-center justify-center group-hover:scale-110 transition duration-700 ease-out">
                                <span class="text-white text-5xl">🎓</span>
                            </div>
                        <?php endif; ?>

                        <!-- Dept badge -->
                        <?php
                        $depts = get_the_terms( get_the_ID(), 'department' );
                        if ( $depts && ! is_wp_error( $depts ) ) : ?>
                            <div class="absolute top-4 left-4 bg-primary/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-lg border border-white/20 uppercase tracking-widest">
                                <?php echo esc_html( $depts[0]->name ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-8 flex flex-col flex-1">
                        <h2 class="text-xl font-extrabold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300 leading-tight">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-gray-500 text-sm mb-8 flex-1 line-clamp-3 leading-relaxed font-light"><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>"
                           class="inline-flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-widest group-hover:text-secondary transition-all duration-300 w-fit">
                            Explore Program <span class="group-hover:translate-x-1.5 transition-transform duration-300">&rarr;</span>
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
