<?php

class Bird
{
  protected $name;
  protected $habitat;
  protected $diet;
  protected $nesting = "tree";
  protected $conservation;
  public $song = "chirp";
  public static $flying = "yes";
  private static $instanceCount = 0;
  protected static $eggNum = 0;

  public static function create()
  {
    self::$instanceCount++;
    return new self();
  }

  public static function canFly()
  {
    return static::$flying == "yes" ? " can fly" : " cannot fly and is stuck on the ground";
  }

  public static function getInstanceCount()
  {
    return self::$instanceCount;
  }
}

class YellowBelliedFlyCatcher extends Bird
{
  public $name = "yellow-bellied flycatcher";
  public $diet = "mostly insects";
  public $song = "flat chilk";
  protected static $eggNum = "3-4, sometimes 5.";
}

class Kiwi extends Bird
{
  public $name = "kiwi";
  public $diet = "omnivorous";
  public static $flying = "no";
}
