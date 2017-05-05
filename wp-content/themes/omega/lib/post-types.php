<?php

// mainpaage banner
add_action('init', 'leadership_register');
function leadership_register() {
  $labels = array(
      'name' => _x('Leadership', 'post type general name'),
      'singular_name' => _x('Leadership', 'post type singular name'),
      'add_new' => _x('Add Leadership', 'rep'),
      'add_new_item' => __('Add Leadership'),
      'edit_item' => __('Edit Leadership'),
      'new_item' => __('New Leadership'),
      'view_item' => __('View Leadership'),
      'search_items' => __('Search Leadership'),
      'not_found' =>  __('Nothing found'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'menu_position' => 20,
      'supports'      => array( 'title', 'editor', 'page-attributes'),
  );
  register_post_type( 'leadership' , $args );
}
?>