<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel{
	
	public $validate = array(
			'Name' => array(
					'rule' => 'notEmpty'
			),
			'Email_Address' => array(
					'required' => array(
				                'rule' => array('email', true),    
				                'message' => 'Please provide a valid email address.'   
				            ),
			),
			'Password' => array(
		            'required' => array(
		                'rule' => array('notEmpty'),
		                'message' => 'A password is required'
		            ),
		            'min_length' => array(
		                'rule' => array('minLength', '6'),  
		                'message' => 'Password must have a mimimum of 6 characters'
		            )
		        ),
			
	);


 	public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['Password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['Password'] = $passwordHasher->hash(
                $this->data[$this->alias]['Password']
            );
        }
        return true;
    }

	

}



