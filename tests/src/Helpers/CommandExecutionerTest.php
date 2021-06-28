<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use App\Helpers\CommandExecutioner;
use App\Helpers\CommandTranslator;
use App\Models\Simba;


class CommandExecutionerTest extends TestCase
{
	public function setUp() : void
	{
		$this->commandExecutioner = new CommandExecutioner();
		$this->commandExecutioner->setCommandTranslator(new CommandTranslator);
	}

	public function testExecute() 
	{
		$simba = new Simba(1,1,'SOUTH');
		$history = $this->commandExecutioner->execute('RBRBB', $simba);

		$final = $history[count($history) - 1];

		$this->assertEquals($final->x,2);
		$this->assertEquals($final->y,-1);
		$this->assertEquals($final->direction,'NORTH');
	}
}
