<?php

class Animal
{
  public $name;
  public $region;
  public $diet;
  private $canFly = false;
  protected $habitat;

  public function setCanFly($canFly)
  {
    $this->canFly = $canFly;
  }
  public function canFly()
  {
    if ($this->canFly == false) {
      return "The " . $this->name . " cannot fly.";
    } else {
      return "The " . $this->name . " can fly.";
    }
  }

  public function setHabitat($habitat)
  {
    $this->habitat = $habitat;
  }

  public function getHabitat()
  {
    return $this->habitat;
  }

  public function animalDescription()
  {
    $description = "The " . $this->name . " is from " . $this->region . " and it is a(n) " . $this->diet . ". " . $this->canFly();

    // Check if the animal is an instance of Mammal
    if ($this instanceof Mammal) {
      $description .= " It is a mammal with " . $this->furColor . " fur.";
    }

    // Check if the animal is an instance of Reptile
    if ($this instanceof Reptile) {
      $description .= " It is a reptile with " . $this->scaleType . " scales.";
    }

    if ($this->habitat) {
      $description .= " It typically lives in " . $this->habitat . ".";
    }

    return $description;
  }
}

class Mammal extends Animal
{
  public $furColor;
}

class Reptile extends Animal
{
  public $scaleType;
}

$elephant = new Mammal;
$elephant->name = "elephant";
$elephant->region = "Africa";
$elephant->diet = "herbivore";
$elephant->furColor = "grayish brown";
$elephant->setHabitat("savannahs and forests");

$bat = new Mammal;
$bat->name = "bat";
$bat->region = "Europe, Africa, Asia, Australia, and the Americas";
$bat->diet = "carnivore";
$bat->setCanFly(true);
$bat->furColor = "red, tan, brown, or gray";
$bat->setHabitat("caves and forests");

$snake = new Reptile;
$snake->name = "snake";
$snake->region = "Africa, Asia, and the Americas";
$snake->diet = "carnivore";
$snake->scaleType = "smooth";
$snake->setHabitat("various environments including deserts and forests");

$iguana = new Reptile;
$iguana->name = "iguana";
$iguana->region = "Central and South America";
$iguana->diet = "herbivore";
$iguana->scaleType = "bumpy";
$iguana->setHabitat("tropical areas and rainforests");

echo $elephant->animalDescription() . "<br><hr>";
echo $bat->animalDescription() . "<br><hr>";
echo $snake->animalDescription() . "<br><hr>";
echo $iguana->animalDescription() . "<br><hr>";
