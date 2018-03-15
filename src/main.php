<?php
// PHP 7.0.25 >=

const DEFAULT_STRING = '1234567890abcdefghijklmnopqrstuvwxyz/*-+.,!#$%&()~|_';


$randomString = random();
echo $randomString . "\n";
echo password_hash($randomString, PASSWORD_DEFAULT);

/**
 * @param int $length
 * @return bool|string
 */
public function random($length = 8)
{
    return substr(str_shuffle(empty($argv[0]) ? DEFAULT_STRING : $argv[0]), 0, $length);
}
