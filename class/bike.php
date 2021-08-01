<?php
class Bike {
  // Properties
  public $x_bike;
  public $y_bike;
  public $direction;
  public $x_boundary;
  public $y_boundary;


  public function __construct($x_bike,$y_bike,$direction,$x_boundary,$y_boundary) {
    //initiate
      $this->x_bike = $x_bike;
      $this->y_bike = $y_bike;
      $this->direction = $direction;
      $this->x_boundary = $x_boundary;
      $this->y_boundary = $y_boundary;
    }

  public function get_x_bike():Int {
    return $this->x_bike;
  }

  public function get_y_bike():Int  {
    return $this->y_bike;
  }

  public function get_direction():String  {
    return $this->direction;
  }

  public function move():Bool{
    $new_x_bike=$this->x_bike;
    $new_y_bike=$this->y_bike;

    //change value to x or y depend of facing direction
      switch ($this->direction) {
        case 'WEST':
          $new_x_bike--;
        break;
        case 'SOUTH':
          $new_y_bike--;
        break;
        case 'EAST':
          $new_x_bike++;
        break;
        case 'NORTH':
          $new_y_bike++;
        break;
      }

    //check if the new postition is valid
    if($this->valid_position($new_x_bike,$new_y_bike)){
      //if valid, update current postion
      $this->x_bike=$new_x_bike;
      $this->y_bike=$new_y_bike;
      return true;
    }else{
      //else ignore
      return false;
    }

  }

  //cannot exceed boundry
  private function valid_position($new_x_bike,$new_y_bike):Bool{
    // if new position is not within 0 and boundary
    if($new_x_bike<0 || $new_x_bike>($this->x_boundary) || $new_y_bike<0 || $new_y_bike>($this->y_boundary) ){
      return false;
    }else{
      return true;
    }

  }

  public function change_direction($input):Bool{

    $valid_direction=array("NORTH","EAST","SOUTH","WEST");

    if($input=='TURN_LEFT'){
      //new direction is the previous value in array
      $left_key= (array_search($this->direction, $valid_direction)-1);
      if($left_key<0){
        $left_key=3;
      }
      $this->direction=$valid_direction[$left_key];

    }elseif($input=='TURN_RIGHT'){
      //new direction is the next value in array
      $right_key= (array_search($this->direction, $valid_direction)+1);
      if($right_key>3){
        $right_key=0;
      }
      $this->direction=$valid_direction[$right_key];
    }
    return true;

  }

}
?>
