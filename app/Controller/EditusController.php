<?php
class EditusController extends AppController {


		/** sauvegarde un nouvel utilisateur en bdd **/
	public function index() {
	}
	function edit_param_univers(){

	}


	function edit_interf_princ(){
		// récupère l'user id a partir du plugin Auth de cakephp
		$user_id = $this->Auth->user('id');
		$user_id_interface_principale = $this->Auth->user('id_interf_princ');
		// redirige si l'user id existe sinon redirige & envoie un message flash d'erreur
		if(!$user_id){
				$this->Session->setFlash("Reconnectez vous pour voir cette page","motif", array('type'=>'danger'));
			$this->redirect('/users/login');
			die();
		}
		// redirige vers add si l'interface n'a pas d'id dans la table user
		if(!$user_id){
				$this->Session->setFlash("Reconnectez vous pour voir cette page","motif", array('type'=>'danger'));
			$this->redirect('/editus/');
			die();
		}
		//met l'user id dans l'objet User
		$this->User->id = $user_id;
		// verif si il y a bien une requete PUT 
		if($this->request->is('put')){
			$d= $this->request->data;
			$d['User']['id'] = $user_id;
			if (!empty($d['User']['pass1'])) {
				if ($d['User']['pass1']==$d['User']['pass2']) {
					$d['User']['password'] =  Security::hash($d['User']['pass1'],null,true);
				}else{
					$this->User->validationErrors['pass2']=array("impossible sauv profil edition.");
				}
			}
			if($this->User->save($d, true,array('password'))){
				$this->Session->setFlash("votre profil est bien mis a jour", "motif");
			}else{
				$this->Session->setFlash("impossible sauv profil edition.","motif", array('type'=>'danger'));
			}
		}else{
			$this->request->data = $this->User->read();
		}
	}


	function edit_interf(){

	}

}
