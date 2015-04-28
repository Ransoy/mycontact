<?php

class ContactsController extends AppController{
	
	public $components = array('RequestHandler','Paginator');

	public $helpers  = array('Html', 'Form');

	
	public function register(){
		$this->layout = 'default.index';
		$this->__add();
	}
	
	public function main($page = null,$search = null){
		$this->layout = 'main';
		$keyword = '';
		$this->Contact->recursive = 0;
		if($this->request->is('get')){
			
			if(isset($this->params['url']['search'])){
				$keyword = $this->params['url']['search'];
			}
		
			$this->set('searchval',$keyword);
		}
		$this->paginate = array(
				'conditions' => array('Contact.NAME LIKE' => '%'.$keyword.'%'),
				'limit' => 2
		);

		$this->set('data',$this->paginate());
		$this->set('searchval',$keyword);

		
	}
	
	public function __add(){
		
		if($this->request->is('post')){
			$this->Contact->create();
			if($this->Contact->save($this->request->data)){
				$this->Session->setFlash(__('you have successfully added'));
				return $this->redirect(array('action' => 'main'));
			}
			$this->Session->setFlash(__('unable to save data'));
		}
		
	}
	
	public function delete(){

		if($this->request->is('Ajax')){

			$this->layout = 'ajax';

			$data = $this->request->data;
			pr($data['id']);
			if($this->Contact->delete($data['id'])){
				echo 'true';
				exit();
			}
			echo 'false';
			exit();
		}
		
	}
	
	public function detail(){
		
		if($this->request->is('Ajax')){

			$this->layout = 'ajax';
			
			$data = $this->request->data;
			$result = $this->Contact->findById($data['id']);
			if($result){
				echo json_encode($result);
				exit();
			}
			
			echo 'false';
			exit();
		}
		
	}
	
	public function modify(){
		
		if($this->request->is('Ajax')){
		
			$this->layout = 'ajax';
				
			$data = $this->request->data;

			$result = $this->Contact->findById($data['id']);
			
			$this->Contact->id = $data['id'];
			if($this->Contact->save($data)){

				echo "<td class=''><a href=''>{$data['NAME']}</a></td>
				   	  <td class=''>{$data['COMPANY']}</td>
				      <td class=''>{$data['PHONE']}</td>
				      <td class=''>{$data['EMAIL']}</td>
				      <td>
				   		<button class='btn btn-sm btn-info btn_edit' data-toggle='modal' data-target='.bs-example-modal-sm' type='submit'>Edit</button>
				   		<button class='btn btn-sm btn-danger btn_delete' type='submit'>Delete</button>
				      </td>";
				exit();
			}
			echo 'false';
			exit();
			
		}
		exit();
		
	}
	
}