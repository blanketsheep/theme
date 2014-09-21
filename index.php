<?php get_header(); ?><div id="index">
  <main class="container"><?php if( have_posts() ): ?><?php while( have_posts() ): the_post(); ?><?php get_template_part( 'content', get_post_format() ) ?><?php endwhile; ?><?php _s_paging_nav(); ?><?php else: ?><?php get_template_part( 'content', 'none' ); ?><?php endif; ?></main>
</div><?php get_footer(); ?>