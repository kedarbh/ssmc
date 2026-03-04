<?php
/**
 * The template for displaying department taxonomy archives
 *
 * @package ssmc-custom
 */

get_header();
$current_dept = get_queried_object();
?>

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-[10px] font-black text-secondary uppercase tracking-[0.4em] mb-4 block">Academic Department</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 uppercase tracking-tighter"><?php echo esc_html( $current_dept->name ); ?></h1>
            <div class="w-32 h-2 bg-secondary mx-auto mb-8"></div>
            <?php if ( $current_dept->description ) : ?>
                <p class="text-blue-100/60 max-w-3xl mx-auto font-light text-xl leading-relaxed italic">
                    <?php echo esc_html( $current_dept->description ); ?>
                </p>
            <?php endif; ?>
        </div>
    </header>

    <div class="container mx-auto px-4 -mt-12 relative z-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            <!-- Left: Programs (Main Collection) -->
            <div class="lg:col-span-8">
                <div class="flex items-center gap-6 mb-12">
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Academic Programs</h2>
                    <div class="h-px bg-gray-200 flex-grow"></div>
                </div>

                <?php 
                $programs_query = new WP_Query( array(
                    'post_type' => 'program',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'department',
                            'field'    => 'term_id',
                            'terms'    => $current_dept->term_id,
                        ),
                    ),
                    'posts_per_page' => -1,
                ) );

                if ( $programs_query->have_posts() ) : ?>
                    <div class="grid grid-cols-1 gap-8">
                        <?php while ( $programs_query->have_posts() ) : $programs_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="group block bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-transparent hover:border-primary/20 transition-all duration-500">
                                <div class="flex flex-col md:flex-row h-full">
                                    <div class="md:w-1/3 h-64 md:h-auto overflow-hidden">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-1000' ) ); ?>
                                        <?php else : ?>
                                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-4xl">📚</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-10 flex-grow flex flex-col justify-center">
                                        <h4 class="text-3xl font-black text-gray-900 mb-4 uppercase tracking-tighter group-hover:text-primary transition-colors"><?php the_title(); ?></h4>
                                        <p class="text-gray-500 font-light text-sm mb-8 line-clamp-2 italic"><?php echo get_the_excerpt(); ?></p>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-primary flex items-center gap-3">
                                            View Curriculam 
                                            <span class="w-12 h-px bg-primary group-hover:w-24 transition-all duration-700"></span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <div class="bg-white rounded-[2.5rem] p-20 text-center border-2 border-dashed border-gray-100">
                        <p class="text-gray-400 italic">No programs found for this department.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right: Faculty Members -->
            <div class="lg:col-span-4">
                <div class="flex items-center gap-6 mb-12">
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Department Faculty</h2>
                    <div class="h-px bg-gray-200 flex-grow"></div>
                </div>

                <?php 
                $faculty_query = new WP_Query( array(
                    'post_type' => 'faculty',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'department',
                            'field'    => 'term_id',
                            'terms'    => $current_dept->term_id,
                        ),
                    ),
                    'posts_per_page' => -1,
                ) );

                if ( $faculty_query->have_posts() ) : ?>
                    <div class="space-y-6">
                        <?php while ( $faculty_query->have_posts() ) : $faculty_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="group flex items-center gap-6 p-4 bg-white rounded-2xl shadow-lg border border-transparent hover:border-primary/20 transition-all">
                                <div class="w-16 h-16 rounded-xl overflow-hidden shadow-inner shrink-0 grayscale group-hover:grayscale-0 transition duration-500 border-2 border-white group-hover:border-primary">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                                    <?php else : ?>
                                        <img src="https://ui-avatars.com/api/?name=<?php the_title_attribute(); ?>&background=random" class="w-full h-full">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h5 class="text-sm font-black text-gray-900 group-hover:text-primary transition uppercase tracking-tight"><?php the_title(); ?></h5>
                                    <?php 
                                    $designation = get_post_meta( get_the_ID(), '_ssmc_faculty_designation', true );
                                    if ( $designation ) : ?>
                                        <span class="text-[9px] font-black text-primary group-hover:text-secondary uppercase tracking-widest mt-1 block"><?php echo esc_html( $designation ); ?></span>
                                    <?php else : ?>
                                        <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest mt-1 block">Faculty Member</span>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <p class="text-gray-400 italic text-sm">Faculty listings updating soon...</p>
                <?php endif; ?>

                <div class="mt-12 bg-primary rounded-[2rem] p-10 text-white shadow-xl shadow-primary/20 relative overflow-hidden group">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full group-hover:scale-110 transition duration-700"></div>
                    <h3 class="text-2xl font-black mb-6 uppercase tracking-tight relative z-10">Department Inquiries</h3>
                    <p class="text-blue-100/70 text-xs font-light mb-8 relative z-10">Have questions about specific courses or faculty research? Reach out to the HOD.</p>
                    <a href="<?php echo esc_url( home_url('/contact-us') ); ?>" class="block w-full py-4 bg-white text-primary text-center font-black rounded-xl hover:bg-secondary transition-all uppercase text-[9px] tracking-widest relative z-10 shadow-xl shadow-black/10">
                        Contact HOD
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
