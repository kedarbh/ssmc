<?php
/**
 * Template Name: Management Committee
 *
 * @package ssmccustom
 */

get_header(); ?>

<!-- Premium Page Header -->
<div class="bg-gradient-to-br from-primary via-primary to-blue-900 py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-secondary/10 rounded-full translate-y-1/2 -translate-x-1/3 blur-2xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <nav class="flex items-center gap-2 text-blue-200/80 text-xs mb-4 font-medium uppercase tracking-widest">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-white transition-colors duration-200">Home</a>
            <span class="opacity-40">/</span>
            <span class="text-white truncate max-w-[200px]"><?php the_title(); ?></span>
        </nav>
        
        <div class="max-w-4xl">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight"><?php the_title(); ?></h1>
            <p class="text-blue-100/70 mt-6 max-w-2xl font-light text-xl leading-relaxed">
                Meet the dedicated individuals guiding our institution towards academic and community excellence.
            </p>
        </div>
    </div>
</div>

<!-- Committee Grid -->
<section class="py-24 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        
        <?php
        $management_term = get_term_by('slug', 'management-committee', 'committee_group');
        $term_id = $management_term ? $management_term->term_id : 0;

        $committee_query = new WP_Query( array(
            'post_type'      => 'committee_member',
            'posts_per_page' => -1, // Show all members
            'tax_query'      => array(
                array(
                    'taxonomy' => 'committee_group',
                    'field'    => 'slug',
                    'terms'    => 'management-committee',
                ),
            ),
        ) );

        if ( $committee_query->have_posts() ) : 
            
            // Collect and sort posts by custom order
            $sorted_members = array();
            while ( $committee_query->have_posts() ) {
                $committee_query->the_post();
                $post_id = get_the_ID();
                
                $order = 99; // Default
                $designation = get_the_excerpt() ? get_the_excerpt() : 'Committee Member';
                
                if ( $term_id ) {
                    $meta_order = get_post_meta( $post_id, '_committee_order_' . $term_id, true );
                    if ( $meta_order !== '' ) {
                        $order = intval( $meta_order );
                    }
                    
                    $meta_role = get_post_meta( $post_id, '_committee_role_' . $term_id, true );
                    if ( ! empty( $meta_role ) ) {
                        $designation = $meta_role;
                    }
                }
                
                $sorted_members[] = array(
                    'post'        => get_post(),
                    'order'       => $order,
                    'designation' => $designation
                );
            }
            wp_reset_postdata();

            // Sort the array by the custom 'order' value
            usort( $sorted_members, function($a, $b) {
                if ($a['order'] == $b['order']) {
                    return strcmp($a['post']->post_title, $b['post']->post_title); // alphabetize if order is the same
                }
                return ($a['order'] < $b['order']) ? -1 : 1;
            });
            ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ( $sorted_members as $member_data ) : 
                    global $post;
                    $post = $member_data['post'];
                    setup_postdata( $post );
                    $designation = $member_data['designation'];
                ?>                    
                    <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-gray-100 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <!-- Image Container with Avatar Fallback -->
                        <div class="w-full h-64 relative bg-gray-100 overflow-hidden flex items-center justify-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                            <?php else : ?>
                                <!-- Fallback SVG Avatar -->
                                <svg class="w-32 h-32 text-gray-300 group-hover:text-primary/20 transition-colors duration-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            <?php endif; ?>
                            
                            <!-- Decorative overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Content Area -->
                        <div class="p-8 text-center flex-grow flex flex-col justify-center relative">
                            <!-- Floating decorative element -->
                            <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-1 bg-secondary rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <h3 class="text-xl font-black text-gray-900 mb-2 truncate group-hover:text-primary transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-secondary text-xs font-bold uppercase tracking-widest leading-relaxed">
                                <?php echo esc_html( $designation ); ?>
                            </p>
                        </div>
                    </div>

                <?php endforeach; wp_reset_postdata(); ?>
            </div>

        <?php else : ?>
            
            <div class="text-center bg-white rounded-3xl p-16 border border-gray-100 shadow-sm max-w-2xl mx-auto">
                <div class="w-20 h-20 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">Committee Directory Empty</h3>
                <p class="text-gray-500 font-light leading-relaxed mb-8">
                    It looks like no committee members have been added yet. Please add them from the WordPress dashboard using the new "Committee" menu.
                </p>
            </div>

        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
