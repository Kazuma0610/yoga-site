<?php

// 変数の初期化
$page_flag = 0;
$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}

if( !empty($clean['btn_confirm']) ) {

  $error = validation($clean);

	if( empty($error) ) {
		$page_flag = 1;
	}

} elseif( !empty($clean['btn_submit']) ) {
  
$page_flag = 2;

// 変数とタイムゾーンを初期化
$header = null;
$auto_reply_subject = null;
$auto_reply_text = null;
$admin_reply_subject = null;
$admin_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

// ヘッダー情報を設定
$header = "MIME-Version: 1.0\n";
$header .= "From:". mb_encode_mimeheader("健康ヨガ") . "<mail@kenkou-yoga.com>\n";
$header .= "Reply-To:". mb_encode_mimeheader("健康ヨガ") . "<mail@kenkou-yoga.com>\n";


// 件名を設定
$auto_reply_subject = 'お問い合わせありがとうございます。';

// 本文を設定
$auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。
下記の内容でお問い合わせを受け付けました。\n\n";
$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
$auto_reply_text .= "氏名：" . $clean['your_name'] . "\n";
$auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
if( $_POST['select'] === "1" ){
  $auto_reply_text .= "お問合せ項目：ヨガレッスンについて\n";
} elseif ( $_POST['select'] === "2" ){
  $auto_reply_text .= "お問合せ項目：出張ヨガレッスンについて\n";
} elseif ( $_POST['select'] === "3" ){
  $auto_reply_text .= "お問合せ項目：その他\n";
}
$auto_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
$auto_reply_text .= "健康ヨガ";

// メール送信
mb_send_mail( $clean['email'], $auto_reply_subject,
$auto_reply_text, $header);

// 運営側へ送るメールの件名
$admin_reply_subject = "お問い合わせを受け付けました";
// 本文を設定
$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") .
"\n";
$admin_reply_text .= "氏名：" . $clean['your_name'] . "\n";
$admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
if( $_POST['select'] === "1" ){
  $admin_reply_text .= "お問合せ項目：ヨガレッスンについて\n";
} elseif ( $_POST['select'] === "2" ){
  $admin_reply_text .= "お問合せ項目：出張ヨガレッスンについて\n";
} elseif ( $_POST['select'] === "3" ){
  $admin_reply_text .= "お問合せ項目：その他\n";
}
$admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
// 運営側へメール送信
mb_send_mail( 'mail@kenkou-yoga.com', $admin_reply_subject,
$admin_reply_text, $header);
}

function validation($data) {

	$error = array();

	// 氏名のバリデーション
  if( empty($data['your_name']) ) {
    $error[] = "「氏名」は必ず入力してください";
  } elseif( 20 < mb_strlen($data['your_name']) ) {
    $error[] = "「氏名」は20文字以内で入力してください";
  }

  // メールアドレスのバリデーション
  if( empty($data['email']) ) {
    $error[] = "「メールアドレス」は必ず入力してください";
  } elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
    $error[] = "「メールアドレス」は正しい形式で入力してください。";
  }

  // お問合せ項目のバリデーション
  if( empty($data['select']) ) {
    $error[] = "「お問合せ項目」は必ず選択してください";
  } elseif( (int)$data['select'] < 1 || 3 < (int)$data['select'] ) {
    $error[] = "「お問合せ項目」は必ず選択してください";
  }

  // 問い合わせ内容のバリデーション
  if( empty($data['contact']) ) {
    $error[] = "「お問い合わせ内容」は必ず入力してください。";
  } 

  // プライバシーポリシー同意のバリデーション
  if( empty($data['agreement']) ) {
    $error[] = "プライバシーポリシーをご確認ください。";
  } elseif( (int)$data['agreement'] !== 1 ) {
    $error[] = "プライバシーポリシーをご確認ください。";
  }

	return $error;
}

?>

<?php get_header(); ?>

<section id="wrapper">
    
  <main id="main" class="site-main">

    <div class="contents container">
      

      <div class="contact-wrapper">
        <h2 class="heading06" data-en="Contact">お問い合せ</h2>

          <div class="contact-form">

            <?php if( $page_flag === 1 ): ?>

              <form method="post" action="">
              <p class="form-check">確認画面</p>
	              <div class="element_wrap">
		              <label>氏名</label>
		                <p><?php echo $clean['your_name']; ?></p>
	              </div>
	              <div class="element_wrap">
		              <label>メールアドレス</label>
		                <p><?php echo $clean['email']; ?></p>
	              </div>
                <div class="element_wrap">
		              <label>お問合せ項目</label>
		               <p>
                     <?php if( $clean['select'] === "1" ){ echo 'ヨガレッスンについて'; }
		                  elseif( $clean['select'] === "2" ){ echo '出張ヨガレッスンについて'; }
		                  elseif( $clean['select'] === "3" ){ echo 'その他'; } ?>
                   </p>
	              </div>
	              <div class="element_wrap">
		              <label>お問い合わせ内容</label>
		              <p><?php echo nl2br($clean['contact']); ?></p>
	              </div>
	              <div class="element_wrap">
		              <label>プライバシーポリシーに同意する</label>
		              <p><?php if( $clean['agreement'] === "1" ){ echo '同意する'; }
		                 else{ echo '同意しない'; } ?></p>
	              </div>
	              <input type="submit" name="btn_back" value="戻る">
	              <input type="submit" name="btn_submit" value="送信">
	              <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
	              <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
                <input type="hidden" name="select" value="<?php echo $clean['select']; ?>">
	              <input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
	              <input type="hidden" name="agreement" value="<?php echo $clean['agreement']; ?>">
              </form>
            
            <?php elseif( $page_flag === 2 ): ?>

              <p class="done_text">送信が完了しました。</p>
              <p class="done_text">自動送信メールが送られます。<br>担当者からは3営業日以内にご連絡いたします。</p>

              <form method="post" action="">
	              <input type="submit" name="btn_back_top" value="入力画面に戻る">
              </form>

            <?php else: ?>

              <?php if( !empty($error) ): ?>
	              <ul class="error_list">
	              <?php foreach( $error as $value ): ?>
		              <li><?php echo $value; ?></li>
	              <?php endforeach; ?>
	              </ul>
              <?php endif; ?>

              <form method="post" action="">
                <div class="form-text">
                  <p>下記の必須項目を記入して送信ください。担当者からご連絡致します。＊GMAILをお使いのお客様でメールが届いてない方は、迷惑メールにいってしまっているケースがあります。その際は迷惑メールから迷惑メールでないボタンを押してください。</p>
                </div>
                <div class="element_wrap">
                  <label>氏名<span class="required">必須</sapn></label>
                  <input type="text" name="your_name" value="<?php if(!empty($clean['your_name']) ){ echo $clean['your_name']; } ?>">
                </div>
                <div class="element_wrap">
                  <label>メールアドレス<span class="required">必須</sapn></label>
                  <input type="text" name="email" value="<?php if(!empty($clean['email']) ){ echo $clean['email']; } ?>">
                </div>
                <div class="element_wrap">
                  <label>お問合せ項目<span class="required">必須</sapn></label>
                  <select name="select">
                    <option value="">項目を選択してください</option>
                    <option value="1" <?php if( !empty($clean['select']) && $clean['select'] === "1" ){ echo 'selected'; } ?>>ヨガレッスンについて</option>
                    <option value="2" <?php if( !empty($clean['select']) && $clean['select'] === "2" ){ echo 'selected'; } ?>>出張ヨガレッスンについて</option>
                    <option value="3" <?php if( !empty($clean['select']) && $clean['select'] === "3" ){ echo 'selected'; } ?>>その他</option>
                  </select>
                </div>
                <div class="element_wrap">
                  <label>お問い合わせ内容<span class="required">必須</sapn></label>
                  <textarea name="contact"><?php if( !empty($clean['contact']) ){ echo $clean['contact']; } ?></textarea>
                </div>
                <div class="element_wrap">
                  <label for="agreement"><input id="agreement" type="checkbox"
                  name="agreement" value="1" <?php if( !empty($clean['agreement']) && $clean['agreement'] === "1" ){ echo 'checked'; } ?>><a href="https://kenkou-yoga.com/privacy-policy/" target="blank" rel="noopener" >プライバシーポリシー</a>に同意する<br><span class="required">必須</sapn></label>
                </div>
                <input type="submit" name="btn_confirm" value="入力内容を確認する">
              </form>

            <?php endif; ?>

          </div>

        

      </div>


    </div><!--end contents-->

  </main><!--end main container-->

</section><!--wrapper-->
	              	        
<?php get_footer(); ?>