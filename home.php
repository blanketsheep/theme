
<?php get_header(); ?><div id="sidebar_top">
  <?php
    $featured_query = new WP_Query( array(
      'meta_key'   => '_is_ns_featured_post',
      'meta_value' => 'yes'
    ) );
  ?>
  <section id="home_slide_wrapper">
    <div id="home_slide">
      <div class="background"></div>
      <div id="home_slide_items">
        <?php while( $featured_query->have_posts() ): $featured_query->the_post(); ?><?php get_template_part( 'content', 'slide-item' ); ?><?php endwhile; ?><?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
</div>
<div id="with_sidebar">
  <div id="sidebar_left">
    <div id="home">
      <section id="home_articles" class="layout_main_position">
        <main class="container"><?php if( have_posts() ): ?><?php while( have_posts() ): the_post(); ?><?php get_template_part( 'content', get_post_format() ) ?><?php endwhile; ?><?php _s_paging_nav(); ?><?php else: ?><?php get_template_part( 'content', 'none' ); ?><?php endif; ?></main>
      </section>
    </div>
    <?php
      unset($featured_query);
    ?>
  </div>
  <div id="sidebar_right"><?php dynamic_sidebar( 'sidebar_general' ) ?>
  </div>
</div><?php get_footer(); ?>