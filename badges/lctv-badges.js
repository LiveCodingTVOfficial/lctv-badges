/** lctv-badges.js
 * loads per-style badge images into per-style placeholder img tags
 * also assigns mouseover and mousedown images for "flip" badge styles
 * expects 'data-channel' param to be set on an img with a canonical per-style id
 * optionally wraps image in anchor if 'data-link' param exists and is true
 */


var BADGES_ROOT_URL        = "https://codiad-billauger.rhcloud.com" ;
var BADGES_IMG_URL         = BADGES_ROOT_URL + '/img/' ;
var BADGES_PHP_URL         = BADGES_ROOT_URL + '/badges/' ;
var LCTV_URL               = "https://www.liveedu.tv/" ;
var CHANNEL_KEY            = 'channel' ;
var STYLE_KEY              = 'style' ;
var STATUS_V3_STYLE        = 'online-status-v3' ;
var BADGE_FLIP_STYLES      = [ STATUS_V3_STYLE ] ;
var BADGES_DATA            = {} ;
var BADGE_IMG_ID_KEY       = 'badge-img-id'
var BADGE_IMGS_KEY         = 'badge-img-urls'
var ONLINE_IDLE_IMG_KEY    = 'online-img' ;
var ONLINE_HOVER_IMG_KEY   = 'online-hover-img' ;
var ONLINE_PUSHED_IMG_KEY  = 'online-pushed-img' ;
var OFFLINE_IDLE_IMG_KEY   = 'offline-img' ;
var OFFLINE_HOVER_IMG_KEY  = 'offline-hover-img' ;
var OFFLINE_PUSHED_IMG_KEY = 'offline-pushed-img' ;

BADGE_FLIP_STYLES.forEach(function(flip_style)
{
  var badge_data                     = {} ;
  var badge_urls                     = {} ;
  BADGES_DATA[flip_style]            = badge_data ;
  badge_data[BADGE_IMG_ID_KEY]       = 'lctv-status-img' ;
  badge_data[BADGE_IMGS_KEY  ]       = badge_urls ;
  badge_urls[ONLINE_IDLE_IMG_KEY   ] = BADGES_IMG_URL + 'v3/lctv-online.png'         ;
  badge_urls[ONLINE_HOVER_IMG_KEY  ] = BADGES_IMG_URL + 'v3/lctv-online-hover.png'   ;
  badge_urls[ONLINE_PUSHED_IMG_KEY ] = BADGES_IMG_URL + 'v3/lctv-online-pushed.png'  ;
  badge_urls[OFFLINE_IDLE_IMG_KEY  ] = BADGES_IMG_URL + 'v3/lctv-offline.png'        ;
  badge_urls[OFFLINE_HOVER_IMG_KEY ] = BADGES_IMG_URL + 'v3/lctv-offline-hover.png'  ;
  badge_urls[OFFLINE_PUSHED_IMG_KEY] = BADGES_IMG_URL + 'v3/lctv-offline-pushed.png' ;
}) ;


function loadImages()
{
  Object.keys(BADGES_DATA).forEach(function(badge_style)
  {
    var badge_img_id = BADGES_DATA[badge_style][BADGE_IMG_ID_KEY] ;
    var badge_img    = document.getElementById(badge_img_id) ;

    if (!badge_img) return ;

    setBadgeUrl(badge_img , badge_style) ;
    setFlipUrls(badge_img , badge_style) ;
    wrapLink   (badge_img) ;
  }) ;
}

function setBadgeUrl(badge_img , badge_style)
{
  var channel_name  = badge_img.dataset.channel ;
  var style_param   = '?' + STYLE_KEY   + '=' + badge_style ;
  var channel_param = '&' + CHANNEL_KEY + '=' + channel_name ;

  badge_img.src = BADGES_PHP_URL + style_param + channel_param ;
}

function setFlipUrls(badge_img , badge_style)
{
  var is_flip_style = !!(~BADGE_FLIP_STYLES.indexOf(badge_style)) ;

  if (!is_flip_style) return ;

  // preload flip images
  Object.keys(BADGES_DATA[badge_style][BADGE_IMGS_KEY]).forEach(function(img_key)
  {
    var img_url   = BADGES_DATA[badge_style][BADGE_IMGS_KEY][img_key] ;
    var head      = document.getElementsByTagName('head')[0] ;
    var badge_img = document.createElement('link') ;

    badge_img.setAttribute('rel' , 'prefetch') ;
    badge_img.setAttribute('href' , img_url) ;
    head.appendChild(badge_img) ;
  }) ;

  // attach event handlers
  badge_img.onmouseover  = function() { setBadgeUrl(badge_img , badge_style + '-hover' ) ; }
  badge_img.onmouseleave = function() { setBadgeUrl(badge_img , badge_style            ) ; }
  badge_img.onmousedown  = function() { setBadgeUrl(badge_img , badge_style + '-pushed') ; }
  badge_img.onmouseup    = function() { setBadgeUrl(badge_img , badge_style + '-hover' ) ; }
}

function wrapLink(badge_img)
{
  var channel_name = badge_img.dataset.channel ;
  var wrap_link    = badge_img.dataset.link !== 'false' ;
  var badge_a      = document.createElement('a') ;
  badge_a   .id    = badge_img.id.substring(0 , badge_img.id.length - 3) + 'a' ;
  badge_a   .href  = LCTV_URL + channel_name ;

  if (!wrap_link) return ;

  badge_img.parentNode.replaceChild(badge_a , badge_img) ;
  badge_a             .appendChild (badge_img) ;
}


// disable auto-load when included from demos
if (!(~BADGES_ROOT_URL.indexOf(window.location.hostname)))
  window.onload = function() { loadImages() ; window.setInterval(loadImages , 60000) ; } ;
