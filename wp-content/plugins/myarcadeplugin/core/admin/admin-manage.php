<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function F4F412E56D4C4976F6399DDA6C31857F2() { global $wpdb, $REC43CE978463AAD8D91F93AE43393035; F94EBD7C16769D03E06E16136FFE5F944(); ?>
  <div id="icon-options-general" class="icon32"><br /></div>
  <h2><?php _e("Manage Games", 'myarcadeplugin'); ?></h2>
  <br />
  <script type="text/javascript">
    function checkSeachForm() {
      if ( document.searchForm.q.value === "") {
        alert("<?php _e("Search term was not entered!", 'myarcadeplugin'); ?>");
        document.searchForm.q.focus();
        return false;
      }
    }
  </script>
  <?php
 $R281A0F7BC3D849F3386A5AC36FB35807 = get_option('myarcade_categories'); $RD35A39212FD75E833AEA38F90831B2CB = $R66FB6C058110F0E30204D9CAC6A8ACC0 = $R36923CF62618D1B9981740738971E651 = ''; $R88A33D29429F80B24F150A7737FAA03B = isset($_POST['distr']) ? $_POST['distr'] : 'all'; $REDA7C15B1419F1F7A23C0E95A75A99CA = isset($_POST['leaderboard']) ? $_POST['leaderboard'] : false; $R971D98E0AD23E0905A3D3F4B08D46579 = isset($_POST['status']) ? $_POST['status'] : 'all'; $R8C2578958C407E0D2623B3F10C9A860A = empty($_POST['q']) ? false : $_POST['q']; $R56EA904D533235F889591E04DE8C6B68 = isset($_POST['order']) ? $_POST['order'] : 'ASC'; $RB81DFC1E4441111E15C502E9EA63560E = isset($_POST['orderby']) ? $_POST['orderby'] : 'id'; $RD2E691562D6B77CFE944DD609F674574 = isset($_POST['category']) ? $_POST['category'] : 'all'; $R569981A9B29B5950206124A5933F6CB9 = isset($_POST['games']) ? $_POST['games'] : '50'; $R21D2FF6532680118302411CA69147BF1 = isset($_POST['offset']) ? $_POST['offset'] : '0'; if ( isset($_POST['action']) ) { $RD35A39212FD75E833AEA38F90831B2CB = $_POST['action']; } if ( $RD35A39212FD75E833AEA38F90831B2CB == 'search' ) { $R36923CF62618D1B9981740738971E651 = esc_sql($R8C2578958C407E0D2623B3F10C9A860A); $RB981E3F4044DDEDDB47C787D006CB211 = array(); if ($R8C2578958C407E0D2623B3F10C9A860A) { $RB981E3F4044DDEDDB47C787D006CB211[] = "(name LIKE '%".$R8C2578958C407E0D2623B3F10C9A860A."%' OR description LIKE '%".$R8C2578958C407E0D2623B3F10C9A860A."%')"; } if ( $R88A33D29429F80B24F150A7737FAA03B != 'all' ) { $RB981E3F4044DDEDDB47C787D006CB211[] = "game_type = '".$R88A33D29429F80B24F150A7737FAA03B."'"; } if ( $REDA7C15B1419F1F7A23C0E95A75A99CA ) { $RB981E3F4044DDEDDB47C787D006CB211[] = "leaderboard_enabled = '1'"; } if ( $R971D98E0AD23E0905A3D3F4B08D46579 != 'all' ) { $RB981E3F4044DDEDDB47C787D006CB211[] = "status = '".$R971D98E0AD23E0905A3D3F4B08D46579."'"; } if ( $RD2E691562D6B77CFE944DD609F674574 != 'all' ) { foreach ($R281A0F7BC3D849F3386A5AC36FB35807 as $RCB6CF74D12D3949F4F3C570ECE4B9CB5) { if ($RCB6CF74D12D3949F4F3C570ECE4B9CB5['Slug'] == $RD2E691562D6B77CFE944DD609F674574) { $RB981E3F4044DDEDDB47C787D006CB211[] = "categories LIKE '%".$RCB6CF74D12D3949F4F3C570ECE4B9CB5['Name']."%'"; break; } } } $RA1D44C0654A40984A103C270FFB9BF33 = count($RB981E3F4044DDEDDB47C787D006CB211); $R0A6BC2430F38166A4C7DDA18D052CBFA = ''; if ( $RA1D44C0654A40984A103C270FFB9BF33 > 1) { for($RA16D2280393CE6A2A5428A4A8D09E354=0; $RA16D2280393CE6A2A5428A4A8D09E354 < $RA1D44C0654A40984A103C270FFB9BF33; $RA16D2280393CE6A2A5428A4A8D09E354++) { $R0A6BC2430F38166A4C7DDA18D052CBFA .= $RB981E3F4044DDEDDB47C787D006CB211[$RA16D2280393CE6A2A5428A4A8D09E354]; if ( $RA16D2280393CE6A2A5428A4A8D09E354 < ($RA1D44C0654A40984A103C270FFB9BF33 - 1) ) { $R0A6BC2430F38166A4C7DDA18D052CBFA .= ' AND '; } } } else { $R0A6BC2430F38166A4C7DDA18D052CBFA = $RB981E3F4044DDEDDB47C787D006CB211[0]; } if ( !empty($R0A6BC2430F38166A4C7DDA18D052CBFA) ) { $R0A6BC2430F38166A4C7DDA18D052CBFA = " WHERE ".$R0A6BC2430F38166A4C7DDA18D052CBFA; } $RE91192A00FF990477EE414AD5D708F08 = "SELECT * FROM " . $wpdb->prefix . 'myarcadegames' . $R0A6BC2430F38166A4C7DDA18D052CBFA." ORDER BY ".$RB81DFC1E4441111E15C502E9EA63560E." ".$R56EA904D533235F889591E04DE8C6B68." limit ".$R21D2FF6532680118302411CA69147BF1.",".$R569981A9B29B5950206124A5933F6CB9; $R12C50E1D9A260FA35F13F6BFBF590DC9 = $wpdb->get_var("SELECT COUNT(*) FROM " . $wpdb->prefix . 'myarcadegames' . $R0A6BC2430F38166A4C7DDA18D052CBFA); $R66FB6C058110F0E30204D9CAC6A8ACC0 = $wpdb->get_results($RE91192A00FF990477EE414AD5D708F08); if (!$R66FB6C058110F0E30204D9CAC6A8ACC0) { echo '<div class="mabp_error" style="width:685px">'.__("Nothing found!", 'myarcadeplugin').'</strong></div>'; } } ?>
  <form method="post" action="" class="myarcade_form" name="searchForm">
    <input type="hidden" name="action" value="search" />
    <div class="myarcade_border grey" style="width:680px">
      <?php _e("Search for", 'myarcadeplugin'); ?>
      <input type="text" size="40" name="q" value="<?php echo $R36923CF62618D1B9981740738971E651; ?>" />

      <p class="myarcade_hr">&nbsp;</p>

      <div class="myarcade_border white" style="width:300px;float:left;height:30px;">
        <?php _e("Game Type", 'myarcadeplugin'); ?>:
        <select name="distr" id="distr">
          <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'all'); ?>>All</option>
          <?php foreach ($REC43CE978463AAD8D91F93AE43393035 as $R7C60D7E1C05E3B82EF26F41346F5D850 => $R9B395079675C6A66FF23EA9C6C4A668E) : ?>
          <option value="<?php echo $R7C60D7E1C05E3B82EF26F41346F5D850; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, $R7C60D7E1C05E3B82EF26F41346F5D850); ?>><?php echo $R9B395079675C6A66FF23EA9C6C4A668E; ?></option>
          <?php endforeach; ?>
          <option value="embed" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'embed'); ?>>Embed</option>
          <option value="iframe" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'iframe'); ?>>Iframe</option>
          <option value="ibparcade" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'ibparcade'); ?>>IBPArcade</option>
          <option value="phpbb" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'phpbb'); ?>>PHPBB / ZIP</option>
          <option value="dcr" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'dcr'); ?>>DCR</option>
          <option value="custom" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R88A33D29429F80B24F150A7737FAA03B, 'custom'); ?>>Custom SWF</option>
        </select>
      </div>

      <div class="myarcade_border white" style="width:300px;float:left;margin-left:20px;height:25px;padding-top: 15px">
        <?php _e('Leaderboard Enabled', 'myarcadeplugin'); ?>:
        <input type="checkbox" name="leaderboard" value="1" <?php F739F7FB06301A1E6810F08B95CC237ED($REDA7C15B1419F1F7A23C0E95A75A99CA, '1'); ?> />&nbsp;&nbsp;&nbsp;
      </div>

      <div class="clear"> </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;">
        <?php _e("Game Status", 'myarcadeplugin'); ?>:
        <select name="status" id="status">
          <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'all'); ?>>All</option>
          <option value="new" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'new'); ?>>New</option>
          <option value="published" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'published'); ?>>Published</option>
          <option value="deleted" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R971D98E0AD23E0905A3D3F4B08D46579, 'deleted'); ?>>Deleted</option>
        </select>
      </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;margin-left:20px;">
        <?php _e("Order", 'myarcadeplugin'); ?>:
        <select name="order" id="order">
          <option value="ASC" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R56EA904D533235F889591E04DE8C6B68, 'ASC'); ?>>ASC</option>
          <option value="DESC" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($R56EA904D533235F889591E04DE8C6B68, 'DESC'); ?>>DESC</option>
        </select>
        <?php _e("by", 'myarcadeplugin');?>:
        <select name="orderby" id="orderby">
          <option value="id" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RB81DFC1E4441111E15C502E9EA63560E, 'id'); ?>>ID</option>
          <option value="name" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RB81DFC1E4441111E15C502E9EA63560E, 'name'); ?>>Name</option>
          <option value="slug" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RB81DFC1E4441111E15C502E9EA63560E, 'slug'); ?>>Slug</option>
          <option value="game_type" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RB81DFC1E4441111E15C502E9EA63560E, 'game_type'); ?>>Game Type</option>
          <option value="status" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RB81DFC1E4441111E15C502E9EA63560E, 'status'); ?>>Status</option>
        </select>
      </div>

      <div class="clear"> </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;">
        <?php _e("Game Category", 'myarcadeplugin'); ?>:
        <select name="category" id="category">
          <option value="all" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RD2E691562D6B77CFE944DD609F674574, 'all'); ?>>All</option>
          <?php
 foreach ( $R281A0F7BC3D849F3386A5AC36FB35807 as $RCB6CF74D12D3949F4F3C570ECE4B9CB5) { ?><option value="<?php echo $RCB6CF74D12D3949F4F3C570ECE4B9CB5['Slug']; ?>" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($RD2E691562D6B77CFE944DD609F674574, $RCB6CF74D12D3949F4F3C570ECE4B9CB5['Slug']); ?>><?php echo $RCB6CF74D12D3949F4F3C570ECE4B9CB5['Name']; ?></option><?php
 } ?>
        </select>
      </div>

      <div class="myarcade_border white" style="width:300px;height:30px;float:left;margin-left:20px;">
        <?php _e("Display", 'myarcadeplugin'); ?>
        <input type="text" size="3" name="games" value="<?php echo $R569981A9B29B5950206124A5933F6CB9; ?>" />
        <?php _e("games from offset", 'myarcadeplugin'); ?>
        <input type="text" size="3" name="offset" value="<?php echo $R21D2FF6532680118302411CA69147BF1; ?>" />
      </div>

      <div class="clear"> </div>

      <input class="button-primary" id="submit" type="submit" name="submit" value="Search" />
    </div>
  </form>

  <?php
 if ( $R66FB6C058110F0E30204D9CAC6A8ACC0 ) { echo '<div class="mabp_info" style="width:685px">'.sprintf(__("Results found: <strong>%s</strong>. Displaying results from <strong>%s</strong> to <strong>%s</strong>.", 'myarcadeplugin'), $R12C50E1D9A260FA35F13F6BFBF590DC9, $R21D2FF6532680118302411CA69147BF1, $R569981A9B29B5950206124A5933F6CB9 + $R21D2FF6532680118302411CA69147BF1).'</div>'; foreach ($R66FB6C058110F0E30204D9CAC6A8ACC0 as $R69F05BD3024E3A18B29F11DF8A3E8C79) { F45F5711588CBBE95A6882D30A6F8183B($R69F05BD3024E3A18B29F11DF8A3E8C79); } } else { $RA1D44C0654A40984A103C270FFB9BF33 = $wpdb->get_var("SELECT COUNT(*) FROM " . $wpdb->prefix . 'myarcadegames'); if ( $RA1D44C0654A40984A103C270FFB9BF33 ) { $R04702A6E31A6FC13F27F7447A59AD80D = 50; $RFE668A78BA45427046B949D666374D77 = ceil($RA1D44C0654A40984A103C270FFB9BF33 / $R04702A6E31A6FC13F27F7447A59AD80D); $R5388481D5554E4E852CC17CB8372A89E = 1; if ( isset($_GET['pagenum']) ) { $R5388481D5554E4E852CC17CB8372A89E = $_GET['pagenum']; } if ($R5388481D5554E4E852CC17CB8372A89E < 1) { $R5388481D5554E4E852CC17CB8372A89E = 1; } elseif ($R5388481D5554E4E852CC17CB8372A89E > $RFE668A78BA45427046B949D666374D77) { $R5388481D5554E4E852CC17CB8372A89E = $RFE668A78BA45427046B949D666374D77; } $R7FDA5CCB82AEE2AA4715A8E84612E87B = 'limit ' .($R5388481D5554E4E852CC17CB8372A89E - 1) * $R04702A6E31A6FC13F27F7447A59AD80D .',' .$R04702A6E31A6FC13F27F7447A59AD80D; if ( $R5388481D5554E4E852CC17CB8372A89E != $RFE668A78BA45427046B949D666374D77) { $RA76D2FAB4139C41DFBC0317F4F80C48D = $R5388481D5554E4E852CC17CB8372A89E + 1; } if ($R5388481D5554E4E852CC17CB8372A89E > 1) { $RBA8F0B9CD7CCFFDFDDBBC89731DD8E8A = $R5388481D5554E4E852CC17CB8372A89E - 1; } $RB0253597862B1707EA13F71BDE4046B6 = 1 + ($R5388481D5554E4E852CC17CB8372A89E - 1) * $R04702A6E31A6FC13F27F7447A59AD80D; if ($R5388481D5554E4E852CC17CB8372A89E < $RFE668A78BA45427046B949D666374D77) { $R9E14437ACD29B79105DE60C9C0413C03 = $RB0253597862B1707EA13F71BDE4046B6 + $R04702A6E31A6FC13F27F7447A59AD80D - 1; } else { $R9E14437ACD29B79105DE60C9C0413C03 = $RA1D44C0654A40984A103C270FFB9BF33; } $R18C12E46F6FA6AF5CFC92988C6CB21B7 = $RB0253597862B1707EA13F71BDE4046B6.' - '.$R9E14437ACD29B79105DE60C9C0413C03; $R66FB6C058110F0E30204D9CAC6A8ACC0 = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'myarcadegames' . " ORDER BY ID DESC $R7FDA5CCB82AEE2AA4715A8E84612E87B"); if ($R66FB6C058110F0E30204D9CAC6A8ACC0) { echo '<h3>'.__("Browser Your Game Catalog", 'myarcadeplugin').'</h3>'; ?>
        <!-- Print pagination -->
        <div class="tablenav" style="float: left;">
          <div class="tablenav-pages">
            <span class="displaying-num">Displaying <?php echo $R18C12E46F6FA6AF5CFC92988C6CB21B7; ?> of <?php echo $RA1D44C0654A40984A103C270FFB9BF33; ?></span>
          <?php if ($R5388481D5554E4E852CC17CB8372A89E > 1) : ?>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=1'>First</a>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RBA8F0B9CD7CCFFDFDDBBC89731DD8E8A; ?>'>Previous</a>
            <?php endif; ?>
            <span class='page-numbers current'><?php echo $R5388481D5554E4E852CC17CB8372A89E; ?></span>
            <?php if ($R5388481D5554E4E852CC17CB8372A89E != $RFE668A78BA45427046B949D666374D77) : ?>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RA76D2FAB4139C41DFBC0317F4F80C48D; ?>'>Next</a>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RFE668A78BA45427046B949D666374D77; ?>'>Last</a>
            <?php endif; ?>
          </div>
        </div>

        <?php
 foreach ($R66FB6C058110F0E30204D9CAC6A8ACC0 as $R69F05BD3024E3A18B29F11DF8A3E8C79) { F45F5711588CBBE95A6882D30A6F8183B($R69F05BD3024E3A18B29F11DF8A3E8C79); } ?>

        <!-- Print pagination -->
        <div class="tablenav" style="float: left;">
          <div class="tablenav-pages">
            <span class="displaying-num">Displaying <?php echo $R18C12E46F6FA6AF5CFC92988C6CB21B7; ?> of <?php echo $RA1D44C0654A40984A103C270FFB9BF33; ?></span>
          <?php if ($R5388481D5554E4E852CC17CB8372A89E > 1) : ?>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=1'>First</a>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RBA8F0B9CD7CCFFDFDDBBC89731DD8E8A; ?>'>Previous</a>
            <?php endif; ?>
            <span class='page-numbers current'><?php echo $R5388481D5554E4E852CC17CB8372A89E; ?></span>
            <?php if ($R5388481D5554E4E852CC17CB8372A89E != $RFE668A78BA45427046B949D666374D77) : ?>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RA76D2FAB4139C41DFBC0317F4F80C48D; ?>'>Next</a>
              <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-games&pagenum=<?php echo $RFE668A78BA45427046B949D666374D77; ?>'>Last</a>
            <?php endif; ?>
          </div>
        </div>

        <div style="clear:both;"></div>
        <?php
 } } else { _e("No games found", 'myarcadeplugin'); } $R66FB6C058110F0E30204D9CAC6A8ACC0 = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'myarcadegames' . " WHERE status = 'deleted' ORDER BY created DESC limit 10"); if ($R66FB6C058110F0E30204D9CAC6A8ACC0) { echo '<h3>'.__("10 Last Deleted Games", 'myarcadeplugin').'</h3>'; foreach ($R66FB6C058110F0E30204D9CAC6A8ACC0 as $R69F05BD3024E3A18B29F11DF8A3E8C79) { F45F5711588CBBE95A6882D30A6F8183B($R69F05BD3024E3A18B29F11DF8A3E8C79); } ?>
      <div style="clear:both;"></div>
      <?php
 } } ?>
  <script type="text/javascript">
    function thickboxResize() {
      var boundHeight = 800; // minimum height
      //var boundWidth = 750; // minimum width

      //var viewportWidth = (self.innerWidth || (document.documentElement.clientWidth || (document.body.clientWidth || 0)));
      var viewportHeight = (self.innerHeight || (document.documentElement.clientHeight || (document.body.clientHeight || 0)));

      jQuery('a.thickbox').each(function(){
        var text = jQuery(this).attr("href");

        if ( viewportHeight < boundHeight  /*|| viewportHeight < boundWidth*/)
        {
          // adjust the height
          text = text.replace(/height=[0-9]*/,'height=' + Math.round(viewportHeight * .8));
          // adjust the width
          //text = text.replace(/width=[0-9]*/,'width=' + Math.round(viewportWidth * .8));
        }
        else
        {
          // constrain the height by defined bounds
          text = text.replace(/height=[0-9]*/,'height=' + boundHeight);
          // constrain the width by defined bounds
          //text = text.replace(/width=[0-9]*/,'width=' + boundWidth);
        }

        jQuery(this).attr("href", text);
      });
    }

    jQuery(window).bind('load', thickboxResize );
    jQuery(window).bind('resize', thickboxResize );
  </script>
  <?php
 F011F5FA6950FDD84A7242122BC8934C3(); } ?>