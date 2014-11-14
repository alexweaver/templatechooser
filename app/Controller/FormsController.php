<?php
	class FormsController extends AppController {
		public function index() {
			$this->set('templates', $this->Form->find('all'));
		}
	}