<?php
use PHPUnit\Framework\TestCase;
require_once dirname( __FILE__ ) . '/' . '../class/bike.php';

class mainTest extends TestCase{

  public function test1_get_x_bike(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $this->assertEquals(0, $bike->get_x_bike());
  }

  public function test2_get_x_bike(){
    $bike=new Bike(1,0,"NORTH",7,7);
    $this->assertEquals(1, $bike->get_x_bike());
  }

  public function test3_get_x_bike(){
    $bike=new Bike(2,0,"NORTH",7,7);
    $this->assertEquals(2, $bike->get_x_bike());
  }

  public function test1_get_y_bike(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $this->assertEquals(0, $bike->get_y_bike());
  }

  public function test2_get_y_bike(){
    $bike=new Bike(0,1,"NORTH",7,7);
    $this->assertEquals(1, $bike->get_y_bike());
  }

  public function test3_get_y_bike(){
    $bike=new Bike(0,2,"NORTH",7,7);
    $this->assertEquals(2, $bike->get_y_bike());
  }

  public function test1_get_direction(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $this->assertEquals("NORTH", $bike->get_direction());
  }

  public function test2_get_direction(){
    $bike=new Bike(0,0,"EAST",7,7);
    $this->assertEquals("EAST", $bike->get_direction());
  }

  public function test3_get_direction(){
    $bike=new Bike(0,0,"SOUTH",7,7);
    $this->assertEquals("SOUTH", $bike->get_direction());
  }

  public function test4_get_direction(){
    $bike=new Bike(0,0,"WEST",7,7);
    $this->assertEquals("WEST", $bike->get_direction());
  }

  public function test1_move(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $bike->move();
    $this->assertEquals("0", $bike->get_x_bike());
    $this->assertEquals("1", $bike->get_y_bike());
  }

  public function test2_move(){
    $bike=new Bike(0,1,"SOUTH",7,7);
    $bike->move();
    $this->assertEquals("0", $bike->get_x_bike());
    $this->assertEquals("0", $bike->get_y_bike());
  }

  public function test3_move(){
    $bike=new Bike(0,0,"EAST",7,7);
    $bike->move();
    $this->assertEquals("1", $bike->get_x_bike());
    $this->assertEquals("0", $bike->get_y_bike());
  }

  public function test4_move(){
    $bike=new Bike(1,0,"WEST",7,7);
    $bike->move();
    $this->assertEquals("0", $bike->get_x_bike());
    $this->assertEquals("0", $bike->get_y_bike());
  }

  public function test1_validate_position(){
    $bike=new Bike(0,7,"NORTH",7,7);
    $this->assertEquals(false, $bike->move());
  }

  public function test2_validate_position(){
    $bike=new Bike(0,0,"SOUTH",7,7);
    $this->assertEquals(false, $bike->move());
  }

  public function test3_validate_position(){
    $bike=new Bike(7,0,"EAST",7,7);
    $this->assertEquals(false, $bike->move());
  }

  public function test4_validate_position(){
    $bike=new Bike(0,0,"WEST",7,7);
    $this->assertEquals(false, $bike->move());
  }

  public function test1_change_direction(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $bike->change_direction('TURN_LEFT');
    $this->assertEquals("WEST", $bike->get_direction());
  }

  public function test2_change_direction(){
    $bike=new Bike(0,0,"NORTH",7,7);
    $bike->change_direction('TURN_RIGHT');
    $this->assertEquals("EAST", $bike->get_direction());
  }

  public function test3_change_direction(){
    $bike=new Bike(0,0,"SOUTH",7,7);
    $bike->change_direction('TURN_LEFT');
    $this->assertEquals("EAST", $bike->get_direction());
  }

  public function test4_change_direction(){
    $bike=new Bike(0,0,"SOUTH",7,7);
    $bike->change_direction('TURN_RIGHT');
    $this->assertEquals("WEST", $bike->get_direction());
  }


}


?>
