<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Upgrade Assistant',
    'description' => 'This extension aims to simplify the upgrade process. In a first step it provides a backend module which generates TCA in PHP format.',
    'category' => 'be',
    'author' => 'Alexander Nostadt',
    'state' => 'stable',
    'createDirs' => '',
    'clearCacheOnLoad' => true,
    'version' => '1.0.3',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-10',
        ],
    ],
];
