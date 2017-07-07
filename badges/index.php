<?php
/**
 * LiveEdu.tv Badges
 *
 * HTML badges and link buttons for liveedu.tv online status and stream stats
 *
 * @package LctvBadges\LctvBadges
 * @version 0.0.9
 * @since 0.0.8
 */


require_once('LctvBadge.inc') ;
require_once('../api/LctvApiHelpers.inc') ;


define('BADGE_STYLE'  , LctvApiHelpers::SanitizeGetParam('style'   , STATUS_V1_STYLE   )) ;
define('CHANNEL_NAME' , LctvApiHelpers::SanitizeGetParam('channel' , ''                )) ;
define('USE_TITLE'    , LctvApiHelpers::SanitizeGetParam('title'   , 'false') === 'true') ;
define('WRAP_LINK'    , LctvApiHelpers::SanitizeGetParam('link'    , true              )) ;
define('ONLINE_TEXT'  , LctvApiHelpers::SanitizeGetParam('online'  , 'LIVE'            )) ;
define('OFFLINE_TEXT' , LctvApiHelpers::SanitizeGetParam('offline' , 'offline'         )) ;

define('IS_V1_STYLE'            , in_array(BADGE_STYLE , $BADGE_V1_STYLES )) ;
define('IS_V2_STYLE'            , in_array(BADGE_STYLE , $BADGE_V2_STYLES )) ;
define('IS_V3_STYLE'            , in_array(BADGE_STYLE , $BADGE_V3_STYLES )) ;
define('IS_PRIVATE_STYLE'       , in_array(BADGE_STYLE , $BADGE_PVT_STYLES)) ;
define('IS_STATUS_V1_STYLE'     , BADGE_STYLE == STATUS_V1_STYLE    ) ;
define('IS_VIEWERS_V1_STYLE'    , BADGE_STYLE == VIEWERS_V1_STYLE   ) ;
define('IS_FOLLOWERS_V1_STYLE'  , BADGE_STYLE == FOLLOWERS_V1_STYLE ) ;
define('IS_LASTSTREAM_V1_STYLE' , BADGE_STYLE == LASTSTREAM_V1_STYLE) ;
define('IS_NEXTSTREAM_V1_STYLE' , BADGE_STYLE == NEXTSTREAM_V1_STYLE) ;
define('LINK_URL'               , ((WRAP_LINK) ? LCTV_URL . CHANNEL_NAME . '/' : '')) ;


// instantiate the badge status fetcher
$BadgeParams = array('auth_user'    => ((IS_PRIVATE_STYLE) ? CHANNEL_NAME : '') ,
                     'badge_style'  => BADGE_STYLE                              ,
                     'channel_name' => CHANNEL_NAME                             ,
                     'use_title'    => USE_TITLE                                ,
                     'link_url'     => LINK_URL                                 ,
                     'online_text'  => ONLINE_TEXT                              ,
                     'offline_text' => OFFLINE_TEXT                             ,) ;

try
{
  $BadgeLoader = ((IS_V2_STYLE           ) ? new LctvBadgeStatus    ($BadgeParams)      :
                 ((IS_V3_STYLE           ) ? new LctvBadgeStatus    ($BadgeParams)      :
                 ((IS_STATUS_V1_STYLE    ) ? new LctvBadgeStatus    ($BadgeParams)      :
                 ((IS_VIEWERS_V1_STYLE   ) ? new LctvBadgeViewers   ($BadgeParams)      :
                 ((IS_FOLLOWERS_V1_STYLE ) ? new LctvBadgeFollowers ($BadgeParams)      :
                 ((IS_LASTSTREAM_V1_STYLE) ? new LctvBadgeLastStream($BadgeParams)      :
                 ((IS_NEXTSTREAM_V1_STYLE) ? new LctvBadgeNextStream($BadgeParams)      :
                                             new LctvBadgeStatus    ($BadgeParams)))))))) ;
}
catch(Exception $ex) { die($ex->getMessage()) ; }

?>
