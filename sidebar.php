<aside id="sidebar" class="sidebar">

    <!--<section class="author">
      <img src="<?php echo esc_url(get_theme_file_uri('images/SAMPLE.png')); ?>" alt="テキストテキストテキスト">
      <h3 class="side-title">SAMPLE</h3>
      <p class="profile">
        プロフィールテキストテキストテキストテキストテキストテキストテキスト
        テキストテキストテキストテキストテキストテキストテキストテキストテキスト
        テキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
    </section>-->

    <?php get_search_form(); ?>

    <section class="archive">
      <?php dynamic_sidebar('sidebar'); ?>
      <div class="news-side">
        <h2><i class="fa-solid fa-circle-info"></i>最新のお知らせ</h2>
        <?php echo do_shortcode('[news_list]'); ?>
      </div>
    </section>
    
</aside>