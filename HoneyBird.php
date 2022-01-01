<?php
require_once('Observer.php');

class HoneyBird implements Observer {

  private $hour;
  private $flowers;
  private $counter;
  private $status;

  public function __construct($hour)
  {
      $this->hour = $hour;
      $this->counter = 0;
      $this->status = ($this->hour >= 0 && $this->hour <= 11) ? 'feeding' : 'not feeding';
      $this->flowers = array();

  }

  public function onDayStart()
  {
      if ($this->hour === 0) {
        echo "DAY START ($this->hour)<br><br>";
        $this->status = 'feeding';
        $flower = $this->randomFlower();
        $this->feed($flower);
      }
  }

  public function randomFlower(){
    $rand_n = rand(0,9);
    $done = true;
    if($this->flowers[$rand_n]->getFeeds() === 0){
      foreach ($this->flowers as $key=>$flo) {
        if($flo->getFeeds() > 0){
            $done = false;
            return $this->randomFlower();
            break;
        }
      }
      if ($done = true) {
        echo 'EXIT ('.$this->counter.')';
        exit;
      }
    }
    else {
      return array($this->flowers[$rand_n],$rand_n);
    }
  }

  public function feed($flower){

    echo "HOUR CHANGE ($this->hour)<br>";
    $this->counter++;
    $flower[0]->setFeeds($flower[0]->getFeeds() - 1);
    echo "FLOWER-".$flower[1]." (".$flower[0]->getFeeds().")<br><br>";

  }

  public function add(Flower $flower){
    array_push($this->flowers,$flower);
  }

  public function onDayEnd()
  {
      if ($this->hour === 23){
        $this->status = 'not feeding';
        $this->counter++;
        echo "DAY END ($this->hour)<br><br>";
      }
  }

  public function onHourChange()
  {

      if ($this->hour >= 1 && $this->hour <= 11) {
          $this->status = 'feeding';
          $flower = $this->randomFlower();
          $this->feed($flower);
      }else{
        $this->status = 'not feeding';
        echo "HOUR CHANGE ($this->hour)<br>";
        $this->counter++;
        echo 'SLEEP<br><br>';
      }

  }

  public function getHour(){
    return $this->hour;
  }

  public function getStatus(){
    return $this->status;
  }

  public function update($hour)
  {
      $this->hour = $hour;
      if ($this->hour === 0) {
        $this->onDayStart();
      } elseif ($this->hour >= 1 && $this->hour < 23) {
        $this->onHourChange();
      } elseif ($this->hour === 23){
        $this->onDayEnd();
      }

  }

}
