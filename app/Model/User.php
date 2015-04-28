<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel{
	
	public $validate = array(
			'Name' => array(
					'rule' => 'notEmpty'
			),
			'Email_Address' => array(
					'rule' => 'notEmpty'
			),
			'Password' => array(
					'required' => array(
					                'rule' => array('notEmpty'),
					                'message' => 'A password is required'
					            )
			)
			
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



