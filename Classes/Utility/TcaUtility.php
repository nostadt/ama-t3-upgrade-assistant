<?php
declare(strict_types = 1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Utility;

use RuntimeException;
use Symfony\Component\VarExporter\VarExporter;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class TcaUtility
{
    public static function getTcaList(): array {
        $tables = array_keys($GLOBALS['TCA']);
        ArrayUtility::naturalKeySortRecursive($tables);
        return array_combine($tables, $tables);
    }

    public static function getAsPhp(string $table): string {
        $varExport = VarExporter::export($GLOBALS['TCA'][$table]);
        return <<<TEXT
<?php

return {$varExport};
TEXT;
    }

    /**
     * @param string $table
     * @return string
     * @throws RuntimeException if TCA not found for $table
     */
    public static function getTcaFileContent(string $table): string {
        $extensionList = ExtensionManagementUtility::getLoadedExtensionListArray();
        foreach ($extensionList as $extKey) {
            $pathTemplate = ExtensionManagementUtility::extPath($extKey) . 'Configuration/TCA/%s.php';
            $filename = sprintf($pathTemplate, $table);
            if (file_exists($filename)) {
                return file_get_contents($filename);
            }
        }
        throw new RuntimeException("TCA for table '$table' not found", 1560539365);
    }
}