<?php
// バリデーションチェックする関数 エラーがある場合はerror_message配列に項目をキーとしてメッセージを代入する
function check_error($input)
{
    $error_message = array();

    // 姓のバリデーションチェック
    if (cempty($input["name1"])) {
        $error_message["name1"] = "姓を入力してください";
    } elseif (!check_strlength($input["name1"], 100)) {
        $error_message["name1"] = "姓は100文字以内で入力してください";
    }

    // 名のバリデーションチェック
    if (cempty($input["name2"])) {
        $error_message["name2"] = "名を入力してください";
    } elseif (!check_strlength($input["name2"], 100)) {
        $error_message["name2"] = "名は100文字以内で入力してください";
    }

    // フリガナセイのバリデーションチェック
    if (cempty($input["kana1"])) {
        $error_message["kana1"] = "セイを入力してください";
    } elseif (!check_strlength($input["kana1"], 100)) {
        $error_message["kana1"] = "セイは100文字以内で入力してください";
    }

    // フリガナメイのバリデーションチェック
    if (cempty($input["kana2"])) {
        $error_message["kana2"] = "メイを入力してください";
    } elseif (!check_strlength($input["kana2"], 100)) {
        $error_message["kana2"] = "メイは100文字以内で入力してください";
    }

    // メールアドレスのバリデーションチェック
    if (cempty($input["email"])) {
        $error_message["email"] = "メールアドレスを入力してください";
    } elseif (!check_strlength($input["email"], 500)) {
        $error_message["email"] = "メールアドレスは500文字以内で入力してください";
    } elseif (!check_email($input["email"])) {
        $error_message["email"] = "メールアドレスの入力が不正です";
    }


    // 電話番号のバリデーションチェック
    if (cempty($input["tel"])) {
        $error_message["tel"] = "電話番号を入力してください";
    } elseif (!check_strlength($input["tel"], 500)) {
        $error_message["tel"] = "電話番号は500文字以内で入力してください";
    } elseif (!check_tel($input["tel"])) {
        $error_message["tel"] = "電話番号の入力に誤りがあります正しく入力してください";
    }

    // お問い合わせ項目のバリデーションチェック
    if (cempty($input["type"])) {
        $error_message["type"] = "お問い合わせ項目を選択してください";
    }

    // コメントのバリデーションチェック
    if (cempty($input["message"])) {
        $error_message["message"] = "コメントを入力してください";
    }

    // 同意のバリデーションチェック
    if (!check_empty_array($input, "agree")) {
        $error_message["agree"] = "「個人情報の取り扱いに関する基本方針」に同意の上、チェックをしてください";
    }

    return $error_message;
}


// 文字の長さをチェックする関数 第2引数で指定した長さより第1引数の文字列の長さが長い場合はfalseを、長さ以内であればtrueを返す
function check_strlength($str, $max_length)
{

    $str_length = mb_strlen($str);

    if ($str_length > $max_length) return false;
    return true;
}

// メールアドレスの正当性をチェックする関数 正当性があればtrueを、不正がある場合はfalseを返す
function check_email($input)
{
    // ユーザ(@より前)の正当性をチェックする正規表現を変数に代入する
    $user   = "[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+";
    // ドメイン名(@より後ろ)の正当性をチェックする正規表現を変数に代入する
    $domain = "(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9_\-][a-zA-Z0-9_\-]*[a-zA-Z0-9_\-])\.?)+";
    if (!preg_match("/^$user@$domain$/", $input) || !preg_match("/^.*@.*\..*$/", $input) || !preg_match("/^".$user."@[\w\-]+([\.][\w\-]+)+$/", $input)){
        return false;
    }
    return true;
}

// チェックボックスの必須チェックを行う関数 引数の変数に値がセットされていないまたは要素数が0だった場合falseを返しそれ以外の場合trueを返す
function check_empty_array($input, $contents)
{
    if (!isset($input[$contents])) return false;
    if (count($input[$contents]) == 0) return false;
    return true;
}

// 電話番号の正当性をチェックする関数
function check_tel($input)
{
    // 入力した電話番号の中に「-(ハイフン)」の個数が2つより多い場合、falseを返す
    if (substr_count($input, "-") > 2) return false;

    // 電話番号を「-(ハイフン)」区切りで配列に代入する
    $tel_ary = explode("-", $input);
    $tel = "";
    // foreachでループし、「-」無しの電話番号に整形する
    foreach ($tel_ary as $v) {
        $tel .= $v;
    }

    // 「-」無しの電話番号の桁数(文字数)を取得
    $len = strlen($tel);

    // 電話番号の正当性を正規表現でチェックする
    // 以下の条件に当てはまらない場合、falseを返し、それ以外はtrueを返す
    // ・すべて半角数字
    // ・上3桁が携帯電話の市外局番で且つ電話番号の桁数が11桁の場合
    // ・携帯電話以外の市外局番で且つ電話番号の桁数が10桁の場合
    if (!preg_match("/^[0-9]*$/", $tel)) return false;
    if (preg_match("/^0[5789]0/", $tel) && $len != 11) return false;
    if (!preg_match("/^0[5789]0/", $tel) && $len != 10) return false;
    return true;
}

