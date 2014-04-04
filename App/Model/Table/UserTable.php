<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Controller\Component\Auth\BlowfishPasswordHasher;
use Cake\Event\Event;

class UsersTable extends Table {

    public function beforeSave(Event $event, Entity $entity, array $options) {
        if (!$this->id) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
        }
        return true;
    }
}

