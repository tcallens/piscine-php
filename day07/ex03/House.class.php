<?php
abstract Class House {
	public function introduce()	{
		echo "House " . static::getHouseName();
		echo " of " . static::getHouseSeat();
		echo ' : "' . static::getHouseMotto() . '"' . PHP_EOL;
	}
	abstract public function getHouseName();
	abstract public function getHouseSeat();
	abstract public function getHouseMotto();	
}
?>
