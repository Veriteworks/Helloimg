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

    public function getImgId();
    public function setImgId($img_id);
    public function getTitle();
    public function setTitle($title);
    public function getImage();
    public function setImage($image);
}