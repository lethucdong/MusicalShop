<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\IdentityHelper;
use Cake\ORM\Table;
/**
 * AdminUsers Controller
 *
 * @property \App\Model\Table\AdminUsersTable $AdminUsers
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminUsersController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
        // Load the AdminUsers model
        $this->loadModel('AdminUsers');

        // Check if the AdminUsers model is null and handle it
        if ($this->AdminUsers === null) {
            throw new \RuntimeException('AdminUsers model could not be loaded.');
        }
        $this->Authentication->addUnauthenticatedActions(['index', 'edit']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];

        $search = $this->request->getQuery('search');

        $query = $this->AdminUsers->find('search', ['search' => $search])
                            ->where(['AdminUsers.delete_flg' => 0]);

        $adminUsers = $this->paginate($query);

        $this->set(compact('adminUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set(compact('adminUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminUser = $this->AdminUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());

            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $roles = $this->AdminUsers->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('adminUser', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminUser = $this->AdminUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminUser = $this->AdminUsers->patchEntity($adminUser, $this->request->getData());

            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
        }
        $roles = $this->AdminUsers->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('adminUser', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminUser = $this->AdminUsers->get($id);
        if ($adminUser) {

            $adminUser->delete_flg = 1;

            if ($this->AdminUsers->save($adminUser)) {
                $this->Flash->success(__('The admin user has been marked as deleted.'));
            } else {
                $this->Flash->error(__('The admin user could not be marked as deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The admin user does not exist.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in

        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('/Roles', ['controller' => 'Roles', 'action' => 'index']);
            IdentityHelper::setIdentity($this->request);
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }
}
