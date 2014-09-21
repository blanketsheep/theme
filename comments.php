<?php if( post_password_required() ): ?><?php return; ?><?php endif; ?>
<div id="comments">
  <?php if( have_comments() ): ?>
  <h2 class="comments_number">
    <?php comments_number(); ?>
  </h2>
  <ol>
    <?php
      wp_list_comments( array(
        'style'      => 'ol',
        'short_ping' => true,
      ) );
    ?>
  </ol>
  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
  <nav>
    <?php previous_comments_link( __( '&larr; Older Comments', '_s' ) ); ?><?php next_comments_link( __( 'Newer Comments &rarr;', '_s' ) ); ?>
  </nav>
  <?php endif; ?><?php endif; ?><?php if( !comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>
  <div>
    COMMENT IS TOJITERU
  </div>
  <?php endif; ?><?php comment_form(); ?>
</div>