<?php

declare(strict_types=1);

namespace WapplerSystems\Teaser\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Sven Wappler <typo3@wappler.systems>
 */
class ItemTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\Teaser\Domain\Model\Item|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \WapplerSystems\Teaser\Domain\Model\Item::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getSubtitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function setSubtitleForStringSetsSubtitle(): void
    {
        $this->subject->setSubtitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('subtitle'));
    }

    /**
     * @test
     */
    public function getLinkReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink(): void
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('link'));
    }

    /**
     * @test
     */
    public function getMediaReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getMedia()
        );
    }

    /**
     * @test
     */
    public function setMediaForFileReferenceSetsMedia(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMedia($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('media'));
    }
}
