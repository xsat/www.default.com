<?php namespace Backend\Forms;

use \Backend\Models\Resource as ResourceModel,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf,
    \Phalcon\Forms\Element\Submit;

class ResourceForm extends Form
{
    public function initialize(ResourceModel $user = null, $submitValue = 'Submit')
    {
        $this->add((new Text('name', [
            'class' => 'form-control',
            'autocomplete' => 'off',
            'maxlength' => 128,
        ]))->addValidators([
            new PresenceOf([
                'message' => 'The name is required',
            ]),
        ])->setFilters([
            'string',
        ])->setLabel('Name'));

        $this->add(new Submit('submit', [
            'class' => 'btn btn-default',
            'value' => $submitValue,
        ]));
    }
}