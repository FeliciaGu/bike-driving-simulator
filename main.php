<?php

require_once('class/bike.php');

$valid_direction=array("NORTH","EAST","SOUTH","WEST");
$x_boundary=7;
$y_boundary=7;

//continously waiting for user input
while(true){

  echo "\nplease enter your command as format: PLACE X,Y,F \n";
  $input = read_input();

  //split input
  $input=explode(" ",$input);
  //must start with "PLACE"
  if($input[0]=='PLACE' && isset($input[1])){

    //make sure X,Y  >=0 and <boundry
    $start=explode(",",$input[1]);

    if($start[0]>=0 && $start[0]<$x_boundary && $start[1]>=0 && $start[1]<$y_boundary && in_array($start[2],$valid_direction)){
      //initiate object
      $bike = new Bike($start[0],$start[1],$start[2],$x_boundary,$y_boundary);
      $input='';

      //keep waiting for movement commend until user put in "GPS_REPORT"
      while($input!='GPS_REPORT'){
          echo "please enter a movement command (FORWARD,TURN_LEFT,TURN_RIGHT) or end with (GPS_REPORT) \n";
          $input = read_input();

          //change location value base on user input
          switch ($input) {
            case 'FORWARD':
              $bike->move();
            break;

            case 'TURN_LEFT':
            case 'TURN_RIGHT':
              $bike->change_direction($input);
            break;

            case 'GPS_REPORT':
            break;

            default:
              echo $input." is not a valid input \n";
            break;
          }
      }
        //output current bike direction
        echo "\nCurrent Postion: (".$bike->get_x_bike().",".$bike->get_y_bike()."),".$bike->get_direction()."\n";

    }else{
      echo "please make sure you have entered a valid location \n";
    }

  }else{
    echo $input[0]." is not a valid command \n";
  }

}

function read_input(){
  $handle = fopen ("php://stdin","r");
  //remove carriage returns, change all to uppercase
  $input = str_replace("\n", '', strtoupper(fgets($handle)));
  fclose($handle);
  return $input;
}

?>
