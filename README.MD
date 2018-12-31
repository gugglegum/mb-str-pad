# mb_str_pad()

This is true multibyte implementation of PHP's built-in string function `str_pad()` which support UTF-8 both in `$input` and in `$pad_string`.

This function is implemented as a static method of `MbString` class (not as a standalone function) because PHP doesn't doesn't support autoloading of functions on demand. You will not want to include it prior every usage.

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
