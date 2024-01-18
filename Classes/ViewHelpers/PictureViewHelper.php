<?php

namespace WapplerSystems\Teaser\ViewHelpers;


use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Service\ImageService;
use TYPO3\CMS\Fluid\View\TemplateView;

/**
 *
 */
class PictureViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{


    /**
     * @var FileInterface
     */
    protected $image;

    /**
     * @var string
     */
    protected string $classNames = '';

    /**
     * @var array
     */
    protected array $additionalAttributes = [];

    /**
     * @var string
     */
    protected string $id = '';

    /**
     * @var string
     */
    protected string $alt = '';

    /**
     * @var string
     */
    protected string $title = '';

    /**
     * @var string
     */
    protected string $imgTag = 'picture';


    protected $escapeOutput = false;


    public function initializeArguments()
    {
        $this->registerArgument('additionalAttributes', 'array', 'array of additional attributes', false);
        $this->registerArgument('id', 'string', 'The element id', false);
        $this->registerArgument('class', 'string', 'Additional classes', false);
        $this->registerArgument('src', 'string', '', false);
        $this->registerArgument('treatIdAsReference', 'boolean', '', false, false);
        $this->registerArgument('image', 'mixed', '', false);
        $this->registerArgument('alt', 'string', '', false);
        $this->registerArgument('title', 'string', '', false);

        $this->registerArgument('sources', 'array', '', true);
        $this->registerArgument('defaultWidth', 'int', '', false, 600);

    }

    public function initialize()
    {

        $this->image = $this->arguments['image'];
        $this->id = $this->arguments['id'] ?? bin2hex(random_bytes(5));

        if ($this->image === null) {

            $src = $this->arguments['src'];
            $treatIdAsReference = $this->arguments['treatIdAsReference'];

            $imageService = self::getImageService();

            $this->image = $imageService->getImage($src, null, $treatIdAsReference);
        }

        if (method_exists($this->image, 'getOriginalResource') && $this->image->getOriginalResource() instanceof \TYPO3\CMS\Core\Resource\FileReference) {
            $this->image = $this->image->getOriginalResource();
        }

        $this->classNames = $this->arguments['class'] ?? '';
        $this->title = $this->arguments['title'] ?? '';
        $this->alt = $this->arguments['alt'] ?? '';
        $this->additionalAttributes = $this->arguments['additionalAttributes'] ?? [];


        if ($this->image->getMimeType() === 'image/svg+xml') {
            $this->imgTag = 'img';
        }
        if ($this->isAnimatedGif($this->image)) {
            $this->imgTag = 'img';
        }

        if (($this->arguments['src'] === null && $this->arguments['image'] === null) || ($this->arguments['src'] !== null && $this->arguments['image'] !== null)) {
            throw new \UnexpectedValueException('You must either specify a string src or a File object.', 1382284105);
        }

        parent::initialize();
    }


    /**
     */
    public function render()
    {


        $view = new TemplateView();
        $view->setTemplatePathAndFilename('EXT:teaser2/Resources/Private/Templates/Picture.html');


        $view->assignMultiple([
            'image' => $this->image,
            'class' => $this->classNames,
            'id' => $this->id,
            'title' => $this->title,
            'alt' => $this->alt,
            'imgTag' => $this->imgTag,
            'additionalAttributes' => $this->additionalAttributes,
            'sources' => $this->arguments['sources'],
        ]);

        return $view->render();
    }


    /**
     * Return an instance of ImageService using object manager
     *
     * @return ImageService
     */
    protected static function getImageService(): ImageService
    {
        return GeneralUtility::makeInstance(ImageService::class);
    }

    private function isAnimatedGif(FileInterface $image)
    {

        if ($image->getMimeType() !== 'image/gif') {
            return false;
        }

        $content = $image->getContents();

        $str_loc = 0;
        $count = 0;
        while ($count < 2) # There is no point in continuing after we find a 2nd frame
        {

            $where1 = strpos($content, "\x00\x21\xF9\x04", $str_loc);
            if ($where1 === FALSE) {
                break;
            }

            $str_loc = $where1 + 1;
            $where2 = strpos($content, "\x00\x2C", $str_loc);
            if ($where2 === FALSE) {
                break;
            }

            if ($where1 + 8 === $where2) {
                $count++;
            }
            $str_loc = $where2 + 1;
        }

        return $count > 1;
    }

}
