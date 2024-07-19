<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<div class="orders index content">
    <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orders') ?></h3>
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
                    <th><?= $this->Paginator->sort('total_amount') ?></th>
                    <th><?= $this->Paginator->sort('payment_div') ?></th>
                    <th><?= $this->Paginator->sort('delivery_div') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $this->Number->format($order->id) ?></td>
                    <td><?= $this->Number->format($order->total_amount) ?></td>
                    <td><?= h($order->payment_div) ?></td>
                    <td><?= h($order->delivery_div) ?></td>
                    <td><?= h($order->address) ?></td>
                    <td><?= h($order->status) ?></td>
                    <td><?= h($order->created_at) ?></td>
                    <td><?= h($order->created_by) ?></td>
                    <td><?= h($order->updated_at) ?></td>
                    <td><?= h($order->updated_by) ?></td>
                    <!-- <td><?= h($order->delete_flg) ?></td> -->
                    <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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
