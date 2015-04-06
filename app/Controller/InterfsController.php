<?php
class IntervesController extends AppController {
    public $helpers = array('Html', 'Form');



    public function index() {
        $this->set('interves', $this->Interf->find('all'));
    }

	public function edit(){

	}




}
