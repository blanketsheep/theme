<section class="content-none">
  <div class="container">
    <header class="header">
      <h2>
        <?php echo __( '記事が見つかりませんでした', '_s' ); ?>
      </h2>
    </header>
    <div class="main">
      <div></div>
      <?php if( current_user_can('publish_posts') ): ?>
      <div>
        <?php echo __( '管理画面の [投稿] から新規に記事を書いてください', '_s' ); ?>
      </div>
      <?php endif; ?>
      <div>
        <?php echo __( 'よろしければ、検索をお試し下さい', '_s' ); ?>
      </div>
      <?php get_search_form(); ?>
    </div>
  </div>
</section>