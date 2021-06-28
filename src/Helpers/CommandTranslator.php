<?php

namespace App\Helpers; 

class CommandTranslator 
{

	/**
	 *@param string $commandString 
	 *@param string $direction
	 *
	 *@return array $movements
	 */
	public function translate($commandString, $direction)
	{
		$commands = str_split($commandString); 
		$movements = [];
		foreach($commands as $command) 
		{
			$movement = $this->getMovement($command, $direction);	
			$direction = $movement->direction;
			$movements[] = $movement;
		}

		return $movements;
	}

	private function getMovement($command, $direction)
	{
		$x = $y = 0;

		$movement = new \stdClass;
		$movement->x = 0;
		$movement->y = 0;
		
		if ($direction === 'NORTH') {
			if ($command === 'F') {
				$movement->y++;
			} else if ($command === 'B') {
				$movement->y--;
			} else if ($command === 'L') {
				$direction = 'WEST';
			} else if ($command === 'R') {
				$direction = 'EAST';
			}
		} else if ($direction === 'SOUTH') {
			if ($command === 'F') {
				$movement->y--;
			} else if($command === 'B'){
				$movement->y++;
			} else if ($command === 'L') {
				$direction = 'EAST'; // better store in array leave for now
			} else if ($command === 'R') {
				$direction = 'WEST';
			}
		} else if ($direction === 'WEST') {
			if ($command === 'F') {
				$movement->x--;
			} else if ($command === 'B') {
				$movement->x++;
			} else if ($command === 'L') {
				$direction = 'SOUTH';
			} else if ($command === 'R') {
				$direction = 'NORTH';
			}
		} else if ($direction === 'EAST') {
			if ($command === 'F') {
				$movement->x++;
			} else if($command === 'B'){
				$movement->x--;
			} else if ($command === 'L') {
				$direction = 'NORTH'; // better store in array leave for now
			} else if ($command === 'R') {
				$direction = 'SOUTH';
			}
		}

		$movement->direction = $direction;

		return $movement;
	}
}


