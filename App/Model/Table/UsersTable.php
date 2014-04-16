<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Entity;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Controller\Component\Auth\BlowfishPasswordHasher;

/**
 * Users Model
 */
class UsersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('users');
		$this->displayField('id');
		$this->primaryKey(['id']);
		$this->addBehavior('Timestamp');

	}

    public function beforeSave(Event $event, Entity $entity, $options) {
        if (!$entity->id) {
            $passwordHasher = new BlowfishPasswordHasher();
            $entity->password = $passwordHasher->hash($entity->password);
        }
        return true;
    }

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->validatePresence('username', 'create')
			->allowEmpty('username', false)
			->validatePresence('password', 'create')
			->allowEmpty('password', false);

		return $validator;
	}

}
