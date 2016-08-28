<?php namespace Backend\Libraries\Grid\Breadcrumbs;

use \Phalcon\Tag;

class Link extends Item implements ItemInterface
{
    public function __construct($link, $params = [])
    {
        $text = '';
        if (is_array($params) &&  isset($params['text'])) {
            $text = $params['text'];
            unset($params['text']);
        } else if (is_scalar($params)) {
            $text = $params;
            $params = [];
        }

        $value = Tag::linkTo(array_merge([
            'action' => $link,
            'text' => $text,
        ], $params));

        parent::__construct($value);
    }

    public function getClass()
    {
        return false;
    }
}