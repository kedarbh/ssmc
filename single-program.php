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

<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-12 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>" class="hover:text-white transition-colors duration-200">Programs</a>
            <span class="opacity-40">/</span>
            <span class="text-white truncate max-w-[200px]"><?php the_title(); ?></span>
        </nav>
        
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary text-primary text-[10px] font-extrabold uppercase tracking-widest mb-4 shadow-lg shadow-black/10">
                <?php echo esc_html( $dept_name ); ?> Department
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight mb-6"><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Main Content -->
            <article class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
                    </div>
                <?php endif; ?>

                <div class="text-gray-700 leading-[1.8] font-normal
                            [&_h1]:text-4xl [&_h1]:font-black [&_h1]:text-gray-900 [&_h1]:mt-12 [&_h1]:mb-6
                            [&_h2]:text-3xl [&_h2]:font-black [&_h2]:text-gray-900 [&_h2]:mt-10 [&_h2]:mb-6
                            [&_h3]:text-2xl [&_h3]:font-black [&_h3]:text-gray-900 [&_h3]:mt-8 [&_h3]:mb-4
                            [&_h4]:text-xl [&_h4]:font-black [&_h4]:text-gray-900 [&_h4]:mt-6 [&_h4]:mb-4
                            [&_p]:mb-6 
                            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-6 [&_li]:mb-2
                            [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-6 
                            [&_a]:text-primary [&_a]:font-bold [&_a]:underline hover:[&_a]:text-secondary hover:[&_a]:no-underline
                            [&_strong]:text-gray-900 [&_strong]:font-bold
                            [&_blockquote]:border-l-4 [&_blockquote]:border-primary/20 [&_blockquote]:pl-6 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-8">
                    <?php the_content(); ?>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-80 flex-shrink-0 space-y-6">
                <!-- Quick Info Box -->
                <div class="bg-gradient-to-br from-primary to-blue-900 text-white rounded-2xl p-8 shadow-xl shadow-primary/20 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-bl-full pointer-events-none translate-x-4 -translate-y-4"></div>
                    
                    <h3 class="font-extrabold text-xl mb-6 relative z-10">Program Details</h3>
                    <ul class="space-y-4 text-sm text-blue-100/90 relative z-10">
                        <li class="flex gap-3 items-center">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-lg">🎓</span> 
                            <span><?php echo esc_html( $dept_name ); ?> Department</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-lg">📅</span> 
                            <?php 
                                $program_title = get_the_title();
                                $duration = ( stripos( $program_title, 'Master' ) !== false || stripos( $program_title, 'MBS' ) !== false ) ? '2-Year' : '4-Year';
                            ?>
                            <span><?php echo esc_html( $duration ); ?> Duration</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-lg">🏛️</span> 
                            <span class="leading-snug text-xs">Affiliated to Tribhuvan University</span>
                        </li>
                    </ul>
                    <a href="#" class="mt-8 inline-flex w-full items-center justify-center bg-secondary text-primary font-extrabold text-center py-4 rounded-xl hover:bg-yellow-400 transition-all duration-300 text-xs uppercase tracking-widest shadow-lg shadow-black/10 hover:-translate-y-1 relative z-10">
                        Apply Now
                    </a>
                </div>

                <!-- Other Programs -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 overflow-hidden relative group/sidebar">
                     <div class="absolute top-0 right-0 w-16 h-16 bg-primary/5 rounded-bl-full pointer-events-none translate-x-2 -translate-y-2"></div>
                    
                    <h3 class="font-extrabold text-gray-900 mb-6 pb-4 border-b border-gray-100 relative z-10 leading-tight">Similar Programs</h3>
                    <?php
                    $related = new WP_Query( array(
                        'post_type'      => 'program',
                        'posts_per_page' => 4,
                        'post__not_in'   => array( get_the_ID() ),
                    ) );
                    if ( $related->have_posts() ) : ?>
                        <ul class="space-y-4 relative z-10">
                        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="group/item flex items-center gap-3">
                                    <span class="w-6 h-6 rounded bg-primary/5 text-primary flex items-center justify-center text-[10px] group-hover/item:bg-primary group-hover/item:text-white transition-colors">🎓</span>
                                    <span class="text-xs font-bold text-gray-700 group-hover/item:text-primary transition-colors leading-tight"><?php the_title(); ?></span>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url( get_post_type_archive_link('program') ); ?>"
                   class="inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-600 font-bold px-6 py-4 rounded-xl hover:bg-gray-200 transition-all duration-300 w-full text-xs uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    View All Programs
                </a>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
