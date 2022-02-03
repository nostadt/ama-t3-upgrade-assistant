<?php

declare(strict_types=1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Tests\Service;

use AMartinNo1\AmaT3UpgradeAssistant\Service\TcaService;
use PHPUnit\Framework\TestCase;

class TcaServiceTest extends TestCase
{
    public function testGetTables(): void
    {
        $tcaService = new TcaService(
            [
                'pages' => [
                    'someconfig' => 'foo-bar',
                ],
                'address' => [
                    'someconfig' => 'foo-bar',
                ],
            ],
            [
                'core',
            ]
        );

        self::assertSame(
            [
                'pages',
                'address',
            ],
            $tcaService->getTables()
        );
    }
}
