<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } class MyArcade_BigFish { protected $echo; protected $config = array(); protected $settings = array(); protected $R569981A9B29B5950206124A5933F6CB9; protected $RB0088B1DC2D442C5A336EA03731CB191; protected $url; protected $R1D59CF58268AFAC948B61F54FDEF68D1; protected $R3584859062EA9ECFB39B93BFCEF8E869; protected $RB6159821FF7058EC5378E73FD1C79A0D; protected $R57822527B32077AB9765BD4D4FC8993C; public function __construct( $settings = array(), $echo = true ) { if ( empty($settings) || !isset($settings['username']) || !isset($settings['gametype']) ) { return false; } $this->settings = $settings; $this->echo = $echo; $R5BB0F91160D861A362326F16F17AA14C = MYARCADE_CORE_DIR.'/feeds/bigfish/config.php'; if ( file_exists($R5BB0F91160D861A362326F16F17AA14C) ) { @include_once($R5BB0F91160D861A362326F16F17AA14C); } else { wp_die( __('Required configuration file not found!', 'Error: MyArcadePlugin Big Fish Games Module', 'myarcadeplugin') ); } $this->config = $R3CCA5EF67ABCA615F001EB4FC53324F5; $this->url = $this->config['xml_server'] .'?username='.$this->settings['username'] .'&type=6&local='.$this->settings['locale'] .'&gametype='.$this->settings['gametype']; } public function F19D73A2B1C710DE2C0332E7385622E5E() { require_once( MYARCADE_CORE_DIR . '/fetch.php' ); $this->games = F720E8C77506CFC05F85A08A7EF8F1D41( array( 'url' => $this->url, 'service' => 'xml', 'echo' => $this->echo ) ); if ( $this->F98B10B45AFB2E0B7B964DDAE6C7CE1AE() ) { $this->games_ref =& $this->games->gamexml->game; $RA1D44C0654A40984A103C270FFB9BF33 = $this->F632B4E2C33D400086BDC0D40A88EC14C(); $this->games_added = 0; for ( $this->id = 0; $this->id < $RA1D44C0654A40984A103C270FFB9BF33; $this->id++ ) { if ( $this->is_game() && $this->F58088C9EA23667B018B4C573FBBD736B() ) { $this->F02C1DC8BFF973EE3AB42C83DD3F5D9BC(); $this->F2E38DDF3ADD31311C58BCE7326119F28(); $this->F695842E420EAED199A6B2BB7D1E14F6A(); $this->F5C868B03A8121558638C93CF2A9AE693(); } } FC6BC39ED73177ED6BA0A3E5B1C3D6848( $this->games_added, $this->echo ); } else { $this->F25D8FA49F2C78939384F1B1F7C3C8CC3( __("No games have been found", 'myarcadeplugin') ); } } protected function F2E38DDF3ADD31311C58BCE7326119F28() { if ( !$this->assetName ) { return false; } $RF3D44C90F40BE1AFA8AD8AF75CDD6EF5 = $this->settings['gametype']; $RE0B5101F331F395427782E8A7ACDF429 = $this->config['site_root'].$this->config['locale'][$this->settings['locale']]['domain']; $R832073F8852D50E01E8499D01D6E06B7 = $this->config['store_root'].$this->config['locale'][$this->settings['locale']]['domain']; $RFB96F2F461D9A225B5DC55B0B9841710 = (isset($this->games_ref[$this->id]->productid)) ? $this->games_ref[$this->id]->productid : ''; $R8C2578958C407E0D2623B3F10C9A860A = array('{SITE_ROOT}', '{STORE_ROOT}', '{gameid}', '{assetname}' , '{afcode}', '{PRODUCTID}', '{SITE_ID}'); $RFA5A24486053F6B0FA6A96DC6F407994 = array( $RE0B5101F331F395427782E8A7ACDF429, $R832073F8852D50E01E8499D01D6E06B7, $this->games_ref[$this->id]->gameid, $this->assetName, $this->settings['affiliate_code'], $RFB96F2F461D9A225B5DC55B0B9841710, $this->config['locale'][$this->settings['locale']]['site_id'] ); $this->games_ref[$this->id]->page_info = str_replace( $R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->config['url'][$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5]['page_info']); $this->games_ref[$this->id]->iframe_download = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->config['url'][$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5]['iframe_download']); $this->games_ref[$this->id]->iframe_buy = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->config['url'][$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5]['iframe_buy']); if ( ($this->games_ref[$this->id]->iframe_buy == 'no') && ($this->settings['gametype'] == 'og') ) { if ( isset($this->games_ref[$this->id]->pcgameid) ) { $this->games_ref[$this->id]->iframe_buy = str_replace('{gameid}', $this->games_ref[$this->id]->pcgameid, $this->config['url']['pc']['iframe_buy']); $this->games_ref[$this->id]->iframe_buy = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->games_ref[$this->id]->iframe_buy); } elseif ( isset($this->games_ref[$this->id]->macgameid) ) { } } if ( !empty($RFB96F2F461D9A225B5DC55B0B9841710) ) { $this->games_ref[$this->id]->purchase = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->config['purchase']); } else { if ($this->settings['gametype'] == 'og') { if ( isset($this->games_ref[$this->id]->pcgameid) ) { $this->games_ref[$this->id]->purchase = str_replace('{PRODUCTID}', $this->games_ref[$this->id]->pcgameid, $this->config['purchase']); $this->games_ref[$this->id]->purchase = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->games_ref[$this->id]->purchase); } elseif ( isset($this->games_ref[$this->id]->macgameid) ) { $this->games_ref[$this->id]->purchase = str_replace('{PRODUCTID}', $this->games_ref[$this->id]->macgameid, $this->config['purchase']); $this->games_ref[$this->id]->purchase = str_replace($R8C2578958C407E0D2623B3F10C9A860A, $RFA5A24486053F6B0FA6A96DC6F407994, $this->games_ref[$this->id]->purchase); } else { $this->games_ref[$this->id]->purchase = 'no'; } } } } protected function F02C1DC8BFF973EE3AB42C83DD3F5D9BC() { $this->assetName = substr( $this->games_ref[$this->id]->foldername, strpos($this->games_ref[$this->id]->foldername, "_") + 1); $this->assetPath = $this->config['asset_server'].'/'.$this->games_ref[$this->id]->foldername; if ( !$this->assetName ) { return false; } $this->games_ref[$this->id]->small = $this->assetPath.'/'.$this->assetName.'_60x40.jpg'; $this->games_ref[$this->id]->medium = $this->assetPath.'/'.$this->assetName.'_80x80.jpg'; $this->games_ref[$this->id]->feature = $this->assetPath.'/'.$this->assetName.'_feature.jpg'; $this->games_ref[$this->id]->subfeature = $this->assetPath.'/'.$this->assetName.'_subfeature.jpg'; $this->games_ref[$this->id]->thumb1 = $this->assetPath.'/th_screen1.jpg'; $this->games_ref[$this->id]->thumb2 = $this->assetPath.'/th_screen2.jpg'; $this->games_ref[$this->id]->thumb3 = $this->assetPath.'/th_screen3.jpg'; $this->games_ref[$this->id]->screen1 = $this->assetPath.'/screen1.jpg'; $this->games_ref[$this->id]->screen2 = $this->assetPath.'/screen2.jpg'; $this->games_ref[$this->id]->screen3 = $this->assetPath.'/screen3.jpg'; if ( isset($this->games_ref[$this->id]->hasdwfeature) && ($this->games_ref[$this->id]->hasdwfeature == 'yes') ) { $this->games_ref[$this->id]->dwfeature_image = $this->assetPath.'/'.$this->assetName.'_'.$this->games_ref[$this->id]->dwwidth.'x'.$this->games_ref[$this->id]->dwheight.'.jpg'; $this->games_ref[$this->id]->dwfeature_flash = $this->assetPath.'/'.$this->assetName.'_'.$this->games_ref[$this->id]->dwwidth.'x'.$this->games_ref[$this->id]->dwheight.'.swf'; } if ( isset($this->games_ref[$this->id]->hasflash) && $this->games_ref[$this->id]->hasflash == 'yes' ) { $this->games_ref[$this->id]->flash = $this->assetPath.'/'.$this->assetName.'_175x150.swf'; } if ( isset($this->games_ref[$this->id]->hasvideo) && $this->games_ref[$this->id]->hasvideo == 'yes' ) { $this->games_ref[$this->id]->image_video = $this->assetPath.'/'.$this->games_ref[$this->id]->foldername.'.flv'; } } protected function F695842E420EAED199A6B2BB7D1E14F6A() { $RC5934A886BA9823EDE289AB2FD67CED1 = str_replace("%DESCRIPTION%", $this->games_ref[$this->id]->longdesc, $this->settings['template']); if ( strpos($RC5934A886BA9823EDE289AB2FD67CED1, '%BULLET_POINTS%') !== false ) { $R713DAA7DDB0BF7808E56C6A158237882 = array( 'bullet1' => isset($this->games_ref[$this->id]->bullet1) ? $this->games_ref[$this->id]->bullet1 : '', 'bullet2' => isset($this->games_ref[$this->id]->bullet2) ? $this->games_ref[$this->id]->bullet2 : '', 'bullet3' => isset($this->games_ref[$this->id]->bullet3) ? $this->games_ref[$this->id]->bullet3 : '', 'bullet4' => isset($this->games_ref[$this->id]->bullet4) ? $this->games_ref[$this->id]->bullet4 : '', 'bullet5' => isset($this->games_ref[$this->id]->bullet5) ? $this->games_ref[$this->id]->bullet5 : '' ); $R362661DE726A1FB08719C20884BCDBED = ''; foreach( $R713DAA7DDB0BF7808E56C6A158237882 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $RAF13770CF37C690C0B211880B355BB31 ) { if( $RAF13770CF37C690C0B211880B355BB31 != '' ) { $R362661DE726A1FB08719C20884BCDBED .= '<li>'.$RAF13770CF37C690C0B211880B355BB31.'</li>'."\n"; } } if ( !empty($R362661DE726A1FB08719C20884BCDBED) ) { $RF7C265D7A272819047417219BC7998F3 = '<ul>'."\n".$R362661DE726A1FB08719C20884BCDBED.'</ul>'."\n"; $RC5934A886BA9823EDE289AB2FD67CED1 = str_replace("%BULLET_POINTS%", $RF7C265D7A272819047417219BC7998F3, $RC5934A886BA9823EDE289AB2FD67CED1); } } if ( strpos($RC5934A886BA9823EDE289AB2FD67CED1, '%SYSREQUIREMENTS%') !== false ) { $RF3D44C90F40BE1AFA8AD8AF75CDD6EF5 = $this->settings['gametype']; $R009F7689F65E22030B1D54BC5D8B2736 = array( 'sysreqos' => array( 'name' => __("OS:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqos) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqos : ''), 'sysreqmhz' => array( 'name' => __("CPU:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqmhz) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqmhz : ''), 'sysreqvideo' => array( 'name' => __("Video:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqvideo) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqvideo : ''), 'sysreqmem' => array( 'name' => __("RAM:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqmem) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqmem.' MB' : ''), 'sysreq3d' => array( 'name' => __("3D:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreq3d) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreq3d : ''), 'sysreqdx' => array( 'name' => __("DirectX:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqdx) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqdx : ''), 'sysreqhd' => array( 'name' => __("HD:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqhd) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqhd.' MB' : ''), 'sysreqother' => array( 'name' => __("Other:", 'myarcadeplugin'), 'value' => isset($this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqother) ? $this->games_ref[$this->id]->systemreq->$RF3D44C90F40BE1AFA8AD8AF75CDD6EF5->sysreqother : '') ); $R362661DE726A1FB08719C20884BCDBED = ''; foreach( $R009F7689F65E22030B1D54BC5D8B2736 as $RF413F06AEBBCEF5E1C8B1019DEE6FE6B => $RBE766CC4A769C6CE090A5031796FB10B ) { if( $RBE766CC4A769C6CE090A5031796FB10B['value'] != '' ) { $R362661DE726A1FB08719C20884BCDBED .= '<li>'.$RBE766CC4A769C6CE090A5031796FB10B['name'].' '.$RBE766CC4A769C6CE090A5031796FB10B['value'].'</li>'."\n"; } } if ( !empty($R362661DE726A1FB08719C20884BCDBED) ) { $RF7C265D7A272819047417219BC7998F3 = '<h4>'.__("System Requirements", 'myarcadeplugin').'</h4>'."\n".'<ul>'."\n".$R362661DE726A1FB08719C20884BCDBED.'</ul>'."\n"; $RC5934A886BA9823EDE289AB2FD67CED1 = str_replace("%SYSREQUIREMENTS%", $RF7C265D7A272819047417219BC7998F3, $RC5934A886BA9823EDE289AB2FD67CED1); } } if ( strpos($RC5934A886BA9823EDE289AB2FD67CED1, '%BUY_GAME%') !== false ) { if ( isset($this->games_ref[$this->id]->purchase) && $this->games_ref[$this->id]->purchase != 'no') { $R73A7F12448F597E1D4F320C06C047664 = '<a href="'.$this->games_ref[$this->id]->purchase.'" title="'.__("Buy this game", 'myarcadeplugin').'" target="_blank" class="buy_bigfishgame">'.__("Buy Game", 'myarcadeplugin').'</a>'; $RC5934A886BA9823EDE289AB2FD67CED1 = str_replace("%BUY_GAME%", $R73A7F12448F597E1D4F320C06C047664, $RC5934A886BA9823EDE289AB2FD67CED1); } } $RC5934A886BA9823EDE289AB2FD67CED1 = preg_replace("!\%(.*?)%!" , "", $RC5934A886BA9823EDE289AB2FD67CED1); $this->games_ref[$this->id]->description = $RC5934A886BA9823EDE289AB2FD67CED1; } protected function F5C868B03A8121558638C93CF2A9AE693() { global $wpdb; $R7E48A94D08652CE34DE703DF9E891458 = false; $R78BA11DF511123E51B3980B09F99CED6 = ''; foreach ($this->settings['categories'] as $RAE9A4476893066B7B92C648E9F0FDEE8) { if ( $RAE9A4476893066B7B92C648E9F0FDEE8['Status'] == 'checked' ) { if ($RAE9A4476893066B7B92C648E9F0FDEE8['ID'] == $this->games_ref[$this->id]->genreid ) { $R78BA11DF511123E51B3980B09F99CED6 = $RAE9A4476893066B7B92C648E9F0FDEE8['Name']; $R7E48A94D08652CE34DE703DF9E891458 = true; break; } } } if ( !$R7E48A94D08652CE34DE703DF9E891458 ) { return; } $this->games_added++; $R95443295A218711DD179EB373C61EA52 = $this->settings['thumbnail']; $R2DDE0731A571E9A7BA651E79C5025426 = $this->games_ref[$this->id]->$R95443295A218711DD179EB373C61EA52; $R2252F0B678213A3B6BEDD89C503EC635 = pathinfo($R2DDE0731A571E9A7BA651E79C5025426); if ( empty($R2252F0B678213A3B6BEDD89C503EC635['filename']) ) { $R2DDE0731A571E9A7BA651E79C5025426 = MYARCADE_URL . "/images/noimage.png"; } $R69F05BD3024E3A18B29F11DF8A3E8C79 = new stdClass(); $R69F05BD3024E3A18B29F11DF8A3E8C79->uuid = $this->games_ref[$this->id]->gameid; $R69F05BD3024E3A18B29F11DF8A3E8C79->game_tag = $this->games_ref[$this->id]->game_tag; $R69F05BD3024E3A18B29F11DF8A3E8C79->type = 'bigfish'; $R69F05BD3024E3A18B29F11DF8A3E8C79->name = esc_sql($this->games_ref[$this->id]->gamename); $R69F05BD3024E3A18B29F11DF8A3E8C79->slug = F64A2F46BC8BAFD9163DD9691D1207278($this->assetName); $R69F05BD3024E3A18B29F11DF8A3E8C79->categs = $R78BA11DF511123E51B3980B09F99CED6; $R69F05BD3024E3A18B29F11DF8A3E8C79->description = esc_sql($this->games_ref[$this->id]->description); $R69F05BD3024E3A18B29F11DF8A3E8C79->height = ( isset($this->games_ref[$this->id]->onlineiframeheight) ) ? $this->games_ref[$this->id]->onlineiframeheight : '280'; $R69F05BD3024E3A18B29F11DF8A3E8C79->width = ( isset($this->games_ref[$this->id]->onlineiframewidth ) ) ? $this->games_ref[$this->id]->onlineiframewidth : '500'; $R69F05BD3024E3A18B29F11DF8A3E8C79->thumbnail_url = esc_sql($R2DDE0731A571E9A7BA651E79C5025426); $R69F05BD3024E3A18B29F11DF8A3E8C79->swf_url = esc_sql($this->games_ref[$this->id]->iframe_download); $R69F05BD3024E3A18B29F11DF8A3E8C79->screen1_url = ( isset($this->games_ref[$this->id]->screen1) ) ? $this->games_ref[$this->id]->screen1 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen2_url = ( isset($this->games_ref[$this->id]->screen2) ) ? $this->games_ref[$this->id]->screen2 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->screen3_url = ( isset($this->games_ref[$this->id]->screen3) ) ? $this->games_ref[$this->id]->screen3 : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->video_url = ( isset($this->games_ref[$this->id]->image_video) ) ? $this->games_ref[$this->id]->image_video : ''; $R69F05BD3024E3A18B29F11DF8A3E8C79->created = $this->games_ref[$this->id]->releasedate; FF09D7482BA5FAADAB6D947666FFD8C43( $R69F05BD3024E3A18B29F11DF8A3E8C79, $this->echo ); } protected function F25D8FA49F2C78939384F1B1F7C3C8CC3( $R157A6826A8BF1F36EBBE3DEC02351744 ) { if ( $this->echo ) { echo '<p class="mabp_info">'.$R157A6826A8BF1F36EBBE3DEC02351744.'</p>'; } } protected function FDE49E74B305F54D141944B1B7A804EA1( $R157A6826A8BF1F36EBBE3DEC02351744 ) { if ( $this->echo ) { echo '<p class="mabp_error">'.$R157A6826A8BF1F36EBBE3DEC02351744.'</p>'; } } protected function is_game() { if( !empty($this->id) && isset($this->games_ref[$this->id]) ) { return true; } else { return false; } } protected function F58088C9EA23667B018B4C573FBBD736B() { global $wpdb; $this->games_ref[$this->id]->game_tag = md5($this->games_ref[$this->id]->gameid . $this->games_ref[$this->id]->gamename . 'bigfish' ); $R89FEDA984B61366DE78855CB7D5F44D1 = $wpdb->get_var("SELECT id FROM ".$wpdb->prefix . 'myarcadegames'." WHERE
      uuid = '".$this->games_ref[$this->id]->gameid."' OR
      game_tag = '".$this->games_ref[$this->id]->game_tag."' OR
      name = '".esc_sql($this->games_ref[$this->id]->gamename)."'" ); if ($R89FEDA984B61366DE78855CB7D5F44D1) { return false; } else { return true; } } protected function F98B10B45AFB2E0B7B964DDAE6C7CE1AE() { if ( isset($this->games->gamexml->game) ) { return true; } else { return false; } } protected function F632B4E2C33D400086BDC0D40A88EC14C() { return count($this->games_ref); } } function myarcade_settings_bigfish() { $bigfish = get_option( 'myarcade_bigfish' ); ?>
  <h2 class="trigger"><?php _e("Big Fish Games", 'myarcadeplugin'); ?></h2>
  <div class="toggle_container">
    <div class="block">
      <table class="optiontable" width="100%" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="2">
            <i>
             <?php _e("Big Fish Games offers an affiliate programm with 70% commisions for each sale you generate.", 'myarcadeplugin'); ?>
             <?php _e('Click <a href="https://affiliates.bigfishgames.com/" title="Big Fish Affiliates" target=_blank"">here</a> to sign up on Big Fish Games Affiliate program.', 'myarcadeplugin'); ?>
            </i>
            <br /><br />
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Username", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="big_username" value="<?php echo $bigfish['username']; ?>" />
          </td>
          <td><i><?php _e("Enter your Big Fish Games user name.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Affiliate Code", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <input type="text" size="40"  name="big_affiliate_code" value="<?php echo $bigfish['affiliate_code']; ?>" />
          </td>
          <td><i><?php _e("Enter your Affiliate Code.", 'myarcadeplugin'); ?></i></td>
        </tr>
        <tr><td colspan="2"><h3><?php _e("Default Game Type", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <select name="big_gametype">
              <option value="pc" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "pc"); ?>><?php _e("PC Games", 'myarcadeplugin'); ?></option>
              <option value="mac" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "mac"); ?>><?php _e("Mac Games", 'myarcadeplugin'); ?></option>
              <option value="og" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['gametype'], "og"); ?>><?php _e("Online Games", 'myarcadeplugin'); ?></option>
            </select>
          </td>
          <td><i><?php _e("Select the your preferred Game Type.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Language", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <select name="big_locale">
              <option value="en" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "en"); ?>>English</option>
              <option value="da" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "da"); ?>>Dansk</option>
              <option value="fr" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "fr"); ?>>French</option>
              <option value="de" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "de"); ?>>German</option>
              <option value="it" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "it"); ?>>Italiano</option>
              <option value="jp" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "jp"); ?>>Japanese</option>
              <option value="nl" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "nl"); ?>>Nederlands</option>
              <option value="pt" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "pt"); ?>>Portugues</option>
              <option value="es" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "es"); ?>>Spanish</option>
              <option value="sv" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['locale'], "sv"); ?>>Svenska</option>
            </select>
          </td>
          <td><i><?php _e("Select the preferred language for Big Fish Games.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Game Categories", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <?php
 foreach ( $bigfish['categories'] as $RE92C3CBB98FFF5D429C52D981582FA4B ) { echo '<input type="checkbox" name="big_categories[]" value="'.$RE92C3CBB98FFF5D429C52D981582FA4B['ID'].'" '.$RE92C3CBB98FFF5D429C52D981582FA4B['Status'].' /><label class="opt">&nbsp;'.$RE92C3CBB98FFF5D429C52D981582FA4B['Name'].'</label><br />'; } ?>
          </td>
          <td><i><?php _e("Activate desired Big Fish categories. On Category Mapping you can map these categories to your own category names.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Create Categories", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="big_createcats" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($bigfish['create_cats'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Check this if you want to create selected Big Fish Games categories.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Game Thumbail Size", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <select name="big_thumbnail">
              <option value="small" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['thumbnail'], "small"); ?>>Small (60x40)</option>
              <option value="medium" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['thumbnail'], "medium"); ?>>Medium (80x80)</option>
              <option value="feature" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['thumbnail'], "feature"); ?>>Feature Image (175x150)</option>
              <option value="subfeature" <?php FDDF3EC25B8F21FAFBFA55C25519BBBBF($bigfish['thumbnail'], "subfeature"); ?>>Sub-feature Image (175x150)</option>
            </select>
          </td>
          <td><i><?php _e("Select the preferred game thumbnail size. Default: Medium.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Game Description Template", 'myarcadeplugin'); ?></h3></td></tr>
        <tr>
          <td>
            <textarea name="big_template" cols="40" rows="12"><?php echo $bigfish['template']; ?></textarea>
          </td>
          <td>
            <p><i><?php _e("Set how Big Fish Games description should be generated.", 'myarcadeplugin'); ?></i></p>
            <br />
            <strong><?php _e("Available Placeholders", 'myarcadeplugin'); ?>:</strong><br />
            %DESCRIPTION% - <?php _e("Game description", 'myarcadeplugin'); ?><br />
            %BULLET_POINTS% - <?php _e("Game key feature list", 'myarcadeplugin'); ?><br />
            %SYSREQUIREMENTS% - <?php _e("System requirements for PC and MAC games", 'myarcadeplugin'); ?><br />
            %BUY_URL% - <?php _e("Purchase game link", 'myarcadeplugin'); ?>
          </td>
        </tr>

        <tr><td colspan="2"><h3><?php _e("Automated Game Publishing", 'myarcadeplugin'); ?></h3></td></tr>

        <tr>
          <td>
            <input type="checkbox" name="big_cron_publish" value="true" <?php F739F7FB06301A1E6810F08B95CC237ED($bigfish['cron_publish'], true); ?> /><label class="opt">&nbsp;<?php _e("Yes", 'myarcadeplugin'); ?></label>
          </td>
          <td><i><?php _e("Enable this if you want to publish games automatically. Go to 'General Settings' to select a cron interval.", 'myarcadeplugin'); ?></i></td>
        </tr>

        <tr><td colspan="2"><h4><?php _e("Publish Games", 'myarcadeplugin'); ?></h4></td></tr>

        <tr>
          <td>
            <input type="text" size="40"  name="big_cron_publish_limit" value="<?php echo $bigfish['cron_publish_limit']; ?>" />
          </td>
          <td><i><?php _e("How many games should be published on every cron trigger?", 'myarcadeplugin'); ?></i></td>
        </tr>
      </table>
      <input class="button button-primary" id="submit" type="submit" name="submit" value="<?php _e("Save Settings", 'myarcadeplugin'); ?>" />
    </div>
  </div>
  <?php
} function myarcade_save_settings_bigfish() { $R7705127947020CA2ED921BE6E0FA664F = filter_input( INPUT_POST, 'myarcade_save_settings_nonce'); if ( ! $R7705127947020CA2ED921BE6E0FA664F || ! wp_verify_nonce( $R7705127947020CA2ED921BE6E0FA664F, 'myarcade_save_settings' ) ) { return; } $bigfish = array(); $bigfish['username'] = (isset($_POST['big_username'])) ? sanitize_text_field($_POST['big_username']) : ''; $bigfish['affiliate_code'] = (isset($_POST['big_affiliate_code'])) ? sanitize_text_field($_POST['big_affiliate_code']) : ''; $bigfish['locale'] = (isset($_POST['big_locale'])) ? $_POST['big_locale'] : 'en'; $bigfish['gametype'] = (isset($_POST['big_gametype'])) ? $_POST['big_gametype'] : 'og'; $bigfish['template'] = (isset($_POST['big_template'])) ? esc_textarea($_POST['big_template']) : ''; $bigfish['thumbnail'] = (isset($_POST['big_thumbnail'])) ? $_POST['big_thumbnail'] : 'medium'; $bigfish['create_cats'] = (isset($_POST['big_createcats']) ) ? true : false; $bigfish['cron_publish'] = (isset($_POST['big_cron_publish']) ) ? true : false; $bigfish['cron_publish_limit'] = (isset($_POST['big_cron_publish_limit']) ) ? intval($_POST['big_cron_publish_limit']) : 1; $R715A90EA79FE998320446D10620F2C8A = isset( $_POST['big_categories']) ? $_POST['big_categories'] : array(); require_once( MYARCADE_CORE_DIR . "/feeds/bigfish/categories.php" ); if ( isset( $RF91591AE6D743A7656A09F5ECFA45B7C ) ) { $RBE656E10C774502C8421A6AD967C8238 = count( $RF91591AE6D743A7656A09F5ECFA45B7C ); $R6C3825B3EAF6DBB0C7E879DD216BE6FE = array(); for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < $RBE656E10C774502C8421A6AD967C8238; $RA16D2280393CE6A2A5428A4A8D09E354++) { if( in_array( $RF91591AE6D743A7656A09F5ECFA45B7C[$RA16D2280393CE6A2A5428A4A8D09E354]['ID'], $R715A90EA79FE998320446D10620F2C8A ) ) { $RF91591AE6D743A7656A09F5ECFA45B7C[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = 'checked'; $R6C3825B3EAF6DBB0C7E879DD216BE6FE[] = $RF91591AE6D743A7656A09F5ECFA45B7C[$RA16D2280393CE6A2A5428A4A8D09E354]['Name']; } else { $RF91591AE6D743A7656A09F5ECFA45B7C[$RA16D2280393CE6A2A5428A4A8D09E354]['Status'] = ''; } } $bigfish['categories'] = $RF91591AE6D743A7656A09F5ECFA45B7C; } if ( $bigfish['create_cats'] && ! empty( $R6C3825B3EAF6DBB0C7E879DD216BE6FE ) ) { F6C859752FABC3A7D40F7C4B7B8871E49( $R6C3825B3EAF6DBB0C7E879DD216BE6FE ); } update_option('myarcade_bigfish', $bigfish); } function F1A63C1109C444C90C91DE5B57F5ED71F() { } function myarcade_feed_bigfish( $R9FE302BDF914868081913A22F58F9E7E =array() ) { $bigfish = get_option('myarcade_bigfish'); if ( empty( $bigfish['username'] ) ) { ?>
    <p class="mabp_error">
      <?php _e("ERROR: Missing Big Fish Games affiliate user name. Navigate to MyArcade -> Settings -> Big Fish Settings and enter your affiliate username!", 'myarcadeplugin'); ?>
    </p>
    <?php
 return; } if ( empty( $bigfish['categories'] ) ) { ?>
    <p class="mabp_error">
      <?php _e("ERROR: No feed categories have been activated. Navigate to MyArcade -> Settings -> Big Fish Settings and active desired game categories", 'myarcadeplugin'); ?>
    </p>
    <?php
 return; } $R1C087CFC2417747F08C78E3E5D5121E5 = array( 'echo' => false, 'settings' => $bigfish ); $RAA7BB4B05FBD27DB7CA594893F166B47 = wp_parse_args( $R9FE302BDF914868081913A22F58F9E7E, $R1C087CFC2417747F08C78E3E5D5121E5 ); extract($RAA7BB4B05FBD27DB7CA594893F166B47); if ( isset($settings['locale']) && isset($settings['gametype']) ) { $R294DC3B317407571E69ABD1110940C44 = new MyArcade_BigFish( $settings, $echo ); $R294DC3B317407571E69ABD1110940C44->F19D73A2B1C710DE2C0332E7385622E5E(); } } ?>