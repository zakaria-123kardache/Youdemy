<?php

namespace App\Model;

class Tagcategories
{

    protected int $id = 0;
    protected string $name ="" ;
    protected string $description ="";

    public function __construct() {}

    public function setId(int $îd): void
    {
        $this->id = $îd;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }


    public function __toString()
    {
        return "(Tagcategories)=> id :".$this->id."(Tagcategories) => name :".$this->name.
        "(Tagcategories) => description :".$this->description ;
    }
}
