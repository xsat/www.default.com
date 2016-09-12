<?php namespace Backend\Models;

class Translate extends Model
{
    public $id;
    public $key;
    public $group;
    public $description;

    public function initialize()
    {
        $this->hasMany('id', 'Backend\Models\Text', 'translate_id', ['alias' => 'texts']);
    }
}