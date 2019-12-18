<?php


namespace core\base;


abstract class Model
{
    public $atributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {

    }
}