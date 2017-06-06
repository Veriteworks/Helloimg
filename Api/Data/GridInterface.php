<?php

namespace Veriteworks\Helloimg\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const TITLE = 'title';
    const IMAGE = 'image';

    public function getId();
    public function setId($id);
    public function getTitle();
    public function setTitle($title);
    public function getImage();
    public function setImage($image);
}