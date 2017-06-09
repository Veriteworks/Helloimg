<?php

namespace Veriteworks\Helloimg\Block\Adminhtml;

class Grid extends \Magento\Backend\Block\Widget\Container

{
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Prepare button and grid
     *
     * @return Veriteworks\Helloimg\Block\Adminhtml\Grid
     */
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
}