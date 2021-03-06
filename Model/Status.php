<?php
namespace Veriteworks\Helloimg\Model;
use Veriteworks\Helloimg\Model\ResourceModel\Grid\CollectionFactory;

/**
 * Class Status
 * @package Veriteworks\Helloimg\Model
 */
class Status implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    protected $_gridCollectionFactory;

    /**
     * Status constructor.
     * @param CollectionFactory $gridCollectionFactory
     */
    public function __construct(
        CollectionFactory $gridCollectionFactory
    ){
     $this->_gridCollectionFactory = $gridCollectionFactory;
    }
    /**
     * get available statuses.
     *
     * @return []
     */
    public function toOptionArray()
    {
        $imageCollection = $this->_gridCollectionFactory->create();
        $imageTitleArray = array();

       foreach ($imageCollection->getItems() as $image) {
            $imageTitleArray[$image->getImgId()] = $image->getTitle();
        }
        return $imageTitleArray;
    }
}
