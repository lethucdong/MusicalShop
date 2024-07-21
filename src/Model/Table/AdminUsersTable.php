<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Model\SearchTrait;

/**
 * AdminUsers Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\AdminUser newEmptyEntity()
 * @method \App\Model\Entity\AdminUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdminUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AdminUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdminUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdminUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdminUsersTable extends Table
{
    use SearchTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('admin_users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);

        $this->addBehavior('AuditLog');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->dateTime('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmptyDateTime('birthday');

        $validator
            ->integer('sex')
            ->requirePresence('sex', 'create')
            ->notEmptyString('sex');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->integer('role_id')
            ->notEmptyString('role_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->existsIn('role_id', 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }

    public function findActive(Query $query, array $options): Query
    {
        return $query
        ->where(['AdminUsers.delete_flg' => false])
        ->contain(['Roles' => ['RolePermissions'=>['Permissions']]]);
        // ->contain([
        //     'Roles' => [
        //         'RolePermissions' => [
        //             'conditions' => ['RolePermissions.delete_flg' => false],
        //             'Permissions' => [
        //                 'conditions' => ['Permissions.delete_flg' => false]
        //             ]
        //         ]
        //     ]
        // ]);
    }

    
    protected function getSearchFields(): array
    {
        return ['AdminUsers.username', 'AdminUsers.email', 'AdminUsers.email', 'AdminUsers.phone', 'AdminUsers.address'];
    }
}
