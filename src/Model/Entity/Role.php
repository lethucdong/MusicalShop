<?php
//----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : Role
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
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property string|null $created_by
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string|null $updated_by
 * @property bool|null $delete_flg
 *
 * @property \App\Model\Entity\AdminUser[] $admin_users
 * @property \App\Model\Entity\RolePermission[] $role_permissions
 */
class Role extends Entity
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
        'created_at' => true,
        'created_by' => true,
        'updated_at' => true,
        'updated_by' => true,
        'delete_flg' => true,
        'admin_users' => true,
        'role_permissions' => true,
    ];
}
