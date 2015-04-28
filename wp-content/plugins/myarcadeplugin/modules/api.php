<?php
/**
 * MyArcadePlugin Theme API  - Helps theme developers to create MyArcadePlugin compatible themes.
 *
 * @package MyArcadePlugin Theme API
 * @author Daniel Bakovic - http://myarcadeplugin.com
 *
 * @version 1.0.0
 */


if ( !function_exists('myarcade_title')) {
  /**
  * Display or retrieve the title of the current post/game. The title can be cutted after x characters.
  * Words will not be cutted off (wordwrap).
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $REDE24D37EF4830463F42B8D4F292701C Optional. Max. length of the title
  * @param bool $echo Optional. default to true. Whether to display or return.
  * @return string $R06C518F70E97B19C7EC907F36542CE6E String if $echo parameter is false.
  */
  function FC1E4292795A4C2F7B2FD6971BB2C2503 ($REDE24D37EF4830463F42B8D4F292701C = 0, $echo = true) {

    $R06C518F70E97B19C7EC907F36542CE6E = strip_tags( the_title('', '', FALSE) );

    if ( $REDE24D37EF4830463F42B8D4F292701C > 0 ) {
      if ( (strlen($R06C518F70E97B19C7EC907F36542CE6E) > $REDE24D37EF4830463F42B8D4F292701C) ) {
        $R06C518F70E97B19C7EC907F36542CE6E = mb_substr($R06C518F70E97B19C7EC907F36542CE6E, 0, $REDE24D37EF4830463F42B8D4F292701C);
        $R06C518F70E97B19C7EC907F36542CE6E = mb_substr($R06C518F70E97B19C7EC907F36542CE6E, 0, -strlen(strrchr($R06C518F70E97B19C7EC907F36542CE6E, ' ')));  // Wordwrap

        if ( strlen($R06C518F70E97B19C7EC907F36542CE6E) < 4 ) {
          $R06C518F70E97B19C7EC907F36542CE6E = mb_substr( the_title('', '',FALSE), 0, $REDE24D37EF4830463F42B8D4F292701C );
        }

        $R06C518F70E97B19C7EC907F36542CE6E .= ' ..';
      }
    }

    if ($echo == true) { echo $R06C518F70E97B19C7EC907F36542CE6E; } else { return $R06C518F70E97B19C7EC907F36542CE6E; }
  }
}


if ( !function_exists('myarcade_excerpt')) {
  /**
  * Display or retrieve the excerpt of a game post. All tags will be removed.
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $R7B751B74065CAAFEC5F3B405EE070E3D Character length of the excerpt
  * @param bool $echo Optional. Return or echo the result
  */
  function FFA5DADE9BF62DFC703280FCD74430C81($R7B751B74065CAAFEC5F3B405EE070E3D = false, $echo = true) {
    global $post;

    // Get post excerpt
    $R3F243E13444F693A59F15AA5D424B3BE = strip_shortcodes( $post->post_content );
    $R3F243E13444F693A59F15AA5D424B3BE = apply_filters('the_content', $R3F243E13444F693A59F15AA5D424B3BE);
    $R3F243E13444F693A59F15AA5D424B3BE = str_replace(']]>', ']]&gt;', $R3F243E13444F693A59F15AA5D424B3BE);
    $R3F243E13444F693A59F15AA5D424B3BE = wp_trim_words( $R3F243E13444F693A59F15AA5D424B3BE, 100, '' );

    if ( $R7B751B74065CAAFEC5F3B405EE070E3D ) {
      if ( strlen($R3F243E13444F693A59F15AA5D424B3BE) > $R7B751B74065CAAFEC5F3B405EE070E3D ) {
        $R3F243E13444F693A59F15AA5D424B3BE = mb_substr($R3F243E13444F693A59F15AA5D424B3BE, 0, $R7B751B74065CAAFEC5F3B405EE070E3D).' [...]';
      }
    }

    if ($echo) { echo $R3F243E13444F693A59F15AA5D424B3BE; } else { return $R3F243E13444F693A59F15AA5D424B3BE; }
  }
}


if ( !function_exists('myarcade_thumbnail')) {
  /**
  * Display the game thumbnail of the current game.
  * If no thumbnail is available the function will display a default thumbnail located in the template directory.
  *
  * default thumb: /template_directory/images/def_thumb.png
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $RE20CE5055B79A7BAB6298F5BE3573071 Optional. Width of the thumbnail in px. Default: 100
  * @param int $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 Optional. Height of the thumbnail in px. Default: 100
  * @param string $R2FC7C64331A9912B964483FD764310A8 Optional. CSS class for the image tag
  */
  function FD04D32AD1E99577FC2BE391B50A74B8C ($RE20CE5055B79A7BAB6298F5BE3573071 = 100, $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 = 100, $R2FC7C64331A9912B964483FD764310A8 = '') {
    global $post;

    if ( !empty($R2FC7C64331A9912B964483FD764310A8) ) { $R2FC7C64331A9912B964483FD764310A8 = 'class="'.$R2FC7C64331A9912B964483FD764310A8.'"'; }

    $R6B1A6F62CD0C6407D98662728E7AD4FC = get_post_meta($post->ID, "mabp_thumbnail_url", true);

    if ( preg_match('|^(http).*|i', $R6B1A6F62CD0C6407D98662728E7AD4FC) == 0 ) {
      // No Thumbail available.. get the default thumb

      $R6B1A6F62CD0C6407D98662728E7AD4FC = get_bloginfo('template_directory').'/images/def_thumb.png';

      if ( !file_exists($R6B1A6F62CD0C6407D98662728E7AD4FC) ) {
        $R6B1A6F62CD0C6407D98662728E7AD4FC = MYARCADE_URL .'/templates/assets/images/def_thumb.png';
      }
    }

    $R9FE302BDF914868081913A22F58F9E7E = array( 'before' => '', 'after' => '', 'echo' => false );

    echo '<img src="'.$R6B1A6F62CD0C6407D98662728E7AD4FC.'" width="'.$RE20CE5055B79A7BAB6298F5BE3573071.'" height="'.$RF5639FC8BF2E2FDBCEBD9F1553EA8EB0.'" '.$R2FC7C64331A9912B964483FD764310A8.' alt="'.the_title_attribute( $R9FE302BDF914868081913A22F58F9E7E ).'" />';
  }
}


if ( !function_exists('myarcade_get_thumbnail_url')) {
  /**
  * Get the url of the current game thumbnail
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  */
  function FF142DA6EDF989C4722407A996D234567() {
    global $post;
    return get_post_meta($post->ID, "mabp_thumbnail_url", true);
  }
}


if ( !function_exists('myarcade_count_screenshots')) {
  /**
  * Get the number of available screenshots for the current game.
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @return int Number of screenshots
  */
  function F23A3B66DC89D9DC8D23295E20C049BF5 () {
    global $post;

    $RE02EB4308A7732E410ED2FF1576B2E21 = 0;

    for ($RFABAF2019FDF980895FBFB665E575106 = 1; $RFABAF2019FDF980895FBFB665E575106 <= 4; $RFABAF2019FDF980895FBFB665E575106++) {
      if ( preg_match('|^(http).*|i', get_post_meta($post->ID, "mabp_screen".$RFABAF2019FDF980895FBFB665E575106."_url", true)) ) {
        $RE02EB4308A7732E410ED2FF1576B2E21++;
      }
    }

    return intval($RE02EB4308A7732E410ED2FF1576B2E21);
  }
}


if ( !function_exists('myarcade_screenshot')) {
  /**
  * Display the given screenshot of the current game.
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $RE20CE5055B79A7BAB6298F5BE3573071 Optional. Width of the screen shot in px. Default: 450
  * @param int $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 Optional. Height of the screen shot in px. Default: 350
  * @param int $RE4B4CE96BB27A333B0D985F185D90552 Optional. The number of the screenshot (1..4). Default 1
  * @param string $R2FC7C64331A9912B964483FD764310A8 Optional. CSS class fot the image tag
  */
  function F76C35FC30075DB83AC40512131FE7066 ($RE20CE5055B79A7BAB6298F5BE3573071 = 450, $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 = 300, $RE4B4CE96BB27A333B0D985F185D90552 = 1, $R2FC7C64331A9912B964483FD764310A8 = '') {
    global $post;

    if ( !empty($R2FC7C64331A9912B964483FD764310A8) ) { $R2FC7C64331A9912B964483FD764310A8 = 'class="'.$R2FC7C64331A9912B964483FD764310A8.'"'; }

    $R2FA35156645FE67E2B229DD8BACBD292 = get_post_meta($post->ID, "mabp_screen".$RE4B4CE96BB27A333B0D985F185D90552."_url", true);

    if ( preg_match('|^(http).*|i', $R2FA35156645FE67E2B229DD8BACBD292) ) {
      $R9FE302BDF914868081913A22F58F9E7E = array( 'before' => '', 'after' => '', 'echo' => false );
      echo '<img src="'.$R2FA35156645FE67E2B229DD8BACBD292.'"  width="'.$RE20CE5055B79A7BAB6298F5BE3573071.'" height="'.$RF5639FC8BF2E2FDBCEBD9F1553EA8EB0.'" '.$R2FC7C64331A9912B964483FD764310A8.' alt="'.the_title_attribute( $R9FE302BDF914868081913A22F58F9E7E ).'" />';
    }
  }
}


if ( !function_exists('myarcade_get_screenshot_url')) {
  /**
  * Retrieves the screenshot url for the current game
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $RE4B4CE96BB27A333B0D985F185D90552 Optional. The number of the screenshot (1..4). Default 1
  * @param bool $echo Optional. Return or echo the result
  */
  function FA9C897967EE0A1DCB122EA9107AF5670 ($RE4B4CE96BB27A333B0D985F185D90552 = 1, $echo = true) {
    global $post;

    $R2FA35156645FE67E2B229DD8BACBD292 = get_post_meta($post->ID, "mabp_screen".$RE4B4CE96BB27A333B0D985F185D90552."_url", true);

    if ( $echo == true ) { echo $R2FA35156645FE67E2B229DD8BACBD292; } else { return $R2FA35156645FE67E2B229DD8BACBD292; }
  }
}


if ( !function_exists('myarcade_all_screenshots')) {
  /**
  * Display all available screenshots of the current game.
  *
  * @usage Use this function only in the WordPress post loop
  *
  * @since 1.0
  *
  * @param int $RE20CE5055B79A7BAB6298F5BE3573071 Optional. Width of the screen shot in px. Default: 450
  * @param int $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 Optional. Height of the screen shot in px. Default: 350
  * @param int $RFABAF2019FDF980895FBFB665E575106 Optional. The number of the screen (1..4). Default 1
  * @param string $R2FC7C64331A9912B964483FD764310A8 Optional. CSS class fot the image tag
  */
  function F603CCBF48E776E81F4EBA295C06926B0 ($RE20CE5055B79A7BAB6298F5BE3573071 = 450, $RF5639FC8BF2E2FDBCEBD9F1553EA8EB0 = 300, $R2FC7C64331A9912B964483FD764310A8 = '') {
    global $post;

    $R9FE302BDF914868081913A22F58F9E7E = array( 'before' => '', 'after' => '', 'echo' => false );

    if ( !empty($R2FC7C64331A9912B964483FD764310A8) ) { $R2FC7C64331A9912B964483FD764310A8 = 'class="'.$R2FC7C64331A9912B964483FD764310A8.'"'; }

    for ($RFABAF2019FDF980895FBFB665E575106 = 1; $RFABAF2019FDF980895FBFB665E575106 <= 4; $RFABAF2019FDF980895FBFB665E575106++) {
      $R2FA35156645FE67E2B229DD8BACBD292 = get_post_meta($post->ID, "mabp_screen".$RFABAF2019FDF980895FBFB665E575106."_url", true);

      if ( preg_match('|^(http).*|i', $R2FA35156645FE67E2B229DD8BACBD292) ) {
        echo '<a href="'.$R2FA35156645FE67E2B229DD8BACBD292.'" title="'.the_title_attribute( $R9FE302BDF914868081913A22F58F9E7E ).'" rel="lightbox"><img src="'.$R2FA35156645FE67E2B229DD8BACBD292.'"  width="'.$RE20CE5055B79A7BAB6298F5BE3573071.'" height="'.$RF5639FC8BF2E2FDBCEBD9F1553EA8EB0.'" '.$R2FC7C64331A9912B964483FD764310A8.' alt="'.the_title_attribute( $R9FE302BDF914868081913A22F58F9E7E ).'" /></a>';
      }
    }
  }
}
?>