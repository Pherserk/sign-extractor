<?php

namespace Pherserk\SignExtractor\test\component;

use Pherserk\SignExtractor\model\UnclassifiedSign;
use Pherserk\SignExtractor\component\SignExtractor;

class SignExtractorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideText
     */
    public function testExtract(string $text, bool $unique, array $expectedChars)
    {
	$signs = SignExtractor::extract($text, $unique);

        $expectedSigns = [];
        foreach ($expectedChars as $expectedChar) {
            $expectedSigns[] = new UnclassifiedSign($expectedChar);
        }

        static::assertEquals($expectedSigns, $signs);
    }	

    public function provideText()
    {
	return [
            [
                'Foobar: foo and bar',
                false,
                ['F', 'o', 'o', 'b', 'a', 'r', ':', ' ', 'f', 'o', 'o', ' ', 'a', 'n', 'd', ' ', 'b', 'a', 'r'],
            ],
            [
                'これはテストです',
                false,
                ['こ', 'れ', 'は', 'テ', 'ス', 'ト', 'で', 'す'],
            ],
            [
                'This is a test',
                true,
                ['T', 'h', 'i', 's', ' ', 'a', 't', 'e'],
            ],
        ];
    }
}

