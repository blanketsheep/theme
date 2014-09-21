
<?php get_header(); ?><div id="sidebar_top">
  <?php
    $local_vars      = array();
    $local_functions = array();
    $local_functions['echo_title'] = function(){
      switch(true):
        case is_category():
          single_cat_title();
          break;
        case is_tag():
          single_tag_title();
          break;
        case is_author():
          get_the_author();
          break;
        case ( is_day() || is_month() || is_year() ):
          get_the_date();
          break;
        case is_search():
          echo get_search_query();
          break;
        default:
          echo 'FORMAT OR ARCHIVES DAYO';
      endswitch;
    };
    $local_functions['get_taxonomy_image'] = (function(){
      if( !function_exists('z_taxonomy_image_url') )
        return;
      //$image_url = '';
      //$image_url = 'http://blanketsheep.github.io/hachioji/images/photos/14454285439_cc03bbc5a6_o-hd-1920x1080.jpg';
      /*
      switch(true):
        case is_category():
          $title = single_cat_title(null,false);
          $image_url = z_taxonomy_image_url( get_cat_ID($title) );
          break;
        case is_tag():
          $title = single_tag_title(null,false);
          $prop = get_term_by('name',$title,'post_tag');
          $image_url = z_taxonomy_image_url( $prop->slug );
          break;
      endswitch;
      */
      return $image_url;
    });
  ?>
  <header id="archive_header">
    <?php $local_vars['image_src'] = ''; ?><?php $local_vars['style'] = ''; ?><?php if( is_category() ): ?><?php $local_vars['image_src'] = call_user_func( $local_functions['get_taxonomy_image'] ); ?><?php elseif( is_author() ): ?><?php endif; ?><?php if( !empty($local_vars['image_src']) ): ?><?php $local_vars['style'] = sprintf('background-image:url(%s);',$local_vars['image_src']); ?><?php endif; ?><div class="background" style="<?php echo $local_vars['style']; ?>" <?php if( empty($local_vars['image_src']) ) echo 'no-image'; ?> ><img src="<?php echo $local_vars['image_src']; ?>"></div>
    <div class="main">
      <div class="container">
        <h1>
          <?php call_user_func( $local_functions['echo_title'] ); ?>
        </h1>
        <div>
          <?php $term_description = term_description(); ?><?php if( !empty( $term_description ) ): ?><?php printf('%s', $term_description); ?><?php endif; ?>
        </div>
      </div>
    </div>
  </header>
</div>
<div id="with_sidebar">
  <div id="sidebar_left">
    <main id="archive_main" class="layout_main_position">
      <div class="container">
        <?php if( have_posts() ): ?><?php while( have_posts() ): the_post(); ?><?php get_template_part( 'content', get_post_format() ) ?><?php endwhile; ?><?php _s_paging_nav(); ?><?php else: ?><?php get_template_part( 'content', 'none' ); ?><?php endif; ?>
      </div>
    </main><?php
      unset($local_functions, $local_vars);
    ?>
  </div>
  <div id="sidebar_right"><?php dynamic_sidebar( 'sidebar_general' ) ?>
  </div>
</div><?php get_footer(); ?>