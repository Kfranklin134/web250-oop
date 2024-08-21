<?php

class Bicycle
{

  var $brand;
  var $model;
  var $year;
  var $description = 'Used bicycle';
  var $weight_kg = 0.0;

  function name()
  {
    return $this->year . " " . $this->brand . " " . $this->model;
  }

  function weight_lbs()
  {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($value)
  {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }
}

$schwinn = new Bicycle;
$schwinn->brand = 'Schwinn';
$schwinn->model = 'GTX Comfort';
$schwinn->year = '2023';
$schwinn->weight_kg = 2.0;

$canyon = new Bicycle;
$canyon->brand = 'Canyon';
$canyon->model = 'Endurance';
$canyon->year = '2024';
$canyon->weight_kg = 1.0;

echo $schwinn->name() . "<br>";
echo $canyon->name() . "<br>";

echo $schwinn->weight_kg . "<br>";
echo $schwinn->weight_lbs() . "<br>";

$schwinn->set_weight_lbs(2);
echo $schwinn->weight_kg . "<br>";
echo $schwinn->weight_lbs() . "<br>";
