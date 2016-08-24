<?php namespace Backend\Forms;

use \Backend\Models\Role as RoleModel,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf,
    \Phalcon\Forms\Element\Submit;

class RoleForm extends Form
{
    public function initialize(RoleModel $user = null, $submitValue = 'Submit')
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