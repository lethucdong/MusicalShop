<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Model\SearchTrait;

/**
 * ImageBanners Model
 *
 * @method \App\Model\Entity\ImageBanner newEmptyEntity()
 * @method \App\Model\Entity\ImageBanner newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ImageBanner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImageBanner get($primaryKey, $options = [])
 * @method \App\Model\Entity\ImageBanner findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ImageBanner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ImageBanner[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImageBanner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ImageBanner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ImageBanner[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ImageBanner[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ImageBanner[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ImageBanner[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ImageBannersTable extends Table
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

        $this->setTable('image_banners');
        $this->setDisplayField('path_image');
        $this->setPrimaryKey('id');

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
            ->integer('piority')
            ->requirePresence('piority', 'create')
            ->notEmptyString('piority');

        $validator
            ->scalar('path_image')
            ->maxLength('path_image', 255)
            ->requirePresence('path_image', 'create')
            ->notEmptyFile('path_image');

        $validator
            ->scalar('url_decription')
            ->maxLength('url_decription', 255)
            ->requirePresence('url_decription', 'create')
            ->notEmptyString('url_decription');

        $validator
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDateTime('start_date');

        $validator
            ->dateTime('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDateTime('end_date');

        return $validator;
    }

    protected function getSearchFields(): array
    {
        return ['ImageBanners.piority', 'ImageBanners.path_image', 'ImageBanners.url_decription'];
    }
}
