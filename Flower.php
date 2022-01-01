<?php

require_once('Observer.php');

class Flower implements Observer {

  private $hour;
  private $feeds;
  private $status;

  public function __construct($hour)
  {
      $this->hour = $hour;
      $this->status = 'open';
      $this->feeds = 10;
  }

  public function onDayStart()
  {
      if ($this->hour === 0) {
        //echo 'Flower Open';
        $this->status = 'open';
      }
  }

  public  function getFeeds(){
    return $this->feeds;
  }

  public  function getStatus(){
    return $this->status;
  }

  public  function setFeeds(int $value){
    $this->feeds = $value;
  }

  public  function setStatus(int $value){
    $this->feeds = $value;
  }

  public function onDayEnd()
  {
    if ($this->hour === 23){
      //echo 'Flower Closed';
      $this->status = 'closed';
    }
  }

  public function onHourChange()
  {
    if ($this->hour >= 0 && $this->hour < 12) {
        //echo  'Flower Open';
          $this->status = 'open';
    }else{
       //echo  'Flower Closed';
         $this->status = 'closed';
    }
  }

  public function update()
  {
      if ($this->hour === 0) {
        $this->onDayStart();
      } elseif ($this->hour >= 1 && $this->hour < 23) {
        $this->onHourChange();
      }elseif ($this->hour === 23){
        $this->onDayEnd();
      }
  }
}
