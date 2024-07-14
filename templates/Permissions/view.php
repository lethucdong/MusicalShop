<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissions view content">
            <h3><?= h($permission->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Module Function') ?></th>
                    <td><?= h($permission->module_function) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($permission->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($permission->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($permission->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($permission->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($permission->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($permission->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $permission->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($permission->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Role Permissions') ?></h4>
                <?php if (!empty($permission->role_permissions)) : ?>
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
                        <?php foreach ($permission->role_permissions as $rolePermissions) : ?>
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
