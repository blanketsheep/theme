
<?php get_header(); ?><div id="sidebar_top">
</div>
<div id="with_sidebar">
  <div id="sidebar_left">
    <div id="not_found">
      <main class="container"><?php get_template_part( 'content', 'none' ); ?></main>
    </div>
  </div>
  <div id="sidebar_right"><?php dynamic_sidebar( 'sidebar_general' ) ?>
  </div>
</div><?php get_footer(); ?>