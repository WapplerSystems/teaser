<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Teaser',
        'List',
        [
            \WapplerSystems\Teaser\Controller\ItemController::class => 'list'
        ],
        // non-cacheable actions
        [
            \WapplerSystems\Teaser\Controller\ItemController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = teaser-plugin-list
                        title = LLL:EXT:teaser/Resources/Private/Language/locallang_db.xlf:tx_teaser_list.name
                        description = LLL:EXT:teaser/Resources/Private/Language/locallang_db.xlf:tx_teaser_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = teaser_list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
