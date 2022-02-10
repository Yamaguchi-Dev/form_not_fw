<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>お問い合わせフォーム（入力）</title>

	<meta name="description" content="JR千葉鉄道サービス株式会社のお問い合わせフォームです。">
	<meta name="keyword" content="JR東日本,千葉鉄道サービス,お問い合わせ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="robots" content="INDEX,FOLLOW">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosansjapanese.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/inquiry.css">

</head>
<body>
	<!--ヘッダー読み込み-->
	<header></header>
	<!--//ヘッダー読み込み//-->

	<div class="breadClumb">
		<ol>
			<li><a href="/">TOP</a></li>
			<li><a href="/contact/">お問い合わせ</a></li>
			<li>お問い合わせフォーム</li>
		</ol>
	</div><!--//.breadClumb-->
	<div class="main_container">
		<div class="contents_inquiry">
			<h2 class="heading02">お問い合わせフォーム<span>Contact us</span></h2>
			<p class="txt_lede">メールでのお問合わせは下記フォームより<br>必要項目をご入力の上お問い合わせください。</p>
			<form action="confirm.php" method="post">
				<input type="hidden" name="form_mode" value="confirm" />
				<div class="form_area">
					<div class="eq01">
						<dl>
							<dt class="required">お名前</dt>
							<dd>
								<div class="input_item"><span>姓</span><input type="text" name="input[name1]" value="<?php echo output_data($input["name1"]); ?>"></div>
								<div class="input_item"><span>名</span><input type="text" name="input[name2]" value="<?php echo output_data($input["name2"]); ?>"></div>
<?php if (!cempty($error_message["name1"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["name1"]); ?></p>
<?php } ?>
<?php if (!cempty($error_message["name2"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["name2"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq02">
						<dl>
							<dt class="required">フリガナ</dt>
							<dd>
								<div class="input_item"><span>セイ</span><input type="text" name="input[kana1]" value="<?php echo output_data($input["kana1"]); ?>"></div>
								<div class="input_item"><span>メイ</span><input type="text" name="input[kana2]" value="<?php echo output_data($input["kana2"]); ?>"></div>
<?php if (!cempty($error_message["kana1"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["kana1"]); ?></p>
<?php } ?>
<?php if (!cempty($error_message["kana2"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["kana2"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq03">
						<dl>
							<dt class="required">メールアドレス（半角）</dt>
							<dd><input type="text" name="input[email]" value="<?php echo output_data($input["email"]); ?>">
<?php if (!cempty($error_message["email"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["email"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq04">
						<dl>
							<dt class="required">電話番号（半角）</dt>
							<dd><input type="text" name="input[tel]" value="<?php echo output_data($input["tel"]); ?>">
<?php if (!cempty($error_message["tel"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["tel"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq05">
						<dl>
							<dt class="required">お問い合わせ項目</dt>
							<dd>
							
								<div class="select_arrow">
									<select name="input[type]" id="#">
										<option value="">お問い合わせ項目を選択してください</option>
<?php foreach ($master["type"] as $k => $v) { ?>
										<option value="<?php echo output_data($k); ?>"<?php if (!cempty($input["type"]) && ($input["type"] == $k)) echo " selected"; ?>><?php echo output_data($v); ?></option>
<?php } ?>
									</select>
								</div>
<?php if (!cempty($error_message["type"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["type"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq06">
						<dl>
							<dt class="required">お問い合わせ内容</dt>
							<dd>
								<textarea name="input[message]" id="#" cols="30" rows="10"><?php echo output_data($input["message"]); ?></textarea>
<?php if (!cempty($error_message["message"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["message"]); ?></p>
<?php } ?>
							</dd>
						</dl>
					</div>
					<div class="eq07">
						<div class="btn_default"><a href="/privacy/">個人情報の取り扱いに関する基本方針はこちら</a></div>
						<p class="txt_error">「個人情報の取り扱いに関する基本方針」に同意の上、チェックをお願いいたします</p>
						<div class="checkbox">
								<input type="checkbox" id="checkbox01" class="checkbox_input" name="input[agree]" value="1">
								<label for="checkbox01">※「個人情報の取り扱いに関する基本方針」についてご確認いただき、<br class="pc_item">同意の上「同意して確認画面へ」ボタンを押してください。</label></div>
<?php if (!cempty($error_message["agree"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["agree"]); ?></p>
<?php } ?>
					</div>
				</div>
				<div class="btn_area">
					<button class="btn_radius"><div>同意して確認画面へ</div></button>
				</div>
				
			</form>
		</div>
	</div>

	<!--フッター読み込み-->
	<footer></footer>
	<!--//フッター読み込み//-->

	<script src="/js/jquery-3.4.1.min.js"></script>
	<script src="/js/header.js"></script>
	<script src="/js/footer.js"></script>
	<script src="/js/main.js"></script>

</body>
</html>
