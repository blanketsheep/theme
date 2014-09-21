<?php

if( !function_exists('_s_shortcode_circle_image') ):
function _s_shortcode_circle_image($attrs) {
  extract(shortcode_atts(array(
    'src'  => null,
    'href' => null
  ), $attrs));
  
  $r = $GLOBALS['_s_mustache']->loadTemplate('circle_image');
  return $r->render(array(
    'src'  => $src,
    'href' => $href
  ));
}
endif;