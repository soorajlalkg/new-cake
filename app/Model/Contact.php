<?php


App::uses('AppModel', 'Model');

class Contact extends AppModel {
    public $name = 'contacts';
	public function some_function() {
		$query = "hi";//$this->Country->find('first');
		return $query;
	}
}
