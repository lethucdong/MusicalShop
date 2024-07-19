<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AdminUser> $adminUsers
 */
?>
<div class="adminUsers index content">
    <?= $this->Html->link(__('New Admin User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Admin Users') ?></h3>
    <!-- Form tìm kiếm -->
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('search', ['label' => __('Search'), 'value' => $this->request->getQuery('search')]) ?>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('birthday') ?></th>
                    <th><?= $this->Paginator->sort('sex') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adminUsers as $adminUser): ?>
                <tr>
                    <td><?= $this->Number->format($adminUser->id) ?></td>
                    <td><?= h($adminUser->username) ?></td>
                    <td><?= h($adminUser->email) ?></td>
                    <td><?= h($adminUser->birthday) ?></td>
                    <td><?= $this->Number->format($adminUser->sex) ?></td>
                    <td><?= h($adminUser->phone) ?></td>
                    <td><?= h($adminUser->address) ?></td>
                    <td><?= h($adminUser->full_name) ?></td>
                    <td><?= h($adminUser->created_at) ?></td>
                    <td><?= h($adminUser->created_by) ?></td>
                    <td><?= h($adminUser->updated_at) ?></td>
                    <td><?= h($adminUser->updated_by) ?></td>
                    <!-- <td><?= h($adminUser->delete_flg) ?></td> -->
                    <td><?= $adminUser->has('role') ? $this->Html->link($adminUser->role->name, ['controller' => 'Roles', 'action' => 'view', $adminUser->role->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $adminUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?>
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
