<?php
 if( !defined( 'ABSPATH' ) ) { die(); } function F5BF300992B398BDF3E4D243ABCF3EF20() { global $wpdb; F94EBD7C16769D03E06E16136FFE5F944(); $RA1D44C0654A40984A103C270FFB9BF33 = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix.'myarcadescores'); if ( $RA1D44C0654A40984A103C270FFB9BF33 ) { $R04702A6E31A6FC13F27F7447A59AD80D = 50; $RFE668A78BA45427046B949D666374D77 = ceil($RA1D44C0654A40984A103C270FFB9BF33 / $R04702A6E31A6FC13F27F7447A59AD80D); $R5388481D5554E4E852CC17CB8372A89E = 1; if ( isset($_GET['pagenum']) ) { $R5388481D5554E4E852CC17CB8372A89E = $_GET['pagenum']; } if ($R5388481D5554E4E852CC17CB8372A89E < 1) { $R5388481D5554E4E852CC17CB8372A89E = 1; } elseif ($R5388481D5554E4E852CC17CB8372A89E > $RFE668A78BA45427046B949D666374D77) { $R5388481D5554E4E852CC17CB8372A89E = $RFE668A78BA45427046B949D666374D77; } $R7FDA5CCB82AEE2AA4715A8E84612E87B = 'limit ' .($R5388481D5554E4E852CC17CB8372A89E - 1) * $R04702A6E31A6FC13F27F7447A59AD80D .',' .$R04702A6E31A6FC13F27F7447A59AD80D; if ( $R5388481D5554E4E852CC17CB8372A89E != $RFE668A78BA45427046B949D666374D77) { $RA76D2FAB4139C41DFBC0317F4F80C48D = $R5388481D5554E4E852CC17CB8372A89E + 1; } if ($R5388481D5554E4E852CC17CB8372A89E > 1) { $RBA8F0B9CD7CCFFDFDDBBC89731DD8E8A = $R5388481D5554E4E852CC17CB8372A89E - 1; } $RB0253597862B1707EA13F71BDE4046B6 = 1 + ($R5388481D5554E4E852CC17CB8372A89E - 1) * $R04702A6E31A6FC13F27F7447A59AD80D; if ($R5388481D5554E4E852CC17CB8372A89E < $RFE668A78BA45427046B949D666374D77) { $R9E14437ACD29B79105DE60C9C0413C03 = $RB0253597862B1707EA13F71BDE4046B6 + $R04702A6E31A6FC13F27F7447A59AD80D - 1; } else { $R9E14437ACD29B79105DE60C9C0413C03 = $RA1D44C0654A40984A103C270FFB9BF33; } $R18C12E46F6FA6AF5CFC92988C6CB21B7 = $RB0253597862B1707EA13F71BDE4046B6.' - '.$R9E14437ACD29B79105DE60C9C0413C03; $RCC92E37B019926C00A7F2FA0DFB598C3 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix.'myarcadescores'." ORDER by id DESC {$R7FDA5CCB82AEE2AA4715A8E84612E87B}" ); ?>
    <h2><?php _e("Manage Scores", 'myarcadeplugin'); ?></h2>
    <br />
    <!-- Print pagination -->
    <div class="tablenav" style="float: left;">
      <div class="tablenav-pages">
        <span class="displaying-num">Displaying <?php echo $R18C12E46F6FA6AF5CFC92988C6CB21B7; ?> of <?php echo $RA1D44C0654A40984A103C270FFB9BF33; ?></span>
        <?php if ($R5388481D5554E4E852CC17CB8372A89E > 1) : ?>
          <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-scores&pagenum=1'>First</a>
          <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-scores&pagenum=<?php echo $RBA8F0B9CD7CCFFDFDDBBC89731DD8E8A; ?>'>Previous</a>
        <?php endif; ?>
        <span class='page-numbers current'><?php echo $R5388481D5554E4E852CC17CB8372A89E; ?></span>
        <?php if ($R5388481D5554E4E852CC17CB8372A89E != $RFE668A78BA45427046B949D666374D77) : ?>
          <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-scores&pagenum=<?php echo $RA76D2FAB4139C41DFBC0317F4F80C48D; ?>'>Next</a>
          <a class='page-numbers' href='<?php echo $_SERVER['PHP_SELF'];?>?page=myarcade-manage-scores&pagenum=<?php echo $RFE668A78BA45427046B949D666374D77; ?>'>Last</a>
        <?php endif; ?>
      </div>
    </div>

    <table class="widefat fixed">
      <thead>
      <tr>
        <th scope="col" width="100">Image</th>
        <th scope="col">Game</th>
        <th scope="col">User</th>
        <th scope="col">Date</th>
        <th scope="col">Score</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ( $RCC92E37B019926C00A7F2FA0DFB598C3 as $RD94C2157798BCCE313068BF1BF25A119 ) : ?>
          <?php
 $RE0D5EDB560A26D4E1BECD832EA026E32 = get_user_by('id', $RD94C2157798BCCE313068BF1BF25A119->user_id); $post_id = $wpdb->get_var( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = 'mabp_game_tag' AND meta_value = '{$RD94C2157798BCCE313068BF1BF25A119->game_tag}'" ); if (! $post_id ) { ?>
            <tr id="scorerow_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>">
              <td colspan="6">
                <p class="mabp_error">
                  <?php printf( __("No WordPress post found for this score. Score ID: %s", 'myarcadeplugin'), $RD94C2157798BCCE313068BF1BF25A119->id); ?>
                </p>
              </td>
            </tr>
            <?php
 continue; } $RFCEC126459437562AA1A4BF95DD30CEE = MYARCADE_CORE_URL.'/editscore.php?scoreid='.$RD94C2157798BCCE313068BF1BF25A119->id; $R9A7D8CD5AD8135D269B8B0D4E22B244A ='<a href="'.$RFCEC126459437562AA1A4BF95DD30CEE.'&keepThis=true&TB_iframe=true&height=300&width=500" class="button-secondary thickbox edit" title="'.__("Edit Score", 'myarcadeplugin').'">'.__("Edit", 'myarcadeplugin').'</a>'; $R3AA041D3204639AA7E79B914AB91B756 = "<button class=\"button-secondary\" onclick = \"jQuery('#score_$RD94C2157798BCCE313068BF1BF25A119->id').html('<div class=\'gload\'> </div>');jQuery.post('".admin_url('admin-ajax.php')."',{action:'myarcade_handler',gameid: false, scoreid: '$RD94C2157798BCCE313068BF1BF25A119->id',func:'delete_score'},function(){jQuery('#scorerow_$RD94C2157798BCCE313068BF1BF25A119->id').fadeOut('slow');});\" >".__("Delete", 'myarcadeplugin')."</button>"; ?>
          <tr id="scorerow_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>">
            <td><img src="<?php echo get_post_meta($post_id, 'mabp_thumbnail_url', true); ?>" width="50" height="50" alt="" /></td>
            <td><a href="<?php echo get_permalink($post_id); ?>" title="" target="_blank"><?php echo get_the_title($post_id); ?></a></td>
            <td><?php echo $RE0D5EDB560A26D4E1BECD832EA026E32->display_name; ?></td>
            <td><?php echo $RD94C2157798BCCE313068BF1BF25A119->date; ?></td>
            <td id="scoreval_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>"><?php echo $RD94C2157798BCCE313068BF1BF25A119->score; ?></td>
            <td><?php echo $R9A7D8CD5AD8135D269B8B0D4E22B244A; ?> <?php echo $R3AA041D3204639AA7E79B914AB91B756; ?><span id="score_<?php echo $RD94C2157798BCCE313068BF1BF25A119->id; ?>"></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
 } else { echo '<p>'.__('No scores available', 'myarcadeplugin').'</p>'; } F011F5FA6950FDD84A7242122BC8934C3(); } ?>