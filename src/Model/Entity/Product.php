<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $tax
 * @property int $max_quantity
 * @property int $type
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $updated_by
 * @property bool $delete_flg
 * @property int $category_id
 * @property int $brand_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\CartDetail[] $cart_details
 * @property \App\Model\Entity\ImageProduct[] $image_products
 * @property \App\Model\Entity\OrderDetail[] $order_details
 * @property \App\Model\Entity\ProductProperty[] $product_properties
 */
class Product extends Entity
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
        'name' => true,
        'description' => true,
        'price' => true,
        'tax' => true,
        'max_quantity' => true,
        'type' => true,
        'start_date' => true,
        'end_date' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'delete_flg' => true,
        'category_id' => true,
        'brand_id' => true,
        'category' => true,
        'brand' => true,
        'cart_details' => true,
        'image_products' => true,
        'order_details' => true,
        'product_properties' => true,
    ];
}
