<?php
if (!defined('ABSPATH')) exit;

// Add Meta Box
function sm_add_meta_box() {
    add_meta_box(
        'sm_student_info',
        'Thông tin sinh viên',
        'sm_meta_box_callback',
        'sinh_vien',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sm_add_meta_box');

// HTML Meta Box
function sm_meta_box_callback($post) {
    wp_nonce_field('sm_save_meta', 'sm_nonce');

    $mssv = get_post_meta($post->ID, '_mssv', true);
    $lop = get_post_meta($post->ID, '_lop', true);
    $ngaysinh = get_post_meta($post->ID, '_ngaysinh', true);
    ?>

    <p>
        <label>MSSV:</label><br>
        <input type="text" name="mssv" value="<?php echo esc_attr($mssv); ?>">
    </p>

    <p>
        <label>Lớp:</label><br>
        <select name="lop">
            <option value="CNTT" <?php selected($lop, 'CNTT'); ?>>CNTT</option>
            <option value="Kinh tế" <?php selected($lop, 'Kinh tế'); ?>>Kinh tế</option>
            <option value="Marketing" <?php selected($lop, 'Marketing'); ?>>Marketing</option>
        </select>
    </p>

    <p>
        <label>Ngày sinh:</label><br>
        <input type="date" name="ngaysinh" value="<?php echo esc_attr($ngaysinh); ?>">
    </p>

    <?php
}

// Save data
function sm_save_meta($post_id) {
    if (!isset($_POST['sm_nonce']) || !wp_verify_nonce($_POST['sm_nonce'], 'sm_save_meta')) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['mssv'])) {
        update_post_meta($post_id, '_mssv', sanitize_text_field($_POST['mssv']));
    }

    if (isset($_POST['lop'])) {
        update_post_meta($post_id, '_lop', sanitize_text_field($_POST['lop']));
    }

    if (isset($_POST['ngaysinh'])) {
        update_post_meta($post_id, '_ngaysinh', sanitize_text_field($_POST['ngaysinh']));
    }
}
add_action('save_post', 'sm_save_meta');