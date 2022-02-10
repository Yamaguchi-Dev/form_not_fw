<?php
// エラーの出力
// 0:表示させない,1:表示させる
ini_set('display_errors', 1);

// エラーの種類
error_reporting(E_ALL);

// 正規表現のエンコーティング
mb_regex_encoding(ENC_TYPE);

// プログラム側のエンコーティング
mb_internal_encoding(ENC_TYPE);

// HTTP側(出力画面上)のエンコーティング
mb_http_output(OUT_ENC_TYPE);

// 出力バッファリングが無効のとき出力のバッファリングを有効にする
// ハンドラ一覧の配列から'mb_output_handler'を探し,結果がfalseであるとき出力バッファリングは無効
if (array_search('mb_output_handler', ob_list_handlers()) == FALSE) {
    ob_start('mb_output_handler');
}

// HTTP側(出力画面上)のエンコードで受け取ったPOST,GETをプログラム側のエンコードに変換する
mb_convert_variables(ENC_TYPE, OUT_ENC_TYPE, $_POST, $_GET);

?>
