<?php get_header(); ?><?php $src = ''; ?>
<article id="single">
  <?php if( have_posts() ): the_post(); ?><?php if( has_post_thumbnail() ): ?><?php $attach = wp_get_attachment_image_src( get_post_thumbnail_id(), 1920 ) ?><?php $src = esc_attr($attach[0]); ?><?php endif; ?>
  <div class="container">
    <header id="single_header">
      <div class="background" style=background-image:url(<?php echo $src; ?>); <?php if( empty($src) ) echo 'no-image'; ?>></div>
      <div class="container">
        <div class="row middle layout_main_position">
          <h1>
            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
          </h1>
        </div>
        <div class="row bottom">
          <div class="item date">
            <div class="container">
              <span class="icon"></span><span class="text"><?php
                  $local_functions = array();
                  $local_vars = array();
                
                  $local_vars['published_time'] = call_user_func(function(){
                    $r = array();
                    $r['iso']  = get_the_date('c');
                    $r['text'] = get_the_date();
                    return $r;
                  });
                  $local_vars['updated_time'] = call_user_func(function(){
                    if( get_the_time('U') === get_the_modified_time('U') )
                      return array();
                    $r = array();
                    $r['iso']  = get_the_modified_date('c');
                    $r['text'] = get_the_modified_date();
                    return $r;
                  });
                ?><span class="posted_on"><?php if( true ): ?><span class="published"><time datetime="<?php esc_attr_e( $local_vars['published_time']['iso'] ) ?>"><?php esc_html_e( $local_vars['published_time']['text'] ) ?></time></span><?php endif; ?><?php if( !empty($local_vars['updated_time']) ): ?><span class="updated"><time datetime="<?php esc_attr_e( $local_vars['updated_time']['iso'] ) ?>"><?php esc_html_e( $local_vars['updated_time']['text'] ) ?></time></span><?php endif; ?></span><?php
                  unset($local_functions, $local_vars);
                ?></span>
            </div>
          </div>
          <div class="item category">
            <div class="container">
              <span class="icon"></span><span class="text"><?php if( is_page() ): ?>Page<?php else: ?><?php the_category(', '); ?><?php endif; ?></span>
            </div>
          </div>
          <div class="item count">
            <div class="container">
              <span class="icon"></span><span class="text"><?php comments_number(); ?></span>
            </div>
          </div>
          <div class="item author">
            <div class="container">
              <span class="icon"></span><span class="text"><a href="#single_author"><?php the_author_meta('display_name'); ?></a></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div id="single_main">
      <div class="container">
        <div id="single_content">
          <div class="container">
            <div id="single_image">
              <div class="container">
                <div class="image" <?php if( empty($src) ) echo 'no-image'; ?>>
                <div class="background" style="background-image:url(<?php echo $src; ?>);">
                  <img src="<?php echo $src; ?>">
                </div>
                </div>
              </div>
            </div>
            <div id="single_text">
              <?php the_content(); ?>
            </div>
            <footer id="single_footer">
              <div class="container">
                <?php if( !is_page() ): ?>
                <div id="single_author">
                  <div class="container">
                    <div class="left">
                      <?php $author_id = get_the_author_meta('ID'); ?><?php $src = get_avatar_url($author_id); ?><!--div.background style="background-image:url(<?php echo $src; ?>);"--><?php echo do_shortcode('[circle_image src="'.$src.'" href="'.get_author_posts_url($author_id).'"]'); ?><a class="text" href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author_meta('display_name'); ?></a><?php unset($author_id, $src); ?>
                    </div>
                    <div class="right">
                      <div class="container">
                        <a class="name" href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author_meta('display_name'); ?></a>
                        <div class="text">
                          <?php the_author_meta('description'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?><?php if( comments_open() || '0' != get_comments_number() ): ?><?php comments_template(); ?><?php endif; ?>
              </div>
            </footer>
          </div>
        </div>
        <aside id="single_sidebar">
          <div class="container">
            <?php dynamic_sidebar( 'sidebar_general' ) ?>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <?php endif; ?>
</article><?php get_footer(); ?>