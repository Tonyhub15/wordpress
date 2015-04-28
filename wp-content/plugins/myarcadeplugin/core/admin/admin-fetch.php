<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } function FD024B19046AC13DD27057269DBAEF188() { global $REC43CE978463AAD8D91F93AE43393035; F94EBD7C16769D03E06E16136FFE5F944(); ?>
  <div class="icon32" id="icon-plugins"><br/></div>
  <h2><?php _e("Fetch Games", 'myarcadeplugin'); ?></h2>

  <?php
 $RF2C19B8FD4603199A1CE492F4E6DA311 = 'fgd'; foreach ($REC43CE978463AAD8D91F93AE43393035 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R9B395079675C6A66FF23EA9C6C4A668E) { $$RF413F06AEBBCEF5E1C8B1019DEE6FE6B = get_option( 'myarcade_' . $RF413F06AEBBCEF5E1C8B1019DEE6FE6B ); } $fgd['method'] = 'latest'; $fgd['offset'] = 1; $fgd['gamersafe'] = false; $fog['method'] = 'latest'; $fog['offset'] = 0; $spilgames['search'] = ''; $spilgames['method'] = 'latest'; $spilgames['offset'] = 1; $bigfish['echo'] = true; if ( isset($_POST['fetch']) && $_POST['fetch'] == 'start' ) { $RF2C19B8FD4603199A1CE492F4E6DA311 = $_POST['distr']; $agf['limit'] = isset( $_POST['agf_limit'] ) ? $_POST['agf_limit'] : ''; $fgd['method'] = $_POST['fetchmethodfgd']; $fgd['limit'] = $_POST['limitfgd']; $fgd['offset'] = $_POST['offsetfgd']; $fgd['gamersafe'] = (!empty($_POST['gamersafe'])) ? true : false; $fog['method'] = $_POST['fetchmethodfog']; $fog['limit'] = $_POST['limitfog']; $spilgames['search'] = $_POST['searchspilgames']; $spilgames['limit'] = $_POST['limitspilgames']; $spilgames['method'] = (!empty($_POST['fetchmethodspilgames'])) ? $_POST['fetchmethodspilgames'] : 'latest'; $spilgames['offset'] = (!empty($_POST['offsetspilgames'])) ? $_POST['offsetspilgames'] : 1; $bigfish['gametype'] = $_POST['big_gametype']; $myarcadefeed['feed'] = isset($_POST['myarcadefeedselect']) ? $_POST['myarcadefeedselect'] : false; } ?>

  <script type="text/javascript">
    /* <![CDATA[ */
    function js_myarcade_offset() {
      if (jQuery("input:radio:checked[name='fetchmethod']").val() === 'latest') {
        jQuery("#offs").fadeOut("fast");
      } else if (jQuery("input:radio:checked[name='fetchmethod']").val() === 'offset') {
        jQuery("#offs").fadeIn("fast");
      }

      if (jQuery("input:radio:checked[name='fetchmethodfgd']").val() === 'latest') {
        jQuery("#offsfgd").fadeOut("fast");
      } else if (jQuery("input:radio:checked[name='fetchmethodfgd']").val() === 'offset') {
        jQuery("#offsfgd").fadeIn("fast");
      }

      if (jQuery("input:radio:checked[name='fetchmethodfog']").val() === 'latest') {
        jQuery("#offsfog").fadeOut("fast");
      } else if (jQuery("input:radio:checked[name='fetchmethodfog']").val() === 'offset') {
        jQuery("#offsfog").fadeIn("fast");
      }

      if (jQuery("input:radio:checked[name='fetchmethodspilgames']").val() === 'latest') {
        jQuery("#offsspilgames").fadeOut("fast");
      } else if (jQuery("input:radio:checked[name='fetchmethodspilgames']").val() === 'offset') {
        jQuery("#offsspilgames").fadeIn("fast");
      }
    }

    jQuery(document).ready(function() {

      <?php if ( isset($_POST['fetch']) && $_POST['fetch'] == 'start' ) : ?>
      jQuery(document).ready(function() {
        js_myarcade_offset();
      });
      <?php endif; ?>


      jQuery(this).find("input:radio[name='fetchmethod']").click(function() {
       js_myarcade_offset();
      });

      jQuery(this).find("input:radio[name='fetchmethodfgd']").click(function() {
        js_myarcade_offset();
      });

      jQuery(this).find("input:radio[name='fetchmethodfog']").click(function() {
        js_myarcade_offset();
      });

     jQuery(this).find("input:radio[name='fetchmethodspilgames']").click(function() {
        js_myarcade_offset();
      });
    });

    function js_myarcade_selection() {
      var selected = jQuery("#distr").find(":selected").val();
      jQuery("#"+selected).slideDown("fast");
      jQuery("#distr option").each(function() {
        var val = jQuery(this).val();
        if ( val !== selected ) {
          jQuery("#"+val).slideUp("fast");
        }
      });
    }

    jQuery(document).ready(function(){
      jQuery("#distr").change(function() {
        js_myarcade_selection();
      });

      // Call the function the first time when the site is loaded
      js_myarcade_selection();
    });
    /* ]]> */
  </script>

  <style type="text/css">
  .hide { display:none; }
  </style>

  <br />
  <form method="post" class="myarcade_form">
    <fieldset>
      <div class="myarcade_border grey">
        <label for="distr"><?php _e("Select a game distributor", 'myarcadeplugin'); ?>: </label>
        <select name="distr" id="distr">
          <?php foreach ($REC43CE978463AAD8D91F93AE43393035 as $R7C60D7E1C05E3B82EF26F41346F5D850 => $R9B395079675C6A66FF23EA9C6C4A668E) : ?>
          <?php
 if ( $R7C60D7E1C05E3B82EF26F41346F5D850 == 'gamefeed' || $R7C60D7E1C05E3B82EF26F41346F5D850 == 'mochi' ) { continue; } ?>
          <option value="<?php echo $R7C60D7E1C05E3B82EF26F41346F5D850; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RF2C19B8FD4603199A1CE492F4E6DA311, $R7C60D7E1C05E3B82EF26F41346F5D850); ?>><?php echo $R9B395079675C6A66FF23EA9C6C4A668E; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <?php
 ?>
      <div class="myarcade_border white hide" id="twopg">
        <p class="mabp_info">
        <?php _e("There are no specific settings available. Just Fetch the games :)", 'myarcadeplugin');?>
        </p>
      </div><!-- end 2pg -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="agf">
        Fetch <input type="text" name="agf_limit" size="6" value="<?php echo $agf['limit']; ?>" /> games
        <div class="clear"></div>
      </div><!-- end agf -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="kongregate">
        <p class="mabp_info">
        <?php _e("There are no specific settings available. Just Fetch the games :)", 'myarcadeplugin');?>
        </p>
      </div><!-- end kongregate -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="fgd">
        <div style="float:left;margin-right:50px;">
          <input type="radio" name="fetchmethodfgd" value="latest" <?php F739F7FB06301A1E6810F08B95CC237ED($fgd['method'], 'latest');?>>
        <label><?php _e("Latest Games", 'myarcadeplugin'); ?></label>
        <br />
        <input type="radio" name="fetchmethodfgd" value="offset" <?php F739F7FB06301A1E6810F08B95CC237ED($fgd['method'], 'offset');?>>
        <label><?php _e("Use Offset", 'myarcadeplugin'); ?></label>
        </div>
        <div class="myarcade_border" style="float:left;padding-top: 5px;background-color: #F9F9F9">
        Fetch <input type="text" name="limitfgd" size="6" value="<?php echo $fgd['limit']; ?>" /> games <span id="offsfgd" class="hide">from offset <input id="radiooffsfgd" type="text" name="offsetfgd" size="4" value="<?php echo $fgd['offset']; ?>" /> </span>
        </div>
        <div class="clear"></div>
        <input type="checkbox" name="gamersafe" id="gamersafe" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED( $fgd['gamersafe'], true) ?> /> <?php _e("GamerSafe (Score Games)", 'myarcadeplugin'); ?>

        <div class="clear"></div>
      </div><!-- end fgd -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="fog">
        <div style="float:left;margin-right:50px;">
          <input type="radio" name="fetchmethodfog" value="latest" <?php F739F7FB06301A1E6810F08B95CC237ED($fog['method'], 'latest');?>>
          <label><?php _e("Latest Games", 'myarcadeplugin'); ?></label>
        </div>
        <div class="myarcade_border" style="float:left;padding-top: 5px;background-color: #F9F9F9">
        Fetch <input type="text" name="limitfog" size="6" value="<?php echo $fog['limit']; ?>" /> games <!-- <span id="offsfog" class="hide">from offset <input id="radiooffsfog" type="text" name="offsetfog" size="4" value="<?php ?>" /> </span> -->
        </div>
        <div class="clear"></div>
      </div><!-- end fog -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="gamepix">
        <p class="mabp_info">
        <?php _e("There are no specific settings available. Just fetch games :)", 'myarcadeplugin');?>
        </p>
      </div><!-- end gamepix -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="spilgames">
        <label><?php _e("Filter by search query", 'myarcadeplugin'); ?>: </label>
        <input type="text" size="40"  name="searchspilgames" value="<?php echo $spilgames['search']; ?>" />
        <p class="myarcade_hr">&nbsp;</p>
        <div style="float:left;margin-right:50px;">
          <input type="radio" name="fetchmethodspilgames" value="latest" <?php F739F7FB06301A1E6810F08B95CC237ED($spilgames['method'], 'latest');?>>
        <label><?php _e("Latest Games", 'myarcadeplugin'); ?></label>
        <br />
        <input type="radio" name="fetchmethodspilgames" value="offset" <?php F739F7FB06301A1E6810F08B95CC237ED($spilgames['method'], 'offset');?>>
        <label><?php _e("Use Offset", 'myarcadeplugin'); ?></label>
        </div>
        Fetch <input type="text" name="limitspilgames" size="6" value="<?php echo $spilgames['limit']; ?>" /> games <span id="offsspilgames" class="hide">from page <input id="radiooffsspilgames" type="text" name="offsetspilgames" size="4" value="<?php echo $spilgames['offset']; ?>" /> </span>
        <div class="clear"></div>
      </div><!-- end spilgames -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="myarcadefeed">
        <?php
 $RD111013AF0B1D913F040848668FB71F4 = array(); for ($RA16D2280393CE6A2A5428A4A8D09E354=1;$RA16D2280393CE6A2A5428A4A8D09E354<5;$RA16D2280393CE6A2A5428A4A8D09E354++) { if ( !empty($myarcadefeed['feed'.$RA16D2280393CE6A2A5428A4A8D09E354])) { $RD111013AF0B1D913F040848668FB71F4[$RA16D2280393CE6A2A5428A4A8D09E354] = $myarcadefeed['feed'.$RA16D2280393CE6A2A5428A4A8D09E354]; } } if ( $RD111013AF0B1D913F040848668FB71F4 ) { _e("Select a Feed:", 'myarcadeplugin'); ?>
          <select name="myarcadefeedselect" id="myarcadefeedselect">
            <?php
 foreach ($RD111013AF0B1D913F040848668FB71F4 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $R244F38266C59587D696AEC08A771B803) { echo '<option value="feed'.$RF413F06AEBBCEF5E1C8B1019DEE6FE6B.'"> '.$R244F38266C59587D696AEC08A771B803.' </option>'; } ?>
          </select>
          <?php
 } else { ?>
            <p class="mabp_error">
              <?php _e("No MyArcadeFeed URLs found!", 'myarcadeplugin');?>
            </p>
            <?php
 } ?>
      </div><!-- end myarcadefeed -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="bigfish">
        <?php _e("Select a game type", 'myarcadeplugin'); ?>
        <select name="big_gametype" id="big_gametype">
          <option value="pc" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "pc"); ?>><?php _e("PC Games", 'myarcadeplugin'); ?></option>
          <option value="mac" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "mac"); ?>><?php _e("Mac Games", 'myarcadeplugin'); ?></option>
          <option value="og" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "og"); ?>><?php _e("Online Games", 'myarcadeplugin'); ?></option>
        </select>
      </div><!-- end bigfish -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="scirra">
        <p class="mabp_info">
        <?php _e("There are no specific settings available. Just Fetch the games :)", 'myarcadeplugin');?>
        </p>
      </div><!-- end scirra -->

      <?php
 ?>
      <div class="myarcade_border white hide" id="unityfeeds">
        <p class="mabp_info">
        <?php _e("There are no specific settings available. Just fetch games :)", 'myarcadeplugin');?>
        </p>
      </div><!-- end unityfeeds -->

    </fieldset>

    <input type="hidden" name="fetch" value="start" />
    <input class="button-primary" id="submit" type="submit" name="submit" value="<?php _e("Fetch Games", 'myarcadeplugin'); ?>" />
  </form>
  <br />
  <?php
 if ( isset($_POST['fetch']) && $_POST['fetch'] == 'start' ) { if ( $RF2C19B8FD4603199A1CE492F4E6DA311 ) { $R5E6FE112139EF7B1AECB79A8F083BB6A = MYARCADE_CORE_DIR . '/feeds/' . $RF2C19B8FD4603199A1CE492F4E6DA311 . '.php'; if ( file_exists( $R5E6FE112139EF7B1AECB79A8F083BB6A ) ) { require_once( $R5E6FE112139EF7B1AECB79A8F083BB6A ); $R94F2A42E16297B91A9F03B5E4B01132B = 'myarcade_feed_'.$RF2C19B8FD4603199A1CE492F4E6DA311; if ( function_exists($R94F2A42E16297B91A9F03B5E4B01132B) ) { F27CA820034C3FB0E279A5518739B60BC(); if ( !isset($$RF2C19B8FD4603199A1CE492F4E6DA311) ) { $$RF2C19B8FD4603199A1CE492F4E6DA311 = array(); } $R9FE302BDF914868081913A22F58F9E7E = array( 'echo' => true, 'settings' => $$RF2C19B8FD4603199A1CE492F4E6DA311 ); $R94F2A42E16297B91A9F03B5E4B01132B($R9FE302BDF914868081913A22F58F9E7E); } else { ?>
          <p class="mabp_error">
            <?php printf( __("ERROR: Required function can't be found: %s!", 'myarcadeplugin'), $R94F2A42E16297B91A9F03B5E4B01132B); ?>
          </p>
          <?php
 } } else { ?>
        <p class="mabp_error">
          <?php printf( __("ERROR: Required distributor file can't be found: %s!", 'myarcadeplugin'), $RF2C19B8FD4603199A1CE492F4E6DA311); ?>
        </p>
        <?php
 } } else { ?>
      <p class="mabp_error">
        <?php _e("ERROR: Unkwnon game distributor!", 'myarcadeplugin'); ?>
      </p>
      <?php
 } } F011F5FA6950FDD84A7242122BC8934C3(); } ?>