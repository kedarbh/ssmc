<?php

/**
 * Event Meta Boxes
 *
 * @package ssmc-custom
 */

function ssmc_add_event_meta_boxes()
{
    add_meta_box(
        'ssmc_event_details',
        __('Event Details', 'ssmc-custom'),
        'ssmc_event_details_meta_box_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ssmc_add_event_meta_boxes');

function ssmc_event_details_meta_box_callback($post)
{
    wp_nonce_field('ssmc_event_details_nonce', 'ssmc_event_details_nonce_field');

    $event_date = get_post_meta($post->ID, '_ssmc_event_date', true);
    $event_location = get_post_meta($post->ID, '_ssmc_event_location', true);
?>
    <div class="ssmc-meta-box-wrapper" style="padding: 10px 0;">
        <p>
            <label for="ssmc_event_date" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Event Date & Time', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_event_date" name="ssmc_event_date" value="<?php echo esc_attr($event_date); ?>" class="widefat" placeholder="e.g. March 15, 2026 at 10:00 AM" />
            <span class="description"><?php _e('Enter the date and time of the event.', 'ssmc-custom'); ?></span>
        </p>
        <p>
            <label for="ssmc_event_location" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Event Location', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_event_location" name="ssmc_event_location" value="<?php echo esc_attr($event_location); ?>" class="widefat" placeholder="e.g. Main Auditorium" />
            <span class="description"><?php _e('Enter the location or venue of the event.', 'ssmc-custom'); ?></span>
        </p>
    </div>
<?php
}

function ssmc_save_event_details_meta_box_data($post_id)
{
    if (! isset($_POST['ssmc_event_details_nonce_field'])) {
        return;
    }
    if (! wp_verify_nonce($_POST['ssmc_event_details_nonce_field'], 'ssmc_event_details_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['ssmc_event_date'])) {
        update_post_meta($post_id, '_ssmc_event_date', sanitize_text_field($_POST['ssmc_event_date']));
    }

    if (isset($_POST['ssmc_event_location'])) {
        update_post_meta($post_id, '_ssmc_event_location', sanitize_text_field($_POST['ssmc_event_location']));
    }
}
add_action('save_post', 'ssmc_save_event_details_meta_box_data');
