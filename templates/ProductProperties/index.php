<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProductProperty> $productProperties
 */
?>
<div class="productProperties index content">
    <?= $this->Html->link(__('New Product Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Properties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('properties_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productProperties as $productProperty): ?>
                <tr>
                    <td><?= $this->Number->format($productProperty->id) ?></td>
                    <td><?= h($productProperty->created_at) ?></td>
                    <td><?= h($productProperty->created_by) ?></td>
                    <td><?= h($productProperty->updated_at) ?></td>
                    <td><?= h($productProperty->updated_by) ?></td>
                    <!-- <td><?= h($productProperty->delete_flg) ?></td> -->
                    <td><?= $productProperty->has('product') ? $this->Html->link($productProperty->product->name, ['controller' => 'Products', 'action' => 'view', $productProperty->product->id]) : '' ?></td>
                    <td><?= $productProperty->has('property') ? $this->Html->link($productProperty->property->name, ['controller' => 'Properties', 'action' => 'view', $productProperty->property->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productProperty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productProperty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productProperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productProperty->id)]) ?>
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
