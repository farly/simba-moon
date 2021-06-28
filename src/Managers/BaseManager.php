<?php

namespace App\Managers;

class BaseManager
{
	// fake insert
	public function create($model) {
		$currentId = count($this->collection);

		$model->setId($currentId + 1);

		$this->collection[] = $model;

		return $model;
	}	

	public function findByPk($id) {
		foreach($this->collection as $model) {
			if ($model->getId() === $id) return $model;
		}

		return null;
	}
}
