<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use WapplerSystems\Teaser\Controller\ItemController;

defined('TYPO3') || die();

(static function() {
    ExtensionUtility::configurePlugin(
        'Teaser',
        'List',
        [
            ItemController::class => 'list'
        ],
        [
            ItemController::class => ''
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.common {
                elements {
                    teaser2 {
                        iconIdentifier = teaser2-plugin-list
                        title = LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_list.name
                        description = LLL:EXT:teaser2/Resources/Private/Language/locallang_db.xlf:tx_teaser2_list.description
                        tt_content_defValues {
                            CType = teaser2_list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
