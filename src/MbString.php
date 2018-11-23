<?php

namespace gugglegum\mb_str_pad;

class MbString
{
    /**
     * Multi-byte version of str_pad()
     *
     * @param string $input
     * @param int $pad_length
     * @param string $pad_string
     * @param int $pad_type
     * @param string $encoding
     * @return string
     */
    public static function mb_str_pad(string $input, int $pad_length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT, string $encoding = "UTF-8")
    {
        $input_length = mb_strlen($input);
        switch ($pad_type) {
            case STR_PAD_RIGHT :
                return $input . self::mb_fill_string($pad_string, $pad_length - $input_length);
            case STR_PAD_LEFT :
                return self::mb_fill_string($pad_string, $pad_length - $input_length) . $input;
            case STR_PAD_BOTH :
                return self::mb_fill_string($pad_string, (int) floor(($pad_length - $input_length) / 2), $encoding)
                    . $input
                    . self::mb_fill_string($pad_string, (int) ceil(($pad_length - $input_length) / 2), $encoding);
            default :
                throw new \InvalidArgumentException("mb_str_pad(): Padding type has to be STR_PAD_LEFT, STR_PAD_RIGHT or STR_PAD_BOTH");
        }
    }

    /**
     * Returns a string of given length filled with some pattern substring
     *
     * @param string $pattern
     * @param $length
     * @param string $encoding
     * @return string
     */
    private static function mb_fill_string(string $pattern, $length, $encoding = 'UTF-8'): string
    {
        $pattern_length = mb_strlen($pattern, $encoding);
        $str = '';
        $i = 0;
        while ($i < $length) {
            if ($length - $i >= $pattern_length) {
                $str .= $pattern;
                $i += $pattern_length;
            } else {
                $str .= mb_substr($pattern, 0, $length - $i, $encoding);
                break;
            }
        }
        return $str;
    }
}
