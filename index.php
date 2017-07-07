<?php
/**
 * LiveEdu.tv Badges Demos
 *
 * @package LctvBadges\Demos
 * @version 0.0.9
 * @since 0.0.8
 */


/* LctvBadge Constants. */
require('badges/LctvBadgeConstants.inc') ;
/* LctvApi Constants. */
require('api/LctvApiConstants.inc') ;
/* LCTV API Credentials. */
if (file_exists('api/' . CREDENTIALS_FILE)) require('api/' . CREDENTIALS_FILE) ;
else die(NOT_AUTHORIZED_MSG) ;


$STATUS_V2_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Logo%20Pill&amp;badge-style="                       . STATUS_V2_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V3_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Glassy%20Button&amp;badge-style="                   . STATUS_V3_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V1_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Customizable%20SVG%20Pill&amp;badge-style="         . STATUS_V1_STYLE     . "\">click here for embed code</a>" ;
$VIEWERS_V1_HTML    = "<a href=\"demos/?title=Number%20of%20Viewers%20-%20Customizable%20SVG%20Pill&amp;badge-style="   . VIEWERS_V1_STYLE    . "\">click here for embed code</a>" ;
$FOLLOWERS_V1_HTML  = "<a href=\"demos/?title=Number%20of%20Followers%20-%20Customizable%20SVG%20Pill&amp;badge-style=" . FOLLOWERS_V1_STYLE  . "\">click here for embed code</a>" ;
$LASTSTREAM_V1_HTML = "<a href=\"demos/?title=Last%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . LASTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$NEXTSTREAM_V1_HTML = "<a href=\"demos/?title=Next%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . NEXTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$GITHUB_HTML        = "<a href=\"https://github.com/bill-auger/lctv-badges/\">GitHub</a>" ;
$NOTABUG_HTML       = "<a href=\"https://notabug.org/bill-auger/lctv-badges/\">NotABug</a>" ;
$ISSUES_HTML        = "<a href=\"https://github.com/bill-auger/lctv-badges/issues\">issue tracker</a>" ;
$INSTALL_HTML       = "<a href=\"https://github.com/bill-auger/lctv-badges/INSTALL.md\">INSTALL.md</a>" ;

?>


<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><title>LCTV Badges</title></head>
<body><link rel="stylesheet" type="text/css" href="demos/lctv-badges.css" />

  <h2>LCTV Badges</h2>

  <p>HTML badges and link buttons for liveedu.tv online status and stream stats</p>

  <table id="demos-table">
    <tr><th colspan="4">Online Status Badges                     </th></tr>
    <tr><td>Logo Pill                                            </td>
        <td><img src="img/v2/lctv-online.png"                  /></td>
        <td><img src="img/v2/lctv-offline.png"                 /></td>
        <td><?php echo $STATUS_V2_HTML ;                       ?></td></tr>
    <tr><td>Glassy Button                                        </td>
        <td><img src="img/v3/lctv-online.png"  id="online"     /></td>
        <td><img src="img/v3/lctv-offline.png" id="offline"    /></td>
        <td><?php echo $STATUS_V3_HTML ;                       ?></td></tr>
    <tr><td>Customizable SVG Pill                                </td>
        <td><img src="img/v1/faux-online.png"                  /></td>
        <td><img src="img/v1/faux-offline.png"                 /></td>
        <td><?php echo $STATUS_V1_HTML ;                       ?></td></tr>
    <tr><th colspan="4">Number of Viewers Badges                 </th></tr>
    <tr><td>Customizable SVG Pill                                </td>
        <td colspan="2"><img src="img/v1/faux-n-viewers.png"   /></td>
        <td><?php echo $VIEWERS_V1_HTML ;                      ?></td></tr>
    <tr><th colspan="4">Number of Followers Badges               </th></tr>
    <tr><td>Customizable SVG Pill                                </td>
        <td colspan="2"><img src="img/v1/faux-n-followers.png" /></td>
        <td><?php echo $FOLLOWERS_V1_HTML ;                    ?></td></tr>
    <tr><th colspan="4">Last Streamed Badges                     </th></tr>
    <tr><td>Customizable SVG Pill                                </td>
        <td colspan="2"><img src="img/v1/faux-last-stream.png" /></td>
        <td><?php echo $LASTSTREAM_V1_HTML  ;                  ?></td></tr>
    <tr><th colspan="4">Next Stream Badges                       </th></tr>
    <tr><td>Customizable SVG Pill                                </td>
        <td colspan="2"><img src="img/v1/faux-next-stream.png" /></td>
        <td><?php echo $NEXTSTREAM_V1_HTML ;                   ?></td></tr>
  </table>

  <p>The GPLv3 licensed source code for ths service is hosted on <?php echo $GITHUB_HTML ; ?> and <?php echo $NOTABUG_HTML ; ?>.</p>
  <p>Feel free to post any comments or suggestions to the <?php echo $ISSUES_HTML ; ?>.</p>
  <p>Pull Requests are welcome. Please do contribute your design ideas.</p>
  <p>If you would like to host your own badges, see the <?php echo $INSTALL_HTML ; ?> file in the sources.</p>


  <script type="text/javascript">

// set v3 image flips
['online' , 'offline'].forEach(function(img_id)
{
  var v3_img          = document.getElementById(img_id) ;
  v3_img.onmouseover  = function() { v3_img.src = "img/v3/lctv-" + img_id + "-hover.png" ;  }
  v3_img.onmouseleave = function() { v3_img.src = "img/v3/lctv-" + img_id + ".png" ;        }
  v3_img.onmousedown  = function() { v3_img.src = "img/v3/lctv-" + img_id + "-pushed.png" ; }
  v3_img.onmouseup    = function() { v3_img.src = "img/v3/lctv-" + img_id + "-hover.png" ;  }
}) ;

  </script>

</body></html>
