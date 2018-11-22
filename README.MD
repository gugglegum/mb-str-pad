# mb_str_pad()

This is true multibyte implementation of PHP's built-in string function `str_pad()` which support UTF-8 both in `$input` and in `$pad_string`.

PHP doesn't support autoloading functions on demand, so the only way is to load functions on startup. But you don't load this function every time even if you don't use it. This is why I wrote it as static method wrapped into the class. This is the only way in PHP to autoload this function only when it's really needed.

## Installation

Quite simple: `composer require gugglegum/mb-str-pad`

## Usage

```php
<?php

require_once 'vendor/autoload.php';

use gugglegum\mb_str_pad\MBString;

$input = 'Привет'; 
$pad_length = 20; 
$pad_string = '÷˟‾҈';
$pad_type = STR_PAD_BOTH;
$encoding = 'UTF-8';

echo MbString::mb_str_pad($input, $pad_length, $pad_string, $pad_type, $encoding);
```

In all cases of using single-byte `$input` and `$pad_string` the result will be the same as of built-in `str_pad()` function.
