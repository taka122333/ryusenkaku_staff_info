<?php
function wrapText($text, $lineLength) {
    $wrappedText = "";
    $line = "";

    $characters = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY); // UTF-8文字列を文字単位で分割

    foreach ($characters as $char) {
        if (mb_strwidth($line . $char) <= $lineLength * 2) { // 現在の行の幅が指定の長さを超えない場合
            $line .= $char; // 文字を現在の行に追加
        } else { // 現在の行の幅が指定の長さを超えた場合
            $wrappedText .= $line . "\n"; // 現在の行を追加して改行
            $line = $char; // 新しい行を開始
        }
    }

    $wrappedText .= $line; // 最後の行を追加
    return $wrappedText;
}