<?php
class IntervesController extends AppController {
    public $helpers = array('Html', 'Form');



    public function index() {
    	$this->loadModel('Interf');
        $this->set('interves', $this->Interf->find('all'));
        2 conditions a faire :
        si il est vide mettre un lien vers la page add
        si il est plein trier la rqt pour ne prendre que les siennes
    }

	public function edit(){

	}




}
