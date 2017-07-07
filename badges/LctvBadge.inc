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

require(__DIR__ . '/LctvBadgeConstants.inc') ;
require(__DIR__ . '/../api/LctvApi.inc') ;
require(__DIR__ . '/../img/v1//lctv-badges-svg-v1.inc') ;


abstract class LctvBadge
{
  /**
    * LctvApi library instance.
    *
    * @since 0.0.8
    * @access protected
    * @var LctvApi
    */
  protected $lctv_api = NULL ;

  /**
    * API api request object returned from LctvApi library request.
    *
    * @since 0.0.8
    * @access protected
    * @var stdClass
    */
  protected $api_request = NULL ;

  /**
    * Badge left-side text. (subclasas responsibility)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $badge_l_text = '' ;

  /**
    * API api request endpoint. (subclasas responsibility)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $api_endpoint = '' ;

  /**
    * liveedu.tv user with which to authenticate for API request. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $auth_user = '' ;

  /**
    * Badge style to return. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $badge_style = '' ;

  /**
    * Name of channel for which to fetch data. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $channel_name = '' ;

  /**
    * Hyperlink url to wrap image in. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $link_url = '' ;

  /**
    * true/false to show streaming title when live. (Overrides online message) (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var boolean
    */
  protected $use_title = false ;

  /**
    * Badge message if status is streaming. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $online_text = '' ;

  /**
    * Badge message if status is not streaming. (user-supplied)
    *
    * @since 0.0.8
    * @access protected
    * @var string
    */
  protected $offline_text = '' ;


  /**
    * Constructor.
    *
    * Supplied $args override class property defaults.
    * Handle auth requests and token checks on instantiation.
    *
    * @since 0.0.8
    *
    * @param array $params - user supplied badge styling parameters set to instance vars.
    *                   ->auth_user:    (Optional) liveedu.tv user with which to authenticate for API request.
    *                   ->badge_style:  (Optional) Badge style to return.
    *                   ->channel_name: (Required) Name of channel for which to fetch data.
    *                   ->link_url:     (Optional) true/false to wrap image in hyperlink to channel.
    *                   ->use_title:    (Optional) true/false to show streaming title when live. (Overrides online message.)
    *                   ->online_text:  (Optional) Badge message if status is streaming.
    *                   ->offline_text: (Optional) Badge message if status is not streaming.
    */
  function __construct($params)
  {
    /* Set instance vars. */
    $keys = array_keys(get_object_vars($this)) ;
    foreach($keys as $key) if (isset($params[$key])) $this->$key = $params[$key] ;

    if (empty($this->channel_name)) throw new Exception(INVALID_CHANNEL_MSG , 1) ;

    /* Instantiate the API wrapper. */
    try                    { $this->lctv_api = new LctvApi($this->auth_user) ; }
    catch( Exception $ex ) { die($ex->getMessage()) ;                          }

    // assert that we have authorized with the LCTV API
    if (!$this->lctv_api->is_authorized()) self::returnUnauthorizedBadge() ;
  }

  /**
  * Send per-subclass request to the liveedu.tv API.
  *
  * @since 0.0.8
  * @access protected
  */
  protected function fetchData()
  {
    // make RESTful request
    $this->api_request = $this->lctv_api->api_request($this->api_endpoint) ;

// if (isset($this->api_request->result->detail)) echo "fetchData() error=" . $this->api_request->result->detail ;

    // return API error status
    return $this->api_request !== false && !isset($this->api_request->result->detail) ;
  }

  /**
  * Return a badge indicating unauthorized API request.
  *
  * @since 0.0.8
  * @access private
  */
  private function returnUnauthorizedBadge()
  {
    header( "Content-type:image/svg+xml" );
    echo make_badge_svg_v1('' , UNAUTHORIZED_R_TEXT , RED_COLOR) ;
    die() ;
  }

  /**
  * Return a badge indicating API request error.
  *
  * @since 0.0.8
  * @access protected
  */
  protected function returnErrorBadge()
  {
    $request   = $this->api_request ;
    $result    = ($request !== false                         ) ? $request->result : NULL ;
    $detail    = ($result  !== NULL && isset($result->detail)) ? $result ->detail : NULL ;
    $error_msg = ($detail  !== NULL                          ) ? $detail : "unknown error" ;

    header( "Content-type:image/svg+xml" );
    echo make_badge_svg_v1($this->badge_l_text , $error_msg , RED_COLOR) ;
    die() ;
  }
}

class LctvBadgeStatus extends LctvBadge
{
  function __construct($badge_params)
  {
    parent::__construct($badge_params) ;

    $this->badge_l_text = STATUS_LTEXT ;
    $this->api_endpoint = STATUS_ENDPOINT . urlencode($this->channel_name) . '/' ;

    // API returned an error - this happens if user is not streaming
    if (!parent::fetchData()) $this->api_request->result->is_live = false ;

    $is_online = $this->api_request->result->is_live ;

    if      ($this->badge_style == STATUS_V2_STYLE       )
      header("Location: " . (($is_online) ? V2_ONLINE_PNG        : V2_OFFLINE_PNG       )) ;
    else if ($this->badge_style == STATUS_V3_STYLE       )
      header("Location: " . (($is_online) ? V3_ONLINE_PNG        : V3_OFFLINE_PNG       )) ;
    else if ($this->badge_style == STATUS_V3_HOVER_STYLE )
      header("Location: " . (($is_online) ? V3_ONLINE_HOVER_PNG  : V3_OFFLINE_HOVER_PNG )) ;
    else if ($this->badge_style == STATUS_V3_PUSHED_STYLE)
      header("Location: " . (($is_online) ? V3_ONLINE_PUSHED_PNG : V3_OFFLINE_PUSHED_PNG)) ;
    else /* if ($this->badge_style == STATUS_V1_STYLE) */
    {
      // display live stream title as $online_text
      $should_use_title = $this->use_title && !empty($this->api_request->result->title) ;
      $online_text      = ($should_use_title) ? $this->api_request->result->title : ONLINE_TEXT ;
      $badge_r_text     = ($is_online) ? $online_text : OFFLINE_TEXT ;
      $badge_r_color    = ($is_online) ? GREEN_COLOR  : RED_COLOR    ;

      header( "Content-type:image/svg+xml" );
      echo make_badge_svg_v1($this->badge_l_text , $badge_r_text , $badge_r_color , $this->link_url) ;
    }
  }
}

class LctvBadgeViewers extends LctvBadge
{
  function __construct($badge_params)
  {
    parent::__construct($badge_params) ;

    $this->badge_l_text = VIEWERS_LTEXT ;
    $this->api_endpoint = VIEWERS_ENDPOINT . urlencode($this->channel_name) . '/' ;

    // API returned an error - this happens if user is not streaming
    if (!parent::fetchData())
    {
      $this->api_request->result->viewers_live = 0 ;
      $this->api_request->result->is_live      = false ;
    }

    $badge_r_text  = $this->api_request->result->viewers_live ;
    $badge_r_color = ($this->api_request->result->is_live) ? GREEN_COLOR : RED_COLOR ;

    header( "Content-type:image/svg+xml" );
    echo make_badge_svg_v1($this->badge_l_text , $badge_r_text , $badge_r_color , $this->link_url) ;
  }
}

class LctvBadgeNextStream extends LctvBadge
{
  function __construct($badge_params)
  {
    parent::__construct($badge_params) ;

    $this->badge_l_text = NEXTSTREAM_LTEXT ;
    $this->api_endpoint = NEXTSTREAM_ENDPOINT ;

    parent::fetchData() ;

    // search for specified channel name among all scheduled streams
    $streams  = array_reverse($this->api_request->result->results) ;
    $stream_n = count($streams) ;
    while ($stream_n-- && $stream = $streams[$stream_n]         &&
           strpos($stream->livestream , CHANNEL_NAME) === false) ;

    $next_stream = strtotime($stream->start_time_original_timezone) ;

    if (~$stream_n)
    {
      $badge_r_text  = date('M j @ g:i a' , $next_stream) ;
      $badge_r_color = GREEN_COLOR ;
    }
    else
    {
      $badge_r_text  = NO_NEXT_STREAM_TEXT ;
      $badge_r_color = RED_COLOR ;
    }

    header("Content-type:image/svg+xml") ;
    echo make_badge_svg_v1($this->badge_l_text , $badge_r_text , $badge_r_color , $this->link_url) ;
  }
}

class LctvBadgeFollowers extends LctvBadge
{
  function __construct($badge_params)
  {
    parent::__construct($badge_params) ;

    $this->badge_l_text = FOLLOWERS_LTEXT ;
    $this->api_endpoint = FOLLOWERS_ENDPOINT ;

    if (!parent::fetchData()) { parent::returnErrorBadge() ; return ; }

    $badge_r_text = count($this->api_request->result) ;

    header("Content-type:image/svg+xml") ;
    echo make_badge_svg_v1($this->badge_l_text , $badge_r_text , GREEN_COLOR , $this->link_url) ;
  }
}

class LctvBadgeLastStream extends LctvBadge
{
  function __construct($badge_params)
  {
    parent::__construct($badge_params) ;

    $this->badge_l_text = LASTSTREAM_LTEXT ;
    $this->api_endpoint = LASTSTREAM_ENDPOINT ;

    if (!parent::fetchData()) { parent::returnErrorBadge() ; return ; }

    $streams        = $this->api_request->result ;
    $last_stream    = $streams[0] ;
    $last_stream_dt = $last_stream->creation_time ;

    if (is_array($streams) && count($streams) > 0 && !empty($last_stream_dt))
    {
      $badge_r_text  = date('M j, Y' , strtotime($last_stream_dt)) ;
      $badge_r_color = GREEN_COLOR ;
    }
    else
    {
      $badge_r_text  = NO_LAST_STREAM_TEXT ;
      $badge_r_color = RED_COLOR ;
    }

    header("Content-type:image/svg+xml") ;
    echo make_badge_svg_v1($this->badge_l_text , $badge_r_text , $badge_r_color , $this->link_url) ;
  }
}

?>
