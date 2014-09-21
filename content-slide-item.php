<article class="slide_item">
  <?php if( has_post_thumbnail() ): ?><?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 1920 ) ?>
  <div class="background" style="background-image:url(<?php echo esc_attr($src[0]); ?>);">
    <img src="<?php echo esc_attr($src[0]); ?>">
  </div>
  <?php endif; ?>
  <div class="main">
    <div class="container">
      <h1>
        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
      <div>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</article>