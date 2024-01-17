<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();


if (!is_array($GLOBALS['TCA']['tt_content']['types']['teaser2'] ?? null)) {
    $GLOBALS['TCA']['tt_content']['types']['teaser2'] = [];
}


ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:teaser2/Resources/Private/Language/locallang.xlf:title',
        'teaser2',
        'content-teaser2'
    ]
);

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['teaser2'] = 'content-teaser2';


$GLOBALS['TCA']['tt_content']['types']['teaser2'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['teaser2'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                --palette--;Teaser;teaser2,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        '
    ]
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

ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);


$GLOBALS['TCA']['tt_content']['palettes']['teaser2'] = ['showitem' => 'tx_teaser2_items, --linebreak--, tx_teaser2_layout'];

