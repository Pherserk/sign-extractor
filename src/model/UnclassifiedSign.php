<?php

namespace Pherserk\SignExtractor\model;

use Pherserk\Sign\model\SignInterface;

class UnclassifiedSign implements SignInterface
{
    const UNCLASSIFIED_TYPE = 'unclassified';

    private $sign;

    public function __construct(string $sign)
    {
        $this->sign = $sign;
    }

    public function getSign() : string
    {
        return $this->sign;
    }

    public function getType() : string
    {
        return static::UNCLASSIFIED_TYPE;
    }
}
