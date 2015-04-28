<?php

class UsersController extends AppController {
	
	public $helpers  = array('Html', 'Form');
	public $components = array('Session');
	
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add', 'logout');
	}
	
	public function login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function register(){
		$this->layout = 'default.index';
		
		if($this->request->is('post')){
			$this->User->create();
			$data = $this->request->data;
			if($data['Password'] == $data['ConfirmPassword']){
				if($this->User->save($data)){
					return $this->redirect(array('action' => 'login'));
				}
				$this->Session->setFlash(__('unable to save data'));
			}else{
				$this->Session->setFlash(__('Password mismatch'));
			}	
		
		}
		
	}

}