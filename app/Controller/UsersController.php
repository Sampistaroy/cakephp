<?php
class UsersController extends AppController {


		/** sauvegarde un nouvel utilisateur en bdd **/
	public function signup() {
		// verif si il y a bien une requete POST 
		if($this->request->is('post')){
			// recup les infos du POST
			$d = $this->request->data;
			// attribut la valeur nul si il y avait un champ $d['User']['id'] pour éviter de se faire pirater
			$d['User']['id'] = null;
			// si le pass n'est pas vide on le hash
			if(!empty($d['User']['password'])){
				$d['User']['password'] = Security::hash($d['User']['password'],null,true);
			}
			//génération du lien de validation
			$link = md5($d['User']['password']);
			// sauvegarde en bdd
			if($result=$this->User->save($d,true,array('username','password','mail'))){
				if($this->Auth->login($result['User'])){
			//génération d'un message de réussite pour l'utilisateur
				$this->Session->setFlash("<strong>Bravo</strong> votre utilisateur à bien été ajouté et vous etes connecté.'. echo $link.' ","motif");
			}
			/*/envoi d'un email.
			App::uses('CakeEmail','Network/Email');//chargement du plugin("plugin") CakeEmail
			$mail = new CakeEmail();
			$mail->from('noreply@dwargcrew.com')
				->to($d['User']['mail'])
				->subject('Test :: inscription')
				->emailFormat('signup')
				->viewVars(array('username'=>$d['User']['username'], '$link'=> $link))
				->send();*/


			}else{
				//génération d'un message d'echec de l'ajout d'utilisateur
				$this->Session->setFlash("Merci de <strong>corriger</strong> vos erreurs.","motif", array('type'=>'danger'));
			}
		}

	}

	function login(){
		// verif si il y a bien une requete POST 
		if($this->request->is('post')){
			
			// recup les infos du POST
			if($this->Auth->login()){
				$this->Session->setFlash("<strong>Bravo</strong> vous etes connecté.","motif");
				$this->redirect('/');
			}else{
				$this->Session->setFlash("identifiants incorrects.","motif", array('type'=>'warning'));
				debug($this->request->data['User']['password']);
			}
		}
	}

	function edit(){
		$user_id = $this->Auth->user('id');
		if(!$user_id){
			$this->redirect('/');
			die();
		}
		$this->User->id = $user_id;
		// verif si il y a bien une requete POST 
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

	function logout(){
		$this->Auth->logout();
				$this->Session->setFlash("<strong>Au revoir</strong> vous etes déconnecté.","motif");
		$this->redirect($this->referer());
	}

		/** active grace à un lien generé dans la fonction users/signup lors de l'inscription un nouvel utilisateur en bdd **/
	public function activate($token) {
		$token = explode('-',$token);
		$user = $this->User->find('first', array(
			'conditions' => array('id'=>$token[0], 'MD5(User.password)'=> $token[0],'active'=> 0
				)
			));
		if (!empty($user)) {
			$this->Session->setFlash("votre utilisateur à bien été activé. ","motif");
			}else{
				//génération d'un message d'echec de activation d'utilisateur
				$this->Session->setFlash("Mauvais token.","motif", array('type'=>'error'));
			}
		$this->redirect('/users/activate');
	}
}
