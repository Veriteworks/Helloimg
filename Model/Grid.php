<?php

namespace Veriteworks\Helloimg\Model;

use Veriteworks\Helloimg\Api\Data\GridInterface;

/**
 * Class Grid
 * @package Veriteworks\Helloimg\Model
 */
class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     *
     */
    const CACHE_TAG = 'veriteworks_helloimg_img';

    /**
     * @var string
     */
    protected $_cacheTag = 'veriteworks_helloimg_img';

    /**
     * @var string
     */
    protected $_eventPrefix = 'veriteworks_helloimg_img';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Veriteworks\Helloimg\Model\ResourceModel\Grid');
    }

    /**
     * @return mixed
     */
    public function getImgId()
    {
        return $this->getData(self::IMG_ID);
    }

    /**
     * @param $img_id
     * @return $this
     */
    public function setImgId($img_id)
    {
        return $this->setData(self::IMG_ID, $img_id);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @return mixed
     */
    public function getDateTo()
    {
    return $this->getData(self::DATETO);
    }

    /**
     * @param $dateto
     * @return $this
     */
    public function setDateTo($dateto)
    {
        return $this->setData(self::DATETO, $dateto);
    }

    /**
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->getData(self::DATEFROM);
    }

    /**
     * @param $datefrom
     * @return $this
     */
    public function setDateFrom($datefrom)
    {
        return $this->setData(self::DATEFROM, $datefrom);
    }
}