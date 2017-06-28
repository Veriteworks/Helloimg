<?php

namespace Veriteworks\Helloimg\Api\Data;

/**
 * Interface GridInterface
 * @package Veriteworks\Helloimg\Api\Data
 */
interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const IMG_ID = 'img_id';
    /**
     *
     */
    const TITLE = 'title';
    /**
     *
     */
    const IMAGE = 'image';
    /**
     *
     */
    const DATETO = 'date_to';
    /**
     *
     */
    const DATEFROM = 'date_from';

    /**
     * @return mixed
     */
    public function getImgId();

    /**
     * @param $img_id
     * @return mixed
     */
    public function setImgId($img_id);

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);

    /**
     * @return mixed
     */
    public function getImage();

    /**
     * @param $image
     * @return mixed
     */
    public function setImage($image);

    /**
     * @return mixed
     */
    public function getDateTo();

    /**
     * @param $dateto
     * @return mixed
     */
    public function setDateTo($dateto);

    /**
     * @return mixed
     */
    public function getDateFrom();

    /**
     * @param $datefrom
     * @return mixed
     */
    public function setDateFrom($datefrom);
}