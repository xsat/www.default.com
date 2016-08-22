<?php namespace Backend\Forms;

use \Phalcon\Forms\Form as PhalconForm,
    \Phalcon\Tag;

abstract class Form extends PhalconForm
{
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            $messages = '';
            foreach ($this->getMessagesFor($name) as $message) {
                $messages .= Tag::tagHtml('div', [
                    'class' => 'alert alert-danger',
                    'role' => 'alert',
                ], false, true);
                $messages .= $message;
                $messages .= Tag::tagHtmlClose('div');
            }

            return $messages;
        }

        return '';
    }

    public function getNames()
    {
        $elements = $this->getElements();

        if (isset($elements['submit'])) {
            unset($elements['submit']);
        }

        return array_keys($elements);
    }
}