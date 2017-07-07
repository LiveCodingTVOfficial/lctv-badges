<?php
/**
 * LiveEdu.tv Badges Embed Code Generator
 *
 * @package LctvBadges\Demos
 * @version 0.0.9
 * @since 0.0.8
 */


require_once('../api/LctvApiHelpers.inc') ;
require_once('../badges/LctvBadgeConstants.inc') ;


$DEMO_TITLE         = LctvApiHelpers::SanitizeGetParam('title'       , '') ;
$BADGE_STYLE        = LctvApiHelpers::SanitizeGetParam('badge-style' , '') ;
$BADGE_IMG_ID       = $BADGE_IMG_IDS["$BADGE_STYLE"] ;
$CHANNEL_INPUT_ID   = 'channel-name-input' ;
$SUBMIT_INPUT_ID    = 'submit-input' ;
$OPTIONS_TABLE_ID   = 'options-table' ;
$ONLINE_INPUT_ID    = 'online-text-input' ;
$OFFLINE_INPUT_ID   = 'offline-text-input' ;
$TITLE_INPUT_ID     = 'use-title-input' ;
$LINK_INPUT_ID      = 'wrap-link-input' ;
$CODE_DIV_ID        = 'code-div' ;
$IMG_CODE_ID        = 'img-pre' ;
$NOTES_TABLE_ID     = 'notes-table' ;
$IS_V1_STYLE        = in_array($BADGE_STYLE , $BADGE_V1_STYLES  ) ;
$IS_V2_STYLE        = in_array($BADGE_STYLE , $BADGE_V2_STYLES  ) ;
$IS_FLIP_STYLE      = in_array($BADGE_STYLE , $BADGE_FLIP_STYLES) ;
$IMG_DIMS_PARAMS    = 'width="100" height="24"' ;
$IMG_FLIP_PARAMS    = "data-channel=\"pending\"" ;
$DEMO_IMG_PARAMS    = (($IS_V1_STYLE   ) ? '' : $IMG_DIMS_PARAMS) .
                      ((!$IS_FLIP_STYLE) ? '' : $IMG_FLIP_PARAMS) ;
$CHANNEL_INPUT_HTML = "<input id=\"$CHANNEL_INPUT_ID\" type=\"text\"                                     />" ;
$SUBMIT_INPUT_HTML  = "<input id=\"$SUBMIT_INPUT_ID\"  type=\"button\"   value=\"Demo\"                  />" ;
$BADGE_IMG_HTML     = "<img   id=\"$BADGE_IMG_ID\"     $DEMO_IMG_PARAMS  style=\"visibility: hidden ;\"  />" ;
$STYLE_INPUT_HTML   = "<input id=\"style-id-unused\"   type=\"text\"     value=\"$BADGE_STYLE\" readonly />" ;
$LINK_INPUT_HTML    = "<input id=\"$LINK_INPUT_ID\"    type=\"checkbox\" checked                         />" ;
$TITLE_INPUT_HTML   = "<input id=\"$TITLE_INPUT_ID\"   type=\"checkbox\"                                 />" ;
$ONLINE_INPUT_HTML  = "<input id=\"$ONLINE_INPUT_ID\"  type=\"text\"                                     />" ;
$OFFLINE_INPUT_HTML = "<input id=\"$OFFLINE_INPUT_ID\" type=\"text\"                                     />" ;
$CHANNEL_PARAM_DESC = "(Required) Name of channel for which to fetch data." ;
$STYLE_PARAM_DESC   = "(Optional) Name of badge style. ($BADGE_STYLE for this badge)" ;
$LINK_PARAM_DESC    = "(Optional) true/false to wrap image in hyperlink to channel." ;
$TITLE_PARAM_DESC   = "(Optional) true/false to show streaming title when live. (Overrides online message)" ;
$ONLINE_PARAM_DESC  = "(Optional) Badge message if status is streaming." ;
$OFFLINE_PARAM_DESC = "(Optional) Badge message if status is not streaming." ;
$CODE_SPAN_TEXT     = (($IS_V1_STYLE  ) ? 'Add this IMG tag to your HTML:'                           :
                      (($IS_V2_STYLE  ) ? 'Add this A and IMG tag to your HTML (A tag is optional):' :
                      (($IS_FLIP_STYLE) ? 'Add this IMG and SCRIPT tag to your HTML:'                : ''))) ;
?>


<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><title></title></head>
<body><link rel="stylesheet" type="text/css" href="lctv-badges.css" />

  <?php if (empty($DEMO_TITLE) || empty($BADGE_STYLE)) die('</body></html>') ; ?>

  <h3><?php echo $DEMO_TITLE ; ?></h3>
  <table id="<?php echo $OPTIONS_TABLE_ID ; ?>">
    <tr><td colspan="2">Type an LCTV channel name here -->  </td>
        <td><?php echo $CHANNEL_INPUT_HTML ;              ?></td>
        <td>then press "Demo" -->                           </td>
        <td><?php echo $SUBMIT_INPUT_HTML . ' --> ' ;     ?></td>
        <td><?php echo $BADGE_IMG_HTML ;                  ?></td></tr>
    <tr><td>Additional Options --></td><td>Badge Style:     </td>
        <td><?php echo $STYLE_INPUT_HTML ;                ?></td>
        <td colspan="3">                                    </td></tr>
    <tr><td>                      </td><td>Make Link:       </td>
        <td><?php echo $LINK_INPUT_HTML ;                 ?></td>
        <td colspan="3">                                    </td></tr>
    <tr><td>                      </td><td>Use Stream Title:</td>
        <td><?php echo $TITLE_INPUT_HTML ;                ?></td>
        <td colspan="3">                                    </td></tr>
    <tr><td>                      </td><td>Online Text:     </td>
        <td><?php echo $ONLINE_INPUT_HTML ;               ?></td>
        <td colspan="3">                                    </td></tr>
    <tr><td>                      </td><td>Offline Text:    </td>
        <td><?php echo $OFFLINE_INPUT_HTML ;              ?></td>
        <td colspan="3">                                    </td></tr>
  </table>

  <h3>To use this badge on your website:</h3>
  <div id="<?php echo $CODE_DIV_ID ; ?>">
    <span><?php echo $CODE_SPAN_TEXT ; ?></span>
    <pre id="<?php echo $IMG_CODE_ID ; ?>"></pre>

    <span>Options</span>
    <table id="<?php echo $NOTES_TABLE_ID ; ?>">
      <tr><td><em><?php echo CHANNEL_KEY ; ?>:</em></td><td><?php echo $CHANNEL_PARAM_DESC ; ?></td></tr>
      <tr><td><em><?php echo STYLE_KEY ;   ?>:</em></td><td><?php echo $STYLE_PARAM_DESC ;   ?></td></tr>
      <tr><td><em><?php echo LINK_KEY ;    ?>:</em></td><td><?php echo $LINK_PARAM_DESC ;    ?></td></tr>
      <tr><td><em><?php echo TITLE_KEY ;   ?>:</em></td><td><?php echo $TITLE_PARAM_DESC ;   ?></td></tr>
      <tr><td><em><?php echo ONLINE_KEY ;  ?>:</em></td><td><?php echo $ONLINE_PARAM_DESC ;  ?></td></tr>
      <tr><td><em><?php echo OFFLINE_KEY ; ?>:</em></td><td><?php echo $OFFLINE_PARAM_DESC ; ?></td></tr>
    </table>
  </div>


  <?php if ($IS_FLIP_STYLE) { ?>
  <script type="text/javascript" src="<?php echo BADGES_JS_URL ; ?>"></script>
  <?php } ?>
  <script type="text/javascript">

var CHANNEL_INPUT_ID    = '<?php echo $CHANNEL_INPUT_ID ;   ?>' ;
var SUBMIT_INPUT_ID     = '<?php echo $SUBMIT_INPUT_ID ;    ?>' ;
var OPTIONS_TABLE_ID    = '<?php echo $OPTIONS_TABLE_ID ;   ?>' ;
var ONLINE_INPUT_ID     = '<?php echo $ONLINE_INPUT_ID ;    ?>' ;
var OFFLINE_INPUT_ID    = '<?php echo $OFFLINE_INPUT_ID ;   ?>' ;
var TITLE_INPUT_ID      = '<?php echo $TITLE_INPUT_ID ;     ?>' ;
var LINK_INPUT_ID       = '<?php echo $LINK_INPUT_ID ;      ?>' ;
var BADGE_IMG_ID        = '<?php echo $BADGE_IMG_ID ;       ?>' ;
var IMG_CODE_ID         = '<?php echo $IMG_CODE_ID ;        ?>' ;
var NOTES_TABLE_ID      = '<?php echo $NOTES_TABLE_ID ;     ?>' ;
var DEMO_TITLE          = '<?php echo $DEMO_TITLE ;         ?>' ;
var IMG_DIMS_PARAMS     = '<?php echo $IMG_DIMS_PARAMS ;    ?>' ;
var BADGES_PHP_URL      = '<?php echo BADGES_PHP_URL ;      ?>' ;
var BADGES_JS_URL       = '<?php echo BADGES_JS_URL ;       ?>' ;
var LCTV_URL            = '<?php echo LCTV_URL ;            ?>' ;
var CHANNEL_KEY         = '<?php echo CHANNEL_KEY ;         ?>' ;
var STYLE_KEY           = '<?php echo STYLE_KEY ;           ?>' ;
var LINK_KEY            = '<?php echo LINK_KEY ;            ?>' ;
var TITLE_KEY           = '<?php echo TITLE_KEY ;           ?>' ;
var ONLINE_KEY          = '<?php echo ONLINE_KEY ;          ?>' ;
var OFFLINE_KEY         = '<?php echo OFFLINE_KEY ;         ?>' ;
var STATUS_V1_STYLE     = '<?php echo STATUS_V1_STYLE ;     ?>' ;
var STATUS_V2_STYLE     = '<?php echo STATUS_V2_STYLE ;     ?>' ;
var VIEWERS_V1_STYLE    = '<?php echo VIEWERS_V1_STYLE ;    ?>' ;
var FOLLOWERS_V1_STYLE  = '<?php echo FOLLOWERS_V1_STYLE ;  ?>' ;
var LASTSTREAM_V1_STYLE = '<?php echo LASTSTREAM_V1_STYLE ; ?>' ;
var NEXTSTREAM_V1_STYLE = '<?php echo NEXTSTREAM_V1_STYLE ; ?>' ;
var BADGE_STYLE         = '<?php echo $BADGE_STYLE ;        ?>' ;
var IS_V1_STYLE         =  <?php echo ($IS_V1_STYLE  ) ? 'true' : 'false' ; ?> ;
var IS_V2_STYLE         =  <?php echo ($IS_V2_STYLE  ) ? 'true' : 'false' ; ?> ;
var IS_FLIP_STYLE       =  <?php echo ($IS_FLIP_STYLE) ? 'true' : 'false' ; ?> ;
var N_STATIC_OPTIONS    = 2 ; // CHANNEL_KEY, STYLE_KEY
var N_FLIP_OPTIONS      = 3 ; // CHANNEL_KEY, STYLE_KEY, LINK_KEY, TITLE_KEY, ONLINE_KEY, OFFLINE_KEY
var N_CUSTOM_OPTIONS    = 6 ; // CHANNEL_KEY, STYLE_KEY, LINK_KEY, TITLE_KEY, ONLINE_KEY, OFFLINE_KEY


var ChannelInput ;
var SubmitInput ;
var OptionsTable ;
var OnlineInput ;
var OfflineInput ;
var TitleInput ;
var LinkInput ;
var BadgeImg ;
var ImgPre ;
var NotesTable ;


function init()
{
  ChannelInput = document.getElementById(CHANNEL_INPUT_ID) ;
  SubmitInput  = document.getElementById(SUBMIT_INPUT_ID ) ;
  OptionsTable = document.getElementById(OPTIONS_TABLE_ID) ;
  OnlineInput  = document.getElementById(ONLINE_INPUT_ID ) ;
  OfflineInput = document.getElementById(OFFLINE_INPUT_ID) ;
  TitleInput   = document.getElementById(TITLE_INPUT_ID  ) ;
  LinkInput    = document.getElementById(LINK_INPUT_ID   ) ;
  BadgeImg     = document.getElementById(BADGE_IMG_ID    ) ;
  ImgPre       = document.getElementById(IMG_CODE_ID     ) ;
  NotesTable   = document.getElementById(NOTES_TABLE_ID  ) ;

  ChannelInput.onkeyup = setEmbedCode ;
  OnlineInput .onkeyup = setEmbedCode ;
  OfflineInput.onkeyup = setEmbedCode ;
  TitleInput  .onclick = setEmbedCode ;
  LinkInput   .onclick = setEmbedCode ;
  SubmitInput .onclick = loadImage ;

  hideUnusedOptions() ;

  document.title = DEMO_TITLE ;
  setEmbedCode() ;
}

function hideUnusedOptions()
{
  if (N_CUSTOM_OPTIONS != OptionsTable.rows.length ||
      N_CUSTOM_OPTIONS != NotesTable  .rows.length  ) return ;

  var option_n       = N_CUSTOM_OPTIONS ;
  var n_keep_options = (IS_V1_STYLE) ? N_CUSTOM_OPTIONS :
                       (IS_V2_STYLE) ? N_STATIC_OPTIONS : N_FLIP_OPTIONS ;

  while (option_n-- > n_keep_options)
  {
    OptionsTable.deleteRow(option_n) ;
    NotesTable  .deleteRow(option_n) ;
  }
}

function loadImage()
{
  if (!ChannelInput.value) return ;

  // remove badge img from anchor if present
  var wrap_link       = LinkInput.checked ;
  var badge_id        = BadgeImg.id ;
  var badge_parent    = BadgeImg.parentNode ;
  var badge_parent_id = badge_parent.id ;
  var badge_a_id      = badge_id.substring(0 , badge_id.length - 3) + 'a'
  if (!wrap_link && badge_parent_id === badge_a_id)
    badge_parent.parentNode.replaceChild(BadgeImg , badge_parent) ;

  // load badge image
  if (IS_FLIP_STYLE) loadImages() ; // in BADGES_JS_URL
  else               BadgeImg.src = makeBadgeUrl() ;

  BadgeImg.style.visibility = 'visible' ;
}

function getChannelName()
{
  return ((ChannelInput.value) ? ChannelInput.value : 'YOUR_LCTV_CHANNEL_NAME') ;
}

function makeBadgeUrl()
{
  var channel_name = getChannelName() ;
  var wrap_link    = LinkInput.checked ;
  var use_title    = TitleInput.checked ;
  var online_text  = escape(OnlineInput.value) ;
  var offline_text = escape(OfflineInput.value) ;

  OnlineInput.style.disabled = use_title ;

  var style_param   =                    '?' + STYLE_KEY   + '=' + BADGE_STYLE ;
  var channel_param =                    '&' + CHANNEL_KEY + '=' + channel_name ;
  var link_param    = (! wrap_link   ) ? '&' + LINK_KEY    + '=' + wrap_link    : '' ;
  var title_param   = (!!use_title   ) ? '&' + TITLE_KEY   + '=' + use_title    : '' ;
  var online_param  = (!!online_text ) ? '&' + ONLINE_KEY  + '=' + online_text  : '' ;
  var offline_param = (!!offline_text) ? '&' + OFFLINE_KEY + '=' + offline_text : '' ;
  var badge_url     = BADGES_PHP_URL + style_param + channel_param + link_param    +
                                       title_param + online_param  + offline_param ;

  return badge_url ;
}

function setEmbedCode()
{
  var badge_url    = makeBadgeUrl() ;
  var channel_name = getChannelName() ;
  var wrap_link    = LinkInput.checked ;
  var channel_url  = LCTV_URL + channel_name ;
  var link_param   = (!wrap_link) ? ' data-link="false"' : '' ;

  BadgeImg.dataset.channel = channel_name ;
  BadgeImg.dataset.link    = wrap_link ;

  var img_custom_code = '&lt;img src="'   + badge_url       + '" /&gt;'   ;
  var img_static_code = '&lt;a href="'    + channel_url     + '"&gt;\n'   +
                        '  &lt;img '      + IMG_DIMS_PARAMS + '\n'        +
                        '       src="'    + badge_url       + '" /&gt;\n' +
                        '&lt;/a&gt;'                                      ;
  var img_flip_code   = '&lt;img id="'    + BADGE_IMG_ID                  +
                        '" '              + IMG_DIMS_PARAMS               +
                        ' data-channel="' + channel_name    + '"'         +
                        link_param                          + ' /&gt;'    ;
  var script_code     = '\n\n&lt;script type="text/javascript"'           +
                        ' src="' + BADGES_JS_URL + '"&gt;&lt;/script&gt;' ;

  ImgPre.innerHTML = (IS_V1_STYLE  ) ? img_custom_code             :
                     (IS_V2_STYLE  ) ? img_static_code             :
                     (IS_FLIP_STYLE) ? img_flip_code + script_code :
                                       "unknown 'badge-style'" ;
}


init() ;

  </script>

</body></html>
