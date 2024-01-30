<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,subtitle,link',
        'iconfile' => 'EXT:teaser2/Resources/Public/Icons/tx_teaser2_domain_model_item.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, subtitle, link, media, brightness, layout, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_teaser2_domain_model_item',
                'foreign_table_where' => 'AND {#tx_teaser2_domain_model_item}.{#pid}=###CURRENT_PID### AND {#tx_teaser2_domain_model_item}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.title',
            'description' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.subtitle',
            'description' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.subtitle.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.link',
            'description' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.link.description',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
            ]
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.media',
            'description' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.media.description',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'columns' => [
                            'crop' => [
                                'config' => [
                                    'cropVariants' => [
                                        'square' => [
                                            'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_square',
                                            'allowedAspectRatios' => [
                                                'NaN' => [
                                                    'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_1_1',
                                                    'value' => 1.0
                                                ]
                                            ],
                                        ],
                                        'vertical1' => [
                                            'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_vertical1',
                                            'allowedAspectRatios' => [
                                                'NaN' => [
                                                    'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_1_2',
                                                    'value' => 0.5
                                                ]
                                            ],
                                        ],
                                        'horizontal1' => [
                                            'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_horizontal1',
                                            'allowedAspectRatios' => [
                                                'NaN' => [
                                                    'title' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:image_crop_2_1',
                                                    'value' => 2.0
                                                ]
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'media',
                        'tablenames' => 'tx_teaser2_domain_model_item',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ]
            ),

        ],
        'content_uid' => [
            'label' => 'CC',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tt_content',
                //'foreign_table_where' => ...,
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'brightness' => [
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.brightness',
            'config' => [
                'type' => 'input',
                'range' => [
                    'lower' => 0,
                    'upper' => 200
                ],
                'slider' => [
                    'step' => 1
                ]
            ],
        ],
        'layout' => [
            'label' => 'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.layout',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.layout.options.bright_font',
                        'bright',
                    ],
                    [
                        'LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_domain_model_item.layout.options.dark_font',
                        'dark',
                    ],
                ],
            ],
        ],

    ],
];
