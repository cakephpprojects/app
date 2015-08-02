<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Like $Like
 * @property Post $Post
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => true
		)
		
	);

        public function beforeSave($options = array()) {
            if(isset($this->data[$this->alias]['password'])){
                $this->data[$this->alias]['password']=AuthComponent::password($this->data[$this->alias]['password']);
            }
            parent::beforeSave($options);
            return true;
        }
}
