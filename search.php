<?php get_header(); ?>

<section id="wrapper">
    
  <main id="main" class="container two-columns site-main">

    <div class="contents">

    <?php if (have_posts()): ?>
      <?php if (!$_GET['s']) { ?>
        <p>検索キーワードが未入力です<p>

      <?php } else { ?>
        <h1 class="page-title">
          「<?php echo esc_html($_GET['s']); ?>」の検索結果：<?php echo $wp_query->found_posts; ?>件
        </h1>
    <div class="archive-flex">
        
        <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/search-content' );  
          ?>

          

          <?php endwhile; ?>

      <?php } ?>
      <?php else: ?>
        <div class="no-search">
          <p class="no-search-p">検索されたキーワードに一致する物はありませんでした</p>
          <?php // トップに戻るボタン ?>
            <a class="top-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップに戻る</a>
          <?php get_search_form(); // 検索フォーム ?>
        </div>


      <?php endif; ?>
    
    </div>

      <?php
            if (function_exists("pagination")) {
              pagination($wp_query->max_num_pages);
            }
        ?>

    </div><!--end contents-->

    <?php get_sidebar(); ?>

  </main><!--end main container-->

</section><!--wrapper-->
	              	        
<?php get_footer(); ?>