<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RolePermission $rolePermission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role Permission'), ['action' => 'edit', $rolePermission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role Permission'), ['action' => 'delete', $rolePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolePermission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Role Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role Permission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rolePermissions view content">
            <h3><?= h($rolePermission->created_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $rolePermission->has('role') ? $this->Html->link($rolePermission->role->name, ['controller' => 'Roles', 'action' => 'view', $rolePermission->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission') ?></th>
                    <td><?= $rolePermission->has('permission') ? $this->Html->link($rolePermission->permission->name, ['controller' => 'Permissions', 'action' => 'view', $rolePermission->permission->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($rolePermission->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($rolePermission->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rolePermission->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($rolePermission->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($rolePermission->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $rolePermission->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
