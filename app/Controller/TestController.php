<?php


App::uses('AppController', 'Controller');


class TestController extends AppController {

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'filter');//without authentication we can view this pages
         $this->layout = 'custom';
    }

    public function index() {
        $this->loadModel('User');
        //$result = $this->User->find('all');

        $options=array(             
                'joins' =>
                          array(
                            array(
                                'table' => 'contacts',
                                'alias' => 'Contact',
                                'type' => 'left',
                                'foreignKey' => false,
                                'conditions'=> array('Contact.user_id = User.id')
                            ),
                            /*array(
                                'table' => 'deals',
                                'alias' => 'Deal',
                                'type' => 'left',
                                'foreignKey' => false,
                                'conditions'=> array('Deal.id = Purchase.deal_id')
                            ), */ 
             )  ,
            'fields' => array('User.username','User.id','Contact.phone')
        );
        $coupons = $this->User->find('all', $options);
        echo '<pre>';print_r($coupons);
        //echo $coupons[0]['Contact']['phone'];

        /*$result = $this->User->Contact->find('list', array(
                    //'fields' => array('Users.username')
                ));
        echo '<pre>';
        print_r($result);*/
        //exit;
    }

    
}
