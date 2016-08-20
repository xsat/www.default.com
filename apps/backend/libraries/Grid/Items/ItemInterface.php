<?php namespace Backend\Libraries\Grid\Items;

interface ItemInterface
{
    public function setModel($model);

    public function getValue();

    public function getTitle();
}