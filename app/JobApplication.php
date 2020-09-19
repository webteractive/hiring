<?php

namespace App;

class JobApplication
{
  public $name;
  public $email;
  public $resume;
  public $position;
  public $coverLetter;

  public function from($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
    return $this;
  }

  public function attach($resume)
  {
    $this->resume = $resume;    
    return $this;
  }

  public function with($coverLetter)
  {
    $this->coverLetter = $coverLetter;
    return $this;
  }

  public function for($position)
  {
    $this->position = $position;
    return $this;
  }

}