<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php84\Rector\FuncCall\AddEscapeArgumentRector;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/lib',
    ])
    ->withRules([
        AddEscapeArgumentRector::class,
        ExplicitNullableParamTypeRector::class,
    ])
    ->withPHPVersion(PhpVersion::PHP_84);
