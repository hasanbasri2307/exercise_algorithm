<?php

abstract class Vehicles {
	public $sound;

	abstract protected function accelerate();
}

class Bike extends Vehicles {
	public $lubrication;

	public function __construct(){
		$this->lubrication = "normal";
		$this->sound = "Swosh";
	}

	public function accelerate(){
		$this->lubrication = "needs maintenance";
		echo $this->sound;
	}
}

class Car extends Vehicles {
	public $tank;

	public function __construct(){
		$this->tank = "full";
		$this->sound = "vroom";
	}

	public function accelerate(){
		$this->tank = "empty";
		echo $this->sound;
	}
}

$bike = new Bike();
echo $bike->sound;
echo "<br>";
echo $bike->lubrication;
echo "<br>";
$bike->accelerate();
echo "<br>";
echo $bike->lubrication;
echo "<br><br>";

$car = new Car();
echo $car->sound;
echo "<br>";
echo $car->tank;
echo "<br>";
$car->accelerate();
echo "<br>";
echo $car->tank;
