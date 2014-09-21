<?php
/*Template Name: Gallery*/
?><?php get_header(); ?><div id="gallery">
  <section id="gallery_map">
    <div class="container">
      <?php while( have_posts() ): the_post(); ?>
      <div class="gallery_post">
        <?php the_content(); ?>
        <div class="layout_main_position"></div>
      </div>
      <?php endwhile; ?>
    </div>
  </section>
</div><?php get_footer(); ?>