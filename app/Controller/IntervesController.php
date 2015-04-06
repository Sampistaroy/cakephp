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
        if (!$interf) {
            throw new NotFoundException(__('Invalid interface'));
        }

        if ($this->request->is(array('put'))) {
            $this->Interf->id = $id;
            $this->request->data['Interf']['interf_name'];
            if ($this->Interf->save($this->request->data)) {
                $this->Session->setFlash('your interf update complet.', "motif");
                return $this->redirect(array('controller'=>'interves', 'action' => 'index'));
            }else{
            $this->Session->setFlash('Unable to update your interf.',"motif", array('type'=>'danger'));
        }
        }

        if (!$this->request->data) {
            $this->request->data = $interf;
        }
    }

	public function setprinc(){


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
