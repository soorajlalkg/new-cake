<?php


App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Admin extends AppModel {
    var $name = 'admin_users';
}
