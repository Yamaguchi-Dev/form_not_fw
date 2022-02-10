<?php
function get_mail_data($input)
{
$mail_data_arr = array();
$mail_data_arr["to"] = $input["email"];
$mail_data_arr["subject"] = "【JR千葉鉄道サービス株式会社】お問い合わせありがとうございました";
$headers = "From: info@jrcts.co.jp";

$mail_data_arr["headers"] = $headers;

$mail_data_arr["body"] =
output_data($input["name1"])."　".output_data($input["name2"])."様

この度は、JR千葉鉄道サービス株式会社へのお問い合わせありがとうございます。

以下の内容でお問い合わせを受け付けいたしました。

内容を確認の上、担当者より順次ご連絡させていただきますので
今しばらくお待ちくださいませ。　　　　　　　　　　　　

----------------------------------------------------------------

【お問い合わせ内容】

お名前：".output_data($input["name1"])."　".output_data($input["name2"])."
フリガナ：".output_data($input["kana1"])."　".output_data($input["kana2"])."
メールアドレス：".output_data($input["email"])."
電話番号：".output_data($input["tel"])."
お問い合わせ項目：".extract_data("type", output_data($input["type"]))." 

お問い合わせ内容：
".nl2br(output_data($input["message"]))."

----------------------------------------------------------------

※こちらのメールアドレス[****@jrcts.co.jp]は発信専用となっておりますので
  返信できません。ご注意ください。


================================================================

JR千葉鉄道サービス株式会社

〒260-0045 千葉市中央区弁天1丁目5番1号　オーパスビルディング10階

電話番号：043-251-5702　Fax：043-253-9095

================================================================
";

return $mail_data_arr;
}
