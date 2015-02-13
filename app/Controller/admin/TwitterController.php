<?php


App::uses('AppController', 'Controller');


class TwitterController extends AppController {

	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Country.name' => 'asc'
        )
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'filter');//without authentication we can view this pages
         $this->layout = 'custom';
    }

    public function index() {
        $this->loadModel('Country');
        //$allCountries = $this->Country->find('all');//fetch all
        $this->paginate = array(
                 'limit' => 5,
                'order' => array(
                    'Country.name' => 'asc'
                )
             );
        //$this->Paginator->settings = $this->paginate;
        //$countries = $this->Paginator->paginate('Country');
        $countries = $this->paginate('Country');
        $this->set(compact('countries'));
        /*$data = array(
            'color' => 'pink',
            'type' => 'sugar',
            'base_price' => 23.95
        );
        $this->set($data);*/
        // pass them to the view
        /*$genres = $this->Movie->Genre->find('list');
        $directors = $this->Movie->Director->find('list');
        $this->set(compact('genres', 'directors'));*/
        //$this->render('/Elements/ajaxreturn');
    }

    public function filter(){
        $conditions = array();

        if($this->Session->check('conditions')){
          $conditions = $this->Session->read('conditions');
        }

        if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            $search = $this->data['Filter']['search'];
            $conditions = array('Country.name LIKE' => '%'.$search.'%');
            $this->Session->write('conditions',$conditions);
        }
        $this->loadModel('Country');
        
        $this->paginate = array(
                'conditions' => $conditions,
                 'limit' => 25,
                'order' => array(
                    'Country.name' => 'asc'
                )
             );
        $this->Paginator->settings = $this->paginate;
        $countries = $this->paginate('Country');
        $this->set(compact('countries'));
        //print_r($conditions);
        $this->render('/Countries/index');
    }

    public function add(){

    }

    public function edit($id=NULL){

    }

    public function delete($id=NULL){

    }
}
