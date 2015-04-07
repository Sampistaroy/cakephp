<?php
class IntervesController extends AppController {
    public $helpers = array('Html', 'Form');



    public function index() {
    	$this->loadModel('Interf');
        // trier la rqt pour ne prendre que les siennes
        $this->set('interves', $this->Interf->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));
    }

    public function edit($id = null) {
    	$this->loadModel('Interf');
		$user_id = $this->Auth->user('id');
        if (!$id) {
            throw new NotFoundException(__('Invalid interface'));
        }

        $interf = $this->Interf->findById($id);
        if($interf['Interf']['user_id']==$this->Auth->user('id')){
        if (!$interf) {
            throw new NotFoundException(__('Invalid interface'));
        }

        if ($this->request->is(array('put'))) {
            $this->Interf->id = $id;
	            if ($this->Interf->save($this->request->data)) {
	                $this->Session->setFlash('your interf update is complet.', "motif");
	                return $this->redirect(array('controller'=>'interves', 'action' => 'index'));
	            }else{
	            	$this->Session->setFlash('Unable to update your interf.',"motif", array('type'=>'danger'));
        		}
    		}
        }else{
            $this->Session->setFlash('Unable to update du to not equal.',"motif", array('type'=>'danger'));
        }

        if (!$this->request->data) {
            $this->request->data = $interf;
        }
    }

	public function setprinc($id = null){
        $this->loadModel('User');
        $this->loadModel('Interf');
        if (!$id) {
            throw new NotFoundException(__('Invalid interface'));
        }

        $interf = $this->Interf->findById($id);
        if (!$interf) {
                throw new NotFoundException(__('Invalid interface'));
            }
        if($interf['Interf']['user_id']==$this->Auth->user('id')){
            $user_id = $this->Auth->user('id');
            if(!$user_id){
                    $this->Session->setFlash('Vous devez etre connecté', "motif", array('type' => "danger"));
                $this->redirect('/users/login');
                die();
            }
            $this->User->id = $user_id;
            $d['User']['interf_id']=$interf['Interf']['id'];
            if($this->User->save($d, true,array('interf_id'))){
                $this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
                $this->Session->setFlash('your interf change principal is complet.', "motif");
                return $this->redirect(array('controller'=>'interves', 'action' => 'index'));
            }else{
                $this->Session->setFlash('Unable to update your interf principal.',"motif", array('type'=>'danger'));
                return $this->redirect(array('controller'=>'interves', 'action' => 'index'));
            }
            
        }

        if (!$this->request->data) {
            $this->request->data = $interf;
            return $this->redirect(array('controller'=>'interves', 'action' => 'index'));
        }
	}

	public function add() {
	    if ($this->request->is('post')) {
    		$this->loadModel('Interf');
	        $this->request->data['Interf']['user_id'] = $this->Auth->user('id');
	        if ($this->Interf->save($this->request->data)) {
	            $this->Session->setFlash(__('Votre interface a été sauvegardé.'));
	            $this->redirect(array('controller'=>'interves', 'action' => 'index'));
        	}
    	}
	}



}
