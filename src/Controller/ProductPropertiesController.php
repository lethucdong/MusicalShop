<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductProperties Controller
 *
 * @property \App\Model\Table\ProductPropertiesTable $ProductProperties
 * @method \App\Model\Entity\ProductProperty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductPropertiesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('ProductProperties');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Properties'],
        ];
        $productProperties = $this->paginate($this->ProductProperties);

        $this->set(compact('productProperties'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productProperty = $this->ProductProperties->get($id, [
            'contain' => ['Products', 'Properties'],
        ]);

        $this->set(compact('productProperty'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productProperty = $this->ProductProperties->newEmptyEntity();
        if ($this->request->is('post')) {
            $productProperty = $this->ProductProperties->patchEntity($productProperty, $this->request->getData());
            if ($this->ProductProperties->save($productProperty)) {
                $this->Flash->success(__('The product property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product property could not be saved. Please, try again.'));
        }
        $products = $this->ProductProperties->Products->find('list', ['limit' => 200])->all();
        $properties = $this->ProductProperties->Properties->find('list', ['limit' => 200])->all();
        $this->set(compact('productProperty', 'products', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productProperty = $this->ProductProperties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productProperty = $this->ProductProperties->patchEntity($productProperty, $this->request->getData());
            if ($this->ProductProperties->save($productProperty)) {
                $this->Flash->success(__('The product property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product property could not be saved. Please, try again.'));
        }
        $products = $this->ProductProperties->Products->find('list', ['limit' => 200])->all();
        $properties = $this->ProductProperties->Properties->find('list', ['limit' => 200])->all();
        $this->set(compact('productProperty', 'products', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Property id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productProperty = $this->ProductProperties->get($id);
        if ($this->ProductProperties->delete($productProperty)) {
            $this->Flash->success(__('The product property has been deleted.'));
        } else {
            $this->Flash->error(__('The product property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
