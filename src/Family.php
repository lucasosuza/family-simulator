<?php


final class Family {

    private $count;

    public function __construct(int $count = 0) {
        $this->count = $count;
    }

    public function getName() :int {
        return $this->count;
    }
}