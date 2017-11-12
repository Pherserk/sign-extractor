<?php

namespace Pherserk\SignExtractor\component;

class SignExtractor
{
    public static function extract(string $text, bool $unique) : array
    {
        $signs = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
    
        if (!$unique) {
            return $signs;
        }

        return array_values(array_unique($signs));
    }
}

