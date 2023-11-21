<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_teaser2_domain_model_item', 'EXT:teaser2/Resources/Private/Language/locallang_csh_tx_teaser2_domain_model_item.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_teaser2_domain_model_item');
})();
