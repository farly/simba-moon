<?php

namespace App\Managers;

class SimbaManager extends BaseManager
{
	private static $instance = null;

	protected $collection = [];
	
	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new SimbaManager;
		}	

		return self::$instance;
	}
}

