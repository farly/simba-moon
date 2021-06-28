<?php

namespace App\Managers;

use App\Models\BaseModel;

class BaseManager
{
	// fake insert
	public function create(BaseModel $model) {
		$currentId = count($this->collection);

		$model->setId($currentId + 1);

		$this->collection[] = $model;

		return $model;
	}	

	public function update(BaseModel $updatedModel) {
		foreach($this->collection as $index => $model) {
			if ($model->getId() === $updatedModel->getId()) {
				$this->collection[$index] = $updatedModel;
				break;
			}
		}
	}

	public function findByPk($id) {
		foreach($this->collection as $model) {
			if ($model->getId() === $id) return $model;
		}

		return null;
	}
}
