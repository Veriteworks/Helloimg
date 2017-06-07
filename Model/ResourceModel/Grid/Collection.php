<?php

namespace Veriteworks\Helloimg\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'img_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Veriteworks\Helloimg\Model\Grid', 'Veriteworks\Helloimg\Model\ResourceModel\Grid');
    }
}