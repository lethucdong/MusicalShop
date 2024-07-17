<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RolePermission> $rolePermissions
 */
?>
<div class="rolePermissions index content">
    <?= $this->Html->link(__('New Role Permission'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Role Permissions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('permission_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rolePermissions as $rolePermission): ?>
                <tr>
                    <td><?= $this->Number->format($rolePermission->id) ?></td>
                    <td><?= $rolePermission->has('role') ? $this->Html->link($rolePermission->role->name, ['controller' => 'Roles', 'action' => 'view', $rolePermission->role->id]) : '' ?></td>
                    <td><?= $rolePermission->has('permission') ? $this->Html->link($rolePermission->permission->name, ['controller' => 'Permissions', 'action' => 'view', $rolePermission->permission->id]) : '' ?></td>
                    <td><?= h($rolePermission->created_at) ?></td>
                    <td><?= h($rolePermission->created_by) ?></td>
                    <td><?= h($rolePermission->updated_at) ?></td>
                    <td><?= h($rolePermission->updated_by) ?></td>
                    <!-- <td><?= h($rolePermission->delete_flg) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rolePermission->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rolePermission->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rolePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolePermission->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
