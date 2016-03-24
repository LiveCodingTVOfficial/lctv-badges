<?php

define('PATH_FROM_ROOT' , '' /* if badges are not served from web root */ ) ;
define('BADGES_ROOT'    , $_SERVER['HTTP_HOST']   . PATH_FROM_ROOT        ) ;
define('BADGES_URL'     , 'http://' . BADGES_ROOT . '/badges'             ) ;
define('BADGE_JS_URL'   , 'http://' . BADGES_ROOT . '/js/online-status.js') ;
define('LCTV_URL'       , 'https://www.livecoding.tv'                     ) ;

// request param keys
define('CHANNEL_KEY' , 'channel') ;
define('STYLE_KEY'   , 'style'  ) ;
define('ONLINE_KEY'  , 'online' ) ;
define('OFFLINE_KEY' , 'offline') ;
define('TITLE_KEY'   , 'title'  ) ;
define('LINK_KEY'    , 'link'   ) ;

// badge styles
define('STATUS_V1_STYLE'        , 'online-status-v1'       ) ;
define('STATUS_V2_STYLE'        , 'online-status-v2'       ) ;
define('STATUS_V3_STYLE'        , 'online-status-v3'       ) ;
define('STATUS_V3_HOVER_STYLE'  , 'online-status-hover-v3' ) ;
define('STATUS_V3_PUSHED_STYLE' , 'online-status-pushed-v3') ;
define('VIEWERS_V1_STYLE'       , 'n-viewers-v1'           ) ;
define('FOLLOWERS_V1_STYLE'     , 'n-followers-v1'         ) ;
define('LASTSTREAM_V1_STYLE'    , 'last-stream-v1'         ) ;
define('NEXTSTREAM_V1_STYLE'    , 'next-stream-v1'         ) ;

$BADGE_V1_STYLES = array( STATUS_V1_STYLE     , VIEWERS_V1_STYLE    ,
                          FOLLOWERS_V1_STYLE  , LASTSTREAM_V1_STYLE ,
                          NEXTSTREAM_V1_STYLE                       ) ;
$PRIVATE_STYLES  = array( FOLLOWERS_V1_STYLE , LASTSTREAM_V1_STYLE ) ;
$BADGE_V2_STYLES = array( STATUS_V2_STYLE ) ;
$BADGE_V3_STYLES = array( STATUS_V3_STYLE        , STATUS_V3_HOVER_STYLE ,
                          STATUS_V3_PUSHED_STYLE                         ) ;

// image files
define('V2_ONLINE_PNG'         , '../img/v2/lctv-online.png'        ) ;
define('V2_OFFLINE_PNG'        , '../img/v2/lctv-offline.png'       ) ;
define('V3_ONLINE_PNG'         , '../img/v3/lctv-online.png'        ) ;
define('V3_ONLINE_HOVER_PNG'   , '../img/v3/lctv-online-hover.png'  ) ;
define('V3_ONLINE_PUSHED_PNG'  , '../img/v3/lctv-online-pushed.png' ) ;
define('V3_OFFLINE_PNG'        , '../img/v3/lctv-offline.png'       ) ;
define('V3_OFFLINE_HOVER_PNG'  , '../img/v3/lctv-offline-hover.png' ) ;
define('V3_OFFLINE_PUSHED_PNG' , '../img/v3/lctv-offline-pushed.png') ;

// badge params
define('GREEN_COLOR' , '#4c1'   ) ;
define('RED_COLOR'   , '#e05d44') ;
define('UNAUTHORIZED_R_TEXT' , 'Unauthorized'    ) ;
define('ERROR_R_TEXT'        , 'Error'           ) ;
define('NO_NEXT_STREAM_TEXT' , 'None'            ) ;
define('NO_LAST_STREAM_TEXT' , 'Never'           ) ;
define('STATUS_LTEXT'        , 'LiveCoding.tv'   ) ;
define('VIEWERS_LTEXT'       , 'LCTV Viewers'    ) ;
define('FOLLOWERS_LTEXT'     , 'LCTV Fans'       ) ;
define('LASTSTREAM_LTEXT'    , 'LCTV Last Stream') ;
define('NEXTSTREAM_LTEXT'    , 'LCTV Next Stream') ;

// error messages
define('INVALID_CHANNEL_MSG', 'You must specify a channel name like: '       .
                              BADGES_URL . '?channel=YOUR_LCTV_CHANNEL_NAME.') ;

?>
