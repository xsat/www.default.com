<?php namespace Backend\Forms;

use \Backend\Models\Access as AccessModel,
    \Backend\Models\Resource as ResourceModel,
    \Phalcon\Forms\Element\Select,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf,
    \Phalcon\Forms\Element\Submit;

class AccessForm extends Form
{
    public function initialize(AccessModel $user = null, $submitValue = 'Submit')
    {
        $this->add((new Select('resource_id', ResourceModel::find(), [
            'class' => 'form-control',
            'using' => [
                'id',
                'name',
            ],
        ]))->setFilters([
            'int',
        ])->addValidators([
            new PresenceOf([
                'message' => 'The resource is required',
            ]),
        ])->setLabel('Resource'));

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