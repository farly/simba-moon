<?php

namespace App\Tests\Managers;

use PHPUnit\Framework\TestCase;
use App\Managers\SimbaManager;
use App\Models\Simba;

class SimbaManagerTest extends TestCase
{
	public function setUp() : void 
	{
		$this->simbaManager = SimbaManager::getInstance();
	}

	public function testCreate()
	{
		$simba = $this->simbaManager->create(new Simba(1,1,'NORTH'));

		$this->assertEquals($simba->getId(), 1);
		$this->assertEquals($simba->getXCoordinate(), 1);
		$this->assertEquals($simba->getYCoordinate(), 1);
		$this->assertEquals($simba->getDirection(), 'NORTH');

		$simba = $this->simbaManager->create(new Simba(-1,2,'SOUTH'));

		$this->assertEquals($simba->getId(), 2);
		$this->assertEquals($simba->getXCoordinate(), -1);
		$this->assertEquals($simba->getYCoordinate(), 2);
		$this->assertEquals($simba->getDirection(), 'SOUTH');
	}

	// should be a test on base model
	public function testFindByPk()
	{
		$this->simbaManager->create(new Simba(1,1,'NORTH'));
		$this->simbaManager->create(new Simba(3,1,'NORTH'));
		$this->simbaManager->create(new Simba(1,5,'WEST'));
		$this->simbaManager->create(new Simba(2,9,'EAST'));

		$simba = $this->simbaManager->findByPk(4);	
		$this->assertEquals($simba->getXCoordinate(), 3);
		$this->assertEquals($simba->getYCoordinate(), 1);
		$this->assertEquals($simba->getDirection(), 'NORTH');
	}
}
