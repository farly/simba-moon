<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Helpers\CommandExecutioner;
use App\Helpers\CommandTranslator;
use App\Managers\SimbaManager;
use App\Models\Simba;

class SimbaController extends AbstractController
{

	/**
	 *@Route("/simba",methods={"POST"})
	 */
	public function land() : Response
	{
		$x = $this->generateRandomCoordinate();
		$y = $this->generateRandomCoordinate();
		$direction = $this->generateRandomHeading();
		$simba = new Simba($x, $y, $direction);

		$simba = $simbaManager = SimbaManager::getInstance()->create($simba); 

		return $this->json(['data' => ['id'=> $simba->getId(), 'position' => $simba->__toString()]]);
	}

	/**
	 *@Route("/simba/{id}",methods={"PATCH"})
	 */
	public function move(Request $request) 
	{
		$command = $request->get('command');
		$id = intval($request->get('id'));

		$simbaManager = SimbaManager::getInstance();

		$simba = $simbaManager->findByPk($id);

		if (is_null($simba)) {
			return $this->json(['data' => null]);
		}

		$commandExecutioner = new CommandExecutioner;
		$commandExecutioner->setCommandTranslator(new CommandTranslator);
		$history = $commandExecutioner->execute($command, $simba);

		$final = $history[count($history) - 1];

		$simba->setXCoordinate($final->x);
		$simba->setYCoordinate($final->y);
		$simba->setDirection($final->direction);

		$simbaManager->update($simba);

		return $this->json(['data' => ['id' => $id, 'position' => $simba->__toString()]]);
	}

	private function generateRandomHeading() {
		$heading = ['NORTH','EAST','SOUTH','WEST'];

		$random = rand(0,3);

		return $heading[$random];
	}

	private function generateRandomCoordinate() {
		return rand(-10, 10); // let us keep it small for now :D
	}
}	
