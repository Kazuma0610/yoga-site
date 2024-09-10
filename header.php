<!DOCTYPE html><!--htmlで書かれていることを宣言-->
<html <?php language_attributes(); ?>><!--日本語のサイトであることを指定-->
<head>
<meta charset="<?php bloginfo('charset'); ?>"/><!--エンコードがUTF-8であることを指定-->
<meta name="description" content="長野県下高井郡山之内でヨガをやりたいなら健康ヨガにお任せ。1レッスん1000円ヨガで健康になりましょう。出張ヨガも有りです。">
<meta name="viewport" content="width=device-width, initial-scale=1.0 "><!--viewportの設定-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script><!--Jquary用-->
<?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="header" class="header site-header">
  
  <div class="header-inner">

    <div class="logo-navi-wrapper-pc">
      <div class="logo-img">
        <h1 class="site-title">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
          </a>
        </h1>
      </div>
      <div class="navi-pc">
        <ul id="page-link">
          <li class="current"><a href="https://kenkou-yoga.com">TOP</a></li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part1">お知らせ</a>
              <?php else:?>
              <a href="#part1">お知らせ</a>
            <?php endif; ?>
          </li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part2">プロフィール</a>
              <?php else:?>
              <a href="#part2">プロフィール</a>
            <?php endif; ?>
          </li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part3">レッスンについて</a>
              <?php else:?>
              <a href="#part3">レッスンについて</a>
            <?php endif; ?>
          </li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part4">料金</a>
              <?php else:?>
              <a href="#part4">料金</a>
            <?php endif; ?>
          </li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part5">ブログ</a>
              <?php else:?>
              <a href="#part5">ブログ</a>
            <?php endif; ?>
          </li>
          <li class="current">
            <?php if ( !is_front_page() ): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part6">レッスン場所</a>
              <?php else:?>
              <a href="#part6">レッスン場所</a>
            <?php endif; ?>
          </li>
          <div class="btn-wrap"><a href="https://kenkou-yoga.com/contact/" class="btn btn--orange-2 btn-c">お問い合わせ</a></div>
        </ul>
      </div>
    </div><!--logo-navi-wrapper-pc-->

    <div class="logo-navi-wrapper-sp">
      <div class="logo-img">
        <h1 class="site-title">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>">
          </a>
        </h1>
      </div>
      <div class="openbtn site-header">
        <span></span><span></span><span></span>
      </div>
        <nav id="g-nav">
        
          <div id="g-nav-list">


            <div class="navi-sp">
              <h2>メニュー</h2>
              <ul id="page-link">
                <li class="current"><a href="https://kenkou-yoga.com">TOP</a></li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part1">お知らせ<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part1">お知らせ</a>
                  <?php endif; ?>
                </li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part2">プロフィール<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part2">プロフィール</a>
                  <?php endif; ?>
                </li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part3">レッスンについて<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part3">レッスンについて</a>
                  <?php endif; ?>
                </li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part4">料金<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part4">料金</a>
                  <?php endif; ?>
                </li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part5">ブログ<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part5">ブログ</a>
                  <?php endif; ?>
                </li>
                <li class="current">
                  <?php if ( !is_front_page() ): ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#part6">レッスン場所<i class="fa-solid fa-angle-right"></i></a>
                    <?php else:?>
                    <a href="#part6">レッスン場所</a>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="btn-wrap"><a href="https://kenkou-yoga.com/contact/" class="btn btn--orange-2 btn-c">お問い合わせ</a></div>
            </div>
           

          </div><!--g-nav-list-->

        </nav>
    </div>
    </div>

 
  </div><!--end header-inner-->
  
</header>

<!--パンクズ＊ヘッダー枠外に設置-->
<?php if(!is_home()): ?>

<div class="breadcrumb hero">
    <?php
        if(function_exists( 'yoast_breadcrumb' )){
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>');
        }
    ?>
</div>

<?php endif; ?>