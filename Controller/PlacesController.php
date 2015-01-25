<?php
App::uses('AppController', 'Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */
class PlacesController extends AppController {

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
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function uploadImg (){
		$targetFolder = '/webroot/images/place'; // Relative to the root
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
		$verifyToken = md5('Jiaqi.Feng' . $_POST['timestamp']);
		$targetName = time().rand(0,999).'.jpg';
		
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetFile = rtrim($targetPath,'/') . '/' .$targetName;
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($_FILES['Filedata']['name']);
		
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				echo $targetName;
				exit();
			} else {
				echo 'Invalid file type.';
				exit();
			}
		}
	}
}
