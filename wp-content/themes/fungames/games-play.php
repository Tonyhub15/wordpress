<?php
global $post;

// Show over game banner if available
$banner = get_option('fungames_adtop');
if ( !empty($banner) ) {
  ?>
  <div class="adtop">
    <?php echo stripslashes($banner); ?>
  </div>
  <?php
  // Add 150px space between game and the advertisement (Google Adsense TOS)
  if ( get_option('fungames_150_space') == 'enable' ) {
    ?><div style="margin-bottom: 130px;"> </div><?php
  }
}
?>

<?php
// Do some actions above the game
do_action('fungames_before_game');
?>

<div id="game_wrap">
  <?php
  // Check if progress bar is enabled.
  if ( get_option('fungames_progressbarstatus') == 'enable' ) {
    // Progress bar has been activated.
    // Resize the game to 0px while the progress bar is displayed
    // This will load the game in the background...
    $gamesize='0px';

    // Include the progress bar javascript code
    get_template_part('/inc/myabp_progressbar');
    ?>

    <center>
    <div id="showprogressbar" style="display:block; margin: 15px 0px;">
      <?php
      // Show the progress bar banner if available
      $banner_progress = stripslashes( get_option('fungames_loadinggameadcode') );
      if ( !empty($banner_progress) ) {
        ?>
        <div id="loadinggame_ad" style="margin: 15px auto;">
          <?php echo $banner_progress; ?>
        </div>
        <?php
      }
      ?>

      <?php // Display the progress bar ?>
      <div id="progressbar" style="width:400px; background-color: <?php echo get_option('fungames_progressbarbackgroundcolor'); ?>; border: solid 1px <?php echo get_option('fungames_progressbarbordercolor'); ?>;">
        <span id="progresstext" style="color: <?php echo get_option('fungames_progressbartextcolor'); ?>">0%</span>
        <div id="progressbarloadbg" style="background-color: <?php echo get_option('fungames_progressbarloadcolor'); ?>; border-right: solid 1px <?php echo get_option('fungames_progressbarbordercolor'); ?>; z-index: 2;">&thinsp;</div>
      </div>
    </div> <?php // end id showprogressbar ?>
    </center>

    <div id="progressbarloadtext" style="display:none; text-align: center; margin: 20px auto;"  onclick="window.hide();">
      <?php echo get_option('fungames_progressbartextload'); ?>
    </div>
    <?php
  }
  else {
    // Progressbar is disabled.
    // Set game size to 100%
    $gamesize='100%';
  }
  ?>

  <div class="clear"></div>

  <?php // Display the game ?>
  <div id="my_game" style="overflow:hidden; height: <?php echo $gamesize; ?>; width: <?php echo $gamesize; ?>;">
	<div class="cont1">
      <div class="cont2">
        <div class="cont3">
          <div id="escenario">
            <div id="play_game">
              <?php
              if (function_exists('get_game')) { ?>
                <div id= "bordeswf">
                  <?php
                  $embedcode = get_game($post->ID);
                  global $mypostid; $mypostid = $post->ID;
                  echo myarcade_get_leaderboard_code();
                  echo $embedcode;
                  ?>
                </div>
              <?php } ?>
            </div><?php // end play_game ?>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('games', 'buttons'); ?>

  </div><?php // end id my_game ?>
</div> <?php // end game wrap ?>

<?php
// Do some actions after the game
do_action('fungames_after_game');
?>