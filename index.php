<?php

/* LctvBadge Constants. */
require('badges/LctvBadgeConstants.inc') ;
/* LctvApi Constants. */
require('api/LctvApiConstants.inc') ;
/* LCTV API Credentials. */
if (file_exists('api/' . CREDENTIALS_FILE)) require('api/' . CREDENTIALS_FILE) ;
else die(NOT_AUTHORIZED_MSG) ;


$STATUS_V2_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Logo%20Pill&amp;badge-style="                       . STATUS_V2_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V3_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Glassy%20Button&amp;badge-style="                        . STATUS_V3_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V1_HTML     = "<a href=\"demos/?title=Online%20Status%20-%20Customizable%20SVG%20Pill&amp;badge-style="         . STATUS_V1_STYLE     . "\">click here for embed code</a>" ;
$VIEWERS_V1_HTML    = "<a href=\"demos/?title=Number%20of%20Viewers%20-%20Customizable%20SVG%20Pill&amp;badge-style="   . VIEWERS_V1_STYLE    . "\">click here for embed code</a>" ;
$FOLLOWERS_V1_HTML  = "<a href=\"demos/?title=Number%20of%20Followers%20-%20Customizable%20SVG%20Pill&amp;badge-style=" . FOLLOWERS_V1_STYLE  . "\">click here for embed code</a>" ;
$LASTSTREAM_V1_HTML = "<a href=\"demos/?title=Last%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . LASTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$NEXTSTREAM_V1_HTML = "<a href=\"demos/?title=Next%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . NEXTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$ISSUES_HTML        = "<a href=\"https://github.com/bill-auger/lctv-badges/issues\">github issue tracker</a>" ;

?>


<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><title>LCTV Badges</title></head>
<body><link rel="stylesheet" type="text/css" href="demos/lctv-badges.css" />

  <h2>LCTV Badges</h2>

  <p>HTML badges and link buttons for livecoding.tv online status and stream stats</p>

  <table id="demos-table">
    <tr><th colspan="4">Online Status Badges                             </th></tr>
    <tr><td>Logo Pill                                                    </td>
        <td><img src="img/v2/lctv-online.png"                          /></td>
        <td><img src="img/v2/lctv-offline.png"                         /></td>
        <td><?php echo $STATUS_V2_HTML ;                               ?></td></tr>
    <tr><td>Glassy Button                                                </td>
        <td><img src="img/v3/lctv-online.png"  id="online"             /></td>
        <td><img src="img/v3/lctv-offline.png" id="offline"            /></td>
        <td><?php echo $STATUS_V3_HTML ;                               ?></td></tr>
    <tr><td>Customizable SVG Pill                                        </td>
        <td><img src="img/v1/faux-online.png"                          /></td>
        <td><img src="img/v1/faux-offline.png"                         /></td>
        <td><?php echo $STATUS_V1_HTML ;                               ?></td></tr>
    <tr><th colspan="4">Number of Viewers Badges                         </th></tr>
    <tr><td>Customizable SVG Pill                                        </td>
        <td colspan="2"><img src="img/v1/faux-n-viewers.png"           /></td>
        <td><?php echo $VIEWERS_V1_HTML ;                              ?></td></tr>
    <tr><th colspan="4">Number of Followers Badges                       </th></tr>
    <tr><td>Customizable SVG Pill                                        </td>
        <td colspan="2"><img src="img/v1/faux-n-followers.png"         /></td>
        <td><?php echo $FOLLOWERS_V1_HTML ;                            ?></td></tr>
    <tr><th colspan="4">Last Streamed Badges                             </th></tr>
    <tr><td>Customizable SVG Pill                                        </td>
        <td colspan="2"><img src="img/v1/faux-last-stream.png"         /></td>
        <td><?php echo $LASTSTREAM_V1_HTML  ;                          ?></td></tr>
    <tr><th colspan="4">Next Stream Badges                               </th></tr>
    <tr><td>Customizable SVG Pill                                        </td>
        <td colspan="2"><img src="img/v1/faux-next-stream.png"         /></td>
        <td><?php echo $NEXTSTREAM_V1_HTML ;                           ?></td></tr>
  </table>

  <p>more styles and features to come once the LCTV REST API is finalized - feel free to post any comments or suggestions to the <?php echo $ISSUES_HTML ; ?></p>


  <script type="text/javascript">

// set v3 image flips
['online' , 'offline'].forEach(function (img_id)
{
  var v3_img          = document.getElementById(img_id) ;
  v3_img.onmouseover  = function() { v3_img.src = "img/v3/lctv-" + img_id + "-hover.png" ;  }
  v3_img.onmouseleave = function() { v3_img.src = "img/v3/lctv-" + img_id + ".png" ;        }
  v3_img.onmousedown  = function() { v3_img.src = "img/v3/lctv-" + img_id + "-pushed.png" ; }
  v3_img.onmouseup    = function() { v3_img.src = "img/v3/lctv-" + img_id + "-hover.png" ;  }
}) ;

  </script>

</body></html>
