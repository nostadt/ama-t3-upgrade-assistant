<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Upgrade Assistant',
    'description' => 'This extension aims to simplify the upgrade process. In a first step it provides a backend module which generates TCA in PHP format.',
    'category' => 'be',
    'author' => 'Alexander Nostadt',
    'state' => 'stable',
    'createDirs' => '',
    'clearCacheOnLoad' => true,
    'version' => '2.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-10.4.99',
            'php' => '7.1.3-0.0.0'
        ],
    ],
];
