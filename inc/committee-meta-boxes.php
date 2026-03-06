<?php
/**
 * Committee Meta Boxes
 *
 * Handles custom meta fields for the Committee Member post type to allow
 * different roles per assigned committee.
 *
 * @package ssmccustom
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add the meta box to the committee_member post type.
 */
function ssmc_add_committee_role_meta_box() {
	add_meta_box(
		'ssmc_committee_roles',
		__( 'Committee Roles / Designations', 'ssmc-custom' ),
		'ssmc_render_committee_role_meta_box',
		'committee_member',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ssmc_add_committee_role_meta_box' );

/**
 * Render the meta box content.
 *
 * @param WP_Post $post The current post object.
 */
function ssmc_render_committee_role_meta_box( $post ) {
	// Add a nonce field for security.
	wp_nonce_field( 'ssmc_save_committee_roles_data', 'ssmc_committee_roles_meta_box_nonce' );

	// Get all terms in the committee_group taxonomy.
	$terms = get_terms( array(
		'taxonomy'   => 'committee_group',
		'hide_empty' => false,
	) );

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		echo '<p>' . esc_html__( 'Please create some Committee Groups first before assigning roles.', 'ssmc-custom' ) . '</p>';
		return;
	}

	// Warning/Instructions.
	echo '<p class="description" style="margin-bottom: 20px;">' . esc_html__( 'The role fields below will automatically appear when you check a Committee Group in the right sidebar.', 'ssmc-custom' ) . '</p>';

	echo '<table class="form-table"><tbody>';

	foreach ( $terms as $term ) {
		// Get existing meta values
		$role_meta_key  = '_committee_role_' . $term->term_id;
        $order_meta_key = '_committee_order_' . $term->term_id;
        
		$role_value     = get_post_meta( $post->ID, $role_meta_key, true );
        // Default order to 99 so unset people appear at the end
        $order_value    = get_post_meta( $post->ID, $order_meta_key, true );
        if ( $order_value === '' ) {
            $order_value = 99;
        }

		echo '<tr class="committee-role-row" data-term-id="' . esc_attr( $term->term_id ) . '" style="display: none;">';
		echo '<th scope="row"><label for="' . esc_attr( $role_meta_key ) . '">' . esc_html( $term->name ) . ' Details</label></th>';
		echo '<td>';
        
        // Role Input
		echo '<input type="text" id="' . esc_attr( $role_meta_key ) . '" name="' . esc_attr( $role_meta_key ) . '" value="' . esc_attr( $role_value ) . '" class="regular-text" placeholder="e.g. Coordinator" style="margin-right: 15px;" />';
        
        // Order Input
        echo '<label for="' . esc_attr( $order_meta_key ) . '" style="margin-right: 5px;">Order #</label>';
        echo '<input type="number" id="' . esc_attr( $order_meta_key ) . '" name="' . esc_attr( $order_meta_key ) . '" value="' . esc_attr( $order_value ) . '" class="small-text" style="width: 60px;" />';
        
		echo '<p class="description">' . esc_html__( 'Designation and display order (1 = first, 99 = default/last) for ', 'ssmc-custom' ) . '<strong>' . esc_html( $term->name ) . '</strong></p>';
		echo '</td>';
		echo '</tr>';
	}

	echo '</tbody></table>';

    // Output inline JS to toggle rows based on taxonomy checkboxes
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            function toggleCommitteeRoles() {
                // Find all taxonomy checkboxes for committee_group
                $('#taxonomy-committee_group input[type="checkbox"]').each(function() {
                    var termId = $(this).val();
                    var $row = $('.committee-role-row[data-term-id="' + termId + '"]');
                    
                    if ( $(this).is(':checked') ) {
                        $row.show();
                    } else {
                        $row.hide();
                    }
                });
            }

            // Run on load to set initial state
            toggleCommitteeRoles();

            // Run whenever a taxonomy checkbox is toggled
            $('#taxonomy-committee_group').on('change', 'input[type="checkbox"]', function() {
                toggleCommitteeRoles();
            });
        });
    </script>
    <?php
}

/**
 * Save the meta box data when the post is saved.
 *
 * @param int $post_id The ID of the post being saved.
 */
function ssmc_save_committee_roles_data( $post_id ) {
	// 1. Check if our nonce is set.
	if ( ! isset( $_POST['ssmc_committee_roles_meta_box_nonce'] ) ) {
		return;
	}

	// 2. Verify that the nonce is valid.
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ssmc_committee_roles_meta_box_nonce'] ) ), 'ssmc_save_committee_roles_data' ) ) {
		return;
	}

	// 3. If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// 4. Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'committee_member' === sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	} else {
		return; // Not our post type.
	}

	/* OK, it's safe for us to save the data now. */

	// Get all terms to dynamically save them based on their IDs
	$terms = get_terms( array(
		'taxonomy'   => 'committee_group',
		'hide_empty' => false,
	) );

	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$role_meta_key  = '_committee_role_' . $term->term_id;
            $order_meta_key = '_committee_order_' . $term->term_id;
			
            // Save Role
			if ( isset( $_POST[ $role_meta_key ] ) ) {
				$my_data = sanitize_text_field( wp_unslash( $_POST[ $role_meta_key ] ) );
				update_post_meta( $post_id, $role_meta_key, $my_data );
			}
            
            // Save Order
            if ( isset( $_POST[ $order_meta_key ] ) ) {
                $order_data = intval( wp_unslash( $_POST[ $order_meta_key ] ) );
                update_post_meta( $post_id, $order_meta_key, $order_data );
            }
		}
	}
}
add_action( 'save_post', 'ssmc_save_committee_roles_data' );
