<?php
require __DIR__ . '/bootstrap/init.php';

/**
 * Class GeneratePassword
 */
class GeneratePassword
{
    const DEFAULT_STRINGS = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/-+.,!?#$%&()~|_';
    const DEFAULT_STRING_RENGTH = 8;

    const MESSAGE_ERROR_AUGUMENTS = '引数エラー';
    const MESSAGE_PASSWORD = 'パスワード：%s';
    const MESSAGE_HASH_PASSWORD = 'ハッシュしたパスワード：%s';

    private $length;
    private $string;
    private $pattern;

    /**
     * GeneratePassword constructor.
     * @param array $args
     * @throws Exception
     */
    public function __construct(array $args)
    {
        if (!self::checkArguments($args)) throw new \Exception(self::MESSAGE_ERROR_AUGUMENTS);
        $this->setArguments($args);
        return $this;
    }

    /**
     * @param string $string
     */
    public function output(string $string = null)
    {
        if ($string === null) $string = $this->string;
        echo_r(sprintf(self::MESSAGE_PASSWORD, $string));
        echo_r(sprintf(self::MESSAGE_HASH_PASSWORD, self::generateHash($string)));
    }

    /**
     * @return string|null
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param array $args
     * @return bool
     */
    private static function checkArguments(array $args)
    {
        if (count($args) !== 3) return false;
        if (!empty($args[0]) && !is_numeric($args[0])) return false;
        if (!empty($args[1]) && !is_string($args[1])) return false;
        if (!empty($args[2]) && !is_string($args[2])) return false;
        return true;
    }

    /**
     * @param array $args
     */
    private function setArguments(array $args)
    {
        $stringLength = null;
        $stringPattern = null;
        if (!empty($args[1])) {
            // 第2引数を設定していればハッシュ元文字列を指定
            $string = $args[1];
        } else {
            // 設定していなければランダム文字列を生成
            // パスワード化文字列パターン設定
            $stringPattern = empty($args[2]) ? self::DEFAULT_STRINGS : $args[2];
            // 第1引数を設定していればランダム生成する文字列の長さを第一引数にする
            $stringLength = intval(@$args[0]) ?: self::DEFAULT_STRING_RENGTH;
            $string = self::random($stringLength, $stringPattern);
        }
        $this->length = $stringLength;
        $this->string = $string;
        $this->pattern = $stringPattern;
    }

    /**
     * @param int $length
     * @param string $pattern
     * @return bool|string
     */
    private static function random(int $length, string $pattern)
    {
        return substr(str_shuffle($pattern), 0, $length);
    }

    /**
     * @param string $string
     * @return bool|string
     */
    private static function generateHash(string $string)
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }
}
