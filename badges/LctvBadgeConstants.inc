<?php
/**
 * LiveEdu.tv Badges Constants
 *
 * @package LctvBadges\Constants
 * @version 0.0.9
 * @since 0.0.8
 */


// NOTE: many of these must be mirrored in badges/lctv-badges.js

// urls
define('PATH_FROM_WWW_ROOT' , '' /* if not served from web root */                  ) ;
define('LCTV_URL'           , 'https://www.liveedu.tv/'                             ) ;
define('BADGES_URL'         , 'http://' . $_SERVER['HTTP_HOST'] . PATH_FROM_WWW_ROOT) ;
define('BADGES_PHP_URL'     , BADGES_URL . '/badges/'                               ) ;
define('BADGES_JS_URL'      , BADGES_URL . '/badges/lctv-badges.js'                 ) ;

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
define('STATUS_V3_HOVER_STYLE'  , 'online-status-v3-hover' ) ;
define('STATUS_V3_PUSHED_STYLE' , 'online-status-v3-pushed') ;
define('VIEWERS_V1_STYLE'       , 'n-viewers-v1'           ) ;
define('FOLLOWERS_V1_STYLE'     , 'n-followers-v1'         ) ;
define('LASTSTREAM_V1_STYLE'    , 'last-stream-v1'         ) ;
define('NEXTSTREAM_V1_STYLE'    , 'next-stream-v1'         ) ;
$BADGE_V1_STYLES   = array( STATUS_V1_STYLE     , VIEWERS_V1_STYLE    ,
                            FOLLOWERS_V1_STYLE  , LASTSTREAM_V1_STYLE ,
                            NEXTSTREAM_V1_STYLE                       ) ;
$BADGE_V2_STYLES   = array( STATUS_V2_STYLE ) ;
$BADGE_V3_STYLES   = array( STATUS_V3_STYLE        , STATUS_V3_HOVER_STYLE ,
                            STATUS_V3_PUSHED_STYLE                         ) ;
$BADGE_PVT_STYLES  = array( FOLLOWERS_V1_STYLE , LASTSTREAM_V1_STYLE ) ;
$BADGE_FLIP_STYLES = array( STATUS_V3_STYLE ) ;

// badge image HTML ids
$BADGE_IMG_IDS = array( STATUS_V1_STYLE     => 'lctv-status-img'     ,
                        STATUS_V2_STYLE     => 'lctv-status-img'     ,
                        STATUS_V3_STYLE     => 'lctv-status-img'     ,
                        VIEWERS_V1_STYLE    => 'lctv-viewers-img'    ,
                        FOLLOWERS_V1_STYLE  => 'lctv-followers-img'  ,
                        LASTSTREAM_V1_STYLE => 'lctv-laststream-img' ,
                        NEXTSTREAM_V1_STYLE => 'lctv-nextstream-img' ) ;

// badge image files
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
define('STATUS_LTEXT'        , 'LiveEdu.tv'            ) ;
define('VIEWERS_LTEXT'       , 'LiveEdu.tv Viewers'    ) ;
define('FOLLOWERS_LTEXT'     , 'LiveEdu.tv Fans'       ) ;
define('LASTSTREAM_LTEXT'    , 'LiveEdu.tv Last Stream') ;
define('NEXTSTREAM_LTEXT'    , 'LiveEdu.tv Next Stream') ;

// error messages
define('INVALID_CHANNEL_MSG', 'You must specify a channel name like: '           .
                              BADGES_PHP_URL . '?channel=YOUR_LCTV_CHANNEL_NAME.') ;

?>
