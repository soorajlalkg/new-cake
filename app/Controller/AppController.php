<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
        'Session',
        'Auth' => array(
	        'loginRedirect'  => array('controller' => 'users', 'action' => 'index'),
	        'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
	        'authError' 	 => 'You must be logged in to view this page.',
	        'loginError' 	 => 'Invalid Username or Password entered, please try again.'
    	)
    );
//http://stackoverflow.com/questions/13167367/cakephp-2-x-auth-with-two-separate-logins
    public function beforeFilter() {
	    //$this->Auth->allow('login');
	    if ($this->request->prefix == 'admin') {
            // Specify which controller/action handles logging in:
            AuthComponent::$sessionKey = 'Auth.Admin'; // solution from http://stackoverflow.com/questions/10538159/cakephp-auth-component-with-two-models-session
            $this->Auth->loginAction = array('controller'=>'users','action'=>'admin_login');
            if($this->Auth->user('role') == 'admin'){
			     $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'admin_index');
			}else{
			     $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
			}
            //$this->Auth->loginRedirect = array('controller'=>'users','action'=>'admin_index');
            $this->Auth->logoutRedirect = array('controller'=>'users','action'=>'admin_login');

            $this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'User',
                )
            );
            $this->Auth->allow('admin_login');
        } else {
            // If we get here, it is neither a 'phys' prefixed method, not an 'admin' prefixed method.
            // So, just allow access to everyone - or, alternatively, you could deny access - $this->Auth->deny();
            $this->Auth->allow('login');           
        }
	}
	 
	public function isAuthorized($user) {
	    // Here is where we should verify the role and give access based on role
	     
	    return true;
	}
}
