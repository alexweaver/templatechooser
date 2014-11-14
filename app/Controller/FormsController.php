<?php
	class FormsController extends AppController {
		public function create() {
			$this->Form->add($this->request->data);
		}
	}