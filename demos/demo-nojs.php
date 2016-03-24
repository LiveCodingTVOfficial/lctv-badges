<?php
/* LctvBadge Constants. */
require('../badges/LctvBadgeConstants.inc') ;
?>

<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><title></title></head>
<body><link rel="stylesheet" type="text/css" href="demo.css" />

  <?php
    if (!isset($_GET['title'      ]) || empty($_GET['title'      ]) ||
        !isset($_GET['badge-style']) || empty($_GET['badge-style'])  )
    { echo '</body></html>' ; return ; }

    $TITLE              = htmlspecialchars($_GET['title'      ]) ;
    $BADGE_STYLE        = htmlspecialchars($_GET['badge-style']) ;
    $BADGE_IMG_ID       = 'lctv-status-img' ;
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
    $IS_V1_STYLE        = in_array($BADGE_STYLE , $BADGE_V1_STYLES) ;
    $CHANNEL_INPUT_HTML = "<input id=\"$CHANNEL_INPUT_ID\" type=\"text\"                                            />" ;
    $SUBMIT_INPUT_HTML  = "<input id=\"$SUBMIT_INPUT_ID\"  type=\"button\" value=\"Gimme\"                          />" ;
    $BADGE_IMG_HTML     = "<img   id=\"$BADGE_IMG_ID\"" . (($IS_V1_STYLE) ? "" : " width=\"100\" height=\"24\"") . "/>" ;
    $STYLE_INPUT_HTML   = "<input id=\"$STYLE_INPUT_ID\"   type=\"text\"   value=\"$BADGE_STYLE\" readonly          />" ;
    $LINK_INPUT_HTML    = "<input id=\"$LINK_INPUT_ID\"    type=\"checkbox\"                                        />" ;
    $TITLE_INPUT_HTML   = "<input id=\"$TITLE_INPUT_ID\"   type=\"checkbox\"                                        />" ;
    $ONLINE_INPUT_HTML  = "<input id=\"$ONLINE_INPUT_ID\"  type=\"text\"                                            />" ;
    $OFFLINE_INPUT_HTML = "<input id=\"$OFFLINE_INPUT_ID\" type=\"text\"                                            />" ;
    $CHANNEL_PARAM_DESC = "(Required) Name of channel for which to fetch data." ;
    $STYLE_PARAM_DESC   = "(Optional) Name of badge style. ($BADGE_STYLE for this badge)" ;
    $LINK_PARAM_DESC    = "(Optional) true/false to wrap image in hyperlink to channel." ;
    $TITLE_PARAM_DESC   = "(Optional) true/false to show streaming title when live. (Overrides online message)" ;
    $ONLINE_PARAM_DESC  = "(Optional) Badge message if status is streaming." ;
    $OFFLINE_PARAM_DESC = "(Optional) Badge message if status is not streaming." ;
  ?>

  <table id="<?php echo $OPTIONS_TABLE_ID ; ?>">
    <tr><th><?php echo $TITLE ;                           ?></th></tr>
    <tr><td colspan="2">Type an LCTV channel name here -->  </td>
        <td><?php echo $CHANNEL_INPUT_HTML ;              ?></td>
        <td>then press "Gimme" -->                          </td>
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

  <div id="<?php echo $CODE_DIV_ID ; ?>"><h4>To use this badge on your website:</h4>
    <ol>
      <li>Add this A and IMG tag to your HTML (A tag is optional):
        <pre id="<?php echo $IMG_CODE_ID ; ?>"></pre>
      </li>
    </ol>
    <table id="<?php echo $NOTES_TABLE_ID ; ?>">
      <tr><th colspan="2">Options</th></tr>
      <tr><td><em><?php echo CHANNEL_KEY ; ?>:</em></td><td><?php echo $CHANNEL_PARAM_DESC ; ?></td></tr>
      <tr><td><em><?php echo STYLE_KEY ;   ?>:</em></td><td><?php echo $STYLE_PARAM_DESC ;   ?></td></tr>
      <tr><td><em><?php echo LINK_KEY ;    ?>:</em></td><td><?php echo $LINK_PARAM_DESC ;    ?></td></tr>
      <tr><td><em><?php echo TITLE_KEY ;   ?>:</em></td><td><?php echo $TITLE_PARAM_DESC ;   ?></td></tr>
      <tr><td><em><?php echo ONLINE_KEY ;  ?>:</em></td><td><?php echo $ONLINE_PARAM_DESC ;  ?></td></tr>
      <tr><td><em><?php echo OFFLINE_KEY ; ?>:</em></td><td><?php echo $OFFLINE_PARAM_DESC ; ?></td></tr>
    </table>


  <script type="text/javascript">

var BADGES_URL          =  '<?php echo BADGES_URL ;                    ?>' ;
var CHANNEL_KEY         = '?<?php echo CHANNEL_KEY ;                   ?>=' ;
var STYLE_KEY           = '&<?php echo STYLE_KEY ;                     ?>=' ;
var LINK_KEY            = '&<?php echo LINK_KEY ;                      ?>=' ;
var TITLE_KEY           = '&<?php echo TITLE_KEY ;                     ?>=' ;
var ONLINE_KEY          = '&<?php echo ONLINE_KEY ;                    ?>=' ;
var OFFLINE_KEY         = '&<?php echo OFFLINE_KEY ;                   ?>=' ;
var STATUS_V1_STYLE     =  '<?php echo STATUS_V1_STYLE ;               ?>' ;
var STATUS_V2_STYLE     =  '<?php echo STATUS_V2_STYLE ;               ?>' ;
var VIEWERS_V1_STYLE    =  '<?php echo VIEWERS_V1_STYLE ;              ?>' ;
var FOLLOWERS_V1_STYLE  =  '<?php echo FOLLOWERS_V1_STYLE ;            ?>' ;
var LASTSTREAM_V1_STYLE =  '<?php echo LASTSTREAM_V1_STYLE ;           ?>' ;
var NEXTSTREAM_V1_STYLE =  '<?php echo NEXTSTREAM_V1_STYLE ;           ?>' ;
var BADGE_V1_STYLES     =   <?php echo json_encode($BADGE_V1_STYLES) ; ?> ;
var BADGE_V2_STYLES     =   <?php echo json_encode($BADGE_V2_STYLES) ; ?> ;
var BADGE_STYLE         =  '<?php echo $BADGE_STYLE ;                  ?>' ;
var IS_V1_STATUS_STYLE  = BADGE_STYLE == STATUS_V1_STYLE ;
var IS_V1_STYLE         = !!(~BADGE_V1_STYLES.indexOf(BADGE_STYLE)) ;
var IS_V2_STYLE         = !!(~BADGE_V2_STYLES.indexOf(BADGE_STYLE)) ;
var LCTV_URL            = "https://www.livecoding.tv/" ;


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
  ChannelInput = document.getElementById('<?php echo $CHANNEL_INPUT_ID ; ?>') ;
  SubmitInput  = document.getElementById('<?php echo $SUBMIT_INPUT_ID ;  ?>') ;
  OptionsTable = document.getElementById('<?php echo $OPTIONS_TABLE_ID ; ?>') ;
  OnlineInput  = document.getElementById('<?php echo $ONLINE_INPUT_ID ;  ?>') ;
  OfflineInput = document.getElementById('<?php echo $OFFLINE_INPUT_ID ; ?>') ;
  TitleInput   = document.getElementById('<?php echo $TITLE_INPUT_ID ;   ?>') ;
  LinkInput    = document.getElementById('<?php echo $LINK_INPUT_ID ;    ?>') ;
  BadgeImg     = document.getElementById('<?php echo $BADGE_IMG_ID ;     ?>') ;
  ImgPre       = document.getElementById('<?php echo $IMG_CODE_ID ;      ?>') ;
  NotesTable   = document.getElementById('<?php echo $NOTES_TABLE_ID ;   ?>') ;

  BadgeImg.style.visibility = 'hidden' ;
  SubmitInput .onclick      = loadImage ;
  ChannelInput.onkeyup      = setEmbedCode ;
  OnlineInput .onkeyup      = setEmbedCode ;
  OfflineInput.onkeyup      = setEmbedCode ;
  TitleInput  .onclick      = setEmbedCode ;
  LinkInput   .onclick      = setEmbedCode ;
  LinkInput   .checked      = true ;

  hideUnusedOptions() ;

  document.title = '<?php echo $TITLE ; ?>' ;
  setEmbedCode() ;
}

function hideUnusedOptions()
{
  var n_rows         = OptionsTable.rows.length ;
  var n_keep_options = (!IS_V1_STYLE       ) ? 2      : // keep CHANNEL_KEY, STYLE_KEY notes
                       (!IS_V1_STATUS_STYLE) ? 3      : // keep CHANNEL_KEY, STYLE_KEY, LINK_KEY notes
                                               n_rows ; // keep all notes

  var row_n = n_rows ;
  while (--row_n > n_keep_options)
  {
    OptionsTable.deleteRow(row_n) ;
    NotesTable.deleteRow(row_n) ;
  }
}

function loadImage()
{
  if (!ChannelInput.value) return ;

  BadgeImg.src              = makeBadgeUrl() ;
  BadgeImg.style.visibility = 'visible' ;

  setEmbedCode() ;
}

function getChannelName()
{
  return ((ChannelInput.value) ? ChannelInput.value : 'YOUR_LCTV_CHANNEL_NAME') ;
}

function makeBadgeUrl()
{
  var channel_name = getChannelName() ;
  var online_text  = OnlineInput.value ;
  var offline_text = OfflineInput.value ;
  var use_title    = TitleInput.checked ;
  var wrap_link    = LinkInput.checked ;

  OnlineInput.style.disabled = use_title ;

  var channel_kvp = CHANNEL_KEY + channel_name ;
  var v1_params   = channel_kvp     + STYLE_KEY   + BADGE_STYLE        +
                    ((online_text ) ? ONLINE_KEY  + online_text  : '') +
                    ((offline_text) ? OFFLINE_KEY + offline_text : '') +
                    ((use_title   ) ? TITLE_KEY   + use_title    : '') +
                    ((!wrap_link  ) ? LINK_KEY    + wrap_link    : '') ;
  var v2_params   = channel_kvp + STYLE_KEY + BADGE_STYLE ;
  var badge_url   = BADGES_URL + ((IS_V1_STYLE) ? v1_params :
                                 ((IS_V2_STYLE) ? v2_params : '')) ;

  return badge_url ;
}

function setEmbedCode()
{
  var badge_url   = makeBadgeUrl() ;
  var channel_url = LCTV_URL + getChannelName() ;
  var img_params  = 'width="100" height="24"' ;

  var img_v1_code  = '&lt;img src="' + badge_url   + '" /&gt;' ;
  var img_v2_code  = '&lt;a href="'  + channel_url + '"&gt;\n'   +
                     '  &lt;img '    + img_params  + '\n'        +
                     '       src="'  + badge_url   + '" /&gt;\n' +
                     '&lt;/a&gt;'                                ;

  ImgPre.innerHTML = (IS_V1_STYLE) ? img_v1_code : img_v2_code ;
}


init() ;

  </script>

</body></html>
