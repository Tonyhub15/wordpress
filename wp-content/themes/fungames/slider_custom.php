<?php
$custom_slider = get_option('fungames_slider_type');

if ( !empty($custom_slider) && $custom_slider != 'Default' ) {

  // Get the post order
  if ( get_option('fungames_order_games_slider') == 'Random') {
    $order = 'rand';
  } else { $order = 'date'; }

  $catID = get_option('fungames_slidercategory');
  $game_query = 'cat='.$catID.'&meta_key=mabp_screen1_url&meta_compare=>=&meta_value=http'.$order;

  $game_query = array (
    'showposts' => 10,
    'cat' => $catID,
    'orderby' => $order,
    'meta_query' => array (
      array(
        'key' => 'mabp_screen1_url',
        'value' => 'http',
        'compare' => 'LIKE'
      )
    )
  );

  switch ( $custom_slider ) {
    case 'nivoSlider':
      {
        myabp_get_nivoslider($game_query);
      } break;
  }

  // Reset WordPress query
  wp_reset_query();
}
?>