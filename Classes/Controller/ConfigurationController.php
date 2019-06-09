<?php

declare(strict_types = 1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Controller;

use AMartinNo1\AmaT3UpgradeAssistant\Domain\Model\SimpleFile;
use TYPO3\CMS\Core\Utility\ArrayUtility;

class ConfigurationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected function getTcaTables(): array {
        $tables = array_keys($GLOBALS['TCA']);
        ArrayUtility::naturalKeySortRecursive($tables);
        return array_combine($tables, $tables);
    }

    protected function getTcaAsPhpSubContent(array $tca, int $depth, SimpleFile $simpleFile): void {
        foreach ($tca as $property => $value) {
            if (is_array($value)) {
                $simpleFile->addRow("'$property' => [", $depth);
                $this->getTcaAsPhpSubContent($value, $depth+1, $simpleFile);
                $simpleFile->addRow("],", $depth);
            } elseif (is_string($value)) {
                $simpleFile->addRow("'$property' => '$value',", $depth);
            } elseif (is_bool($value)) {
                $text = 'false';
                if ($value) {
                    $text = 'true';
                }

                $simpleFile->addRow("'$property' => $text,", $depth);
            } elseif (is_int($value)) {
                $simpleFile->addRow("'$property' => $value,", $depth);
            }
        }
    }

    protected function getTcaAsPhp(string $table): string {
        $tca = $GLOBALS['TCA'][$table];

        $simpleFile = new SimpleFile();
        $simpleFile->addRow('<?php');
        $simpleFile->addRow('return [');

        $this->getTcaAsPhpSubContent($tca, 2, $simpleFile);

        $simpleFile->addRow('];');

        return $simpleFile->getContent();

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