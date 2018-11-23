# mb_str_pad()

This is true multibyte implementation of PHP's built-in string function `str_pad()` which support UTF-8 both in `$input` and in `$pad_string`.

PHP doesn't support autoloading of functions on demand, so you would have to load it explicitly by using `require_once('path/to/function.php')` which is not convenient. Composer's autoload allow only to load it on startup no matter will it be used or not.

This is why I wrote it as static method wrapped into the class. This is the only way in PHP to autoload this function only when it's really used.

## Installation

Quite simple: `composer require gugglegum/mb-str-pad`

## Usage

```php
<?php

require_once 'vendor/autoload.php';

use gugglegum\mb_str_pad\MbString;

$input = 'Привет'; 
$pad_length = 20; 
$pad_string = '÷˟‾҈';
$pad_type = STR_PAD_BOTH;
$encoding = 'UTF-8';

echo MbString::mb_str_pad($input, $pad_length, $pad_string, $pad_type, $encoding);
```

In all cases of using single-byte `$input` and `$pad_string` the result will be the same as of built-in `str_pad()` function.
