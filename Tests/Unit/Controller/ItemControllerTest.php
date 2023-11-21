<?php

declare(strict_types=1);

namespace WapplerSystems\Teaser\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Sven Wappler <typo3@wappler.systems>
 */
class ItemControllerTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\Teaser\Controller\ItemController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\WapplerSystems\Teaser\Controller\ItemController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllItemsFromRepositoryAndAssignsThemToView(): void
    {
        $allItems = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository = $this->getMockBuilder(\WapplerSystems\Teaser\Domain\Repository\ItemRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $itemRepository->expects(self::once())->method('findAll')->will(self::returnValue($allItems));
        $this->subject->_set('itemRepository', $itemRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('items', $allItems);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}
