<?php

namespace Veriteworks\Helloimg\Block\Adminhtml\Banner;

/**
 * Class Grid
 * @package Veriteworks\Helloimg\Block\Adminhtml\Banner
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @var \Veriteworks\Helloimg\Model\ResourceModel\Banner\CollectionFactory
     */
    protected $collectionFactory;
    /**
     * Constructor.
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Veriteworks\Helloimg\Model\ResourceModel\Grid\CollectionFactory $collectionFactory,
        array $data = []
    ) {

        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     *
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('veriteBannerGrid');
        $this->_exportPageSize = 10000;
    }

    /**
     * @return mixed
     */
    protected function _prepareCollection()
    {
        $collection = $this->collectionFactory->create();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }
}
