<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImageProduct Entity
 *
 * @property int $id
 * @property int $piority
 * @property string $path_image
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $updated_by
 * @property bool $delete_flg
 * @property int $product_id
 *
 * @property \App\Model\Entity\Product $product
 */
class ImageProduct extends Entity
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
        'piority' => true,
        'path_image' => true,
        'start_date' => true,
        'end_date' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'delete_flg' => true,
        'product_id' => true,
        'product' => true,
    ];
}
