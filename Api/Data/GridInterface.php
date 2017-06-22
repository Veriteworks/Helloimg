<?php

namespace Veriteworks\Helloimg\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const IMG_ID = 'img_id';
    const TITLE = 'title';
    const IMAGE = 'image';
    const DATETO = 'date_to';
    const DATEFROM = 'date_from';

    public function getImgId();
    public function setImgId($img_id);
    public function getTitle();
    public function setTitle($title);
    public function getImage();
    public function setImage($image);
    public function getDateTo();
    public function setDateTo($dateto);
    public function getDateFrom();
    public function setDateFrom($datefrom);
}