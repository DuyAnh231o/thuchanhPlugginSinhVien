<?php
if (!defined('ABSPATH')) exit;

function sm_student_list_shortcode() {
    $args = [
        'post_type' => 'sinh_vien',
        'posts_per_page' => -1
    ];

    $query = new WP_Query($args);

    if (!$query->have_posts()) return "Không có sinh viên.";

    $html = '<table class="sm-table">';
    $html .= '<tr>
                <th>STT</th>
                <th>MSSV</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Ngày sinh</th>
              </tr>';

    $i = 1;

    while ($query->have_posts()) {
        $query->the_post();

        $mssv = get_post_meta(get_the_ID(), '_mssv', true);
        $lop = get_post_meta(get_the_ID(), '_lop', true);
        $ngaysinh = get_post_meta(get_the_ID(), '_ngaysinh', true);

        $html .= "<tr>
                    <td>{$i}</td>
                    <td>{$mssv}</td>
                    <td>" . get_the_title() . "</td>
                    <td>{$lop}</td>
                    <td>{$ngaysinh}</td>
                  </tr>";

        $i++;
    }

    wp_reset_postdata();

    $html .= '</table>';

    return $html;
}

add_shortcode('danh_sach_sinh_vien', 'sm_student_list_shortcode');