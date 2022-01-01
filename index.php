<?php
require_once('Flower.php');
require_once('HoneyBird.php');
require_once('Sun.php');

$sun = new Sun();

$flower1    = new Flower(0);
$flower2    = new Flower(0);
$flower3    = new Flower(0);
$flower4    = new Flower(0);
$flower5    = new Flower(0);
$flower6    = new Flower(0);
$flower7    = new Flower(0);
$flower8    = new Flower(0);
$flower7    = new Flower(0);
$flower8    = new Flower(0);
$flower9    = new Flower(0);
$flower10   = new Flower(0);


$honeyBird  = new HoneyBird(0);


$sun->addObserver($honeyBird);

$honeyBird->add($flower1);
$honeyBird->add($flower2);
$honeyBird->add($flower3);
$honeyBird->add($flower4);
$honeyBird->add($flower5);
$honeyBird->add($flower6);
$honeyBird->add($flower7);
$honeyBird->add($flower8);
$honeyBird->add($flower9);
$honeyBird->add($flower10);


echo "</hr>";

$sun->start();
