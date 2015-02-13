<?php


App::uses('AppModel', 'Model');

class Country extends AppModel {
    public $name = 'countries';
	public function some_function() {
		$query = "hi";//$this->Country->find('first');
		return $query;
	}
}
