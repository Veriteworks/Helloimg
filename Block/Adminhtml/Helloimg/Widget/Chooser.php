<?php

namespace Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Widget;
use Magento\Backend\Block\Template\Context;
use Veriteworks\Helloimg\Model\ResourceModel\Grid\CollectionFactory;

class Chooser extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{

    protected $_gridCollectionFactory;

    public function __construct(
        CollectionFactory $gridCollectionFactory,
        Context $context,
        array $data = []
    )
    {
        $this->_gridCollectionFactory = $gridCollectionFactory;
        parent::__construct($context, $data);
    }


    protected function _construct(
    )
    {
        parent::_construct();
        $this->setTemplate('widget/helloimg.phtml');
    }

    public function getImageCollection($image_id)
    {
        $imageCollection = $this->_gridCollectionFactory->create()
            ->addFieldToFilter('img_id', array('in' => $image_id));

        return $imageCollection;
    }

}
