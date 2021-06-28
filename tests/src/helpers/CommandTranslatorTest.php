<?php

namespace App\Tests\Helpers;

use PHPUnit\Framework\TestCase;
use App\Helpers\CommandTranslator;

class CommandTranslatorTest extends TestCase
{
	public function setUp(): void 
	{
		$this->commandTranslator = new CommandTranslator();
	}

	public function testTranslate() 
	{
		// test along same face axis movement
		$movements = $this->commandTranslator->translate('FF', 'NORTH');
		foreach($movements as $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, 1);
			$this->assertEquals($movement->direction, 'NORTH');
		}

		// test along same opposite axis movement
		$movements = $this->commandTranslator->translate('BB', 'NORTH');
		foreach($movements as  $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, -1);
			$this->assertEquals($movement->direction, 'NORTH');
		}

		// tests rotation L
		$movements = $this->commandTranslator->translate('L','NORTH');
		foreach($movements as $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, 0);
			$this->assertEquals($movement->direction, 'WEST');
		}	
		
		$movements = $this->commandTranslator->translate('L','WEST');
		foreach($movements as $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, 0);
			$this->assertEquals($movement->direction, 'SOUTH');
		}

		// tests rotation R
		$movements = $this->commandTranslator->translate('R','NORTH');
		foreach($movements as $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, 0);
			$this->assertEquals($movement->direction, 'EAST');
		}	
		
		$movements = $this->commandTranslator->translate('R','WEST');
		foreach($movements as $movement)
		{
			$this->assertEquals($movement->x, 0);
			$this->assertEquals($movement->y, 0);
			$this->assertEquals($movement->direction, 'NORTH');
		}
	}
}
