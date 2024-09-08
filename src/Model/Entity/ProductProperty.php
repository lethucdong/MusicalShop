<?php
//----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : ProductProperty
//  Overview        : 
//  Programmer      : DongLT
//  Created Date    : 2024/07/14
//  Version         : 0.0.0.1
//
//----------< History >--------------------------------------------------------
//  ID              : 
//  Programmer      : 
//  Updated Date    : 
//  Comment         : 
//  Version         :  
//-----------------------------------------------------------------------------

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductProperty Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string|null $updated_by
 * @property bool $delete_flg
 * @property int $product_id
 * @property int $properties_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Property $property
 */
class ProductProperty extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'delete_flg' => true,
        'product_id' => true,
        'properties_id' => true,
        'product' => true,
        'property' => true,
    ];
}
