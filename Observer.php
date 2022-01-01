<?php

interface Observer {
  public function onDayStart();
  public function onDayEnd();
  public function onHourChange();
}
