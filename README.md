# パスワード生成ツール

引数に以下を指定してshを実行  
* 第1引数
 * パスワードの桁数
 * 指定しない場合は8桁になる
* 第2引数
 * ハッシュ化するパスワードの文字
 * 指定しない場合は第1引数の桁数でランダム文字列を生成する
 * 指定した場合は第1引数を無視する
* 第3引数
 * パスワードのランダム生成で使う文字列一覧
 * 未指定の場合は以下になる  
 `1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/-+.,!?#$%&()~|_`

## 実行コマンド
```sh
$./generate.sh パスワードの桁数
```

## 前提

PHPをインストールしてパスが通っていること  

requires  
PHP: >= 7.0.25  
