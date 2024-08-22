<?php

class Bird
{
  var $commonName;
  var $food = 'bugs';
  var $nestPlacement = 'tree';
  var $conservationLevel = 'least concern';

  function diet()
  {
    return $this->commonName . " eats " . $this->food;
  }

  function concern()
  {
    return $this->commonName . " is at a conservation level of " . $this->conservationLevel;
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, and spiders';
$bird1->nestPlacement = 'ground';
$bird1->conservationLevel = 'Low';

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'roadsides';
$bird2->conservationLevel = 'Low';

echo $bird1->commonName . "<br>";
echo $bird1->diet() . "<br>";
echo $bird1->concern() . "<br><br>";

echo $bird2->commonName . "<br>";
echo $bird2->diet() . "<br>";
echo $bird2->concern() . "<br><br>";
