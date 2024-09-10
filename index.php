<?php get_header(); ?>

<section id="wrapper">

  <!--MV用セクション-->
  <div class="mv-pc">
    <!--<p class="mv-text-pc">
      1,000円から始める心と体を整えるヨガ
    </p>-->
    <p class="eachTextAnime">1,000円から始める心と体を整えるヨガ</p>
  </div>

  <div class="mv-sp">
    <!--<p class="mv-text-sp">
      1,000円から始める<br>心と体を整えるヨガ
    </p>-->
    <p class="eachTextAnime">1,000円から始める心と体を整えるヨガ</p>
  </div>
  <!--MV用セクション-->

    
  <main id="main" class="site-main hasu">

    <div class="contents container">

      <section id="part1">
        <div class="news-wrapper hero">
          <h2>お知らせ<span class="subtitle">INFORMATION</span></h2>

          <?php
            $args = array(
            'post_type'      => 'news', // 記事のポストタイプを指定
            'posts_per_page' => 3,      // 表示するポストの数
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : 
             echo '<div class="info-posts">';
             while ($query->have_posts()) : $query->the_post();
          ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="entry-header-news">

                <a href="<?php the_permalink(); ?>">
                  <div class="news_date">
                    <?php the_time('Y.n.j'); //1987.9.28 ?>
                  </div>
                  <div class="news_title">
                    <?php
                      if(mb_strlen($post->post_title, 'UTF-8')>20){
	                    $title= mb_substr($post->post_title, 0, 20, 'UTF-8');
	                    echo $title.'……';
                      }else{
	                    echo $post->post_title;
                      }
                    ?>
                  </div>
                </a>
                
              </div><!-- .entry-header-news -->
            </article><!-- #post-## -->

          <?php
            endwhile;
              echo '</div>';
            endif;

            // オリジナルのポストデータをリセット
            wp_reset_postdata();
          ?>

        </div>
      </section>

      <section id="part2">

        <div class="profile-wrapper-pc">
          <h2>プロフィール<span class="subtitle">ABOUT</span></h2>
          <div class="pro-content">
            <div class="pro-text">
              <h3>インストラクター</h3>
              <div class="detail-pro">
                <p>講師名<span>パルフ  綾</span></p>
              </div>
              <div class="detail-history">
                <h4>略歴</h4>
                <p>ヨガスクール入校<br>ヨガ資格取得<br>ヨガスクール開校</p>
              </div>
            </div>
            <div class="pro-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-2.png')); ?>" alt="プロフ写真">
            </div>
          </div>
          <div class="insta-content">
            <div class="insta-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-3.png')); ?>" alt="プロフ写真">
            </div>
            <div class="insta-text">
              <h3>インスタグラム</h3>
              <div class="insta-detail">
                <p>ヨガレッスンのインスタグラムです。レッスン風景やヨガに関わる事や、日常の情景等を発信しております。
                  お気軽にフォロー頂けると幸いです。
                </p>
                <div class="btn-wrap"><a href="" class="btn btn--orange-2 btn--orange-3 btn-c btn-c-2">インスタはコチラから</a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="profile-wrapper-sp">
          <h2>プロフィール<span class="subtitle">ABOUT</span></h2>
          <div class="pro-content">
            <div class="pro-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-2.png')); ?>" alt="プロフ写真">
            </div>
            <div class="pro-text">
              <h3>インストラクター</h3>
              <div class="detail-pro">
                <p>講師名<span>パルフ  綾</span></p>
              </div>
              <div class="detail-history">
                <h4>略歴</h4>
                <p>ヨガスクール入校<br>ヨガ資格取得<br>ヨガスクール開校</p>
              </div>
            </div>
          </div>
          <div class="insta-content">
            <div class="pro-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-3.png')); ?>" alt="インスタ写真">
            </div>
            <div class="insta-text">
              <h3>インスタグラム</h3>
              <div class="insta-detail">
                <p>ヨガレッスンのインスタグラムです。レッスン風景やヨガに関わる事や、日常の情景等を発信しております。
                  お気軽にフォロー頂けると幸いです。
                </p>
                <div class="btn-wrap"><a href="" class="btn btn--orange-2 btn--orange-3 btn-c btn-c-2">インスタはコチラから</a></div>
              </div>
            </div>
          </div>
        </div>

      </section>

      <section id="part3">

        <div class="lesson-wrapper-pc">
          <h2>レッスンについて<span class="subtitle">LESSON</span></h2>
          <div class="lesson-content">
            <div class="lesson-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-4.png')); ?>" alt="プロフ写真">
            </div>
            <div class="lesson-text">
              <h3>健康ヨガ</h3>
              <div class="lesson-detail">
                <p>山ノ内町での1時間レッスンから、プライベートの出張レッスンまで承っております。皆さんで楽しみながらレッスンが受けられるような環境を作れればと思います。
                </p>
                <div class="btn-wrap"><a href="https://kenkou-yoga.com/yoga" class="btn btn--orange-2 btn--orange-3 btn-c btn-c-2">詳細をみる</a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="lesson-wrapper-sp">
          <h2>レッスンについて<span class="subtitle">LESSON</span></h2>
          <div class="lesson-content">
            <div class="lesson-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-4.png')); ?>" alt="プロフ写真">
            </div>
            <div class="lesson-text">
              <h3>健康ヨガ</h3>
              <div class="lesson-detail">
                <p>山ノ内町での1時間レッスンから、プライベートの出張レッスンまで承っております。皆さんで楽しみながらレッスンが受けられるような環境を作れればと思います。
                </p>
                <div class="btn-wrap"><a href="https://kenkou-yoga.com/yoga" class="btn btn--orange-2 btn--orange-3 btn-c btn-c-2">詳細をみる</a></div>
              </div>
            </div>
          </div>
        </div>

      </section>

      <section id="part4">

        <div class="price-wrapper-pc">
          <h2>料金<span class="subtitle">PRICE</span></h2>
          <div class="price-content">
            <div class="price-text">
              <h3>1時間1,000円から気軽にレッスン可能</h3>
              <div class="price-detail">
                <p>山ノ内町での1時間レッスンは1000円（税込）からお気軽にレッスンが可能です。また10回の回数券（期限付き）やプライベートの出張レッスンも承っております。
                </p>
              </div>
            </div>
            <div class="price-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-5.png')); ?>" alt="写真">
            </div>
          </div>
        </div>

        <div class="price-wrapper-sp">
          <h2>料金<span class="subtitle">PRICE</span></h2>
          <div class="price-content">
            <div class="price-img">
              <img src="<?php echo esc_url(get_theme_file_uri('images/image-5.png')); ?>" alt="写真">
            </div>
            <div class="price-text">
              <h3>1時間1,000円から気軽にレッスン</h3>
              <div class="price-detail">
                <p>山ノ内町での1時間レッスンは1000円（税込）からお気軽にレッスンが可能です。また10回の回数券（期限付き）やプライベートの出張レッスンも承っております。
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="price-grid">
          <h3>料金表</h3>

          <table>
            <tr>
              <th>レッスン内容</th>
              <th>料金</th>
            </tr>
            <tr>
              <td class="font-normal">1回のみ</td>
              <td>1,000円（税込）</td>
            </tr>
            <tr>
              <td class="font-normal">10回の回数券<br><span>＊発行より半年間有効</span></td>
              <td>10,000円（税込）</td>
            </tr>
            <tr>
              <td class="font-normal">出張レッスン</td>
              <td>5,000円（税込）～<br><span class="small">＊場所代、遠方への交通費代は別途料金が発生します。詳細はお問合せ下さい。</span></td>
            </tr>
          </table>
          <div class="btn-wrap btn-wrap-center"><a href="https://kenkou-yoga.com/contact/" class="btn btn--orange-2 btn--orange-4 btn-c">お問い合わせ</a></div>

        </div>

      </section>

      <section id="part5">

        <div class="blog-wrapper-pc">

          <h2>ブログ<span class="subtitle">BLOG</span></h2>

          <div class="blog-content">

            <div class="blog-wrapper">
            
              <ul class="blog-flex">
                <?php
                  $args = array(
                    'posts_per_page' => 3 //表示件数の指定
                  );
                  $posts = get_posts($args);
                  foreach ($posts as $post):
                  setup_postdata($post);
                ?>
              
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <!-- タイトル表示 -->
                    <p class="blog_title">
                      <?php
                      if(mb_strlen($post->post_title, 'UTF-8')>14){
	                    $title= mb_substr($post->post_title, 0, 14, 'UTF-8');
	                    echo $title.'...';
                      }else{
	                    echo $post->post_title;
                      }
                      ?>
                    </p>
                    <!-- アイキャッチ表示 -->
                    <div class="blog_thumb">
                      <?php the_post_thumbnail('medium'); ?>
                        <span class="thumb-cat">
                          <?php
                            $categories = get_the_category();
                            if ( $categories ) {
                            echo $categories[1]->name;
                            }
                          ?>
                        </span>
                    </div>
                    <!--日付表示-->
                    <p class="blog_date"><?php the_date(); ?></p>
                  </a>
                </li>
                <?php 
                  endforeach;//ループの終了
                  wp_reset_postdata();
                ?>
              </ul>

              <div class="btn-wrap btn-wrap-center">
                <a href="https://kenkou-yoga.com/category/blog/" class="btn btn--orange-2 btn--orange-4 btn-c">ブログ一覧</a>
              </div>

            </div>

          </div>

        </div>

        <div class="blog-wrapper-sp">

          <h2>ブログ<span class="subtitle">BLOG</span></h2>

          <div class="blog-content">

            <div class="blog-wrapper">
            
              <ul class="blog-flex">
                <?php
                  $args = array(
                    'posts_per_page' => 3 //表示件数の指定
                  );
                  $posts = get_posts($args);
                  foreach ($posts as $post):
                  setup_postdata($post);
                ?>
              
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <!-- タイトル表示 -->
                    <p class="blog_title">
                      <?php
                        if(mb_strlen($post->post_title, 'UTF-8')>10){
	                      $title= mb_substr($post->post_title, 0, 10, 'UTF-8');
	                      echo $title.'...';
                        }else{
	                      echo $post->post_title;
                        }
                      ?>
                    </p>
                    <!-- アイキャッチ表示 -->
                    <div class="blog_thumb">
                      <?php the_post_thumbnail('medium'); ?>
                        <span class="thumb-cat">
                          <?php
                            $categories = get_the_category();
                            if ( $categories ) {
                            echo $categories[1]->name;
                            }
                          ?>
                        </span>
                    </div>
                    <!--日付表示-->
                    <p class="blog_date"><?php the_date(); ?></p>
                  </a>
                </li>
                <?php 
                  endforeach;//ループの終了
                  wp_reset_postdata();
                ?>
              </ul>

              <div class="btn-wrap btn-wrap-center">
                <a href="https://kenkou-yoga.com/category/blog/" class="btn btn--orange-2 btn--orange-4 btn-c">ブログ一覧</a>
              </div>

            </div>

          </div>

        </div>

      </section>

      <section id="part6">

        <div class="place-wrapper-pc">

          <h2>レッスン場所<span class="subtitle">PLACE</span></h2>

          <div class="place-content">

            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.054225889743!2d138.4107104762944!3d36.74526947079329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601df4c6a92ab651%3A0x4313bd00e66226fa!2z44CSMzgxLTA0MDEg6ZW36YeO55yM5LiL6auY5LqV6YOh5bGx44OO5YaF55S65bmz56mP77yU77yQ77yR77yV4oiS77yR!5e0!3m2!1sja!2sjp!4v1722992953081!5m2!1sja!2sjp" width="1080" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <table>
              <tr>
                <th>場所</th>
                <td>山ノ内町文化センター</td>
              </tr>
              <tr>
                <th>住所</th>
                <td>〒381-0401 長野県下高井郡山ノ内町平穏４０１５−１</td>
              </tr>
              <tr>
                <th class="center-text">お問合せ先</th>
                <td>
                  詳細はこちらからお問い合わせください
                  <div class="btn-wrap btn-wrap-margin">
                    <a href="https://kenkou-yoga.com/contact/" class="btn btn--orange-2 btn--orange-5 btn-c">お問い合わせ</a>
                  </div>
                </td>
              </tr>
            </table>

          </div>
          
        </div>

        <div class="place-wrapper-sp">

          <h2>レッスン場所<span class="subtitle">PLACE</span></h2>

          <div class="place-content">

            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.054225889743!2d138.4107104762944!3d36.74526947079329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601df4c6a92ab651%3A0x4313bd00e66226fa!2z44CSMzgxLTA0MDEg6ZW36YeO55yM5LiL6auY5LqV6YOh5bGx44OO5YaF55S65bmz56mP77yU77yQ77yR77yV4oiS77yR!5e0!3m2!1sja!2sjp!4v1722992953081!5m2!1sja!2sjp" width="1080" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <table>
              <tr>
                <th>場所</th>
                <td>山ノ内町文化センター</td>
              </tr>
              <tr>
                <th>住所</th>
                <td>〒381-0401 長野県下高井郡山ノ内町平穏４０１５−１</td>
              </tr>
              <tr>
                <th class="center-text">お問合せ先</th>
                <td>
                  詳細はこちらからお問い合わせください
                  <div class="btn-wrap btn-wrap-margin">
                    <a href="https://kenkou-yoga.com/contact/" class="btn btn--orange-2 btn--orange-5 btn-c">お問い合わせ</a>
                  </div>
                </td>
              </tr>
            </table>

          </div>

        </div>

      </section>

    </div><!--end contents-->

  </main><!--end main container-->

</section><!--wrapper-->
	              	        
<?php get_footer(); ?>