<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><title></title></head>
<body><link rel="stylesheet" type="text/css" href="demo.css" />

  <?php
    if (!isset($_GET['title'      ]) || empty($_GET['title'      ]) ||
        !isset($_GET['badge-style']) || empty($_GET['badge-style'])  )
    { echo '</body></html>' ; return ; }

    require('../badges/LctvBadgeConstants.inc') ;

    $TITLE          = htmlspecialchars($_GET['title'      ]) ;
    $BADGE_STYLE    = htmlspecialchars($_GET['badge-style']) ;
    $BADGE_IMG_ID   = 'lctv-status-img' ;
    $IMG_CODE_ID    = 'img-pre' ;
    $SCRIPT_CODE_ID = 'script-pre' ;
  ?>

  <p><?php echo $TITLE ; ?></p>

  <div>
    Type an LCTV channel name here --> <input id="channel-name-input" type="text" />
    then press "Gimme"             --> <input id="submit-input" type="button" value="Gimme" />
                                   --> <img   id="<?php echo $BADGE_IMG_ID ; ?>"
                                              data-channel="nobody"
                                              data-style="<?php echo $BADGE_STYLE ; ?>"></img>
  </div>

  <p>To use this badge on your website:
    <ol>
      <li>Add this IMG tag to your HTML:
        <pre id="<?php echo $IMG_CODE_ID ;    ?>"></pre>
      </li>
      <li>Include this SCRIPT tag:
        <pre id="<?php echo $SCRIPT_CODE_ID ; ?>"></pre>
      </li>
    </ol>
  </p>


  <script type="text/javascript" src="<?php echo BADGE_JS_URL ; ?>"></script>
  <script type="text/javascript">

var CHANNEL_INPUT_ID = 'channel-name-input' ;
var SUBMIT_INPUT_ID  = 'submit-input' ;
var BADGE_IMG_ID     = '<?php echo $BADGE_IMG_ID ;   ?>' ;
var IMG_CODE_ID      = '<?php echo $IMG_CODE_ID ;    ?>' ;
var SCRIPT_CODE_ID   = '<?php echo $SCRIPT_CODE_ID ; ?>' ;
var BADGE_STYLE      = '<?php echo $BADGE_STYLE ;    ?>' ;
var BADGE_JS_URL     = '<?php echo BADGE_JS_URL ;    ?>' ;


var ChannelInput ;
var SubmitInput ;
var StatusImg ;
var ImgPre ;
var ScriptPre ;


function init()
{
  ChannelInput = document.getElementById(CHANNEL_INPUT_ID) ;
  SubmitInput  = document.getElementById(SUBMIT_INPUT_ID ) ;
  StatusImg    = document.getElementById(BADGE_IMG_ID    ) ;
  ImgPre       = document.getElementById(IMG_CODE_ID     ) ;
  ScriptPre    = document.getElementById(SCRIPT_CODE_ID  ) ;

  ChannelInput.onkeyup       = setEmbedCode ;
  StatusImg.style.width      = '100px' ;
  StatusImg.style.height     = '24px' ;
  StatusImg.style.visibility = 'hidden' ;
  SubmitInput.onclick        = function()
  {
    if (!ChannelInput.value) return ;

    StatusImg.dataset.channel = ChannelInput.value ;

    loadImages() ;
    StatusImg.style.visibility = 'visible' ;

    setEmbedCode() ;
  } ;

  document.title = '<?php echo $TITLE ; ?>' ;
  setEmbedCode() ;
}


function setEmbedCode()
{
  var channel_name = (ChannelInput.value) ? ChannelInput.value : 'YOUR_LCTV_CHANNEL_NAME' ;
  var img_code     = '&lt;img id="'    + BADGE_IMG_ID + '" width="100" height="24"' +
                     ' data-channel="' + channel_name                               +
                     '" data-style="'  + BADGE_STYLE                    + '" /&gt;' ;
  var script_code  = '&lt;script type="text/javascript"' +
                     ' src="' + BADGE_JS_URL             +
                     '"&gt;&lt;/script&gt;'              ;

  ImgPre.innerHTML    = img_code ;
  ScriptPre.innerHTML = script_code ;
}


init() ;

  </script>

</body></html>
