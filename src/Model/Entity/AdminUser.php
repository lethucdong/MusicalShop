<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
/**
 * AdminUser Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property \Cake\I18n\FrozenTime $birthday
 * @property int $sex
 * @property string $phone
 * @property string $address
 * @property string $full_name
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string|null $updated_by
 * @property bool $delete_flg
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 */
class AdminUser extends Entity
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
        'username' => true,
        'password' => true,
        'email' => true,
        'birthday' => true,
        'sex' => true,
        'phone' => true,
        'address' => true,
        'full_name' => true,
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'delete_flg' => true,
        'role_id' => true,
        'role' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
