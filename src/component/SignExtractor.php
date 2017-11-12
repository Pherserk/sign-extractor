<?php

namespace Pherserk\SignExtractor\component;

use Pherserk\Sign\model\SignInterface;
use Pherserk\SignExtractor\model\UnclassifiedSign;

class SignExtractor
{
    /**
     * @param string $text
     * @param bool $unique
     *
     * @return SignInterface[]
     */
    public static function extract(string $text, bool $unique) : array
    {
        $chars = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
    
        if (!$unique) {
            return static::buildSigns($chars);
        }

        return static::buildSigns(array_unique($chars));
    }

    private static function buildSigns(array $chars)
    {
        $signs = [];
        foreach ($chars as $char) {
            $signs[] = new UnclassifiedSign($char);
        }

        return $signs;
    }
}

