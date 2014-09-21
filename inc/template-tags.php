<?php

/*
if( !function_exists('_s_posted_on') ):
function _s_posted_on() {
  
}
endif;
*/

if( !function_exists('_s_paging_nav') ):

function _s_paging_nav() {
  if( $GLOBALS['wp_query']->max_num_pages < 2 )
    return;
  ?>
    <nav class="paging_nav">
      <div class="container">
        <div class="item"><?php if( get_previous_posts_link() ) previous_posts_link(__( '前のページ', '_s' )); ?></div>
        <div class="item"><?php if( get_next_posts_link() ) next_posts_link(__( '次のページ', '_s' )); ?></div>
      </div>
    </nav>
  <?php
}

endif;

/*
if( !function_exists('_s_post_nav') ):

funciton _s_post_nav() {
  
}

endif;
*/