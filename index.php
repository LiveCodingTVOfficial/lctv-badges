<?php

/* LctvBadge Constants. */
require('badges/LctvBadgeConstants.inc') ;
/* LctvApi Constants. */
require('api/LctvApiConstants.inc') ;
/* LCTV API Credentials. */
if (!file_exists(CREDENTIALS_INCLUDE)) die(NOT_AUTHORIZED_MSG) ;
else require(CREDENTIALS_INCLUDE) ;


$STATUS_V2_HTML     = "<a href=\"demos/demo-nojs.php?title=Online%20Status%20-%20Logo%20Pill&amp;badge-style="                       . STATUS_V2_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V3_HTML     = "<a href=\"demos/demo.php?title=Online%20Status%20-%20Glassy%20Button&amp;badge-style="                        . STATUS_V3_STYLE     . "\">click here for embed code</a>" ;
$STATUS_V1_HTML     = "<a href=\"demos/demo-nojs.php?title=Online%20Status%20-%20Customizable%20SVG%20Pill&amp;badge-style="         . STATUS_V1_STYLE     . "\">click here for embed code</a>" ;
$VIEWERS_V1_HTML    = "<a href=\"demos/demo-nojs.php?title=Number%20of%20Viewers%20-%20Customizable%20SVG%20Pill&amp;badge-style="   . VIEWERS_V1_STYLE    . "\">click here for embed code</a>" ;
$FOLLOWERS_V1_HTML  = "<a href=\"demos/demo-nojs.php?title=Number%20of%20Followers%20-%20Customizable%20SVG%20Pill&amp;badge-style=" . FOLLOWERS_V1_STYLE  . "\">click here for embed code</a>" ;
$LASTSTREAM_V1_HTML = "<a href=\"demos/demo-nojs.php?title=Last%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . LASTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$NEXTSTREAM_V1_HTML = "<a href=\"demos/demo-nojs.php?title=Next%20Stream%20-%20Customizable%20SVG%20Pill&amp;badge-style="           . NEXTSTREAM_V1_STYLE . "\">click here for embed code</a>" ;
$ISSUES_HTML        = "<a href=\"https://github.com/bill-auger/lctv-badges/issues\">github issue tracker</a>" ;

?>


<html><head><title>LCTV Badges</title></head>
<body><link rel="stylesheet" type="text/css" href="demos/demo.css" />

  <h2>LCTV Badges</h2>
  <p>HTML badges and link buttons for LCTV online status and stream stats</p>
  <table id="demos-table">
    <tr><th colspan="4">Online Status Badges                             </th></tr>
    <tr><td>Logo Pill                                                    </td>
        <td><img src="img/v2/lctv-online.png"                          /></td>
        <td><img src="img/v2/lctv-offline.png"                         /></td>
        <td><?php echo $STATUS_V2_HTML ;                               ?></td></tr>
    <tr><td>Glassy Button                                                 </td>
        <td><img src="img/v3/lctv-online.png"  width="100" height="24" /></td>
        <td><img src="img/v3/lctv-offline.png" width="100" height="24" /></td>
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

</body></html>
