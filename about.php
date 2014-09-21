<?php
/*Template Name: About*/
?><?php get_header(); ?><div id="about">
  <section id="about_whats">
    <div class="background">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51868.24730395017!2d139.2958473!3d35.65814985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60191eb9b729f437%3A0x27d80e549d4e1c62!2z5p2x5Lqs6YO95YWr546L5a2Q5biC!5e0!3m2!1sja!2s!4v1403992865051" frameborder="0" style="border:0;"></iframe>
    </div>
    <div class="main">
      <div class="content">
        <header>
          <img src="">
        </header>
        <?php while( have_posts() ): the_post(); ?>
        <div class="text">
          <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <section id="about_widgets" class="layout_main_position">
    <div class="container">
      <?php dynamic_sidebar( 'sidebar_about' ) ?>
    </div>
  </section>
</div><?php get_footer(); ?>