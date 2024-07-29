<!DOCTYPE html><!--htmlで書かれていることを宣言-->
<html <?php language_attributes(); ?>><!--日本語のサイトであることを指定-->
<head>
<meta charset="<?php bloginfo('charset'); ?>"/><!--エンコードがUTF-8であることを指定-->
<meta name="viewport" content="width=device-width, initial-scale=1.0 "><!--viewportの設定-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script><!--Jquary用-->
<?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="header" class="header">
  
  <div class="header-inner">

    <div class="logo-navi-wrapper-pc">
      <div class="logo-img">
        <a href="http://realestate-sample.local"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="ロゴ"/></a>
      </div>
      <div class="navi-pc">
        <ul>
          <li class="current"><a href="http://realestate-sample.local">TOP</a></li>
          <li class="current"><a href="#">お知らせ</a></li>
          <li class="current"><a href="#">プロフィール</a></li>
          <li class="current"><a href="#">レッスンについて</a></li>
          <li class="current"><a href="#">料金</a></li>
          <li class="current"><a href="#">ブログ</a></li>
          <li class="current"><a href="#">レッスン場所</a></li>
          <div class="btn-wrap"><a href="" class="btn btn--orange-2 btn-c">お問い合わせ</a></div>
        </ul>
      </div>
    </div><!--logo-navi-wrapper-pc-->

    <div class="logo-navi-wrapper-sp">
      <div class="logo-img">
        <a href="http://realestate-sample.local"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="ロゴ"/></a>
      </div>
      <div class="openbtn">
        <span></span><span></span><span></span>
      </div>
        <nav id="g-nav">
        
          <div id="g-nav-list">


            <div class="navi-sp">
              <h2>メニュー</h2>
              <ul>
                <li><a href="http://realestate-sample.local">TOP</a></li>
                <li><a href="#">お知らせ<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">プロフィール<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">レッスンについて<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">料金<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">ブログ<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">レッスン場所<i class="fa-solid fa-angle-right"></i></a></li>
              </ul>
              <div class="btn-wrap"><a href="" class="btn btn--orange-2 btn-c">お問い合わせ</a></div>
            </div>
           

          </div><!--g-nav-list-->

        </nav>
    </div>
    </div>

 
  </div><!--end header-inner-->
  
</header>

<!--パンクズ＊ヘッダー枠外に設置-->
<?php if(!is_home()): ?>

<div class="breadcrumb">
    <?php
        if(function_exists( 'yoast_breadcrumb' )){
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>');
        }
    ?>
</div>

<?php endif; ?>