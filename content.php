<article id=post-<?php the_ID(); ?> <?php post_class(); ?>>
<div class="container">
  <?php $src = ''; ?><?php if( has_post_thumbnail() ): ?><?php $attachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 384 ) ?><?php $src = esc_attr($attachment[0]); ?><?php endif; ?><div class="image" <?php if( empty($src) ) echo 'no-image'; ?>><a class="background" href="<?php echo get_permalink(); ?>" style="background-image:url(<?php echo $src; ?>);"></a></div>
  <header class="header">
    <div class="container">
      <h1>
        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
    </div>
  </header>
  <div class="main">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <?php
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
      ?>
    </div>
  </footer>
</div>
</article>