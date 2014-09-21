<?php

require_once 'vendor/autoload.php';

$GLOBALS['_s_mustache'] = null;

if( !function_exists('_s_setup') ):
function _s_setup() {
  
  $GLOBALS['_s_mustache'] = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader( dirname(__FILE__).'/mustache' )
  ));
  
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', '_s' )
  ) );
  
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );
  
  add_shortcode('circle_image', '_s_shortcode_circle_image');
  
}
endif;
add_action( 'after_setup_theme', '_s_setup' );

if( !function_exists('_s_widgets_init') ):
function _s_widgets_init() {
  
  register_widget( '_s_Writers_Icon_Widget' );
  register_widget( '_s_Recent_Posts_Widget' );
  
  $arys = array();
  $sidebar_array = array(
    'name'          => '',
    'id'            => '',
    'before_widget' => '<div id="%1$s" class="widget_item %2$s"><div class="container">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h1 class="widget-title"><span class="icon"></span><span class="text">',
    'after_title'   => '</span></h1>'
  );
  
  $arys['footer'] = array_merge( $sidebar_array, array(
    'name' => __( 'Footer', '_s' ),
    'id'   => 'sidebar_footer'
  ) );
  
  $arys['about'] = array_merge( $sidebar_array, array(
    'name' => __( 'About', '_s' ),
    'id'   => 'sidebar_about'
  ) );
  
  $arys['general'] = array_merge( $sidebar_array, array(
    'name' => __( 'General', '_s' ),
    'id'   => 'sidebar_general'
  ) );
  
  register_sidebar( $arys['footer'] );
  register_sidebar( $arys['about'] );
  register_sidebar( $arys['general'] );
  
}
endif;
add_action( 'widgets_init', '_s_widgets_init' );

function _s_scripts() {
  wp_enqueue_style( '_s-style', get_stylesheet_uri() );
  wp_enqueue_style( '_s-style-sass', get_template_directory_uri().'/css/default.css', array( 'dashicons' ) );
  
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
  
  //wp_enqueue_script( 'jquery' );
  
  wp_enqueue_script(  'theme.layout-default', get_template_directory_uri().'/js/default.js', array('jquery') );
  wp_enqueue_script( 'theme.layout-home',    get_template_directory_uri().'/js/home.js',    array('jquery') );
  
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );


function get_avatar_url($id_or_email, $size = null, $default = null, $alt = null)
{
    $image = get_avatar($id_or_email, $size, $default, $alt);
    if(preg_match("/src='(.*?)'/", $image, $match)) {
        if(isset($match[1])) {
            return $match[1];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/*
if( !function_exists('_s_list_comments') ):
function _s_list_comments($args, $comments) {
  
}
endif;
*/

require get_template_directory().'/inc/template-tags.php';
require get_template_directory().'/inc/shortcodes.php';
require get_template_directory().'/inc/widgets.php';
require get_template_directory().'/inc/user_profile.php';