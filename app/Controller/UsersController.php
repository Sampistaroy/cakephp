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
				$d['User']['password'] = Security::hash($d['User']['password']);
			}
			// sauvegarde en bdd
			if($this->User->save($d,true,array('username','password','mail'))){
				//génération du lien de validation
				$link = md5($d['User']['password']);
				/*/envoi d'un email.
				App::uses('CakeEmail','Network/Email');//chargement du plugin("plugin") CakeEmail
				$mail = new CakeEmail();
				$mail->from('noreply@dwargcrew.com')
					->to($d['User']['mail'])
					->subject('Test :: inscription')
					->emailFormat('signup')
					->viewVars(array('username'=>$d['User']['username'], '$link'=> $link))
					->send();*/
				//génération d'un message de réussite pour l'utilisateur

				debug($link);
				$this->Session->setFlash("<strong>Bravo</strong> votre utilisateur à bien été ajouté.'. echo $link.' ","motif");
				$this->redirect('/users/signup');

			}else{
				//génération d'un message d'echec de l'ajout d'utilisateur
				$this->Session->setFlash("Merci de <strong>corriger</strong> vos erreurs.","motif", array('type'=>'danger'));
			}
		}

	}

	function logout(){
		$this->Auth->logout();
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
