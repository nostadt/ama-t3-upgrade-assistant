<?php

declare(strict_types=1);

namespace Nostadt\Typo3UpgradeAssistant\Tests\Service;

use Nostadt\Typo3UpgradeAssistant\Service\TcaService;
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
