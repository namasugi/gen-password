<?php
/**
 * requires
 * PHP: >= 7.0.25
 **/
require __DIR__ . '/GeneratePassword.php';
try {
    $args = [@$argv[1], @$argv[2], @$argv[3]];
    (new GeneratePassword($args))->output();
} catch (\Throwable $e) {
    echo $e->getMessage() . "\n";
}
