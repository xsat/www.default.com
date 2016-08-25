<?php namespace Backend\Libraries\Grid\Items\Link;

use \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\ItemInterface,
    \Phalcon\Tag;

class GlyphIconLink extends Link implements ItemInterface
{
    public function __construct($link, $icon = null, $params = [])
    {
        if (!is_array($params)) {
            $params = [
                'title' => $params,
            ];
        }

        $text = Tag::tagHtml('span', [
            'class' => 'glyphicon glyphicon-' . $icon,
            'aria-hidden' => 'true',
        ], true);

        if (isset($params['text'])) {
            $text .= ' ' . $params['text'];
            unset($params['text']);
        }

        parent::__construct($link, array_merge_recursive([
            'text' => $text,
        ], $params));
    }
}