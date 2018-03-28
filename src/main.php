<?php
/**
 * requires
 * PHP: >= 7.0.25
 **/

const DEFAULT_STRINGS = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/-+.,!?#$%&()~|_';
const DEFAULT_STRING_RENGTH = 8;


if (!empty($argv[2])) {
    // 第2引数を設定していればハッシュ元文字列を指定
    $string = $argv[2];
} else {
    // 設定していなければランダム文字列を生成
    // パスワード化文字列パターン設定
    $stringPattern = empty($argv[3]) ? DEFAULT_STRINGS : $argv[3];
    // 第1引数を設定していればランダム生成する文字列の長さを第一引数にする
    $stringLength = intval($argv[1]) ?: DEFAULT_STRING_RENGTH
    $string = random($stringLength, $stringPattern);
}

echo "パスワード：\n";
echo $string . "\n";
echo "ハッシュしたパスワード：\n";
echo password_hash($string, PASSWORD_DEFAULT) . "\n";

/**
 * @param int $length
 * @return bool|string
 */
function random(int $length, string $pattern)
{
    return substr(str_shuffle($pattern), 0, $length);
}
