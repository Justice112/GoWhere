<?php
App::uses('AppController', 'Controller');
/**
 * Votes Controller
 *
 * @property Vote $Vote
 * @property PaginatorComponent $Paginator
 */
class VotesController extends AppController {

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
		$this->Vote->recursive = 0;
		$this->set('votes', $this->Paginator->paginate());
	}
public function adminIndex() {
		$this->Vote->recursive = 0;
		$this->set('votes', $this->Paginator->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vote->exists($id)) {
			throw new NotFoundException(__('Invalid vote'));
		}
		$options = array('conditions' => array('Vote.' . $this->Vote->primaryKey => $id));
		$this->set('vote', $this->Vote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Vote->create();
			$this->request->data['Vote']['user_id']=$this->Session->read('user_id');
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('投票添加成功！'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('投票添加失败，请重试！'));
			}
		}
		$users = $this->Vote->User->find('list');
		$places = $this->Vote->Place->find('list');
		$this->set(compact('users', 'places'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vote->exists($id)) {
			throw new NotFoundException(__('添加失败'));
		}
		if ($this->request->is(array('post', 'put'))) {
		
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('投票添加成功！'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('投票添加失败，请重试！'));
			}
		} else {
			$options = array('conditions' => array('Vote.' . $this->Vote->primaryKey => $id));
			$this->request->data = $this->Vote->find('first', $options);
		}
		$users = $this->Vote->User->find('list');
		$places = $this->Vote->Place->find('list');
		$this->set(compact('users', 'places'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vote->id = $id;
		if (!$this->Vote->exists()) {
			throw new NotFoundException(__('Invalid vote'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vote->delete()) {
			$this->Session->setFlash(__('The vote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
