<?php namespace Backend\Libraries\Menu\Items;

interface ItemInterface
{
    public function isActive();

    public function isAllow();

    public function getLink();

    public function getTitle();
}