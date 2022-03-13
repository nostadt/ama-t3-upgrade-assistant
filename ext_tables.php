<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'Nostadt.Typo3UpgradeAssistant',
    'system',
    'tx_UpgradeAssistant',
    'after:config',
    [
        \Nostadt\Typo3UpgradeAssistant\Controller\ConfigurationController::class => 'main, show',
    ],
    [
        'access' => 'admin',
        'icon' => 'EXT:ama_t3_upgrade_assistant/Resources/Public/Icons/Configuration.png',
        'labels' => 'LLL:EXT:ama_t3_upgrade_assistant/Resources/Private/Language/locallang_mod.xlf',
    ]
);
