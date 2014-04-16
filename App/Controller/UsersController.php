<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Users Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */
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


/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('users', $this->paginate($this->Users));
	}

/**
 * View method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		$this->set('user', $user);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$user = $this->Users->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Users->save($user)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('user'));
	}

/**
 * Edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('user'));
	}

/**
 * Delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$user = $this->Users->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Users->delete($user)) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}}
