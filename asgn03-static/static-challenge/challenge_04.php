<?php

class Bicycle
{
  public static $instance_count = 0;

  public $brand;
  public $model;
  public $year;
  public $category;
  public $description = 'Used bicycle';
  private $weight_kg = 0.0;
  protected static $wheels = 2;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'City', 'Cruiser', ' BMX'];

  public static function create()
  {
    $class_name = get_called_class();
    $obj = new $class_name;
    self::$instance_count++;
    return $obj;
  }

  public function name()
  {
    return $this->year . " " . $this->brand . " " . $this->model;
  }

  public static function wheel_details()
  {
    $wheel_string = static::$wheels == 1 ? '1 wheel' : static::$wheels . ' wheels';
    return 'It has ' . $wheel_string . '.';
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
  protected static $wheels = 1;
}

$schwinn = new Bicycle;
$schwinn->brand = 'Schwinn';
$schwinn->model = 'GTX Comfort';
$schwinn->year = '2023';

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br>';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br>';

$bike = Bicycle::create();
$uni = Unicycle::create();

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br>';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br>';

echo '<hr>';
echo 'Categories: ' . implode(', ', Bicycle::CATEGORIES) . '<br>';
$schwinn->category = Bicycle::CATEGORIES[2];
echo 'Category: ' . $schwinn->category . '<br>';

echo '<hr>';

echo 'Bicycle: ' . Bicycle::wheel_details() . '<br>';
echo 'Unicycle: ' . Unicycle::wheel_details() . '<br>';
