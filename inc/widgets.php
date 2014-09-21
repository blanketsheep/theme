<?php

class _s_Writers_Icon_Widget extends WP_Widget {
  
  public function __construct() {
    parent::__construct(
      '_s_Writers_Icon_Widget',
      __( 'Writers Icon', '_s' ),
      array(
        'description' => __( 'Writers Icon Widget by Blanket Sheep', '_s' )
      )
    );
  }
  
  public function widget($args, $instance) {
    echo $args['before_widget'];
    
    $title = apply_filters( 'widget_title', $instance['title'] );
    if( !empty($title) )
      echo $args['before_title'] . $title . $args['after_title'];
    
    echo '<div class="items">';
    
    $users = get_users(array(
      'meta_key'     => '_s_is_writer',
      'meta_value'   => true,
      'meta_compare' => '='
    ));
    foreach($users as $user): ?>
      <article class="item">
        <div class="container">
          <div class="top">
            <?php echo do_shortcode('[circle_image src="'.get_avatar_url($user->ID).'" href="'.get_author_posts_url($user->ID).'"]'); ?>
          </div>
          <div class="main">
            <h1>
              <a href="<?php echo get_author_posts_url($user->ID); ?>"><?php echo $user->display_name; ?></a>
            </h1>
          </div>
        </div>
      </article>
    <?php endforeach;
    
    echo '</div>';
    
    echo $args['after_widget'];
  }
  
  public function form($instance) {
    
  }
  
  public function update($new_instance, $old_instance) {
    
  }
  
}

class _s_Recent_Posts_Widget extends WP_Widget {
  
  public function __construct() {
    parent::__construct(
      '_s_Recent_Posts_Widget',
      __( '最近の投稿', '_s' ),
      array(
        'description' => __( 'Recent Posts Widget by Blanket Sheep', '_s' )
      )
    );
  }
  
  public function widget($args, $instance) {
    echo $args['before_widget'];
    
    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( '最近の投稿', '_s' );
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    if( !empty($title) )
      echo $args['before_title'] . $title . $args['after_title'];
    
    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
      'posts_per_page'      => 5,
      'no_found_rows'       => true,
      'post_status'         => 'publish',
      'ignore_sticky_posts' => true
		) ) );
    
    
    ?><ul><?php
    while( $r->have_posts() ): $r->the_post(); ?>
      <li>
        <?php $item_src = null; ?>
        <?php if( has_post_thumbnail() ): ?>
          <?php $attach = wp_get_attachment_image_src( get_post_thumbnail_id(), 128 ) ?>
          <?php $item_src = esc_attr($attach[0]); ?>
        <?php endif; ?>
        <a class="container" href="<?php the_permalink(); ?>">
          <span class="left">
            <?php if( !empty($item_src) ): ?>
              <span class="image" style="background-image:url(<?php echo $item_src; ?>);">
            <?php else: ?>
              <span class="image" no-thumbnail>
            <?php endif; ?>
              <img src="<?php echo $item_src; ?>"/>
            </span>
          </span>
          <span class="right">
            <span class="title"><?php get_the_title() ? the_title() : the_ID(); ?></span>
            <span class="date"><?php echo get_the_date(); ?></span>
          </span>
        </a>
      </li>
    <?php endwhile;
    ?></ul><?php
    
    
    echo $args['after_widget'];
  }
  
  public function form($instance) {
    
  }
  
  public function update($new_instance, $old_instance) {
    
  }
  
}