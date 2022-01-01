<?php
interface Subject {

 public function addObserver(Observer $observer);
 public function notify($hour);
 public function start();

}
