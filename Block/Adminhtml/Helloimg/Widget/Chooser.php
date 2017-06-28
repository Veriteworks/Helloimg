<?php

namespace Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Widget;
use Magento\Backend\Block\Template\Context;
use Veriteworks\Helloimg\Model\ResourceModel\Grid\CollectionFactory;

/**
 * Class Chooser
 * @package Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Widget
 */
class Chooser extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{

    /**
     * @var CollectionFactory
     */
    protected $_gridCollectionFactory;

    /**
     * Chooser constructor.
     * @param CollectionFactory $gridCollectionFactory
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        CollectionFactory $gridCollectionFactory,
        Context $context,
        array $data = []
    )
    {
        $this->_gridCollectionFactory = $gridCollectionFactory;
        parent::__construct($context, $data);
    }


    /**
     *
     */
    protected function _construct(
    )
    {
        parent::_construct();
        $this->setTemplate('widget/helloimg.phtml');
    }

    /**
     * @param $image_id
     * @return mixed
     */
    public function getImageCollection($image_id)
    {
        $imageCollection = $this->_gridCollectionFactory->create()
            ->addFieldToFilter('img_id', array('in' => $image_id));

        return $imageCollection;
    }

}
