<?php
/**
 * Plugin Name: Network Site Stats
 * Description: Giúp Super Admin theo dõi tình trạng các trang web con (ID, Tên site, Số lượng bài viết, Ngày đăng bài mới nhất).
 * Version: 1.0
 * Author: Sinh viên
 * Network: true
 */

// Ngăn chặn truy cập trực tiếp vào file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Tạo Menu trong Network Admin Dashboard
add_action( 'network_admin_menu', 'nss_add_network_menu' );
function nss_add_network_menu() {
    add_menu_page(
        'Thống kê Mạng lưới',     // Tiêu đề trang (Page title)
        'Site Stats',             // Tên hiển thị trên menu (Menu title)
        'manage_network',         // Quyền truy cập (chỉ Super Admin)
        'network-site-stats',     // Slug của menu
        'nss_render_stats_page',  // Hàm callback để hiển thị nội dung
        'dashicons-chart-bar',    // Icon menu
        30                        // Vị trí hiển thị
    );
}

// 2. Hàm hiển thị giao diện của trang thống kê
function nss_render_stats_page() {
    // Bảo mật: Kiểm tra lại quyền của người dùng
    if ( ! current_user_can( 'manage_network' ) ) {
        wp_die( 'Bạn không có quyền truy cập trang này.' );
    }
    echo '<div class="wrap">';
    echo '<h1>Thống kê các trang web trong mạng lưới</h1>';
    // Tạo bảng HTML chuẩn class của WordPress
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr>';
    echo '<th>ID Site</th>';
    echo '<th>Tên Site (Blog Name)</th>';
    echo '<th>Số bài viết (Đã xuất bản)</th>';
    echo '<th>Ngày đăng bài mới nhất</th>';
    echo '</tr></thead>';
    echo '<tbody>';

    // 3. Lấy danh sách toàn bộ các site trong mạng lưới
    $sites = get_sites();
    if ( ! empty( $sites ) ) {
        foreach ( $sites as $site ) {
            $blog_id = $site->blog_id;
            // Lấy tên của site
            $blog_details = get_blog_details( $blog_id );
            $blog_name    = $blog_details->blogname;


            // 4. CHUYỂN ĐỔI NGỮ CẢNH VÀO SITE CON

            switch_to_blog( $blog_id );
            // Đếm số lượng bài viết đã publish của site con hiện tại
            $count_posts = wp_count_posts( 'post' );
            $published_posts = isset( $count_posts->publish ) ? $count_posts->publish : 0;
            // Truy vấn bài viết mới nhất để lấy ngày đăng

            
            $latest_post = get_posts( array(
                'numberposts' => 1,
                'post_status' => 'publish',
                'post_type'   => 'post',
            ) );
            if ( ! empty( $latest_post ) ) {
                // Định dạng ngày tháng theo setting của WP
                $latest_post_date = date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), strtotime( $latest_post[0]->post_date ) );
            } else {
                $latest_post_date = 'Chưa có bài viết';
            }


            // 5. TRẢ LẠI NGỮ CẢNH VỀ TRANG GỐC (Rất quan trọng)
            restore_current_blog();

            // Render dữ liệu ra bảng
            echo '<tr>';
            echo '<td>' . esc_html( $blog_id ) . '</td>';
            echo '<td><strong>' . esc_html( $blog_name ) . '</strong></td>';
            echo '<td>' . esc_html( $published_posts ) . '</td>';
            echo '<td>' . esc_html( $latest_post_date ) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">Không có site nào.</td></tr>';
    }

    echo '</tbody></table></div>';
}
?>