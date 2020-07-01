<?php


class Family {

    private $count = 0;
    public $dad = 0;
    public $mum = 0;
    public $children = 0;
    public $dog = 0;
    public $cat = 0;
    public $goldfish = 0;

    public function count() :int {
        return $this->count;
    }

    public function increaseFamily() : void {
        $this->count++;
    }

    public function addDad() : void {
        if( $this->dad == 1) {
            echo 'ERROR: The family already has a dad. (No support for modern families yet. :))';
        } else {
            $this->dad = 1;
            $this->increaseFamily();
        }
    }



}