<?php

namespace App\Tests\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Managers\SimbaManager;

class SimbaControllerTest extends WebTestCase
{

	public function testPost() : void
	{
		$client = static::createClient();

		$crawler = $client->request('POST','/simba');

		$response = $client->getResponse();

		$data = json_decode($response->getContent(), true)['data'];

		
		$simba = SimbaManager::getInstance()->findByPk(1);

		$this->assertEquals($simba->getId(), $data['id']);
		$this->assertEquals($simba->__toString(), $data['position']);
	}

	public function testPatch() : void
	{
		$client = static::createClient();

		$body = ['command' => 'BB'];

		$client->xmlHttpRequest('PATCH','/simba/1',$body);
		$response = $client->getResponse();

		$simba = SimbaManager::getInstance()->findByPk(1);

		$data = json_decode($response->getContent(), true)['data'];

		$this->assertEquals($simba->getId(), $data['id']);
		$this->assertEquals($simba->__toString(), $data['position']);
	}
}
