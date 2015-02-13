<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $uses = array();

	public function add() {
		if ($this->request->is('post')) {
	        //Added this line
	        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been saved.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	    }

	}
}
