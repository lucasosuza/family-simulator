<?php


class Family
{

    private int $count = 0;

    public int $dad = 0;
    public int $mum = 0;
    public int $children = 0;
    public int $dog = 0;
    public int $cat = 0;
    public int $goldfish = 0;

    public function count(): int
    {
        return $this->count;
    }

    public function increaseFamily(): void
    {
        $this->count++;
    }

    public function addDad(): void
    {
        if ($this->dad == 1) {
            echo 'ERROR: The family already has a dad. (No support for modern families yet. :))';
        } else {
            $this->dad = 1;
            $this->increaseFamily();
        }
    }

    public function addMum(): void
    {
        if ($this->mum == 1) {
            echo 'ERROR: The family already has a mum. (No support for modern families yet. :))';
        } else {
            $this->mum = 1;
            $this->increaseFamily();
        }
    }

    /**
     * @return bool
     */
    public function hasMum(): bool
    {
        return $this->mum == 1;
    }

    /**
     * @return bool
     */
    public function hasDad(): bool
    {
        return $this->dad == 1;
    }

    /**
     * @return bool
     */
    public function dontHaveParents(): bool
    {
        return !$this->hasMum() || !$this->hasDad();
    }

    public function addChild(): void
    {
        if ($this->dontHaveParents()) {
            echo 'ERROR: No child without a mum and a dad.';
        } else {
            $this->children++;
            $this->increaseFamily();
        }
    }

    public function addCat()
    {
        if ($this->dontHaveParents()) {
            echo 'ERROR: No cat without a mum or a dad.';
        } else {
            $this->cat++;
            $this->increaseFamily();
        }
    }

    public function addDog()
    {
        if ($this->dontHaveParents()) {
            echo 'ERROR: No dog without a mum or a dad.';
        } else {
            $this->dog++;
            $this->increaseFamily();
        }
    }

    public function addGoldfish()
    {
        if ($this->dontHaveParents())  {
            echo 'ERROR: No goldfish without a mum or a dad.';
        } else {
            $this->goldfish++;
            $this->increaseFamily();
        }
    }

    public function adaptChild() {
        if (!$this->hasMum()) {
            echo 'ERROR: No adapted child without a mum.';
        } else {
            $this->children++;
            $this->increaseFamily();
        }
    }

}