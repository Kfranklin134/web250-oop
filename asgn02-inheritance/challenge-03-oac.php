<?php

class Bicycle
{

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weight_kg = 0.0;
  protected $wheels = 2;

  public function name()
  {
    return $this->year . " " . $this->brand . " " . $this->model;
  }

  public function wheel_details()
  {
    $wheel_string = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheel_string . ".";
  }

  public function weight_kg()
  {
    return $this->weight_kg . " kg";
  }

  public function set_weight_kg($value)
  {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs()
  {
    return floatval($this->weight_kg) * 2.2046226218 . " lbs";
  }

  public function set_weight_lbs($value)
  {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }
}

class Unicycle extends Bicycle
{
  protected $wheels = 1;
}

$schwinn = new Bicycle;
$schwinn->brand = 'Schwinn';
$schwinn->model = 'GTX Comfort';
$schwinn->year = '2023';

$uni = new Unicycle;

echo "Bicycle: " . $schwinn->wheel_details() . "<br>";
echo "Unicycle: " . $uni->wheel_details() . "<br>";
echo "<hr>";

echo "Set weight using kg<br>";
$schwinn->set_weight_kg(1);
echo $schwinn->weight_kg() . "<br>";
echo $schwinn->weight_lbs() . "<br>";
echo "<hr>";

echo "Set weight using lbs<br>";
$schwinn->set_weight_lbs(2);
echo $schwinn->weight_kg() . "<br>";
echo $schwinn->weight_lbs() . "<br>";
echo "<hr>";
