<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;
use function version_compare;

class Base extends TestCase
{
    protected function proxyAssertMatchesRegularExpression($pattern, $string, $message = '')
    {
        if (version_compare(Version::id(), '9.1', '>=')) {
            $this->assertMatchesRegularExpression($pattern, $string, $message);
        } else {
            $this->assertRegExp($pattern, $string, $message);
        }
    }
}