<?php
declare(strict_types = 1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Controller;

use Symfony\Component\VarExporter\VarExporter;
use TYPO3\CMS\Core\Utility\ArrayUtility;

class ConfigurationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected function getTcaTables(): array {
        $tables = array_keys($GLOBALS['TCA']);
        ArrayUtility::naturalKeySortRecursive($tables);
        return array_combine($tables, $tables);
    }

    protected function getTcaAsPhp(string $table): string {
        $varExport = VarExporter::export($GLOBALS['TCA'][$table]);
        return <<<TEXT
<?php

return {$varExport};
TEXT;
    }

    public function mainAction(): void
    {
        $this->view->assignMultiple([
            'tables' => $this->getTcaTables(),
            'table' => '',
        ]);
    }

    public function showAction(string $table): void {
        $this->view->assignMultiple([
            'tables' => $this->getTcaTables(),
            'table' => $table,
            'tcaAsPhp' =>  $this->getTcaAsPhp($table),
        ]);
    }
}