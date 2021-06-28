<?php

namespace App\Models;

class Simba extends BaseModel
{
	private $xCoordinate, $yCoordinate, $direction; 

	public function __construct($xCoordinate, $yCoordinate, $direction) {
		$this->xCoordinate = $xCoordinate;
		$this->yCoordinate = $yCoordinate;
		$this->direction = $direction;
	}

	public function getXCoordinate() {
		return $this->xCoordinate;
	}

	public function getYCoordinate() {
		return $this->yCoordinate;
	}

	public function getDirection() {
		return $this->direction;
	}

	public function setXCoordinate($xCoordinate) {
		$this->xCoordinate = $xCoordinate;
	}

	public function setYCoordinate($yCoordinate) {
		$this->yCoordinate = $yCoordinate;
	}

	public function setDirection($direction) {
		$this->direction = $direction;
	}
}
