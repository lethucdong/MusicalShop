<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductProperties Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\PropertiesTable&\Cake\ORM\Association\BelongsTo $Properties
 *
 * @method \App\Model\Entity\ProductProperty newEmptyEntity()
 * @method \App\Model\Entity\ProductProperty newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductProperty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductProperty get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductProperty findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductProperty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductProperty[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductProperty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductProperty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductProperty[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductProperty[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductProperty[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductProperty[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductPropertiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('product_properties');
        $this->setDisplayField('created_by');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'properties_id',
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
        // $validator
        //     ->dateTime('created_at')
        //     ->requirePresence('created_at', 'create')
        //     ->notEmptyDateTime('created_at');

        // $validator
        //     ->scalar('created_by')
        //     ->maxLength('created_by', 255)
        //     ->requirePresence('created_by', 'create')
        //     ->notEmptyString('created_by');

        // $validator
        //     ->dateTime('updated_at')
        //     ->allowEmptyDateTime('updated_at');

        // $validator
        //     ->scalar('updated_by')
        //     ->maxLength('updated_by', 255)
        //     ->allowEmptyString('updated_by');

        // $validator
        //     ->boolean('delete_flg')
        //     ->notEmptyString('delete_flg');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('properties_id')
            ->notEmptyString('properties_id');

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
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn('properties_id', 'Properties'), ['errorField' => 'properties_id']);

        return $rules;
    }
}
