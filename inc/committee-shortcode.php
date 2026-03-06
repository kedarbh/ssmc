<?php
/**
 * Committee Shortcode Implementation
 * 
 * Provides a [committee slug="group-slug"] shortcode to embed specific committee members
 * directly within standard WordPress content, sorted dynamically by their specific
 * committee order numbers.
 * 
 * @package ssmc-custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Handle the [committee] shortcode.
 *
 * @param array $atts Shortcode attributes.
 * @return string Rendered HTML grid.
 */
function ssmc_committee_shortcode( $atts ) {
    // 1. Parse attributes
    $a = shortcode_atts( array(
        'slug' => '',
    ), $atts );

    $slug = sanitize_text_field( $a['slug'] );

    if ( empty( $slug ) ) {
        return '<p class="text-red-500 text-sm italic">Error: Please provide a committee slug (e.g., [committee slug="management-committee"]).</p>';
    }

    // 2. Look up the term by slug
    $committee_term = get_term_by( 'slug', $slug, 'committee_group' );

    if ( ! $committee_term || is_wp_error( $committee_term ) ) {
        return '<p class="text-red-500 text-sm italic">Error: Committee group "' . esc_html( $slug ) . '" not found.</p>';
    }

    // 3. Query all members in this term
    $members_query = new WP_Query( array(
        'post_type'      => 'committee_member',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'committee_group',
                'field'    => 'term_id',
                'terms'    => $committee_term->term_id,
            ),
        ),
    ) );

    if ( ! $members_query->have_posts() ) {
        return '<p class="text-gray-500 italic">No members found for ' . esc_html( $committee_term->name ) . '.</p>';
    }

    // 4. Collect and sort posts by their specific order in this committee
    $sorted_members = array();
    while ( $members_query->have_posts() ) {
        $members_query->the_post();
        $post_id = get_the_ID();
        
        // Default order
        $order = 99; 
        
        $meta_order = get_post_meta( $post_id, '_committee_order_' . $committee_term->term_id, true );
        if ( $meta_order !== '' ) {
            $order = intval( $meta_order );
        }
        
        $designation = get_post_meta( $post_id, '_committee_role_' . $committee_term->term_id, true );
        if ( empty( $designation ) ) {
            $designation = get_the_excerpt() ? get_the_excerpt() : 'Member';
        }
        
        $sorted_members[] = array(
            'post'        => get_post(),
            'order'       => $order,
            'designation' => $designation
        );
    }
    wp_reset_postdata();

    // Sort by custom order
    usort( $sorted_members, function($a, $b) {
        if ($a['order'] == $b['order']) {
            return strcmp($a['post']->post_title, $b['post']->post_title);
        }
        return ($a['order'] < $b['order']) ? -1 : 1;
    });

    // 5. Output buffering to capture HTML
    ob_start();
    ?>
    <div class="not-prose ssmc-committee-grid my-8 bg-white rounded-[2rem] p-8 md:p-12 border border-gray-100 shadow-xl shadow-gray-200/30">
        <div class="flex items-center gap-4 mb-10 pb-6 border-b border-gray-100">
            <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 tracking-tight m-0">
                <?php echo esc_html( $committee_term->name ); ?>
            </h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ( $sorted_members as $member_data ) : 
                global $post;
                $post = $member_data['post'];
                setup_postdata( $post );
                $designation = $member_data['designation'];
            ?>                                
                <div class="group flex items-center gap-4 p-4 rounded-2xl border border-gray-100 hover:border-blue-900/20 hover:bg-blue-50/50 transition-colors">
                    <div class="w-16 h-16 shrink-0 rounded-full bg-gray-100 overflow-hidden relative shadow-inner">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="<?php the_title_attribute(); ?>">
                        <?php else : ?>
                            <div class="w-full h-full border-2 border-white rounded-full bg-blue-50 text-blue-900 flex items-center justify-center">
                                <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg leading-tight group-hover:text-blue-900 transition-colors m-0 pb-1"><?php the_title(); ?></h4>
                        <span class="inline-flex px-2 py-0.5 rounded-md bg-gray-100 text-gray-600 font-medium text-xs tracking-wider uppercase group-hover:bg-white group-hover:text-blue-900 transition-colors border border-transparent group-hover:border-blue-100">
                            <?php echo esc_html( $designation ); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    return $html;
}
add_shortcode( 'committee', 'ssmc_committee_shortcode' );
