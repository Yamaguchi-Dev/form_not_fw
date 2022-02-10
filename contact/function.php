<?php
// SQLインジェクション対策のため文字列のエスケープ処理を行う関数
function esc_sql($str)
{
    return mysql_escape_string($str);
}

// クロスサイドスクリプション対策のため文字列のエスケープ処理を行う関数
function esc_html($str, $escape = ENT_QUOTES, $encode = ENC_TYPE)
{
    return htmlspecialchars($str, $escape, $encode);
}

// 変数の値の空チェックを行う関数
// 変数の値が以下の場合trueを返し、当てはまらない場合falseを返す
// ・入っていない場合
// ・NULLの場合
// ・文字列の長さが無い場合
function cempty(&$value)
{
    if (!isset($value)) return true;
    if ($value === null) return true;
    if (!mb_strlen($value)) return true;
    return false;
}

// HTMLのタブ内で文字列を出力する場合に記述を少なくするため
// 変数に文字列が代入されていた場合文字列のエスケープ処理を行う関数
function output_data(&$str = "")
{
    if (cempty($str)) {
        return $str;
    }
    return esc_html($str);
}

// デバッグコード出力
function ad(&$ary = "")
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
