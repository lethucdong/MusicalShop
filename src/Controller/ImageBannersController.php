<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\TimeHelper;
use App\Helper\IdentityHelper;
/**
 * ImageBanners Controller
 *
 * @property \App\Model\Table\ImageBannersTable $ImageBanners
 * @method \App\Model\Entity\ImageBanner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImageBannersController extends AppController
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
        $query = $this->ImageBanners->find()->where(['ImageBanners.delete_flg' => 0]);

        $imageBanners = $this->paginate($query);

        $this->set(compact('imageBanners'));
    }

    /**
     * View method
     *
     * @param string|null $id Image Banner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imageBanner = $this->ImageBanners->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('imageBanner'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imageBanner = $this->ImageBanners->newEmptyEntity();
        if ($this->request->is('post')) {
            $imageBanner = $this->ImageBanners->patchEntity($imageBanner, $this->request->getData());
            $imageBanner->delete_flg = 0;
            $imageBanner->created_by =  $this->currentAdmin->username;
            $imageBanner->created_at = TimeHelper::getCurrentTime();
            $imageBanner->updated_by =  $this->currentAdmin->username;
            $imageBanner->updated_at = TimeHelper::getCurrentTime();
            if ($this->ImageBanners->save($imageBanner)) {
                $this->Flash->success(__('The image banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image banner could not be saved. Please, try again.'));
        }
        $this->set(compact('imageBanner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image Banner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imageBanner = $this->ImageBanners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imageBanner = $this->ImageBanners->patchEntity($imageBanner, $this->request->getData());
            $imageBanner->updated_by =  $this->currentAdmin->username;
            $imageBanner->updated_at = TimeHelper::getCurrentTime();
            if ($this->ImageBanners->save($imageBanner)) {
                $this->Flash->success(__('The image banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image banner could not be saved. Please, try again.'));
        }
        $this->set(compact('imageBanner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image Banner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imageBanner = $this->ImageBanners->get($id);
        if($imageBanner)
        {
            $imageBanner->delete_flg = 1;
            $imageBanner->updated_by =  $this->currentAdmin->username;
            $imageBanner->updated_at = TimeHelper::getCurrentTime();
            if ($this->ImageBanners->save($imageBanner)) {
                $this->Flash->success(__('The image banner has been deleted.'));
            } else {
                $this->Flash->error(__('The image banner could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
