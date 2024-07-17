<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\TimeHelper;
use App\Helper\IdentityHelper;
/**
 * CartDetails Controller
 *
 * @property \App\Model\Table\CartDetailsTable $CartDetails
 * @method \App\Model\Entity\CartDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartDetailsController extends AppController
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
            'contain' => ['Products', 'Carts'],
        ];
        $query = $this->CartDetails->find()->where(['CartDetails.delete_flg' => 0]);
        $cartDetails = $this->paginate($query);

        $this->set(compact('cartDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartDetail = $this->CartDetails->get($id, [
            'contain' => ['Products', 'Carts'],
        ]);

        $this->set(compact('cartDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartDetail = $this->CartDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $cartDetail = $this->CartDetails->patchEntity($cartDetail, $this->request->getData());
            $cartDetail->delete_flg = 0;
            $cartDetail->created_by =  $this->currentAdmin->username;
            $cartDetail->created_at = TimeHelper::getCurrentTime();
            $cartDetail->updated_by =  $this->currentAdmin->username;
            $cartDetail->updated_at = TimeHelper::getCurrentTime();

            if ($this->CartDetails->save($cartDetail)) {
                $this->Flash->success(__('The cart detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart detail could not be saved. Please, try again.'));
        }
        $products = $this->CartDetails->Products->find('list', ['limit' => 200])->all();
        $carts = $this->CartDetails->Carts->find('list', ['limit' => 200])->all();
        $this->set(compact('cartDetail', 'products', 'carts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartDetail = $this->CartDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartDetail = $this->CartDetails->patchEntity($cartDetail, $this->request->getData());
            $cartDetail->updated_by =  $this->currentAdmin->username;
            $cartDetail->updated_at = TimeHelper::getCurrentTime();
            if ($this->CartDetails->save($cartDetail)) {
                $this->Flash->success(__('The cart detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart detail could not be saved. Please, try again.'));
        }
        $products = $this->CartDetails->Products->find('list', ['limit' => 200])->all();
        $carts = $this->CartDetails->Carts->find('list', ['limit' => 200])->all();
        $this->set(compact('cartDetail', 'products', 'carts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartDetail = $this->CartDetails->get($id);
        if($cartDetail)
        {
            $cartDetail->delete_flg = 1; 
            $cartDetail->updated_by =  $this->currentAdmin->username;
            $cartDetail->updated_at = TimeHelper::getCurrentTime();
            if ($this->CartDetails->save($cartDetail)) {
                $this->Flash->success(__('The cart detail has been deleted.'));
            } else {
                $this->Flash->error(__('The cart detail could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
