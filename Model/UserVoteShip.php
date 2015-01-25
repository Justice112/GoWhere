<?php
App::uses('AppModel', 'Model');
/**
 * UserVoteShip Model
 *
 * @property User $User
 * @property Vote $Vote
 */
class UserVoteShip extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vote' => array(
			'className' => 'Vote',
			'foreignKey' => 'vote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
