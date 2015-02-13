<?php


App::uses('AppModel', 'Model');

class Book extends AppModel {
    public $name = 'books';
	public function some_function() {
		$query = "hi";//$this->Country->find('first');
		return $query;
	}

	public function test_function()
    {
        return $this->query("SELECT * FROM countries");
    }
}
