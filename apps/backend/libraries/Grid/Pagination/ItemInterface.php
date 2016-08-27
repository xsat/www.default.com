<?php namespace Backend\Libraries\Grid\Pagination;

interface ItemInterface
{
    public function getLink();

    public function getTitle();

    public function getClass();

    public function isClass();
}