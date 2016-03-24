/** online-status.js
 * loads per style online status images
 * and assigns them to image idle, mouseover, mousedown states
 * expects data-channel and data-style to be set on an img with id STATUS_IMG_ID
 */


var STATUS_IMG_ID  = 'lctv-status-img' ;
var STATUS_A_ID    = 'lctv-status-a' ;
var SERVER_ROOT    = window.location.hostname ;
var STATUS_URL     = "http://" + SERVER_ROOT + '/badges' ;
var LCTV_URL       = "https://www.livecoding.tv/" ;
var CHANNEL_KEY    = '?channel=' ;
var STYLE_KEY      = '&style=' ;
var BADGE_STYLE_V3 = 'online-status-v3' ;


function loadImages()
{
  var status_img   = document.getElementById(STATUS_IMG_ID) ;
  var status_a     = document.createElement('a') ;
  var parent_node  = status_img.parentNode ;
  var channel_name = status_img.dataset.channel ;
  var badge_style  = status_img.dataset.style ;

  parent_node.replaceChild(status_a , status_img) ;
  status_a   .appendChild(status_img) ;

  status_a  .id   = STATUS_A_ID ;
  status_a  .href = LCTV_URL   + channel_name ;
  status_img.src  = STATUS_URL + CHANNEL_KEY + channel_name + STYLE_KEY + badge_style ;

  if (badge_style == BADGE_STYLE_V3)
  {

  }
}
