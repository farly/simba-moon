<?php

namespace App\Helpers;

use App\Models\Simba;

class CommandExecutioner 
{
	private $commandTranslator;

	public function setCommandTranslator(CommandTranslator $commandTranslator) 
	{
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command, Simba $simba) {
		$position = new \stdClass;
		$position->x = $simba->getXCoordinate();
		$position->y = $simba->getYCoordinate();

		$history = [];
		
		$movements = $this->commandTranslator->translate($command, $simba->getDirection());
		foreach($movements as $movement) 
		{
			$position->x = $position->x + $movement->x;
			$position->y = $position->y + $movement->y;
			$position->direction = $movement->direction;

			$history[] = $position;
		}

		return $history;
	}
}
