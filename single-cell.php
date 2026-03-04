<?php
/**
 * The template for displaying cell single posts
 *
 * @package ssmc-custom
 */

get_header(); ?>

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Header Section -->
    <header class="bg-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-4 uppercase tracking-tighter"><?php the_title(); ?></h1>
            <div class="w-20 h-1.5 bg-secondary mx-auto"></div>
        </div>
    </header>

    <div class="container mx-auto px-4 -mt-12 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[2.5rem] p-10 md:p-16 shadow-xl shadow-gray-200/50 border border-gray-100 mb-12">
                    <div class="prose prose-blue prose-xl max-w-none text-gray-600 font-light leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Members Section -->
                <?php 
                $members = get_post_meta( get_the_ID(), '_ssmc_cell_members', true );
                if ( ! empty( $members ) && is_array( $members ) ) :
                ?>
                    <div class="mt-20">
                        <h2 class="text-xs font-black text-primary uppercase tracking-[0.4em] mb-12 text-center">Cell Members</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <?php 
                            foreach ( $members as $member_id ) :
                                $faculty = get_post( $member_id );
                                if ( $faculty ) :
                            ?>
                                <a href="<?php echo get_permalink( $member_id ); ?>" class="group flex items-center gap-6 p-6 bg-white rounded-3xl shadow-lg border border-transparent hover:border-primary/20 hover:shadow-2xl transition-all duration-300">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden shadow-inner border-2 border-gray-50 group-hover:border-primary transition-colors">
                                        <?php if ( has_post_thumbnail( $member_id ) ) : ?>
                                            <?php echo get_the_post_thumbnail( $member_id, 'thumbnail', array( 'class' => 'w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500' ) ); ?>
                                        <?php else : ?>
                                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode( $faculty->post_title ); ?>&background=random" class="w-full h-full object-cover">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-black text-gray-900 group-hover:text-primary transition-colors uppercase tracking-tight"><?php echo esc_html( $faculty->post_title ); ?></h4>
                                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Faculty Member</p>
                                    </div>
                                </a>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4">
                <div class="sticky top-32 space-y-8">
                    <!-- Featured Image -->
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="rounded-[2rem] overflow-hidden shadow-2xl">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) ); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Quick Contact / Action Widget -->
                    <div class="bg-primary rounded-[2rem] p-10 text-white shadow-xl shadow-primary/20 relative overflow-hidden group">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full group-hover:scale-110 transition duration-700"></div>
                        <h3 class="text-2xl font-black mb-6 uppercase tracking-tight relative z-10">Get Involved</h3>
                        <p class="text-blue-100/70 text-sm font-light mb-8 relative z-10">Interested in joining this cell or seeking support? Reach out to the administration office.</p>
                        <a href="<?php echo esc_url( home_url('/contact-us') ); ?>" class="block w-full py-4 bg-secondary text-primary text-center font-black rounded-xl hover:bg-yellow-400 transition-all uppercase text-[10px] tracking-widest relative z-10">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
