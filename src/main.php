<?php
// PHP 7.0.25 >=

const DEFAULT_STRING = '1234567890abcdefghijklmnopqrstuvwxyz/*-+.,!#$%&()~|_';


$randomString = random(intval($argv[1]) ?: 8);

echo "パスワード：\n";
echo $randomString . "\n";
echo "ハッシュしたパスワード：\n";
echo password_hash($randomString, PASSWORD_DEFAULT) . "\n";

/**
 * @param int $length
 * @return bool|string
 */
function random(int $length)
{
    return substr(str_shuffle(empty($argv[2]) ? DEFAULT_STRING : $argv[2]), 0, $length);
}
