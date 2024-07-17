<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CartDetail> $cartDetails
 */
?>
<div class="cartDetails index content">
    <?= $this->Html->link(__('New Cart Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cart Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('cart_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartDetails as $cartDetail): ?>
                <tr>
                    <td><?= $this->Number->format($cartDetail->id) ?></td>
                    <td><?= $this->Number->format($cartDetail->quantity) ?></td>
                    <td><?= h($cartDetail->created_at) ?></td>
                    <td><?= h($cartDetail->created_by) ?></td>
                    <td><?= h($cartDetail->updated_at) ?></td>
                    <td><?= h($cartDetail->updated_by) ?></td>
                    <!-- <td><?= h($cartDetail->delete_flg) ?></td> -->
                    <td><?= $cartDetail->has('product') ? $this->Html->link($cartDetail->product->name, ['controller' => 'Products', 'action' => 'view', $cartDetail->product->id]) : '' ?></td>
                    <td><?= $cartDetail->has('cart') ? $this->Html->link($cartDetail->cart->created_by, ['controller' => 'Carts', 'action' => 'view', $cartDetail->cart->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cartDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartDetail->id)]) ?>
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
