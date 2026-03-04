<?php
/**
 * The template for displaying cell archives
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-4 uppercase tracking-tighter"><?php esc_html_e( 'Campus Cells & Groups', 'ssmc-custom' ); ?></h1>
            <p class="text-blue-100/60 max-w-2xl mx-auto font-light leading-relaxed mb-8">
                Explore our specialized campus cells dedicated to extra-curricular excellence, community service, and efficient campus management.
            </p>
            <div class="w-20 h-1.5 bg-secondary mx-auto"></div>
        </div>
    </header>

    <div class="container mx-auto px-4 -mt-12 relative z-20">
        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="group bg-white rounded-[3rem] p-10 shadow-xl shadow-gray-200/50 border border-transparent hover:border-primary/20 hover:shadow-2xl transition-all duration-500 flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-3xl bg-gray-50 flex items-center justify-center text-4xl mb-8 group-hover:bg-primary group-hover:scale-110 transition-all duration-500 shadow-inner">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-full object-cover rounded-3xl' ) ); ?>
                            <?php else : ?>
                                <span class="group-hover:hidden">🔗</span>
                                <span class="hidden group-hover:block text-white">🔗</span>
                            <?php endif; ?>
                        </div>
                        <h2 class="text-2xl font-black text-gray-900 group-hover:text-primary transition mb-4 uppercase tracking-tight"><?php the_title(); ?></h2>
                        <div class="prose prose-sm text-gray-400 font-light mb-8 line-clamp-2">
                            <?php the_excerpt(); ?>
                        </div>
                        <span class="mt-auto text-[10px] font-black uppercase tracking-widest text-primary border-b-2 border-transparent group-hover:border-secondary transition-all">Explore Cell →</span>
                    </a>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="py-12 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__( '&larr; Previous', 'ssmc-custom' ),
                    'next_text' => esc_html__( 'Next &rarr;', 'ssmc-custom' ),
                    'class'     => 'tailwind-pagination',
                ) );
                ?>
            </div>
        <?php else : ?>
            <div class="bg-white rounded-[3rem] p-24 text-center shadow-xl">
                <div class="text-6xl mb-8 opacity-20">🍃</div>
                <h2 class="text-3xl font-black text-gray-900 mb-4 uppercase tracking-tight">No Cells Found</h2>
                <p class="text-gray-400 font-light">Campus groups are currently being established. Please check back later.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
