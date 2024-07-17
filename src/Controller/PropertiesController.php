<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\TimeHelper;
use App\Helper\IdentityHelper;
/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
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
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $query = $this->Properties->find()->where(['Properties.delete_flg' => 0]);

        $properties = $this->paginate($query);

        $this->set(compact('properties'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set(compact('property'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $property->delete_flg = 0;
            $property->created_by =  $this->currentAdmin->username;
            $property->created_at = TimeHelper::getCurrentTime();
            $property->updated_by =  $this->currentAdmin->username;
            $property->updated_at = TimeHelper::getCurrentTime();
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $products = $this->Properties->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('property', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $property->updated_by =  $this->currentAdmin->username;
            $property->updated_at = TimeHelper::getCurrentTime();
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $products = $this->Properties->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('property', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if($property)
        {
            $property->delete_flg = 1;
            $property->updated_by =  $this->currentAdmin->username;
            $property->updated_at = TimeHelper::getCurrentTime();
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been deleted.'));
            } else {
                $this->Flash->error(__('The property could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
