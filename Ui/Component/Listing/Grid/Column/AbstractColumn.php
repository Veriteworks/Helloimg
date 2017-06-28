<?php

namespace Veriteworks\Helloimg\Ui\Component\Listing\Grid\Column;

/**
 * Class AbstractColumn
 * @package Veriteworks\Helloimg\Ui\Component\Listing\Grid\Column
 */
abstract class AbstractColumn extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $this->_prepareItem($item);
            }
        }

        return $dataSource;
    }

    /**
     * @param array $item
     * @return mixed
     */
    abstract protected function _prepareItem(array & $item);
}
