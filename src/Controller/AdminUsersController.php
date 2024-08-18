<?php
declare(strict_types=1);

namespace App\Controller;
use App\Helper\IdentityHelper;
use Cake\ORM\Table;
use Cake\Mailer\Mailer;
use Cake\Datasource\Exception\RecordNotFoundException;
use PHPMailer\PHPMailer\PHPMailer;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

require ROOT . '/vendor/phpmailer/phpmailer/src/Exception.php';
require ROOT . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require ROOT . '/vendor/phpmailer/phpmailer/src/SMTP.php';

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
        $this->Authentication->addUnauthenticatedActions(['index', 'edit', 'forgotPassword', 'sendResetEmail', 'resetPassword']);
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
            $redirect = $this->request->getQuery('/Dashboard', ['controller' => 'Dashboard', 'action' => 'index']);
            IdentityHelper::setIdentity($this->request);
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            IdentityHelper::setIdentity($this->request);
            $redirect = $this->request->getQuery('/Dashboard', ['controller' => 'Dashboard', 'action' => 'index']);
            return $this->redirect($redirect);
        }
    }
    
    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');

            // Tìm người dùng với email này
            $user = $this->AdminUsers->findByEmail($email)->first();

            if ($user) {
                // Tạo token cho người dùng này và lưu vào DB
                $token = bin2hex(random_bytes(32));
                $user->reset_password = $token;
                $user->reset_password_expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

                if ($this->AdminUsers->save($user)) {
                    // Gửi email với liên kết để reset mật khẩu
                    $this->sendResetEmail($user);
                    $this->Flash->success('Vui lòng kiểm tra email để tiếp tục.');
                } else {
                    $this->Flash->error('Đã xảy ra lỗi, vui lòng thử lại.');
                }
            } else {
                $this->Flash->error('Email không tồn tại trong hệ thống.');
            }
        }
    }

    private function sendResetEmail($user)
    {

        $email = new Mailer('default');
        $email
              ->setEmailFormat('html')
              ->setTo($user->email)
              ->setSubject('Reset password')
              ->viewBuilder()
                  ->setTemplate('reset_password');
  
             
        $email->setViewVars(['token' => $user->reset_password]);
        $email->send();

    }
    public function resetPassword($token = null)
    {
        if (!$token) {
            throw new NotFoundException('Token không hợp lệ');
        }
    
        // Tìm người dùng với token này
        $user = $this->AdminUsers->find('all', [
            'conditions' => [
                'reset_password' => $token,
                'reset_password_expiry >' => date('Y-m-d H:i:s')
            ]
        ])->first();
        

        if (!$user) {
            $this->Flash->error('Token không hợp lệ hoặc đã hết hạn.');
            return $this->redirect(['action' => 'forgotPassword']);
        }
    
        if ($this->request->is('post')) {

            $user = $this->AdminUsers->patchEntity($user, $this->request->getData());

            if (!empty($user->password)) {
                $user->password = (new DefaultPasswordHasher())->hash($user->password);
            }
            $user->reset_password = null;
            $user->reset_password_expiry = null;
    
            if ($this->AdminUsers->save($user)) {
                $this->Flash->success('Mật khẩu của bạn đã được đặt lại.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Đã xảy ra lỗi, vui lòng thử lại.');
            }
        }
    
        $this->set(compact('token'));
    }
}
