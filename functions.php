<?php

// bodyclassにクラス名を追加
add_filter( 'body_class', function( $classes ){
  $classes[] = 'my-body-class';
  return $classes;
} );

//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );


/*ヘッダーのナビゲーションの登録*/
register_nav_menus([
  'global_nav' => 'グローバルナビ',
  'hamburger_nav' => 'ハンバーガーナビ',
  'footer_nav' => 'フッターナビ',
]);


//CDN形式のCSSとJSの読み込み
function add_my_files() {
  wp_enqueue_style(
    'font-notoserif',  //$handle
    '//https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap',
    array(), 'false', 'all'  //$src
  );
  wp_enqueue_style(
  'fontawesome4.7',  //$handle
  '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'  //$src
  );
  wp_enqueue_style(
    'fontawesome5.15.4',  //$handle
    '//use.fontawesome.com/releases/v5.15.4/css/all.css'  //$src
    );
  wp_enqueue_style(
    'fontawesome6.5.1',  //$handle
    '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'  //$src
    );
  wp_enqueue_script(
    'jquery3.1.1',  //$handle
    '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',  //$src
    array(),  //$deps
    null,  //$ver
    true  //$in_footer
    );
}
add_action( 'wp_enqueue_scripts', 'add_my_files' );


//CSSとJSの読み込み
function my_enqueue_scripts()
{
  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style('index-style', get_template_directory_uri() . '/css/index.css', array(), $version);
  wp_enqueue_style('singular-style', get_template_directory_uri() . '/css/singular.css', array(), $version);
  wp_enqueue_style('content-style', get_template_directory_uri() . '/css/content.css', array(), $version);
  wp_enqueue_style('archive-style', get_template_directory_uri() . '/css/archive.css', array(), $version);
  wp_enqueue_style('comments-style', get_template_directory_uri() . '/css/comments.css', array(), $version);
  wp_enqueue_style('404-style', get_template_directory_uri() . '/css/404.css', array(), $version);
  wp_enqueue_style('search-form-style', get_template_directory_uri() . '/css/searchform.css', array(), $version);
  wp_enqueue_style('search-style', get_template_directory_uri() . '/css/search.css', array(), $version);
  wp_enqueue_style('sidebar-style', get_template_directory_uri() . '/css/sidebar.css', array(), $version);
  wp_enqueue_style('header-style', get_template_directory_uri() . '/css/header.css', array(), $version);
  wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/footer.css', array(), $version);
  wp_enqueue_style('button-style', get_template_directory_uri() . '/css/button.css', array(), $version);
  wp_enqueue_style('navi-style', get_template_directory_uri() . '/css/navi.css', array(), $version);
  wp_enqueue_script('navi-script', get_template_directory_uri() . '/js/navi.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



function post_has_archive($args, $post_type){
  if('post'== $post_type){
    $args['rewrite']=true;
    $args ["label"] = '記事一覧'; /*「投稿」のラベル名 */
    $args['has_archive']='post'; /* アーカイブにつけるスラッグ名 */
  }
  return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
} elseif (is_tax()) {
    $title = single_term_title('',false);
} elseif (is_post_type_archive() ){
  $title = post_type_archive_title('',false);
} elseif (is_date()) {
    $title = get_the_time('Y年n月');
} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
} else {

}
  return $title;
});


//-----------------------------------------------------
// 検索対象にカテゴリやタグを含める
//-----------------------------------------------------
function custom_search($search, $wp_query) {
  global $wpdb;

  //検索ページ以外
  if (!$wp_query->is_search)
  return $search;

  if (!isset($wp_query->query_vars))
  return $search;

  $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
  if ( count($search_words) > 0 ) {
      $search = '';
      foreach ( $search_words as $word ) {
          if ( !empty($word) ) {
              $search_word = $wpdb-> _escape("%{$word}%");
              $search .= " AND (
                      {$wpdb->posts}.post_title LIKE '{$search_word}'
                      OR {$wpdb->posts}.post_content LIKE '{$search_word}'
          /*タグ名・カテゴリ名を検索対象に含める記述 start*/
                      OR {$wpdb->posts}.ID IN (
                          SELECT distinct r.object_id
                          FROM {$wpdb->term_relationships} AS r
                          INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
                          INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                          WHERE t.name LIKE '{$search_word}'
                      OR t.slug LIKE '{$search_word}'
                      OR tt.description LIKE '{$search_word}'
                      )
        /*タグ名・カテゴリ名を検索対象に含める記述 end*/
              ) ";
          }
      }
  }

  return $search;
}
add_filter('posts_search','custom_search', 10, 2);


/*サイドバーのウィジェット登録*/
if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'sidebar',
    'description' => 'サイドバーウィジェット',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="side-title">',
    'after_title' => '</h3>'
 ));
}



/*お知らせの設定*/
function create_post_type_news(){
  register_post_type( 
   'news',
   array(
    'labels' => array(
     'name' => 'お知らせ'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title','editor','thumbnail','author'),
    'show_in_rest' => true,
   )
  );
 }
 add_action( 'init', 'create_post_type_news' );

function shortcode_news_list() {
  global $post;
  $args = array(
   'posts_per_page' => 3,  // 一覧に表示させる件数
   'post_type' => 'news',  // お知らせのスラッグ
   'post_status' => 'publish'
  );
  $the_query = new WP_Query( $args );
  // お知らせ一覧用HTMLコード作成
  if ( $the_query->have_posts() ) {
   $html .= '<ul>';
   while ( $the_query->have_posts() ) :
   $the_query->the_post();
   $url = get_permalink();
   $title = get_the_title();
   $date = get_the_date('Y/m/d');
   $html .= '<li>';
   $html .= '<a href="'.$url.'">';
   $html .= '<p class="news_date">'.$date.'</p>';
   $html .= '<div class="news_title">'.$title.'</div>';
   $html .= '</a></li>';
   endwhile;
   $html .= '</ul>';
  }
  return $html;
 }
 add_shortcode("news_list", "shortcode_news_list");


 //ページネーションの設定
 function pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  // 現在のページ数
  global $paged;
  if(empty($paged)) {
    $paged = 1;
  }

  // 全ページ数
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }

  // ページ数が2ぺージ以上の場合のみ、ページネーションを表示
  if(1 != $pages) {
    echo '<div class="pagination">';
    echo '<ul>';
    // 1ページ目でなければ、「前のページ」リンクを表示
    if($paged > 1) {
      echo '<li class="prev"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '"><i class="fa-regular fa-circle-left"></i></a></li>';
    }

    // ページ番号を表示（現在のページはリンクにしない）
    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
        if ($paged == $i) {
          echo '<li class="active">' .$i. '</li>';
        } else {
          echo '<li><a href="' . esc_url(get_pagenum_link($i)) . '">' .$i. '</a></li>';
        }
      }
    }

    // 最終ページでなければ、「次のページ」リンクを表示
    if ($paged < $pages) {
      echo '<li class="next"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '"><i class="fa-regular fa-circle-right"></i></a></li>';
    }
    echo '</ul>';
    echo '</div>';
  }
}