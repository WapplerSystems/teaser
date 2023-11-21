<?php

declare(strict_types=1);

namespace WapplerSystems\Teaser\Controller;


/**
 * This file is part of the "Teaser" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Wappler <typo3@wappler.systems>, WapplerSystems
 */

/**
 * ItemController
 */
class ItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * itemRepository
     *
     * @var \WapplerSystems\Teaser\Domain\Repository\ItemRepository
     */
    protected $itemRepository = null;

    /**
     * @param \WapplerSystems\Teaser\Domain\Repository\ItemRepository $itemRepository
     */
    public function injectItemRepository(\WapplerSystems\Teaser\Domain\Repository\ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $items = $this->itemRepository->findAll();
        $this->view->assign('items', $items);
        return $this->htmlResponse();
    }
}
