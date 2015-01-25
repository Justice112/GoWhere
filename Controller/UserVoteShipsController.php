<?php
App::uses('AppController', 'Controller');
/**
 * UserVoteShips Controller
 *
 * @property UserVoteShip $UserVoteShip
 * @property PaginatorComponent $Paginator
 */
class UserVoteShipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserVoteShip->recursive = 0;
		$this->set('userVoteShips', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserVoteShip->exists($id)) {
			throw new NotFoundException(__('Invalid user vote ship'));
		}
		$options = array('conditions' => array('UserVoteShip.' . $this->UserVoteShip->primaryKey => $id));
		$this->set('userVoteShip', $this->UserVoteShip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserVoteShip->create();
			if ($this->UserVoteShip->save($this->request->data)) {
				$this->Session->setFlash(__('The user vote ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user vote ship could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserVoteShip->User->find('list');
		$votes = $this->UserVoteShip->Vote->find('list');
		$this->set(compact('users', 'votes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserVoteShip->exists($id)) {
			throw new NotFoundException(__('Invalid user vote ship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserVoteShip->save($this->request->data)) {
				$this->Session->setFlash(__('The user vote ship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user vote ship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserVoteShip.' . $this->UserVoteShip->primaryKey => $id));
			$this->request->data = $this->UserVoteShip->find('first', $options);
		}
		$users = $this->UserVoteShip->User->find('list');
		$votes = $this->UserVoteShip->Vote->find('list');
		$this->set(compact('users', 'votes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserVoteShip->id = $id;
		if (!$this->UserVoteShip->exists()) {
			throw new NotFoundException(__('Invalid user vote ship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserVoteShip->delete()) {
			$this->Session->setFlash(__('The user vote ship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user vote ship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
