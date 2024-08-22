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
