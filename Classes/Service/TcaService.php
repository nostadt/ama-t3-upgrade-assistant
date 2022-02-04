<?php

declare(strict_types=1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Service;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class TcaService
{
    private array $tca;

    /**
     * @var array<string>
     */
    private array $extList;

    /**
     * @var array<string>
     */
    private array $tables;

    /**
     * @param array<string> $extensionList
     */
    public function __construct(?array $tca = null, ?array $extensionList = null)
    {
        $this->tca = $tca ?? $GLOBALS['TCA'] ?? [];
        $this->tables = array_keys($this->tca);
        ArrayUtility::naturalKeySortRecursive($this->tables);

        $this->extList = $extensionList ?? ExtensionManagementUtility::getLoadedExtensionListArray();
    }

    public function findOriginalTcaByTable(string $table): ?string
    {
        foreach ($this->extList as $extKey) {
            $filename = $this->getPathToExtension($extKey) . 'Configuration/TCA/' . $table . '.php';
            if (file_exists($filename)) {
                $content = file_get_contents($filename);

                return $content === false ? null : $content;
            }
        }

        return null;
    }

    /**
     * @return array<string>
     */
    public function getTables(): array
    {
        return $this->tables;
    }

    /**
     * Helper method, to allow mocking this path in potential tests.
     * @param string $extKey
     * @return string
     */
    protected function getPathToExtension(string $extKey): string
    {
        return ExtensionManagementUtility::extPath($extKey);
    }

    public function getTableConfig(string $table): array
    {
        return $this->tca[$table];
    }
}
