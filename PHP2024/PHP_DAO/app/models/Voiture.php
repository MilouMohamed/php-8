<?php

namespace app\models;

class Voiture
{

  private $color;

  function getColor()
  {
    return $this->color;
  }

  function setColor($clr)
  {
    $this->color = $clr;
  }
}
