<?php
defined('TYPO3_MODE') or die();

$configurationController = 'Configuration';
if (version_compare(TYPO3_version, '11.0.0', '>=')) {
    $configurationController = \AMartinNo1\AmaT3UpgradeAssistant\Controller\ConfigurationController::class;
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'AMartinNo1.AmaT3UpgradeAssistant',
    'system',
    'tx_UpgradeAssistant',
    'after:config',
    [
        $configurationController => 'main, show',
    ],
    [
        'access' => 'admin',
        'icon' => 'EXT:ama_t3_upgrade_assistant/Resources/Public/Icons/Configuration.png',
        'labels' => 'LLL:EXT:ama_t3_upgrade_assistant/Resources/Private/Language/locallang_mod.xlf',
    ]
);
