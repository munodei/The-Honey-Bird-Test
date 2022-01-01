<?php

require_once('Subject.php');

class Sun implements Subject
{
  private $observers;

  public function __construct()
  {
     $this->observers = array();
  }

  public function addObserver(Observer $observer){
    array_push($this->observers,$observer);
  }

  public function notify($hour){
    foreach ($this->observers as  $obs) {
        $obs->update($hour);
    }
  }

  public function start(){
    $this->day();
  }

  public function getCounter(){
    return $this->counter;
  }

  public function day(){
      for($i=0;$i<24;$i++):
        $this->notify($i);
        if($i == 23):
          $this->day();
        endif;
      endfor;
    }

}
