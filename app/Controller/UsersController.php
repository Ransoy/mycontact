<?php

class UsersController extends AppController {
	
	public $helpers  = array('Html', 'Form');
	public $components = array('Session');
	
	
	
	public function index() {
		$this->layout = 'login';
	}
	
	public function register(){
		$this->layout = 'default.index';
		
		if($this->request->is('post')){
			$this->User->create();
			$data = $this->request->data;
			if($data['Password'] == $data['ConfirmPassword']){
				if($this->User->save($data)){
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('unable to save data'));
			}else{
				$this->Session->setFlash(__('Password mismatch'));
			}	
		
		}
		
	}

}