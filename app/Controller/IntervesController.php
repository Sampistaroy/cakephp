<?php
class IntervesController extends AppController {
    public $helpers = array('Html', 'Form');



    public function index() {
        $this->loadModel('Interf');
        //$this->loadModel('Unit');
        //$this->loadModel('Zone_cont');
        // trier la rqt pour ne prendre que les siennes
        $this->set('interves', $this->Interf->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));
        $this->set('units', $this->Interf->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));
        $this->set('zone_controls', $this->Interf->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));
       /* $this->set('units', $this->Unit->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));
        $this->set('zone_controls', $this->Zone_control->find('threaded', array(
        'conditions' => array('user_id' => $this->Auth->user('id'))
        )));*/
    }

    public function view($id = null) {
        $this->loadModel('Interf');
        $this->loadModel('Row');
        $user_id = $this->Auth->user('id');
        if (!$id) {
            throw new NotFoundException(__('Invalid interface'));
        }

        $interf = $this->Interf->findById($id);
        $row = $this->Row->find('all', array('recursive' => 2,
            'conditions'=>array('interf_id'=> $interf['Interf']['id'])));
        if($interf['Interf']['user_id']==$this->Auth->user('id')){
        if (!$interf) {
            throw new NotFoundException(__('Invalid interface'));
        }
        $this->set('resultat', $interf);
        $this->set('resultat_row', $row);
        }
    }

    public function edit($id = null) {
        // chargement des models
        $this->loadModel('Interf');
        $user_id = $this->Auth->user('id');
        //test si l'"id" existe sinon redirige
        if (!$id) {
            throw new NotFoundException(__('Invalid interface'));
        }
        //Chargement de l'objet(interface) correspondant à l'id fournit
        $interf = $this->Interf->findById($id);
        //vérification que l'objet(interface) existe en bdd
        if (!$interf) {
            throw new NotFoundException(__('Invalid interface'));
        }
        //Vérification si l'objet(interface) est celui de user
        if($interf['Interf']['user_id']==$this->Auth->user('id')){

            //vérification que c'est bien un 'put'
            if ($this->request->is(array('put'))) {
                //On remet l'id fournit par l'user dans l'objet(interface).
                $this->Interf->id = $id;
                    //on sauvegarde l'objet avec le formulaire.
                    if ($this->Interf->save($this->request->data)) {
                        //on met un message pour l'user
                        $this->Session->setFlash('your interf update is complet.', "motif");
                        //on redirige vers l'affichage approprié
                        return $this->redirect(array('controller'=>'interves', 'action' => 'edit', $id));
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

        $this->loadModel('Row');
        $this->loadModel('Cellule');
        
        $row = $this->Row->find('all', array('recursive' => 2,'conditions'=>array('interf_id'=> $interf['Interf']['id'])));
        $cell = $this->Cellule->find('all', array('conditions'=>array('interf_id'=> $interf['Interf']['id'], 'row_id' => 0,)));
        if($interf['Interf']['user_id']==$this->Auth->user('id')){
            $this->set('resultat', $interf);
            $this->set('resultat_row', $row);
            $this->set('resultat_cell', $cell);
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
