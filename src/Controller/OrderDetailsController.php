<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Table;
/**
 * OrderDetails Controller
 *
 * @property \App\Model\Table\OrderDetailsTable $OrderDetails
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderDetailsController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Orders'],
        ];

        $search = $this->request->getQuery('search');

        $query = $this->OrderDetails->find('search', ['search' => $search])
                            ->where(['OrderDetails.delete_flg' => 0]);

        $orderDetails = $this->paginate($query);

        $this->set(compact('orderDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => ['Products', 'Orders'],
        ]);

        $this->set(compact('orderDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderDetail = $this->OrderDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        $products = $this->OrderDetails->Products->find('list', ['limit' => 200])->all();
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('orderDetail', 'products', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order detail could not be saved. Please, try again.'));
        }
        $products = $this->OrderDetails->Products->find('list', ['limit' => 200])->all();
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('orderDetail', 'products', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderDetail = $this->OrderDetails->get($id);
        if($orderDetail)
        {
            $orderDetail->delete_flg = 1;
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The order detail has been deleted.'));
            } else {
                $this->Flash->error(__('The order detail could not be deleted. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
