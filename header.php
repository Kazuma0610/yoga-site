<!DOCTYPE html><!--htmlで書かれていることを宣言-->
<html <?php language_attributes(); ?>><!--日本語のサイトであることを指定-->
<head>
<meta charset="<?php bloginfo('charset'); ?>"/><!--エンコードがUTF-8であることを指定-->
<meta name="viewport" content="width=device-width, initial-scale=1.0 "><!--viewportの設定-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet"><!--notoserifjpフォント-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script><!--Jquary用-->
<?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="header" class="header">
  
  <div class="header-inner">
  
  <p>ああ</p>

    <?php
      if (has_nav_menu('global_nav')) {
      wp_nav_menu(
        array(
          'theme_location' => 'global_nav',
          'container'       => 'nav',
          'container_class' => 'global-nav-wrapper',
          'menu_class' => 'global-nav',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
        )
      );
      } 
    ?>
 
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