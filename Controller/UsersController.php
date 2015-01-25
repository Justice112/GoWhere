<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
public function beforeFilter(){
	
	}
	public $components = array('Paginator','RequestHandler');
	public function login() {
		if ($this->request->is ( 'post' ))
		{
			if(!empty($this->data)){
				if($this->data['User']['role']=='普通用户'){
				$results = $this->User->findByUsername( $this->data ['User'] ['username'] );
				if ($results && $results ['User'] ['password'] == /*md5*/ ( $this->data ['User'] ['password'] )) {
					$this->Session->write ( 'user_id', $results['User']['id']);
					$this->Session->write ( 'user_username', $results['User']['username']);
					$this->Session->write ( 'user_head', $results['User']['head']);
					$this->Session->write ( 'user_role', '普通用户');
					 $this->redirect(array('controller'=>'votes','action' => 'index'));
				} else {
					$this->Session->setFlash ( '登录失败！' );
					$this->set ( 'error', true );
					 $this->redirect(array('controller'=>'users','action' => 'login'));
				}
			}
			else if($this->data['User']['role']=='管理员'){
				if ($this->data['User']['username']=='admin'&&$this->data['User']['password']=='admin')
				{
					$this->Session->write ( 'user_id',0);
					$this->Session->write ( 'user_username', $this->data['User']['username']);
					$this->Session->write ( 'user_role', '管理员');
					 $this->redirect(array('action' => 'index'));				
				}else {
					$this->Session->setFlash ( '登录失败！' );
					$this->set ( 'error', true );
					 $this->redirect(array('controller'=>'users','action' => 'login'));
				}
				
			}
				
			}
						
	}
	}
public function logout(){
			//$this->layout='front';
		
		$this->Session->destroy();
		$this->redirect(array('controller' =>'users','action'=>'login'));
	}
	/**
 * register method
 *
 * 用户注册
 */  	
/**
 * Components
 *
 * @var array
 */

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkRole('管理员');
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['head'] = $this->crop();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('恭喜您注册成功，请登录'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('很遗憾用户注册失败，请重试！'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['User']['head'] = $this->crop();
			exit();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function uploadImg (){
		$targetFolder = '/webroot/images/head'; // Relative to the root
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
	
	public function crop (){
		if ($this->request->is('post')){
			$targetFolder = '/webroot/images/head'; // Relative to the root
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
			$targetFile = rtrim($targetPath,'/') . '/' . $this->data['name'];
			$targ_w = $targ_h = 150;
			$jpeg_quality = 90;
			$img_r = imagecreatefromjpeg($targetFile);
			$imgsize = getimagesize($targetFile);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x']*$imgsize[0]/500,$_POST['y']*$imgsize[0]/500,
			$targ_w,$targ_h,$_POST['w']*$imgsize[0]/500,$_POST['h']*$imgsize[0]/500);
			imagejpeg($dst_r,$targetFile,$jpeg_quality);
			return($this->data['name']);
		}
	}
}
