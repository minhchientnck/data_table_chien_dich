<?php
/*
Plugin Name: Data Table Chien Dich
Plugin URI:
Description: 
Version: 1.0
Author: Chien Ta
Author URI:
License: GPL
*/

function query_chien_dich() {
  global $wpdb;
  $chien_dich = $wpdb->get_var( "SELECT * FROM vul_fluentform_entry_details" );

  global $wpdb; // Biến toàn cục lớp $wpdb được sử dụng trong khi tương tác với databse wordpress
  $limit = 10; // Số lượng record cần lấy
  $offset = 0; // Số lượng record bỏ qua
  $table = $wpdb->prefix . 'fluentform_entry_details'; // Khai báo bảng cần lấy
  $sql = "SELECT * FROM {$table}"; // cậu sql query 
  $data = $wpdb->get_results( $wpdb->prepare($sql, $limit, $offset), ARRAY_A);
  $danh_sach_chien_dich = array();
  foreach ($data as $key => $value) {
    $danh_sach_chien_dich[] = array(
      'field_name' => $value['field_name'],
      'field_value' => $value['field_value']
    );
  }
  echo $danh_sach_chien_dich;
}

add_shortcode('in_danh_sach_chien_dich','query_chien_dich');



