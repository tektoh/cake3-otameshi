<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Error;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use App\Model\Entity\User;

class UsersController extends AppController {
    public $components = [
        'Auth' => [
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'users',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username'],
                    'passwordHasher' => [
                        'className' => 'Blowfish' // 3.0のデフォルトはBlowfish
                    ]
                ]
            ]
        ]
    ];

    public function beforeFilter(Event $event) {
        $this->Auth->allow('register');
    }

  public function index() {
    $users = $this->Users->find('all');
    $this->set(compact('users'));
  }

  public function login() {
      if ($this->request->is('post')) {
          if ($this->Auth->login()) {
              return $this->redirect($this->Auth->redirectUrl());
          } else {
              $this->Session->setFlash('Username or password is incorrect', 'default', [], 'auth');
          }
      }
  }

    public function register() {
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->data);
            if (!$this->Users->save($user)) {
                throw new Error\InternalErrorException('Error');
            }
            return $this->redirect($this->Auth->loginAction);
        }
    }

}
