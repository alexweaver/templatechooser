<?php
	App::uses('AppModel', 'Model');

	class Form extends AppModel {
		public $useTable = 'forms';
		public $uses = array('Form', 'Page');

		public function add($data)
		{
			$form = new Form();
			$form->create();
			$form->set($this->request->data);
			$this->save();
		}
	}