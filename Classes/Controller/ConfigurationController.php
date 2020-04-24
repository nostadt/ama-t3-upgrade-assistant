<?php
declare(strict_types = 1);

namespace AMartinNo1\AmaT3UpgradeAssistant\Controller;

use AMartinNo1\AmaT3UpgradeAssistant\Exception\TcaNotFoundException;
use AMartinNo1\AmaT3UpgradeAssistant\Utility\TcaUtility;

class ConfigurationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function mainAction(): void
    {
        $this->view->assignMultiple([
            'tables' => TcaUtility::getTcaList(),
            'table' => '',
        ]);
    }

    /**
     * @param string $table
     */
    public function showAction(string $table): void {
        $originalTca = '';
        $originalTcaFound = true;
        try {
            $originalTca = TcaUtility::getTcaFileContent($table);
        } catch (TcaNotFoundException $exception) {
            $originalTcaFound = false;
        }

        $this->view->assignMultiple([
            'tables' => TcaUtility::getTcaList(),
            'table' => $table,
            'tcaAsPhp' => TcaUtility::getAsPhp($table),
            'originalTca' => $originalTca,
            'originalTcaFound' => $originalTcaFound,
        ]);
    }
}