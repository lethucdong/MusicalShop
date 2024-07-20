<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Table;
/**
 * ImageProducts Controller
 *
 * @property \App\Model\Table\ImageProductsTable $ImageProducts
 * @method \App\Model\Entity\ImageProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImageProductsController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('ImageProducts');

        // Check if the ImageProducts model is null and handle it
        if ($this->ImageProducts === null) {
            throw new \RuntimeException('ImageProducts model could not be loaded.');
        }
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
        $search = $this->request->getQuery('search');

        $query = $this->ImageProducts->find('search', ['search' => $search])
                            ->where(['ImageProducts.delete_flg' => 0]);

        $imageProducts = $this->paginate($query);

        $this->set(compact('imageProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Image Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imageProduct = $this->ImageProducts->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set(compact('imageProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imageProduct = $this->ImageProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $imageProduct = $this->ImageProducts->patchEntity($imageProduct, $this->request->getData());
            if ($this->ImageProducts->save($imageProduct)) {
                $this->Flash->success(__('The image product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image product could not be saved. Please, try again.'));
        }
        $products = $this->ImageProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('imageProduct', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imageProduct = $this->ImageProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imageProduct = $this->ImageProducts->patchEntity($imageProduct, $this->request->getData());
            if ($this->ImageProducts->save($imageProduct)) {
                $this->Flash->success(__('The image product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image product could not be saved. Please, try again.'));
        }
        $products = $this->ImageProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('imageProduct', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imageProduct = $this->ImageProducts->get($id);
        if($imageProduct)
        {
            $imageProduct->delete_flg = 1;
            if ($this->ImageProducts->save($imageProduct)) {
                $this->Flash->success(__('The image product has been deleted.'));
            } else {
                $this->Flash->error(__('The image product could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
