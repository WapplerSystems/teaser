<?php


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
            wizards.newContentElement.wizardItems.common {
                elements {
                    teaser2 {
                        iconIdentifier = teaser2-plugin-list
                        title = LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_list.name
                        description = LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_list.description
                        tt_content_defValues {
                            CType = teaser2
                        }
                    }
                }
                show = *
            }
       }'
);
