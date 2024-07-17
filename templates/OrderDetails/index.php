<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrderDetail> $orderDetails
 */
?>
<div class="orderDetails index content">
    <?= $this->Html->link(__('New Order Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Order Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $orderDetail): ?>
                <tr>
                    <td><?= $this->Number->format($orderDetail->id) ?></td>
                    <td><?= $this->Number->format($orderDetail->price) ?></td>
                    <td><?= $this->Number->format($orderDetail->quantity) ?></td>
                    <td><?= h($orderDetail->created_at) ?></td>
                    <td><?= h($orderDetail->created_by) ?></td>
                    <td><?= h($orderDetail->updated_at) ?></td>
                    <td><?= h($orderDetail->updated_by) ?></td>
                    <!-- <td><?= h($orderDetail->delete_flg) ?></td> -->
                    <td><?= $orderDetail->has('product') ? $this->Html->link($orderDetail->product->name, ['controller' => 'Products', 'action' => 'view', $orderDetail->product->id]) : '' ?></td>
                    <td><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->address, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orderDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id)]) ?>
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
