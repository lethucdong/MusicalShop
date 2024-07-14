<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($role->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($role->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($role->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($role->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($role->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $role->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($role->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Admin Users') ?></h4>
                <?php if (!empty($role->admin_users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Birthday') ?></th>
                            <th><?= __('Sex') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Full Name') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->admin_users as $adminUsers) : ?>
                        <tr>
                            <td><?= h($adminUsers->id) ?></td>
                            <td><?= h($adminUsers->username) ?></td>
                            <td><?= h($adminUsers->password) ?></td>
                            <td><?= h($adminUsers->email) ?></td>
                            <td><?= h($adminUsers->birthday) ?></td>
                            <td><?= h($adminUsers->sex) ?></td>
                            <td><?= h($adminUsers->phone) ?></td>
                            <td><?= h($adminUsers->address) ?></td>
                            <td><?= h($adminUsers->full_name) ?></td>
                            <td><?= h($adminUsers->created_at) ?></td>
                            <td><?= h($adminUsers->created_by) ?></td>
                            <td><?= h($adminUsers->updated_at) ?></td>
                            <td><?= h($adminUsers->updated_by) ?></td>
                            <td><?= h($adminUsers->delete_flg) ?></td>
                            <td><?= h($adminUsers->role_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdminUsers', 'action' => 'view', $adminUsers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdminUsers', 'action' => 'edit', $adminUsers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdminUsers', 'action' => 'delete', $adminUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUsers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Role Permissions') ?></h4>
                <?php if (!empty($role->role_permissions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Permission Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->role_permissions as $rolePermissions) : ?>
                        <tr>
                            <td><?= h($rolePermissions->id) ?></td>
                            <td><?= h($rolePermissions->role_id) ?></td>
                            <td><?= h($rolePermissions->permission_id) ?></td>
                            <td><?= h($rolePermissions->created_at) ?></td>
                            <td><?= h($rolePermissions->created_by) ?></td>
                            <td><?= h($rolePermissions->updated_at) ?></td>
                            <td><?= h($rolePermissions->updated_by) ?></td>
                            <td><?= h($rolePermissions->delete_flg) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RolePermissions', 'action' => 'view', $rolePermissions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RolePermissions', 'action' => 'edit', $rolePermissions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RolePermissions', 'action' => 'delete', $rolePermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolePermissions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
