<?php namespace Backend\Models;

class Text extends Model
{
    public $id;
    public $translate_id;
    public $value;
    public $lang;

    public function initialize()
    {
        $this->belongsTo('translate_id', 'Backend\Models\Translate', 'id', ['alias' => 'translate']);
    }
}