<?php


final class Family {

    public $count;
    public $dad;
    public $mum;
    public $children;
    public $dog;
    public $cat;
    public $goldfish;

    public function __construct(int $count = 0) {
        $this->count = $count;
    }

    public function getCount() :int {
        return $this->count;
    }
}