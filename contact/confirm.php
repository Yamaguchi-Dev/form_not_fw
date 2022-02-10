<?php
require_once("form.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>お問い合わせフォーム（入力確認）</title>

	<meta name="description" content="JR千葉鉄道サービス株式会社のお問い合わせフォームです。">
	<meta name="keyword" content="JR東日本,千葉鉄道サービス,お問い合わせ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="robots" content="INDEX,FOLLOW">
	<meta name="format-detection" content="telephone=no">

	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosansjapanese.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/inquiry.css">

<script type="text/javascript">
<!--
function goNext()
{
    document.getElementById('regist_btn').disabled = true;
    document.form1.submit();
}

function goBack()
{
    document.form1.action = "form.php";
    document.getElementById("form_mode").value = "input";
    document.form1.submit();
}

function dummy()
{
}
-->
</script>
</head>
<body>
	<!--ヘッダー読み込み-->
	<header></header>
	<!--//ヘッダー読み込み//-->

	<div class="breadClumb">
		<ol>
			<li><a href="/">TOP</a></li>
			<li><a href="/contact/">お問い合わせ</a></li>
			<li>お問い合わせフォーム（入力確認）</li>
		</ol>
	</div><!--//.breadClumb-->
	<div class="main_container">
		<div class="contents_inquiry">
			<h2 class="heading02">お問い合わせフォーム<span>Contact us</span></h2>
			<form action="done.php" name="form1" method="post">
			<input type="hidden" name="form_mode" id="form_mode" value="done" />
			<input type="hidden" name="token" value="<?php echo output_data($token); ?>" />
<?php foreach ($input as $key1 => $value1) { ?>
<?php if (is_array($value1)) { ?>
<?php foreach ($value1 as $key2 => $value2) { ?>
<input type="hidden" name="input[<?php echo output_data($key1); ?>][<?php echo output_data($key2); ?>]" value="<?php echo output_data($value2); ?>" />
<?php } ?>
<?php } else { ?>
<input type="hidden" name="input[<?php echo output_data($key1); ?>]" value="<?php echo output_data($value1); ?>" />
<?php } ?>
<?php } ?>
				<div class="form_area">
					<div>
						<dl>
							<dt class="required">お名前</dt>
							<dd>
							<p><?php echo output_data($data["name1"]); ?>　<?php echo output_data($data["name2"]); ?></p>
								
							</dd>
						</dl>
					</div>
					<div>
						<dl>
							<dt class="required">フリガナ</dt>
							<dd>
							<p><?php echo output_data($data["kana1"]); ?>　<?php echo output_data($data["kana2"]); ?></p>
								
							</dd>
						</dl>
					</div>
					<div class="">
						<dl>
							<dt class="required">メールアドレス（半角）</dt>
							<dd>
							<p><?php echo output_data($data["email"]); ?></p>
							</dd>
						</dl>
					</div>
					<div class="">
						<dl>
							<dt class="required">電話番号（半角）</dt>
							<dd>
							<p><?php echo output_data($data["tel"]); ?></p>
							</dd>
						</dl>
					</div>
					<div class="eq05">
						<dl>
							<dt class="required">お問い合わせ項目</dt>
							<dd>
							<p><?php echo output_data($data["type"]); ?></p>
								
							</dd>
						</dl>
					</div>
					<div class="eq06">
						<dl>
							<dt class="required">お問い合わせ内容</dt>
							<dd>
							<p><?php echo nl2br(output_data($data["message"])); ?></p>
								
							</dd>
						</dl>
					</div>
				</div>
				<div class="btn_area">
				<p>上記内容でよろしければ、下記の送信ボタンを押してください。</p>
				<div class="col2wrap">
					<button class="btn_radius is_back" onclick="javascript:goBack(); return false;"><div>戻る</div></button>
					<button class="btn_radius" id="regist_btn" onclick="javascript:goNext(); return false;"><div>送信</div></button>
				</div>
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
