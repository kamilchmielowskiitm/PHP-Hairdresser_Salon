<?php
App::uses('AppController', 'Controller');


class SalonsController extends AppController {

	public function index() {
		$this->set('salons',$this->Salon->find('all'));
		return $this->Salon->find('all');
	}


	public function view($id = null) {
		$this->set('salon', $this->Salon->findByid($id));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Salon->create();
			if ($this->Salon->save($this->request->data)) {
				$this->Flash->success(__('Salon został dodany'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Salon nie został dodany.'));
			}
		}
	}

	public function edit($id = null) {
		$dane = $this->Salon->findByid($id);
		if($this->request->is(array('post','put')))
		{
			$this->Salon->id = $id;
			if($this->request->data['Salon']['filename']==null)
			{
				$this->request->data['Salon']['filename'] = $dane['Movie']['filename'];
			}
			if($this->Salon->save($this->request->data))
			{
				$this->Flash->success('Salon zedytowany.');
				return $this->redirect(array('action' => 'index'));
			}
			else
				$this->Flash->error('Brak możliwości edycji salonu.');
		}
		$this->request->data=$dane;// wypisane poprzednich danych
	}


	public function delete($id = null) {
		$this->Salon->id = $id;
		$this->request->allowMethod('post', 'delete');
		if ($this->Salon->delete()) {
			$this->Flash->success(__('Salon został usunięty'));
		} else {
			$this->Flash->error(__('Salon nie został usunięty'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
