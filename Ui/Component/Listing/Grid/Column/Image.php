<?php

namespace Veriteworks\Helloimg\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Image extends \Veriteworks\Helloimg\Ui\Component\Listing\Grid\Column\AbstractColumn
{
    /**
     * default width and height image.
     */
    const IMAGE_WIDTH = '70%';
    /**
     *
     */
    const IMAGE_HEIGHT = '60';
    /**
     *
     */
    const IMAGE_STYLE = 'display: block;margin: auto;';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * @var
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
    }

    /**
     * prepare item.
     *
     * @param array $item
     *
     * @return array
     */

    protected function _prepareItem(array & $item)
    {
        $width = $this->hasData('width') ? $this->getWidth() : self::IMAGE_WIDTH;
        $height = $this->hasData('height') ? $this->getHeight() : self::IMAGE_HEIGHT;
        $style = $this->hasData('style') ? $this->getStyle() : self::IMAGE_STYLE;
        if (isset($item[$this->getData('name')])) {
            if ($item[$this->getData('name')]) {
                $srcImage = $this->_storeManager->getStore()
                        ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $item[$this->getData('name')];
                $item[$this->getData('name')] = sprintf(
                    '<img src="%s"  width="%s" height="%s" style="%s" />',
                    $srcImage,
                    $width,
                    $height,
                    $style
                );
            } else {
                $item[$this->getData('name')] = '';
            }
        }

        return $item;
    }
}