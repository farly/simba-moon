<?php

namespace App\Models;

class BaseModel
{
	private $id;
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}
}
