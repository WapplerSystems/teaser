<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'teaser2',
    'List',
    'Teaser'
);

$additionalColumns = [
    'tx_teaser2_items' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang.xlf:tt_content.items',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_teaser2_domain_model_item',
            'foreign_field' => 'content_uid',
            'foreign_label' => 'title',
            'foreign_sortby' => 'sorting',
            'maxitems' => '100',
            'appearance' => [
                #'collapseAll' => 0, // Auskommentieren, da es sonst immer als true interpretiert wird
                'expandSingle' => true,
                'newRecordLinkAddTitle' => 1,
                'newRecordLinkPosition' => 'both',
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
            ],
            'behaviour' => [
                'localizationMode' => 'select',
            ],
            'overrideChildTca' => [
                'types' => [
                    '1' => [
                        'showitem' => 'title, subtitle, sys_language_uid, media, text_position, link, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime, endtime'
                    ],
                ]
            ]
        ]
    ],
    'tx_teaser2_layout' => [
        'exclude' => true,
        'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tt_content.layout',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'default' => 'grid1',
            'items' => [
                ['Layout 1', 'grid1'],
            ],
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);


$GLOBALS['TCA']['tt_content']['palettes']['teaser2'] = ['showitem' => 'tx_teaser2_items, --linebreak--, tx_teaser2_layout'];
