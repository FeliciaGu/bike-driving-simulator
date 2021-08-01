# bike-driving-simulator
For BGL Code Challenge

Description
-----------
This application allows user to move a bike on a 7x7 square table by typing instruction on command line.

Starting with command to place bike on the board:

PLACE X,Y,F

- Must start with PLACE command
- X and Y must be greater or equal to 0 and less than 7
- Facing position can be NORTH, EAST, SOUTH or WEST
- letter case does not matter

Following with movement command to change bike’s current location on board

FORWARD
TURN_LEFT
TURN_RIGHT

- only above movement commands are allowed
- only one command allowed at one time
- FORWARD will only move 1 space at a time
- letter case does not matter
- if next move landed outside 7x7 grid, the move will be ignored

Finishing with report command to report bike’s current position on board

GPS_REPORT

- letter case does not matter

After reporting location, the program will start from beginning asking to place bike on board again.


Usage
-----------
php main.php

##Example

    PLACE 1,2,EAST

    FORWARD

    TURN_LEFT

    FORWARD

    TURN_RIGHT

    GPS_REPORT


Expected output
    (2,3),EAST


Testing
-----------
./vendor/bin/phpunit tests
