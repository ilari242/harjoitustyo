<?php
class Task
{
	public $description;
	public $completed;
	public $id;

	public function isCompleted()
	{
		return $this->completed;
	}

	public function complete()
	{
		$this->completed = true;
	}
}