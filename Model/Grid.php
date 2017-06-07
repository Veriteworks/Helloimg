<?php

namespace Veriteworks\Helloimg\Model;

use Veriteworks\Helloimg\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    const CACHE_TAG = 'veriteworks_helloimg_img';

    protected $_cacheTag = 'veriteworks_helloimg_img';

    protected $_eventPrefix = 'veriteworks_helloimg_img';

    protected function _construct()
    {
        $this->_init('Veriteworks\Helloimg\Model\ResourceModel\Grid');
    }
    public function getId()
    {
        return $this->getData(self::IMG_ID);
    }
    public function setId($img_id)
    {
        return $this->setData(self::IMG_ID, $img_id);
    }
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }
}