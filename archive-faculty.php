<?php
/**
 * Archive template for Faculty
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
            <span class="text-white">Faculty Directory</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">Faculty Directory</h1>
        <p class="text-blue-100/70 mt-3 max-w-xl font-light text-lg">Meet our distinguished scholars, researchers, and dedicated academic staff members.</p>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">

        <!-- Department filter -->
        <?php
        $departments = get_terms( array( 'taxonomy' => 'department', 'hide_empty' => false ) );
        if ( $departments && ! is_wp_error( $departments ) ) : ?>
        <div class="flex flex-wrap items-center gap-3 mb-12">
            <span class="text-gray-500 text-xs font-bold uppercase tracking-wider mr-2">Department:</span>
            <a href="<?php echo get_post_type_archive_link('faculty'); ?>"
               class="px-6 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest bg-primary text-white shadow-lg shadow-primary/20 hover:bg-blue-800 transition-all duration-300">
                All Faculty
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>"
                   class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 text-center p-8 flex flex-col items-center hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none translate-x-4 -translate-y-4 transition-transform duration-500 group-hover:scale-110"></div>

                    <!-- Photo -->
                    <div class="w-28 h-28 rounded-2xl overflow-hidden mb-6 border-4 border-white shadow-xl bg-gray-50 group-hover:border-primary transition-all duration-500 relative z-10">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover group-hover:scale-110 transition duration-700' ) ); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode( get_the_title() ); ?>&background=eff6ff&color=1e3a8a&size=128&bold=true"
                                 alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <?php endif; ?>
                    </div>

                    <h3 class="font-extrabold text-gray-900 group-hover:text-primary transition-colors duration-300 text-lg leading-tight relative z-10 mb-2 truncate w-full"><?php the_title(); ?></h3>

                    <?php
                    $depts = get_the_terms( get_the_ID(), 'department' );
                    if ( $depts && ! is_wp_error( $depts ) ) : ?>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-primary text-[10px] font-bold uppercase tracking-wider mb-4 relative z-10">
                            <span class="w-1 h-1 rounded-full bg-primary/40"></span>
                            <?php echo esc_html( $depts[0]->name ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_the_excerpt() ) : ?>
                        <p class="text-xs text-gray-400 font-light leading-relaxed line-clamp-2 relative z-10"><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                    <?php endif; ?>
                    
                    <div class="mt-6 text-primary/40 group-hover:text-primary transition-all duration-300 relative z-10">
                         <svg class="w-5 h-5 mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-2 group-hover:translate-y-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
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
