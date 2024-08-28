<?php

class Animal
{
  var $name;
  var $region;
  var $diet;
  var $canFly = false;

  function canFly()
  {
    if ($this->canFly == false) {
      return "The " . $this->name . " cannot fly.";
    } else {
      return "The " . $this->name . " can fly.";
    }
  }

  function animalDescription()
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

    return $description;
  }
}

class Mammal extends Animal
{
  var $furColor;
}

class Reptile extends Animal
{
  var $scaleType;
}

$elephant = new Mammal;
$elephant->name = "elephant";
$elephant->region = "Africa";
$elephant->diet = "herbivore";
$elephant->furColor = "grayish brown";

$bat = new Mammal;
$bat->name = "bat";
$bat->region = "Europe, Africa, Asia, Australia, and the Americas";
$bat->diet = "carnivore";
$bat->canFly = true;
$bat->furColor = "red, tan, brown, or gray";

$snake = new Reptile;
$snake->name = "snake";
$snake->region = "Africa, Asia, and the Americas";
$snake->diet = "carnivore";
$snake->scaleType = "smooth";

$iguana = new Reptile;
$iguana->name = "iguana";
$iguana->region = "Central and South America";
$iguana->diet = "herbivore";
$iguana->scaleType = "bumpy";

echo $elephant->animalDescription() . "<br><br>";
echo $bat->animalDescription() . "<br><br>";
echo $snake->animalDescription() . "<br><br>";
echo $iguana->animalDescription() . "<br><br>";
