<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Error;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use App\Model\Entity\User;

class UsersController extends AppController {
  public function index() {
    $users = $this->Users->find('all');
    $this->set(compact('users'));
  }

  public function login() {
  }

  public function register() {
    if ($this->request->is('post')) {
      $user = $this->Users->newEntity($this->request->data);
      if (!$this->Users->save($user)) {
        throw new Error\InternalErrorException('Error');
      }
    }
  }

}
