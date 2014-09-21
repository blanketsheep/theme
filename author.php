<?php get_header(); ?><?php $author_id = get_the_author_meta('ID'); ?>
<div id="author">
  <header id="author_header">
    <div class="top">
      <?php $src = get_avatar_url($author_id, 1920); ?>
      <div class="background" style="background-image:url(<?php echo $src; ?>);">
        <img src="<?php echo $src; ?>">
      </div>
    </div>
    <div class="bottom layout_main_position">
      <div class="container">
        <div class="icon">
          <?php echo do_shortcode('[circle_image src="'.get_avatar_url($author_id).'" href="'.get_author_posts_url($author_id).'"]'); ?>
        </div>
        <div class="text">
          <h1>
            <?php the_author_meta('display_name') ?>
          </h1>
        </div>
      </div>
    </div>
  </header>
  <main id="author_main">
    <div class="container">
      <div class="text">
        <?php the_author_meta('description'); ?>
      </div>
    </div>
  </main>
  <div id="author_posts">
    <div class="container">
      <?php if( have_posts() ): ?><?php while( have_posts() ): the_post(); ?><?php get_template_part( 'content', get_post_format() ) ?><?php endwhile; ?><?php _s_paging_nav(); ?><?php else: ?><?php get_template_part( 'content', 'none' ); ?><?php endif; ?>
    </div>
  </div>
</div><?php get_footer(); ?>