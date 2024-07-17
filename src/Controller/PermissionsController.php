<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\TimeHelper;
use App\Helper\IdentityHelper;
/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{
    private $currentAdmin;

    public function initialize(): void
    {
        parent::initialize();
        $this->currentAdmin = IdentityHelper::getIdentity($this->request);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Permissions->find()->where(['Permissions.delete_flg' => 0]);
        $permissions = $this->paginate($query);

        $this->set(compact('permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['RolePermissions'],
        ]);

        $this->set(compact('permission'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            $permission->delete_flg = 0;
            $permission->created_by =  $this->currentAdmin->username;
            $permission->created_at = TimeHelper::getCurrentTime();
            $permission->updated_by =  $this->currentAdmin->username;
            $permission->updated_at = TimeHelper::getCurrentTime();
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $this->set(compact('permission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            $permission->updated_by =  $this->currentAdmin->username;
            $permission->updated_at = TimeHelper::getCurrentTime();
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $this->set(compact('permission'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if($permission)
        {
            $permission->delete_flg = 1;
            $permission->updated_by =  $this->currentAdmin->username;
            $permission->updated_at = TimeHelper::getCurrentTime();
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been deleted.'));
            } else {
                $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
