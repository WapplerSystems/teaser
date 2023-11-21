<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Teaser',
    'List',
    'Teaser'
);

$additionalColumns = [
    'tx_teaser2_layout' => [
        'exclude' => true,
        'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tt_content.layout',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'default' => 'ease-in-out',
            'items' => [
                ['linear', 'linear'],
                ['ease', 'ease'],
                ['ease-in', 'ease-in'],
                ['ease-out', 'ease-out'],
                ['ease-in-out', 'ease-in-out'],
                ['ease-in-back', 'ease-in-back'],
                ['ease-out-back', 'ease-out-back'],
                ['ease-in-out-back', 'ease-in-out-back'],
                ['ease-in-sine', 'ease-in-sine'],
                ['ease-out-sine', 'ease-out-sine'],
                ['ease-in-out-sine', 'ease-in-out-sine'],
                ['ease-in-quad', 'ease-in-quad'],
                ['ease-out-quad', 'ease-out-quad'],
                ['ease-in-out-quad', 'ease-in-out-quad'],
                ['ease-in-cubic', 'ease-in-cubic'],
                ['ease-out-cubic', 'ease-out-cubic'],
                ['ease-in-out-cubic', 'ease-in-out-cubic'],
                ['ease-in-quart', 'ease-in-quart'],
                ['ease-out-quart', 'ease-out-quart'],
                ['ease-in-out-quart', 'ease-in-out-quart'],
            ],
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);


$GLOBALS['TCA']['tt_content']['palettes']['teaser2'] = ['showitem' => 'imagecols_xs,imagecols_sm,imagecols_md,imagecols_lg,imagecols_xl,imagecols_xxl'];
