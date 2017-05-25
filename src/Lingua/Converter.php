<?php 

namespace WhiteCube\Lingua;

class Converter
{
    protected $original;

    public $repository;

    public function __construct($format)
    {
        $this->original = static::prepare($format);
        if($this->validate()) $this->parse();
    }

    public function getName()
    {
        if($this->repository) return $this->repository->name;
    }

    public function validate()
    {
        if(!static::check($this->original)) {
            throw new \Exception('Unable to create language from "' . $this->original . '"');
        }
        return true;
    }
}
